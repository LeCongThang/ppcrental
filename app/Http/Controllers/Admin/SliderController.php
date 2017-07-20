<?php
/**
 * Created by PhpStorm.
 * User: ThangLe
 * Date: 7/14/2017
 * Time: 9:51 AM
 */

namespace App\Http\Controllers\Admin;


use App\Http\Controllers\Controller;
use App\Models\PpcSlider;
use Illuminate\Http\Request;
use Image;

class SliderController extends Controller
{
    public function Index()
    {
        $slider = PpcSlider::get();
        return view('admin.slider.index', ['slider' => $slider]);
    }

    public function NewSlider()
    {
        return view('admin.slider.create');
    }

    public function Stored(Request $request)
    {

        try {
            $image = $request->file('slider');
            $filename = 'slider-' . time() . '.jpg';


            $destinationPath = public_path('images/slider');
            $img = Image::make($image->getRealPath());
            $img->insert(public_path('images/common_icon/logo.png'), 'bottom-right', 50, 250)
                ->resize(1349, 663, function ($constraint) {
                $constraint->aspectRatio();
            })->save($destinationPath . '/' . $filename);
            $slider = new PpcSlider();
            $slider->slider = $filename;
            $slider->sort_order = $request->get('sort_order');
            if($request->get('status')!=null){
                $slider->status = $request->get('status');
            }
            else
                $slider->status =0;
            $slider->save();


            return redirect('/admin/slider-management')->with('success', 'Created successfully');
        } catch (\Exception $e) {
            return redirect('/admin/slider-management')->with('Fail', 'Image size not correct, please choose image (16:9)');
        }
    }

    public function EditSlider($id)
    {
        $slider = PpcSlider::find($id);
        return view('admin.slider.edit',['slider'=>$slider]);
    }

    public function Update(Request $request,$id)
    {
        try {
            $slider = PpcSlider::find($id);
            $oldfile = $slider->slider;
            if($request->hasFile('slider')){
                $image = $request->file('slider');
                $filename = 'slider-' . time() . '.jpg';


                $destinationPath = public_path('images/slider');
                $img = Image::make($image->getRealPath());
                $img->insert(public_path('images/common_icon/logo.png'), 'bottom-right', 50, 250)
                    ->resize(1349, 663, function ($constraint) {
                        $constraint->aspectRatio();
                    })->save($destinationPath . '/' . $filename);
                if(file_exists('images/slider/' . $oldfile)){
                    unlink('images/slider/' .$oldfile);
                }
                $slider->slider = $filename;
            }




            $slider->sort_order = $request->get('sort_order');
            if($request->get('status')!=null){
                $slider->status = $request->get('status');
            }
            else
                $slider->status =0;
            $slider->save();


            return redirect('/admin/slider-management')->with('success', 'Updated successfully');
        } catch (\Exception $e) {
            dd($e);
        }

    }

    public function DeleteSlider($id)
    {
        return view('admin.slider.delete', ['id' => $id]);
    }

    public function Delete($id)
    {
        $slide = PpcSlider::find($id);
        if (file_exists('images/slider/' . $slide->slider)) {
            unlink('images/slider/' . $slide->slider);
        }
        $slide->delete();
        return redirect('/admin/slider-management')->with('success', 'Deleted successfully');
    }
}