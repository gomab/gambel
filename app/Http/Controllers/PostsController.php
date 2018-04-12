<?php

namespace App\Http\Controllers;

use Brian2694\Toastr\Facades\Toastr;
use App\Category;
use App\Post;
use Illuminate\Http\Request;

class PostsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $posts = Post::all();

        return view('admin.posts.index', compact('posts'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categories = Category::all();

        if($categories->count() == 0){
            Toastr::info('You must have some categories before attempting to create a post.', 'Title', ["positionClass" => "toast-top-center"]);
            //Session::flash('info', 'You must have some categories before attempting to create a post.');

            return redirect()->back();
        }

        return view('admin.posts.create')->with('categories', $categories);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //dump($request->all());

        $this->validate($request, [
            'title'    => 'required',
            'featured' => 'required|image',
            'content'  => 'required',
            'category_id' => 'required'

        ]);

        $featured = $request->featured;

        $featured_new_name = time().$featured->getClientOriginalName();
        $featured->move('uploads/posts', $featured_new_name);

        $post = Post::create([
            'title'       => $request->title,
            'content'     => $request->input('content'),
            'featured'    => 'uploads/posts/' .$featured_new_name,
            'category_id' => $request->category_id,
            'slug'        => str_slug($request->title)
        ]);

        //Session::flash('success', 'Post created successfully');
        Toastr::success('Post crée.', 'Title', ["positionClass" => "toast-top-right"]);

        return redirect()->route('post.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $post = Post::find($id);

        $post->delete();

        Toastr::success('Le Post a été placé dans la corbeille.', 'Brazza HipHop', ["positionClass" => "toast-top-right"]);

        return redirect()->back();
    }

    public function trashed(){
        $posts = Post::onlyTrashed()->get();

        return view('admin.posts.trashed', compact('posts'));
    }
}
