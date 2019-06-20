<?php

namespace App\Http\Controllers\Admin;

use App\Category;
use App\Http\Controllers\Controller;
use App\Product;
use Illuminate\Http\Request;

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
        $categories= Category::orderBy('name')->get();
        return view('admin.products.create')->with(compact('categories')); //formulario
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        /**
         * Validar los datos del formulario
         */
        $rules = [
            'name' => 'required|min:3',
            'description' => 'required|max:200',
            'price' => 'required|numeric|min:0'
        ];
        /**
         * Mensaje a mostrar
         */
        $message = [
            'name.required' => 'El campo nombre es obligatorío',
            'name.min' => 'El campo nombre debe tener al menos 3 caracteres',
            'description.required' => 'El campo descripción es obligatorío',
            'description.max' => 'El máximo de caracteres permitido es 200',
            'price.required' => 'El campo precio es obligatorío',
            'price.numeric' => 'El campo precio numérico',
            'price.min' => 'El campo precio no debe ser negativo'
        ];
        $this->validate($request, $rules, $message);
        /**
         * registrar el producto en la bd
         */
        //dd($request->all());
        $producto = new Product();
        $producto->name = $request->input('name');
        $producto->price = $request->input('price');
        $producto->description = $request->input('description');
        $producto->long_descripction = $request->input('long_descripction');
        $producto->category_id = $request->input('category_id');
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
        $categories= Category::orderBy('name')->get();
        $producto= Product::find($product);
        return view('admin.products.edit')->with(compact('producto', 'categories')); 

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
        /**
         * Validar los datos del formulario
         */
        $rules = [
            'name' => 'required|min:3',
            'description' => 'required|max:200',
            'price' => 'required|numeric|min:0'
        ];
        /**
         * Mensaje a mostrar
         */
        $message = [
            'name.required' => 'El campo nombre es obligatorío',
            'name.min' => 'El campo nombre debe tener al menos 3 caracteres',
            'description.required' => 'El campo descripción es obligatorío',
            'description.max' => 'El máximo de caracteres permitido es 200',
            'price.required' => 'El campo precio es obligatorío',
            'price.numeric' => 'El campo precio numérico',
            'price.min' => 'El campo precio no debe ser negativo'
        ];
        $this->validate($request, $rules, $message);
        $producto = Product::find($product);
        $producto->name = $request->input('name');
        $producto->price = $request->input('price');
        $producto->description = $request->input('description');
        $producto->long_descripction = $request->input('long_descripction');
        $producto->category_id = $request->input('category_id');
        $producto->save(); //UPDATE
        return redirect('admin/products');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($product)
    {
        //
        $producto = Product::find($product);
        $producto->delete(); //DELETE
        return back();
    }
}
