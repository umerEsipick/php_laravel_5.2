<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use Session;
use File;
use App\Category;
use App\Post;
use Validator;

class PostController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
        $this->middleware('admin');
    }
        
    public function index()
    {
        $posts = Post::all();
        return view('post.main')->with('posts', $posts);
    }
    
    public function create()
    {
        $categories = array();

        foreach (Category::all() as $category) {
            $categories[$category->id] = $category->name;
        }

        return view('post.create')->with('categories', $categories);
    }

    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'category_id'=>'required|integer',
            'title'=>'required|max:20|min:3',
            'author'=>'required|max:20|min:3',
            'image'=>'required|mimes:jpg,jpeg,png,gif',
            'short_desc'=>'required|max:50|min:10',
            'description'=>'required|max:1000|min:50 ',
        ]);

        if($validator->fails())
        {
            return redirect('/post/create')->withInput()->withErrors($validator);
        }

        $image = $request->file('image');
        $upload = 'img/posts/';
        $filename = time().$image->getClientOriginalName();
        $path = move_uploaded_file($image->getPathname(), $upload.$filename);

        $post = new Post;
        $post->category_id = $request->category_id;
        $post->title = $request->title;
        $post->author = $request->author;
        $post->image = $filename;
        $post->short_desc = $request->short_desc;
        $post->description = $request->description;
        $post->save();

        Session::flash('post_create','New post is created');

        return redirect('post');
    }

    public function edit($id)
    {
        $categories = array();

        foreach (Category::all() as $category) {
            $categories[$category->id] = $category->name;
        }

        $posts = Post::findorfail($id);
        return view('post.edit')->with('posts', $posts)->with('categories', $categories);
    }

    public function update(Request $request,  $id)
    {
        $validator = Validator::make($request->all(), [
            'category_id'=>'required|integer',
            'title'=>'required|max:20|min:3',
            'author'=>'required|max:20|min:3',
            'image'=>'mimes:jpg,jpeg,png,gif',
            'short_desc'=>'required|max:50|min:10',
            'description'=>'required|max:1000|min:50 ',
        ]);

        $post = Post::find($id);

        if($validator->fails())
        {
            return redirect('/post/'.$post->id.'/edit')->withInput()->withErrors($validator);
        }

        if($request->file('image') != "")
        {
            $image = $request->file('image');
            $upload = 'img/posts/';
            $filename = time().$image->getClientOriginalName();
            $path = move_uploaded_file($image->getPathname(), $upload.$filename);
        }

        $post->category_id = $request->category_id;
        $post->title = $request->Input('title');
        $post->author = $request->Input('author');
        
        if(isset($filename))
        {
            $post->image = $filename;
        }
        
        $post->short_desc = $request->Input('short_desc');
        $post->description = $request->Input('description');
        $post->save();

        Session::flash('post_update','Post updated');

        return redirect('post');
    }

    public function destroy($id)
    {
         $posts = Post::find($id);

         $image_path = 'img/posts/'.$posts->image;
         File::delete($image_path);

         $posts->delete();
         Session::flash('post_delete','Post deleted');
         return redirect('post');
    }
}
