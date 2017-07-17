<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\PpcNews;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use Image;

class NewsController extends Controller
{
    public function Index()
    {
        $news = PpcNews::get();
        return view('admin.news.index', ['news' => $news]);
    }

    public function Create()
    {
        return view('admin.news.create');
    }

    public function Stored(Request $request)
    {
        $news = new PpcNews();
        $news->title = $request->get('title');
        $news->title_en = $request->get('title_en');
        $news->content = $request->get('content');
        $news->content_en = $request->get('content_en');
        $news->slug = str_slug($request->get('title'));
        $news->slug_en = str_slug($request->get('title_en'));
        $news->seotag = $request->get('seotag');
        $news->created_at = Carbon::now();
        $news->updated_at = Carbon::now();
        $news->author_id = Session::get('user_id');
        $filename = 'news-' . time() . '.jpg';
        if ($request->hasFile('image')) {
            $image = $request->file('image');

            $destinationPath = public_path('images/news');
            $img = Image::make($image->getRealPath());
            $img->insert(public_path('images/homepage/logo.png'), 'bottom-right', 50, 250)
                ->resize(750, 500, function ($constraint) {
                    $constraint->aspectRatio();
                })->save($destinationPath . '/' . $filename);
            $news->image = $filename;
        }
        if ($request->get('status') != null) {
            $news->status = $request->get('status');
        } else
            $news->status = 0;
        $news->save();
        return redirect('/admin/news-management')->with('success', 'Created successfully');
    }

    public function Edit($id)
    {
        $news = PpcNews::find($id);
        if ($news != null) {
            return view('admin.news.edit', ['news' => $news]);
        } else
            return back()->with('success', 'Not found');

    }

    public function Update(Request $request, $id)
    {
        $news = PpcNews::find($id);
        $news->title = $request->get('title');
        $news->title_en = $request->get('title_en');
        $news->content = $request->get('content');
        $news->content_en = $request->get('content_en');
        $news->slug = str_slug($request->get('title'));
        $news->slug_en = str_slug($request->get('title_en'));
        $news->seotag = $request->get('seotag');
        $news->updated_at = Carbon::now();
        $news->author_id = Session::get('user_id');
        $oldfile = $news->image;
        $filename = 'news-' . time() . '.jpg';
        if ($request->hasFile('image')) {
            $image = $request->file('image');

            $destinationPath = public_path('images/news');
            $img = Image::make($image->getRealPath());
            $img->insert(public_path('images/homepage/logo.png'), 'bottom-right', 50, 250)
                ->resize(750, 500, function ($constraint) {
                    $constraint->aspectRatio();
                })->save($destinationPath . '/' . $filename);
            if (file_exists('images/news/' . $oldfile)) {
                unlink('images/news/' . $oldfile);
            }
            $news->image = $filename;
        }
        if ($request->get('status') != null) {
            $news->status = $request->get('status');
        } else
            $news->status = 0;
        $news->save();

        return redirect('/admin/news-management')->with('success', 'Updated successfully');
    }

    public function DeleteNews($id)
    {
        $news = PpcNews::find($id);
        if ($news != null) {
            return view('admin.news.delete', ['id' => $id]);
        }

    }

    public function Delete($id)
    {
        $news = PpcNews::find($id);
        if ($news != null) {
            if (file_exists('images/news/' . $news->image)) {
                unlink('images/news/' . $news->image);
            }
            $news->delete();
            return redirect('/admin/news-management')->with('success', 'Deleted successfully');
        }


    }
}