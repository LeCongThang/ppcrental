<?php
/**
 * Created by PhpStorm.
 * User: ThangLe
 * Date: 7/21/2017
 * Time: 10:06 AM
 */

namespace App\Http\Controllers;


use App\Models\PpcNews;

class NewsController extends Controller
{
    public function Detail($id){
        $news = PpcNews::find($id);
        return view('newdetail',['news'=>$news]);
    }
}