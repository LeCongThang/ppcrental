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
        $contact = PpcContact::orderBy('id','desc')->get();
        return view('admin.contact.contact',['contact'=>$contact]);
    }
    public function Seen($id){
        $c = PpcContact::find($id);
        if($c!=null){
            $c->status=1;
            $c->save();
        }
        return redirect('admin/contact-management')->with('success','Updated successfully!');
    }
    public function Delete($id){
        $c = PpcContact::find($id);
        if($c!=null){
            $c->delete();
        }
        return redirect('admin/contact-management')->with('success','Deleted successfully!');
    }
}