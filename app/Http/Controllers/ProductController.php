<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Product;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $productos=Product::paginate(10);
        return view('admin.products.index')->with(compact('productos')); //listado
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.products.create'); //formulario
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //registrar el producto en la bd
        //dd($request->all());
        $producto = new Product();
        $producto->name = $request->input('name');
        $producto->price = $request->input('price');
        $producto->description = $request->input('description');
        $producto->long_descripction = $request->input('long_descripction');
        $producto->save(); //INSERT
        return redirect('admin/products');
        
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
     * @param  int  $product
     * @return \Illuminate\Http\Response
     */
    public function edit($product)
    {
        //
        $producto= Product::find($product);
        return view('admin.products.edit')->with(compact('producto')); 

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $product
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $product)
    {
        //
        $producto = Product::find($product);
        $producto->name = $request->input('name');
        $producto->price = $request->input('price');
        $producto->description = $request->input('description');
        $producto->long_descripction = $request->input('long_descripction');
        $producto->save(); //UPDATE
        return redirect('admin/products');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
