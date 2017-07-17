<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\PpcAbout;
use Illuminate\Http\Request;


class AboutController extends Controller
{
    public function Index()
    {
        $about = PpcAbout::get();
        return view('admin.about.about', ['about' => $about]);
    }

    public function Update(Request $request)
    {
        $data = $request->all();
        PpcAbout::find(1)->update($data);
        return redirect('/admin/about-management');
    }
}