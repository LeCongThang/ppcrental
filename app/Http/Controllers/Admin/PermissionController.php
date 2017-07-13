<?php
/**
 * Created by PhpStorm.
 * User: ThangLe
 * Date: 7/9/2017
 * Time: 5:59 PM
 */

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\HbbPermission;
use Illuminate\Http\Request;
use Image;

class PermissionController extends Controller
{

    public function Index()
    {
        $p = HbbPermission::get();
        return view('admin.permission.index', ['permission' => $p]);
    }

    public function getResize()
    {
        return view('admin.permission.create');
    }

    public function postResize(Request $request)
    {
        $this->validate($request, [
            'permission' => 'required',
            'link' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);

        $image = $request->file('link');
        $filename = time() . '.' . $image->getClientOriginalExtension();


        $destinationPath = public_path('/images/resize');
        $img = Image::make($image->getRealPath());
        $img->resize(200, 100, function ($constraint) {
            $constraint->aspectRatio();
        })->save($destinationPath . '/' . $filename);
        $p = new HbbPermission();
        $p->permission=$request->get('permission');
        $p->link= $filename;
        $p->note='ac';
        $p->save();
        return back()
            ->with('success', 'Image Upload successful')
            ->with('imageName', $filename);

    }
}