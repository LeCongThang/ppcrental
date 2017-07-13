<?php

namespace App\Http\Controllers;

class HomeController extends Controller
{
    public function About()
    {
        return view('about');
    }

    public function Contact()
    {
        return view('contact');
    }

    public function News()
    {
        return view('news');
    }

    public function Signin()
    {
        return view('signin');
    }

    public function Signup()
    {
        return view('signup');
    }
    public function Residential(){
    return view('residential');
}
    public function Commercial(){
        return view('commercial');
    }
    public function Sale(){
        return view('sale');
    }
    public function Search(){
        return view('search');
    }
    public function ForAgent(){
        return view('agent');
    }
}
