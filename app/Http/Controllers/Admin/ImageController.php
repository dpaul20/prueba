<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Product;
use App\ProductImage;
use File;
use Illuminate\Http\Request;

class ImageController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index($product)
    {
        $product = Product::find($product);
        $images = $product->productImage()->orderBy('featured', 'DESC')->get();
        //dd($images);
        return view('admin.products.images.index')->with(compact('product', 'images'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, $product)
    {
        //guardar la imagen
        $file = $request->file('photo');
        $path= public_path(). '/images/products';
        $fileName= uniqid().$file->getClientOriginalName();
        $moved=$file->move($path, $fileName);
        //crear registro en la tabla product_images
        if ($moved) {
            $productImage = new ProductImage();
            $productImage->image=$fileName;
            //$productImage->featured=
            $productImage->product_id= $product;
            $productImage->save(); //INSERT
        }
        
        return back();
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
    public function destroy(Request $request, $product)
    {
        //Eliminar el archivo
        $productImage= ProductImage::find($request->image_id);
        //dd($productImage->image);
        if (substr($productImage->image, 0, 4) === "http") {
            $deleted =true;
        }else{
            $fullPath=public_path(). '/images/products/'. $productImage->image;

            $deleted=File::delete($fullPath);
            //dd($deleted);
        }
        //Eliminar de la base de dato
        if ($deleted) {
            $productImage->delete();
        }
        return back();
    }
    public function select($product, $image)
    {
        ProductImage::where('product_id', $product)->update([
            'featured'=>false,
        ]);
        $productImage= ProductImage::find($image);
        $productImage->featured=true;
        $productImage->save();

        return back();
    }
}
