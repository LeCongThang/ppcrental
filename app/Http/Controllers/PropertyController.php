<?php
/**
 * Created by PhpStorm.
 * User: ThangLe
 * Date: 7/21/2017
 * Time: 10:44 AM
 */

namespace App\Http\Controllers;


use App\Models\PpcProperty;
use App\Models\PpcPropertyFeature;
use App\Models\PpcUser;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class PropertyController extends Controller
{

    public function Detail($id)
    {
        $p = PpcProperty::find($id);
        $feature = PpcPropertyFeature::whereIn('id', explode(",", $p->feature))->get();
        $user = PpcUser::find($p->saler_id);
        return view('propertydetail', ['p' => $p, 'feature' => $feature, 'user' => $user]);
    }

    public function FeatureProperty($id)
    {
        $p = PpcProperty::where('property_type', $id)->orderBy('updated_at', 'desc')->paginate(10);
        return view('property', ['items' => $p]);
    }

    public function DistrictProperty($id)
    {
        $p = PpcProperty::where('district', $id)->orderBy('updated_at', 'desc')->paginate(10);
        return view('property', ['items' => $p]);
    }

    public function Favorite()
    {
        $id = Session::get('proId');
        $id_array = explode(",", $id);
//       dd($idarray);
        $p = PpcProperty::whereIn("id", $id_array)->paginate(10);
//        dd($p);
        return view('property', ['items' => $p]);
    }

    public function AddFav($id)
    {
        $p = Session::get('proId');
        $new = $p . ',' . $id;
        Session::put('proId', $new);

    }

    public function ViewProfile($id)
    {
        $user = PpcUser::find($id);
        $pro = PpcProperty::where('saler_id', $id)->orderBy('updated_at', 'desc')->paginate(10);
        return view('viewprofile', [
            'pro' => $pro,
            'user' => $user
        ]);
    }

    public function Post(Request $request)
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
        $property->unit = $request->get('unit');
        $property->description = $request->get('description');
        $property->description_en = $request->get('description_en');
        $property->district = $request->get('district');
        $property->location = $request->get('area');
        $property->area = $request->get('location');
        $property->bedroom = $request->get('bedroom');
        $property->bathroom = $request->get('bathroom');
        $property->parkingplace = $request->get('parkingplace');
        $property->seotag = $request->get('description');
        $fullsize = 'propertyfull-' . $property->id . '.jpg';
        $filename = 'property-' . time() . '.jpg';
        if ($request->hasFile('image_overall')) {
            $image = $request->file('image_overall');

            $destinationPath = public_path('images/project');
            $img = Image::make($image->getRealPath());
            $img->insert(public_path('images/common_icon/logo.png'), 'bottom-right', 50, 50)
                ->resize(307, 204, function ($constraint) {
                    $constraint->aspectRatio();
                })->save($destinationPath . '/' . $filename);
            $imgfull = Image::make($image->getRealPath())->insert(public_path('images/common_icon/logo.png'), 'bottom-right', 50, 50)
                ->resize(750, 500, function ($constraint) {
                    $constraint->aspectRatio();
                })->save($destinationPath . '/' . $fullsize);
            $property->image_overall = $filename;
        }

        $property->status = 0;
        foreach ($feature as $i) {
            if ($request->get('feature' . $i->id) != null) {
                $property->feature .= $i->id . ',';
            }
        }
        $property->created_at = Carbon::now();
        $property->updated_at = Carbon::now();
        $property->save();
        return redirect('/for-agent.html')->with('success', 'Successfully, your post will be review in 24h. ');
    }
}
