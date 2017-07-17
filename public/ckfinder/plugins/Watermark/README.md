# ckfinder-watermark-plugin (1.2)

An Watermark plugin for [CKFinder](http://ckfinder.com/) with GUI and preview options.

## Requirements
- CKFinder 3
- PHP ≥ 5.2
- PHP GD or PHP ImageMagick

## Add plugin to CKFinder

To add the plugin to CKFinder:

#### 1. Download plugin and extract as `<ckfinder>/plugins/Watermark`
#### 2. Client side
##### 2.1. Enable from client side configuration `<ckfinder>/config.js` [`config.plugins`](http://docs.cksource.com/ckfinder3/#!/api/CKFinder.Config-cfg-plugins) option.
```js
// Example.
config.plugins = [
  'Watermark'
];
```
##### 2.2. Setup from configuration `<ckfinder>/config.js` option
```js
config.Watermark = {

  // Optional, hide or show save button (default to true)
  overwriteButton: false,

  // Optional, hide or show save as new file button (default to true)
  newFileButton: true,

  // Optional, file suffix if save as new file (default to "-watermark")
  newFileSuffix: '-branded',

  // Required, watermark presets.
  watermarks: [
  
    {
      // All config options (file, label and size) ARE REQUIRED.
      
      // URL to image file, for better results use PNG files
      // with suitable resolution.
      file: '<STRING: URL TO WATERMARK IMAGE>',
     
      // Text label to show in watermark selector.
      label: '<STRING: LABEL FOR WATERMARK>',
      
      // Max size height/width for watermark in percents/px of main image.
      // Example:
      //   If main image is 1600x1200 and size is set to 10,
      //   then watermark will have max width 160px
      //   and height 120px, if the image is smaller than
      //   this size, then it will not be up-scaled.
      //   If value is set in px, then the watermark will not exceed dimensions.
      size: '<STRING: MAX SIZE FOR IMAGE>[px|%]',

      // Set position for this waterark.
      // Value is space separated vertical and horizontal
      // '<top|middle|bottom> <left|center|right>',
      position: '<STRING: top|middle|bottom left|center|right>',

    },

    // Simple example.
    {
      file: 'http://example.com/watermark.png',
      label: 'Example Watermark',
      size: '10',
      position: 'top left'
    },
    
    // ...
  ]
};
```

#### 3. Server side enabling via `<ckfinder>/config.php`
```php
// Add
$config['plugins'][] = 'Watermark';
```

## Troubleshooting

#### Get `Invalid command.` message 
You are not enabled server side plugin from `config.php`

#### Get unexpected error with some number
When by some reason image could not be processed or something happen on server side, it is possible to get such message.
Agenda of codes and meanings:

> * -100  - Missing request arguments.
> * -90   - No graphic library.
> * -11   - Source file is not image.
> * -12   - Source file is image but not supported.
> * -21   - Error while fetching watermark file.
> * -22   - Watermark file is not supported.
> * -30   - Error while processing watermarked image.
> * -31   - Error while saving watermarked image file.

## FAQ

#### Q: How can I add offset
A: You can't, it is not supported right now, better option is to prepare watermark images with offset on it, so you have a control of offsets and it will be auto resized according aspect ratio.
