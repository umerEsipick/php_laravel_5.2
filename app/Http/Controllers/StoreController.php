<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use DB;
use App\Category;
use App\Post;

class StoreController extends Controller
{
    public function index()
    {
        $categories = Category::all();
        return view('store.main')->with('posts', Post::orderBy('created_at', 'DESC')->paginate(1))->with('categories', $categories);
    }

    public function getView($id)
    {
        $categories = Category::all();
        return view('store.view')->with('posts', Post::find($id))->with('categories', $categories);
    }

    public function getCategory($id)
    {
        $categories = Category::all();
        $post = DB::table('posts')->where('category_id','=',$id)->paginate(1);
        return view('store.category')->with('posts', $post)->with('categories', $categories);
    }

    public function getSearch(Request $request)
    {
        $keyword = $request->input('keyword');
        $categories = Category::all();

        if ($keyword != "")
        {
            return view('store.search')->with('posts', Post::where('title', 'LIKE', '%'.$keyword.'%')->paginate(1))->with('keyword', $keyword)->with('categories', $categories);
        }
        else
        {
            return redirect('/');
        }

    }
}
