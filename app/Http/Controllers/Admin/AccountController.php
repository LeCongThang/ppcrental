<?php
/**
 * Created by PhpStorm.
 * User: ThangLe
 * Date: 7/7/2017
 * Time: 10:27 AM
 */
namespace App\Http\Controllers\Admin;
use App\Http\Controllers\Controller;
use App\Models\PpcUser;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class AccountController extends Controller{
    public function getLogin(){
        return view('admin.login');
    }
    public function postLogin(Request $request){

        $username = $request->get('username');
        $password=$request->get('password');
        $user = PpcUser::where('username', $username)->first();
        //dd($user);
        if($user!=null &&$user->user_type==0){
            $pass = $user->password;
            if($password!=$pass){

                return redirect('/admin/log-in')->with('fail','Opps! Username or password wrong!  ');
            }
            else{
                if($user->status==1){
                Session::put('username',$user->fullname);
                Session::put('user_id',$user->id);
                Session::put('avatar',$user->avatar);
                return redirect('/admin');
                }
                else{
                    return redirect('/admin/log-in')->with('fail','Sorry, your account was blocked!  ');
                }
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