<?php
/**
 * Created by PhpStorm.
 * User: ThangLe
 * Date: 7/20/2017
 * Time: 1:37 PM
 */

namespace App\Http\Controllers;


use App\Http\Controllers\Controller;
use App\Models\PpcProperty;
use Illuminate\Http\Request;

class SearchController extends Controller
{
    public function Search(Request $request)
    {

        $items = PpcProperty::where('location','like','%'.$request->get('location').'%')
            ->orWhere('bedroom','=',$request->get('bedroom'))
            ->orWhere('property_type','=',$request->get('property_type'))
            ->orWhere('property_status','=',$request->get('property_status'))
            ->whereBetween('price',array($request->get('min'),$request->get('max')))
            ->where('name','=',$request->get('keyword'))
            ->orderBy('updated_at','desc')
            ->get();

            return view('property', ['items' => $items]);

    }
}