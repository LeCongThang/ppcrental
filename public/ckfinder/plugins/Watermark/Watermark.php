<?php

  /*
   * CKFinder - Watermark plugin
   * ===========================
   * https://github.com/dimitrov-adrian/ckfinder-watermark-plugin
   *
   * The MIT License (MIT)
   *
   * Copyright (c) 2016 Adrian Dimitrov
   *
   * Permission is hereby granted, free of charge, to any person obtaining a copy
   * of this software and associated documentation files (the "Software"), to deal
   * in the Software without restriction, including without limitation the rights
   * to use, copy, modify, merge, publish, distribute, sublicense, and/or sell
   * copies of the Software, and to permit persons to whom the Software is
   * furnished to do so, subject to the following conditions:
   *
   * The above copyright notice and this permission notice shall be included in all
   * copies or substantial portions of the Software.
   *
   * THE SOFTWARE IS PROVIDED "AS IS", WITHOUT WARRANTY OF ANY KIND, EXPRESS OR
   * IMPLIED, INCLUDING BUT NOT LIMITED TO THE WARRANTIES OF MERCHANTABILITY,
   * FITNESS FOR A PARTICULAR PURPOSE AND NONINFRINGEMENT. IN NO EVENT SHALL THE
   * AUTHORS OR COPYRIGHT HOLDERS BE LIABLE FOR ANY CLAIM, DAMAGES OR OTHER
   * LIABILITY, WHETHER IN AN ACTION OF CONTRACT, TORT OR OTHERWISE, ARISING FROM,
   * OUT OF OR IN CONNECTION WITH THE SOFTWARE OR THE USE OR OTHER DEALINGS IN THE
   * SOFTWARE.
   */

  namespace CKSource\CKFinder\Plugin\Watermark;

  // Set time limit to 1.5 minutes because some big gifs.
  set_time_limit(90);

  use CKSource\CKFinder\Acl\Permission;
  use CKSource\CKFinder\CKFinder;
  use CKSource\CKFinder\Command\CommandAbstract;
  use CKSource\CKFinder\Error;
  use CKSource\CKFinder\Filesystem\Folder\WorkingFolder;
  use CKSource\CKFinder\Filesystem\Path;
  use CKSource\CKFinder\Plugin\PluginInterface;
  use Symfony\Component\HttpFoundation\Request;
  use CKSource\CKFinder\Image;

  /**
   * Watermark command plugin class.
   */
  class Watermark extends CommandAbstract implements PluginInterface
  {

    /**
     * @var CKFinder
     */
    protected $app;

    /**
     * An array of permissions required by this command.
     *
     * @var array
     */
    protected $requires = [
      Permission::FILE_CREATE
    ];

    /**
     * Returns an array with default configuration for this plugin. Any of
     * the plugin configuration options can be overwritten in the CKFinder configuration file.
     *
     * @return array Default plugin configuration
     */
    public function getDefaultConfig() {
      return [];
    }

    /**
     * Calculate info for watermark including maxWidth/maxHeight, width/height and position with coordinates
     *
     * @param $watermark_w
     * @param $watermark_h
     * @param $image_w
     * @param $image_h
     * @param $position
     * @param $size
     *
     * @return array
     */
    protected function calculateWatermarkInfo($watermark_w, $watermark_h, $image_w, $image_h, $position, $size) {

      $info = array(
        'maxWidth' => 0,
        'maxHeight' => 0,
        'x' => 0,
        'y' => 0,
        'width' => 0,
        'height' => 0,
      );

      $size_int = sprintf('%d', $size);

      if (preg_match('#(\d+)px$#', $size, $matches)) {
        $info['maxWidth'] = $size_int;
        $info['maxHeight'] = $size_int;
      }
      else {
        $info['maxWidth'] = ceil($image_w*$size_int/100);
        $info['maxHeight'] = ceil($image_h*$size_int/100);
      }

      if ($watermark_w > $watermark_h) {
        $info['width'] = $info['maxWidth'];
        $info['height'] = floor(($watermark_h/$watermark_w)*$info['maxWidth']);
      }
      else {
        $info['width'] = floor(($watermark_w/$watermark_h)*$info['maxHeight']);
        $info['height'] = $info['maxHeight'];
      }

      if ($position[0] == 'middle') {
        $info['y'] = ceil($image_h/2-$info['height']/2);
      }
      elseif ($position[0] == 'bottom') {
        $info['y'] = $image_h-$info['height'];
      }

      if ($position[1] == 'center') {
        $info['x'] = ceil($image_w/2-$info['width']/2);
      }
      elseif ($position[1] == 'right') {
        $info['x'] = $image_w-$info['width'];
      }

      return $info;
    }

    /**
     * Watermark processor.
     *
     * @param $file
     * @param $watermark
     * @param $position
     * @param $size
     *
     * @return int
     *  -100  - Missing request arguments.
     *  -90   - No graphic library.
     *  -11   - Source file is not image.
     *  -12   - Source file is image but not supported.
     *  -21   - Error while fetching watermark file.
     *  -22   - Watermark file is not supported.
     *  -30   - Error while processing watermarked image.
     *  -31   - Error while saving watermarked image file.
     *  1     - OK
     */
    public function addWatermark($file, $watermark, $position, $size) {

      if (!preg_match('#^image\/#i', $file->getMimetype())) {
        return -11;
      }

      $position = explode(' ', $position);

      $watermarkImageContent = file_get_contents($watermark);
      if (!$watermarkImageContent) {
        return -21;
      }

      if (extension_loaded('imagick')) {

        $uploadedImage = new \Imagick();

        if (!$uploadedImage->readImageBlob($file->read())) {
          return -12;
        }
        $uploadedImage = $uploadedImage->coalesceImages();

        $watermarkImage = new \Imagick();
        if (!$watermarkImage->readImageBlob(file_get_contents($watermark))) {
          return -22;
        }

        try {
          $watermarkInfo = $this->calculateWatermarkInfo($watermarkImage->getImageWidth(), $watermarkImage->getImageHeight(), $uploadedImage->getImageWidth(), $uploadedImage->getImageHeight(), $position, $size);
          $watermarkImage->scaleImage($watermarkInfo['width'], $watermarkInfo['height']);

          $uploadedImageDst = new \Imagick();
          $uploadedImageDst->setFormat($uploadedImage->getFormat());
          $uploadedImageDst->setSize($watermarkInfo['width'], $watermarkInfo['height']);

          $uploadedImage = $uploadedImage->coalesceImages();
          foreach ($uploadedImage as $frame) {

            $uploadedImageDst->addImage($frame->getImage());

            if ($frame->getImageDelay()) {
              $uploadedImageDst->setImageDelay($frame->getImageDelay());
            }

            $uploadedImageDst->compositeImage($watermarkImage, \Imagick::COMPOSITE_OVER, $watermarkInfo['x'], $watermarkInfo['y']);

            if ($uploadedImage->hasNextImage()) {
              $uploadedImageDst->nextImage();
            }

          }

          $uploadedImage->clear();
          $uploadedImage->destroy();

          $watermarkImage->clear();
          $watermarkImage->destroy();
        }
        catch (\Exception $e) {
          return -30;
        }
        return $file->update($uploadedImageDst->getImagesBlob()) ? 1 : -31;
      }

      elseif (extension_loaded('gd')) {

        $uploadedImage = Image::create($file->read());
        if (!$uploadedImage) {
          return -12;
        }

        $watermarkImage = Image::create($watermarkImageContent);
        if (!$watermarkImage) {
          return -22;
        }

        $watermarkInfo = $this->calculateWatermarkInfo($watermarkImage->getWidth(), $watermarkImage->getHeight(), $uploadedImage->getWidth(), $uploadedImage->getHeight(), $position, $size);
        $watermarkImage->resize($watermarkInfo['width'], $watermarkInfo['height'], 100);
        $processing_status = imagecopyresampled($uploadedImage->getGDImage(), $watermarkImage->getGDImage(), $watermarkInfo['x'], $watermarkInfo['y'], 0, 0, $watermarkInfo['width'], $watermarkInfo['height'], $watermarkInfo['width'], $watermarkInfo['height']);

        if (!$processing_status) {
          return -30;
        }

        return $file->update($uploadedImage->getData()) ? 1 : -31;
      }

      else {
        return -90;
      }
    }

    /**
     * Main command method.
     *
     * @param Request       $request       Current request object
     * @param WorkingFolder $workingFolder Current working folder object
     *
     * @return array
     *
     * @throws \Exception
     */
    public function execute(Request $request, WorkingFolder $workingFolder) {

      $watermark_image = $request->get('file');
      $watermark_position = $request->get('position');
      $watermark_size = $request->get('size');
      $watermark_suffix = $request->get('newfile_suffix');
      $update = $request->get('_action') == 'save';
      $backend = $workingFolder->getBackend();
      if (!$workingFolder->containsFile($request->get('fileName'))) {
        throw new \Exception('File not found', Error::FILE_NOT_FOUND);
      }

      $statusCode = -100;
      if ($watermark_position && $watermark_image && $watermark_size) {
        $file = $backend->get(Path::combine($workingFolder->getPath(), $request->get('fileName')));

        if (!$update) {

          $watermark_suffix = $watermark_suffix ? $watermark_suffix: '-watermark';
          $watermark_suffix = preg_replace('#[^\w\s\-]#', '_', $watermark_suffix);

          $newFilePath_i = 0;
          do {
            $newFilePath_suffix = $watermark_suffix . ( $newFilePath_i ? $newFilePath_i : '' );
            $newFilePath = pathinfo($file->getPath(), PATHINFO_DIRNAME) . '/' . pathinfo($file->getPath(), PATHINFO_FILENAME) . $newFilePath_suffix . '.' . pathinfo($file->getPath(), PATHINFO_EXTENSION);
            $newFilePath_i++;
          }
          while ($backend->has($newFilePath));

          $backend->copy($file->getPath(), $newFilePath);
          $file = $backend->get($newFilePath);
        }

        $statusCode = $this->addWatermark($file, $watermark_image, $watermark_position, $watermark_size);

        // If fail, then delete the new copy.
        if (!$update && $statusCode <= 0) {
          $backend->delete($newFilePath);
        }

      }

      return array(
        'status' => $statusCode > 0,
        'statusCode' => $statusCode,
      );

    }

  }
