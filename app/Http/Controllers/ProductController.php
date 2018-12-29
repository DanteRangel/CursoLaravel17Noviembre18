<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\{Category,Brand,Product,Image};
use Storage;
use Session;
class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $products = Product::orderBy('id', 'desc')->with('images')->get();
        return view('products.index', compact('products'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $brands = Brand::all();
        $categories = Category::all();
        return view('products.create', compact('brands', 'categories'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        $this->validate($request, [
            'name' => 'required|string',
            'description' => 'required|string',
            'price' => 'required|numeric',
            'stock' => 'required|numeric',
            'id_brand' => 'required|numeric|exists:brand,id',
            'id_category' => 'required|numeric|exists:category,id',
            'image' =>  'required|mimes:jpeg,bmp,png,svg',
        ]);
     
        $product = Product::create([
            'name' => $request->name,
            'description' => $request->description,
            'price' => $request->price,
            'stock' => $request->stock,
            'id_brand' => $request->id_brand,
            'id_category' => $request->id_category
        ]);

        $nameImage = md5(date('YYYY-MM-dd HH:mm:ss')) . "." . $request->image->getClientOriginalExtension();
        $request->image->storeAs('public/images', $nameImage);
        //Storage::disk('images')->put($nameImage, $request->image);
        
        Image::create([
            'url' => $nameImage,
            'id_product' => $product->id
        ]);
        Session::flash('message', 'El producto ' . $product->name . ' se ha creado satisfactoriamente.');
        Session::flash('type', 'success');
        return redirect()->route('product.index');

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
        $product = Product::find($id);
        $brands = Brand::all();
        $categories = Category::all();
        return view('products.edit', compact('product', 'brands', 'categories'));

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
        
        $this->validate($request, [
            'name' => 'required|string',
            'description' => 'required|string',
            'price' => 'required|numeric',
            'stock' => 'required|numeric',
            'id_brand' => 'required|numeric|exists:brand,id',
            'id_category' => 'required|numeric|exists:category,id',
            'image' =>  'mimes:jpeg,bmp,png,svg',
        ]);


        $product = Product::find($id);
        $product->name = $request->name;
        $product->description = $request->description;
        $product->price = $request->price;
        $product->stock = $request->stock;
        $product->id_brand = $request->id_brand;
        $product->id_category = $request->id_category;
        
        if ($request->has('image')) {
                
            $this->deleteImage($id); 

            $nameImage = md5(date('YYYY-MM-dd HH:mm:ss')) . "." . $request->image->getClientOriginalExtension();
            $request->image->storeAs('public/images', $nameImage);
            
            Image::create([
                'url' => $nameImage,
                'id_product' => $product->id
            ]);
        }
        $product->save();

        Session::flash('type', 'info');
        Session::flash('message', 'El producto ' . $product->name . ' se ha actualizado satisfactoriamente.');
        return redirect()->route('product.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Session::flash('type', 'danger');
        if ($product = Product::find($id)) {
            // se definio la siguiente linea por error de integridad referemcial
            Image::where('id_product', $product->id)->delete();

            //Eliminando producto
            Product::destroy($id);
            
            Session::flash('message', 'El producto '. $product->name . ' se ha eliminado satisfactoriamente.');
        } else {
            Session::flash('message', 'El producto no existe');
        }
        return redirect()->route('product.index');
    }
    public function deleteImage($id){
        $images = Image::where('id_product', $id)->get();
        foreach ($images as $image) {
            Storage::disk('images')->delete($image->url);
            $image->delete();
           
        }
    }
}
