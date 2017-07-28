<?php
/**
 * Created by PhpStorm.
 * User: ThangLe
 * Date: 7/26/2017
 * Time: 1:01 PM
 */

namespace App\Http\Controllers\Admin;


use App\Http\Controllers\Controller;
use App\Models\PpcSearch;
use Illuminate\Http\Request;


class SearchController extends Controller
{
    public function Index()
    {
        $bed = PpcSearch::where('type', 1)->get();
        $min = PpcSearch::where('type', 2)->get();
        $max = PpcSearch::where('type', 3)->get();
        return view('admin.search.index',
            [
                'bed' => $bed,
                'min' => $min,
                'max' => $max
            ]);
    }

    public function AddBed()
    {
        $s = new PpcSearch();
        $s->number = 1;
        $s->type = 1;
        $s->save();
        return redirect('/admin/search-management');
    }

    public function AddMin()
    {
        $s = new PpcSearch();
        $s->number = 1;
        $s->type = 2;
        $s->save();
        return redirect('/admin/search-management');
    }

    public function AddMax()
    {
        $s = new PpcSearch();
        $s->number = 1;
        $s->type = 3;
        $s->save();
        return redirect('/admin/search-management');
    }

    public function Update(Request $request)
    {
        $s = PpcSearch::get();
        foreach ($s as $i) {
            PpcSearch::find($i->id)->update(
                [
                    'number' => $request->get('number' . $i->id)
                ]
            );

        }
        return redirect('/admin/search-management')->with('success', 'Updated successfully');
    }

    public function Delete($id)
    {
        $s = PpcSearch::find($id);
        return view('admin.search.delete', ['s' => $s]);
    }

    public function Remove($id)
    {
        $s = PpcSearch::find($id);
        $s->delete();
        return redirect('/admin/search-management')->with('success', 'Deleted successfully');
    }
}