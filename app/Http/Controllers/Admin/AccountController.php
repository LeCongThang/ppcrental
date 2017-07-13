<?php
/**
 * Created by PhpStorm.
 * User: ThangLe
 * Date: 7/7/2017
 * Time: 10:27 AM
 */
namespace App\Http\Controllers\Admin;
use App\Http\Controllers\Controller;
use App\Models\HbbUser;
use DB;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class AccountController extends Controller{
    public function getLogin(){
        return view('admin.login');
    }
    public function postLogin(Request $request){

        $username = $request->get('username');
        $password=$request->get('password');
        $user = HbbUser::where('username',$username)->first();
        //dd($user);
        if($user!=null){
            $pass = $user->password;
            if($password!=$pass){

                return redirect('/admin/log-in')->with('fail','Username or password wrong!  ');
            }
            else{
                Session::put('username',$username);
                Session::put('user_id',$user->id);
                return redirect('/admin');
            }
        }
        else{

            return redirect('/admin/log-in')->with('fail','Account not exist!');
        }
        return redirect()->back();
    }
    public function Logout(Request $request){
        $request->session()->flush();
        return redirect('/admin/log-in');
    }
}