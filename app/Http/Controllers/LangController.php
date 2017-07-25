<?php
/**
 * Created by PhpStorm.
 * User: ThangLe
 * Date: 7/24/2017
 * Time: 4:44 PM
 */

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Session;

class LangController extends Controller
{
    public function postLang($locale)
    {
        Session::put('locale', $locale);
        //App::setLocale($locale);
        return redirect()->back();
    }
}