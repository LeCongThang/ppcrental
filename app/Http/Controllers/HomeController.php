<?php

namespace App\Http\Controllers;

use App\Models\PpcAbout;
use App\Models\PpcAgent;
use App\Models\PpcContact;
use App\Models\PpcDistrict;
use App\Models\PpcNews;
use App\Models\PpcProperty;
use App\Models\PpcPropertyCategory;
use App\Models\PpcPropertyFeature;
use App\Models\PpcProvince;
use App\Models\PpcSlider;
use App\Models\PpcUser;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Cookie;
use Illuminate\Support\Facades\Session;


class HomeController extends Controller
{
    public function Home()
    {
        $slider = PpcSlider::where('status', 1)->orderBy('sort_order', 'asc')->get();
        $news = PpcNews::where('status', 1)->orderBy('updated_at', 'desc')->take(3)->get();
        $property = PpcProperty::where('status', 1)->orderBy('updated_at', 'desc')->get();
        $district = PpcDistrict::where('status', 1)->orderBy('sort_order', 'asc')->get();
        return view('welcome', [
            'slider' => $slider,
            'news' => $news,
            'property' => $property,
            'district' => $district

        ]);
    }

    public static function LoadSubCat($id)
    {
        $cat = PpcPropertyCategory::where('parent_id', $id)->get();
        return view('partial.subcat', ['cat' => $cat]);
    }

    public static function GetMenu()
    {
        $menu = PpcPropertyCategory::where('parent_id', 0)->orderBy('sort_order', 'asc')->get();
        return $menu;
    }

    public function About()
    {
        $about = PpcAbout::find(1);
        return view('about', ['about' => $about]);
    }

    public function Contact()
    {
        return view('contact');
    }

    public function SendMessage(Request $request)
    {
        $contact = new PpcContact();
        $contact->insert([
            'name' => $request->get('name'),
            'email' => $request->get('email'),
            'phone' => $request->get('phone'),
            'message' => $request->get('message'),
            'status' => 0,
            'client_ip' => $request->ip(),
            'created_at' => Carbon::now(),
        ]);
        return redirect('/contact-to-ppcrental.html')->with('success', 'Thanks, we will reply within 24 hour.');
    }

    public function News()
    {
        $new = PpcNews::orderBy('updated_at', 'desc')->paginate(10);
        return view('news', ['news' => $new]);
    }

    public function Signin()
    {

        return view('signin');
    }

    public function Login(Request $request)
    {
        $a = PpcUser::where('username', $request->get('username'))->first();
        if ($a != null && $a->user_type == 1) {
            if ($a->status = 1) {
                if ($a->password == $request->get('password')) {
                    Session::put('agent_id', $a->id);
                    Session::put('agentname', $a->fullname);
                    Cookie::queue('user_id', str_slug($a->fullname));
                    return redirect()->back();
                } else {
                    return redirect()->back()->with('fail', 5);
                }
            } else {
                return 'bi khoa';
            }
        } else {
            return 'sai';
        }

    }

    public function Logout(Request $request)
    {
        $request->session()->forget('agent_id');
        $request->session()->forget('agentname');

        return redirect('/');
    }

    public function Signup()
    {

        return view('signup');
    }

    public function Register(Request $request)
    {
        $user = new PpcUser();
        $user->email = $request->get('email');
        $user->fullname = $request->get('fullname');
        $user->username = $request->get('username');
        $user->phone = $request->get('phone');
        $user->office_phone = $request->get('office_phone');
        $user->address = $request->get('address');
        $user->address_en = $request->get('address_en');
        $user->status = 1;
        $user->created_at = Carbon::now();
        $user->updated_at = Carbon::now();
        $user->password = $request->get('password');
        $user->remember_token = '';
        $user->user_type = 1;
        if ($request->hasFile('avatar')) {
            $image = $request->file('avatar');
            $filename = 'user-' . md5(time()) . '.jpg';
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
        Session::put('agent_id', $user->id);
        Session::put('agentname', $user->fullname);
        Cookie::queue('user_id', str_slug($user->fullname));
        return redirect('/');
    }

    public function ForAgent()
    {
        $feature = PpcPropertyFeature::get();
        $type = PpcPropertyCategory::where('parent_id', 0)->get();
        $province = PpcProvince::where('id', '>', '1')->get();
        return view('agent', [
            'feature' => $feature,
            'province' => $province,
            'type' => $type,
        ]);

    }

    public function AgentProfile($id)
    {
        if (Session::get('agent_id') == $id) {
            $u = PpcUser::where('id', $id)->where('user_type', 1)->first();
            if ($u != null) {
                return view('profile', ['user' => $u]);
            }

        }
    }

    public function SiteMap()
    {
        $new = PpcNews::all();
        $p = PpcProperty::all();
        $d = PpcDistrict::where('status', 1)->get();
        $c = PpcPropertyCategory::all();
        return response()->view('sitemap', [
            'news' => $new,
            'p' => $p,
            'd' => $d,
            'c' => $c
        ])->header('Content-Type', 'text/xml');
    }


}
