<?php
/**
 * Created by PhpStorm.
 * User: ThangLe
 * Date: 7/28/2017
 * Time: 9:07 AM
 */

namespace App\Http\Controllers\Admin;


use App\Http\Controllers\Controller;
use App\Models\PpcProvince;
use App\Models\PpcStreet;
use Illuminate\Http\Request;


class PlaceController extends Controller
{

    public function Index()
    {
        $p = PpcStreet::orderBy('huyen_id', 'desc')->get();
        return view('admin.place.index',
            ['place' => $p]);
    }
    public function Create(){
        $province = PpcProvince::where('id', '>', '1')->get();
        return view('admin.place.create',
            [
                'province' => $province,
            ]);
    }
    public function Stored(Request $request){
        $s = new PpcStreet();
        $s->name=$request->get('name');
        $s->huyen_id=$request->get('huyen_id');
        $s->save();
        return redirect('/admin/place-management')->with('success','Created successfully!');
    }
    public function Edit($id){
        $s = PpcStreet::find($id);
        $province = PpcProvince::where('id', '>', '1')->get();
        return view('admin.place.edit',
            [
                's'=>$s,'province' => $province,
            ]);
    }
    public function Update(Request $request,$id){
        $s = PpcStreet::find($id);
        $s->name=$request->get('name');
        $s->huyen_id=$request->get('huyen_id');
        $s->save();
        return redirect('/admin/place-management')->with('success','Updated successfully!');
    }
}