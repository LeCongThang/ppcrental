<?php
/**
 * Created by PhpStorm.
 * User: ThangLe
 * Date: 7/17/2017
 * Time: 10:46 AM
 */

namespace App\Http\Controllers\Admin;


use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Session;
use DB;
class BaseController extends Controller
{
    public static function Index()
    {

        $user_id = Session::get('user_id');
        $permission = DB::table('ppc_permission')
            ->join('ppc_user_permission','ppc_permission.id','=','ppc_user_permission.permission_id')
            ->where('ppc_user_permission.user_id',$user_id)
            ->select('ppc_permission.id','ppc_permission.name','ppc_permission.link')
            ->get();
        return view('admin.sidebar.index',['permission'=>$permission]);
    }

}