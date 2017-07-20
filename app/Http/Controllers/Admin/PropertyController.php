<?php
/**
 * Created by PhpStorm.
 * User: ThangLe
 * Date: 7/15/2017
 * Time: 12:03 AM
 */

namespace App\Http\Controllers\Admin;


use App\Http\Controllers\Controller;
use App\Models\PpcDistrict;
use App\Models\PpcProperty;
use App\Models\PpcPropertyCategory;
use App\Models\PpcPropertyFeature;
use App\Models\PpcProvince;
use App\Models\PpcUser;
use Carbon\Carbon;
use DB;
use Image;
use Illuminate\Http\Request;

class PropertyController extends Controller
{
    public function Index()
    {
        $properties = PpcProperty::orderBy('updated_at', 'desc')->get();
        return view('admin.property.index', ['properties' => $properties]);
    }

    public function Create()
    {
        $feature = PpcPropertyFeature::get();
        $user = PpcUser::get();
        $type = PpcPropertyCategory::where('parent_id', 0)->get();
        $province = PpcProvince::where('id', '>', '1')->get();
        return view('admin.property.create', [
            'feature' => $feature,
            'province' => $province,
            'type' => $type,
            'user' => $user
        ]);
    }

    public function Edit($id)
    {
        $property = PpcProperty::find($id);
        $feature = PpcPropertyFeature::get();
        $user = PpcUser::get();
        $type = PpcPropertyCategory::where('parent_id', 0)->get();
        $province = PpcProvince::where('id', '>', '1')->get();
        return view('admin.property.edit', [
            'feature' => $feature,
            'province' => $province,
            'type' => $type,
            'user' => $user,
            'property' => $property,
        ]);
    }

    public function Stored(Request $request)
    {
        $feature = PpcPropertyFeature::get();
        $property = new PpcProperty();
        $property->property_status = $request->get('property_status');
        $property->property_type = $request->get('property_type');
        $property->name = $request->get('name');
        $property->name_en = $request->get('name_en');
        $property->slug = str_slug($request->get('name_en'));
        $property->slug_en = str_slug($request->get('name_en'));
        $property->price = $request->get('price');
        $property->saler_id = $request->get('saler_id');
        $property->description = $request->get('description');
        $property->description_en = $request->get('description_en');
        $property->location = $request->get('area');
        $property->area = $request->get('location');
        $property->bedroom = $request->get('bedroom');
        $property->bathroom = $request->get('bathroom');
        $property->parkingplace = $request->get('parkingplace');
        $property->seotag = $request->get('seotag');
        $filename = 'property-' . time() . '.jpg';
        if ($request->hasFile('image_overall')) {
            $image = $request->file('image_overall');

            $destinationPath = public_path('images/project');
            $img = Image::make($image->getRealPath());
            $img->insert(public_path('images/common_icon/logo.png'), 'bottom-right', 50, 250)
                ->resize(307, 204, function ($constraint) {
                    $constraint->aspectRatio();
                })->save($destinationPath . '/' . $filename);
            $property->image_overall = $filename;
        }
        if ($request->get('status') != null) {
            $property->status = $request->get('status');
        } else
            $property->status = 0;
        foreach ($feature as $i) {
            if ($request->get('feature' . $i->id) != null) {
                $property->feature .= $i->id . ',';
            }
        }
        $property->created_at = Carbon::now();
        $property->updated_at = Carbon::now();
        $property->save();
        return redirect('/admin/properties-management')->with('success', 'Created successfully');
    }

    public function Update(Request $request, $id)
    {
        $feature = PpcPropertyFeature::get();
        $property = PpcProperty::find($id);
        $property->property_status = $request->get('property_status');
        $property->property_type = $request->get('property_type');
        $property->name = $request->get('name');
        $property->name_en = $request->get('name_en');
        $property->slug = str_slug($request->get('name_en'));
        $property->slug_en = str_slug($request->get('name_en'));
        $property->price = $request->get('price');
        $property->saler_id = $request->get('saler_id');
        $property->description = $request->get('description');
        $property->description_en = $request->get('description_en');
        $property->location = $request->get('area');
        $property->area = $request->get('location');
        $property->bedroom = $request->get('bedroom');
        $property->bathroom = $request->get('bathroom');
        $property->parkingplace = $request->get('parkingplace');
        $property->seotag = $request->get('seotag');
        $filename = 'property-' . time() . '.jpg';
        if ($request->hasFile('image_overall')) {
            $image = $request->file('image_overall');

            $destinationPath = public_path('images/project');
            $img = Image::make($image->getRealPath());
            $img->insert(public_path('images/common_icon/logo.png'), 'bottom-right', 50, 250)
                ->resize(307, 204, function ($constraint) {
                    $constraint->aspectRatio();
                })->save($destinationPath . '/' . $filename);
            if (file_exists('images/project/' . $property->image_overall)) {
                unlink('images/project/' . $property->image_overall);
            }
            $property->image_overall = $filename;
        }
        if ($request->get('status') != null) {
            $property->status = $request->get('status');
        } else
            $property->status = 0;
        foreach ($feature as $i) {
            if ($request->get('feature' . $i->id) != null) {
                $property->feature .= $i->id . ',';
            }
        }
        $property->updated_at = Carbon::now();
        $property->save();
        return redirect('/admin/properties-management')->with('success', 'Updated successfully');
    }

    public function LoadDistrict($id)
    {
        $district = DB::table('ppc_district')->where('tinh_id', $id)->orderBy('name', 'asc')->get();
        return $district->toJson();
    }

    public function LoadWard($id)
    {
        $ward = DB::table('ppc_ward')->where('huyen_id', $id)->orderBy('name', 'asc')->get();
        return $ward->toJson();
    }

    public function LoadStreet($id)
    {
        $street = DB::table('ppc_street')->where('huyen_id', $id)->orderBy('name', 'asc')->get();
        return $street->toJson();
    }

    public function Delete($id)
    {
        $p = PpcProperty::find($id);
        if ($p != null) {
            return view('admin.property.delete',['id'=>$id]);
        }

    }

    public function Remove($id)
    {
        $p = PpcProperty::find($id);
        if ($p != null) {
            if (file_exists('images/project/' . $p->image_overall)) {
                unlink('images/project/' . $p->image_overall);
            }
            $p->delete();
            return redirect('/admin/properties-management');
        }
    }
}