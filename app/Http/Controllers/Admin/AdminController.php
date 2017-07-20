<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\PpcDistrict;
use App\Models\PpcPropertyCategory;
use App\Models\PpcProvince;
use App\Models\PpcSystemConfig;
use Carbon\Carbon;
use DB;
use Illuminate\Http\Request;
use Illuminate\Routing\Redirector;
use Illuminate\Support\Facades\Session;

class AdminController extends Controller
{


    public function Home()
    {
        return view('admin.home');
    }

    public function getSystemConfig()
    {
        $systems = PpcSystemConfig::all();
        return view('admin.systemconfig', ['systems' => $systems]);
    }

    public function updateSystemConfig(Request $request)
    {

        $data = $request->all();
        PpcSystemConfig::find(1)->update($data);
        return redirect('/admin/system-config')->with('success', 'Updated successfully');
    }

    public function getMenu()
    {
        $menu = DB::table('ppc_property_category')
            ->where('ppc_property_category.status', 1)
            ->where('ppc_property_category.parent_id', 0)
            ->orderBy('ppc_property_category.sort_order', 'asc')
            ->get();
        return view('admin.menu', ['menu' => $menu]);
    }

    public function UpdateMenu(Request $request)
    {
        $menu = PpcPropertyCategory::all();
        foreach ($menu as $i) {
            PpcPropertyCategory::find($i->id)->update([
                'name' => $request->get('name' . $i->id),
                'name_en' => $request->get('name_en' . $i->id),
                'slug' => str_slug($request->get('name' . $i->id)),
                'slug_en' => str_slug($request->get('name_en' . $i->id)),
                'sort_order' => str_slug($request->get('sort_order' . $i->id)),
                'updated_at' => Carbon::now(),
            ]);
        }
        return redirect('/admin/menu-management')->with('success', 'Update successfully');
    }

    public function CreateSubmenu($id)
    {
        $menu = new PpcPropertyCategory();
        $menu->name = 'Menu mới';
        $menu->name_en = 'New menu';
        $menu->slug = 'menu-moi';
        $menu->slug_en = 'new-menu';
        $menu->status = 1;
        $menu->sort_order = 1;
        $menu->parent_id = $id;
        $menu->created_at = Carbon::now();
        $menu->updated_at = Carbon::now();
        $menu->save();

        return redirect('/admin/menu-management')->with('success', 'Created successfully');;
    }


    public function getDeleteMenu($id)
    {
        return view('admin.deletemenu', ['id' => $id]);
    }

    public function postDeleteMenu($id)
    {
        PpcPropertyCategory::where('id', $id)->delete();
        return redirect('/admin/menu-management')->with('success', 'Delete successfully');
    }

    public function DistrictInHomepage()
    {
        $district = PpcDistrict::where('status', 1)->orderBy('sort_order', 'asc')->get();

        $province = PpcDistrict::get();
        return view('admin.homepage.index', [
            'district' => $district,
            'province' => $province
        ]);
    }

    public function EditPosition($id)
    {
        $province = PpcDistrict::get();
        $district = PpcDistrict::find($id);
        return view('admin.homepage.edit', ['district' => $district, 'province' => $province]);
    }

    public function UpdatePosition(Request $request, $id)
    {
        if ($request->get('district') != $id) {
            $district = PpcDistrict::find($id);
            $sort=$district->sort_order;
            $district->sort_order=0;
            $district->status=0;
            $district->save();
            $newdis = PpcDistrict::find($request->get('district'));
            $newdis->sort_order=$sort;
            $newdis->status=1;
            $newdis->save();
            return redirect('/admin/district-in-homepage');
        }
    }

    public function DistrictDetail($id)
    {
        $data = PpcDistrict::find($id);
        return $data;
    }
}