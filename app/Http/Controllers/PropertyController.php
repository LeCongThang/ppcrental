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
        $p = PpcProperty::where('property_type', $id)->orderBy('updated_at', 'desc')->get();
        return view('property', ['items' => $p]);
    }

    public function DistrictProperty($id)
    {
        $p = PpcProperty::where('district', $id)->orderBy('updated_at', 'desc')->get();
        return view('property', ['items' => $p]);
    }

    public function Favorite()
    {
        $id = Session::get('proId');
        $id_array = explode(",", $id);
//       dd($idarray);
        $p = PpcProperty::whereIn("id", $id_array)->get();
        dd($p->name);
        return view('property', ['items' => $p]);
    }

    public function AddFav($id)
    {
        $p = Session::get('proId');
        $new = $p . ',' . $id;
        Session::put('proId', $new);

    }
}
