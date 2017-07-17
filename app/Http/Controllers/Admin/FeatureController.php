<?php
/**
 * Created by PhpStorm.
 * User: ThangLe
 * Date: 7/15/2017
 * Time: 12:03 AM
 */

namespace App\Http\Controllers\Admin;


use App\Http\Controllers\Controller;
use App\Models\PpcPropertyFeature;
use Illuminate\Http\Request;

class FeatureController extends Controller
{
    public function Index()
    {
        $feature = PpcPropertyFeature::orderBy('id', 'desc')->get();
        return view('admin.feature.index', ['feature' => $feature]);
    }

    public function Create()
    {
        $f = new PpcPropertyFeature();
        $f->feature = 'dịch vụ mới';
        $f->feature_en = 'new feature';
        $f->status = 0;
        $f->save();
        return redirect('/admin/status-feature-property')->with('success', 'Created successfully');
    }

    public function Update(Request $request)
    {
        $feature = PpcPropertyFeature::all();
        foreach ($feature as $item) {
            $f = PpcPropertyFeature::find($item->id);
            $f->feature = $request->get('feature' . $item->id);
            $f->feature_en = $request->get('feature_en' . $item->id);
            if ($request->get('status' . $item->id) != null) {
                $f->status = 1;
            } else
                $f->status = 0;
            $f->save();
        }
        return redirect('/admin/status-feature-property')->with('success', 'Updated successfully');

    }

    public function Delete($id)
    {
        $f = PpcPropertyFeature::find($id);

        if ($f != null) {
            return view('admin.feature.delete',['id'=>$id]);
        }
    }
    public function Remove($id){
        $f = PpcPropertyFeature::find($id);
        if ($f != null) {
            $f->delete();
            return redirect('/admin/status-feature-property')->with('success', 'Deleted successfully');
        }
    }
}