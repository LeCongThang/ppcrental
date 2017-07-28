<?php
/**
 * Created by PhpStorm.
 * User: ThangLe
 * Date: 7/17/2017
 * Time: 9:29 AM
 */

namespace App\Http\Controllers\Admin;


use App\Http\Controllers\Controller;
use App\Models\PpcPermission;
use App\Models\PpcUser;
use App\Models\PpcUserPermission;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use Image;
use Carbon\Carbon;
use DB;

class UserController extends Controller
{
    public function Index()
    {
        $user = PpcUser::orderBy('id', 'desc')->get();

        return view('admin.user.index', ['user' => $user]);
    }

    public function Create()
    {
        $permission = PpcPermission::get();
        return view('admin.user.create', ['permission' => $permission]);
    }

    public function Stored(Request $request)
    {

        $user = new PpcUser();
        $user->email = $request->get('email');
        $user->fullname = $request->get('fullname');
        $user->username = $request->get('username');
        $user->phone = $request->get('phone');
        $user->office_phone = $request->get('office_phone');
        $user->address = $request->get('address');
        $user->address_en = $request->get('address_en');
        if ($request->get('status') != null) {
            $user->status = $request->get('status');
        } else
            $user->status = 0;
        $user->created_at = Carbon::now();
        $user->updated_at = Carbon::now();
        $user->password = 'PpcRental@' . date('Y');
        $user->remember_token = '';
        $user->user_type = '0';
        if ($request->hasFile('avatar')) {
            $image = $request->file('avatar');
            $filename = 'user-' . time() . '.jpg';
            $destinationPath = public_path('images/users');
            $img = Image::make($image->getRealPath());
            $img->circle(70, 150, 100, function ($draw) {
                $draw->border(1, '#ffffff');
            })->save($destinationPath . '/' . $filename);
            $user->avatar = $filename;
        } else {
            $user->avatar = 'user.png';
        }
        $user->save();
        $permission = PpcPermission::get();
        foreach ($permission as $i) {
            if ($request->get('permission' . $i->id) != null) {
                $up = new PpcUserPermission();
                $up->user_id = $user->id;
                $up->permission_id = $i->id;
                $up->save();
            }
        }
        return redirect('/admin/user-management')->with('success', 'Created successfully');
    }

    public function Edit($id)
    {
        $permission = PpcPermission::all();
        $user_permission = DB::table('ppc_user_permission')->where('user_id', $id)->select('permission_id')->get();
        $user = PpcUser::find($id);
        return view('admin.user.edit', ['permission' => $permission, 'user' => $user, 'user_permission' => $user_permission]);
    }

    public function Update(Request $request, $id)
    {
        $user = PpcUser::find($id);
        if ($request->get('status') != null) {
            $user->status = 1;
        } else $user->status = 0;
        $user->save();
        $permission = PpcPermission::get();
        foreach ($permission as $i) {
            $userp = DB::table('ppc_user_permission')->where('user_id', $id)->where('permission_id', $i->id)
                ->first();
            if ($request->get('permission' . $i->id) != null && $userp == null) {
                $up = new PpcUserPermission();
                $up->user_id = $user->id;
                $up->permission_id = $i->id;
                $up->save();
            } else if ($request->get('permission' . $i->id) == null && $userp != null) {
                $up = PpcUserPermission::where('user_id', $id)->where('permission_id', $i->id)->first();
                $up->delete();
            }
        }
        return redirect('/admin/user-management ')->with('success', 'Updated successfully');
    }

    public function ResetPassword($id)
    {
        $user = PpcUser::find($id);
        $user->password = 'PpcRental@' . date('Y');
        $user->save();
        return redirect('/admin/user-management')->with('success', 'Reset success');
    }

    public function Delete($id)
    {
        $user = PpcUser::find($id);
        return view('admin.user.delete', ['user' => $user]);
    }

    public function Remove($id)
    {
        PpcUserPermission::where('user_id', $id)->delete();
        PpcUser::find($id)->delete();
        return redirect('/admin/user-management')->with('success', 'Deleted successfully');
    }

    public function EditProfile($id)
    {
        $user = PpcUser::find($id);
        if ($user != null) {
            return view('admin.user.editprofile', ['user' => $user]);
        }

    }

    public function UpdateProfile(Request $request, $id)
    {
        $user = PpcUser::find($id);
        $user->email = $request->get('email');
        $user->username = $request->get('username');
        $user->fullname = $request->get('fullname');
        $user->phone = $request->get('phone');
        $user->office_phone = $request->get('office_phone');
        $user->address = $request->get('address');
        $user->address_en = $request->get('address_en');
        $user->updated_at = Carbon::now();
        if ($request->get('password') != null) {
            $user->password = $request->get('password');
        }
        if ($request->hasFile('avatar')) {
            $image = $request->file('avatar');
            $filename = 'user-' . time() . '.jpg';
            $destinationPath = public_path('images/users');
            $img = Image::make($image->getRealPath());
            $img->circle(70, 150, 100, function ($draw) {
                $draw->border(1, '#ffffff');
            })->save($destinationPath . '/' . $filename);
            if (file_exists('images/users/' . $user->avatar)) {
                unlink('images/users/' . $user->avatar);
            }
            $user->avatar = $filename;

        }
        $user->save();
        return redirect()->back()->with('success', 'Updated successfully!');
    }
}