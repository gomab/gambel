<?php

namespace App\Http\Controllers;

use Brian2694\Toastr\Facades\Toastr;
use Session;
//use Illuminate\Support\Facades\Session;
use App\Category;
use Illuminate\Http\Request;

class CategoriesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $categories = Category::all();

        return view('admin.categories.index', compact('categories'));

        //return view('admin.categories.index')->with('categories', Category::all());
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.categories.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, ['name' => 'required']);

        //dump($request->all());

        $category = new Category();
        $category->name = $request->name;
        $category->save();

       //Session::flash('success', 'You successfuly created a new category.');

        Toastr::success('Catégorie crée ', 'Title', ["positionClass" => "toast-top-right"]);

        return redirect()->route('category.index', compact('category'))->with('successMsg','Category ajouté avec succes');
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
        $category = Category::find($id);

        return view('admin.categories.edit')->with('category', $category);
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
        $category = Category::find($id);
        $category->name = $request->name;
        $category->save();

       //Session::flash('success', 'You successfuly updated the category.');
        Toastr::success('Catégorie MAJ ', 'Title', ["positionClass" => "toast-top-right"]);

        return redirect()->route('category.index');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $category = Category::find($id);

        //delete posts associed to category

        foreach ($category->posts as $post){
            $post->forceDelete();
        }

        $category->delete();

        //Session::flash('success', 'You successfuly deleted the category.');
        Toastr::success('Catégorie supprimé ', 'Title', ["positionClass" => "toast-top-right"]);
        return redirect()->route('category.index');
    }
}
