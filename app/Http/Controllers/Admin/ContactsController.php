<?php
/**
 * Created by PhpStorm.
 * User: ThangLe
 * Date: 7/14/2017
 * Time: 9:51 AM
 */

namespace App\Http\Controllers\Admin;


use App\Http\Controllers\Controller;
use App\Models\PpcContact;

class ContactsController extends Controller
{
    public function Index()
    {
        $contact = PpcContact::get();
        return view('admin.contact.contact',['contact'=>$contact]);
    }
}