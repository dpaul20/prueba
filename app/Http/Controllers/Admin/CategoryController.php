<?php

namespace App\Http\Controllers\Admin;

use App\Category;
use App\Http\Controllers\Controller;
use File;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $categories	=	Category::paginate(10);
        return view('admin.categories.index')->with(compact('categories')); //listado
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.categories.create'); //formulario
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, Category::$rules, Category::$message);
        /**
         * registrar el category en la bd
         */
        //dd($request->all());
        $category = Category::create($request->only('name', 'description'));
        // $category = new Category();
        // $category->name = $request->input('name');
        // $category->description = $request->input('description');
        // $category->save(); //INSERT

        if ($request->hasFile('image')) {
            //guardar la imagen
            $file = $request->file('image');
            $path= public_path(). '/images/categories';
            $fileName= uniqid().$file->getClientOriginalName();
            $moved=$file->move($path, $fileName);
            //crear registro en la tabla product_images
            if ($moved) {
                $category->image=$fileName;
                $category->save(); //INSERT
            }
        }
        return redirect('admin/categories');

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Category $category)
    {
        return view('admin.categories.show')->with(compact('category')); 
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $category
     * @return \Illuminate\Http\Response
     */
    public function edit(Category $category)
    {
        return view('admin.categories.edit')->with(compact('category')); 

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $product
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Category $category)
    {
        //
        $this->validate($request, Category::$rules, Category::$message);
        $category->update($request->only('name', 'description')); //UPDATE

        if ($request->hasFile('image')) {
            //guardar la imagen
            $file = $request->file('image');
            $path= public_path(). '/images/categories';
            $fileName= uniqid().$file->getClientOriginalName();
            $moved=$file->move($path, $fileName);
            //crear registro en la tabla product_images
            if ($moved) {
                $previusPath= $path.'/'.$category->image;
                $category->image=$fileName;
                $saved= $category->save(); //INSERT
                if ($saved) {
                    File::delete($previusPath);
                }
                
            }
        }
         return redirect('admin/categories');
     }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Category $category)
    {
        $category->delete(); //DELETE
        return back();
    }
}
