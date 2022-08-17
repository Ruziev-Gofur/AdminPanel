<?php

namespace App\Http\Controllers;

use App\Models\Posts;
use App\Models\Products;
use Illuminate\Http\Request;

class ProductsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $product=Products::orderByDesc('created_at')->paginate(10);
        return  view('admin.products.index',[
            'products'=>$product
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return   view('admin.products.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $data=$request->validate(
            [
                'name'=>'bail|required| min:4',
                'type'=>'required',
                'weight'=>'required',
                'price'=>'required'
            ]
        );

//        $request = Products::created($products);

        $products=new Products();
        $products->name=$request->name;
        $products->type=$request->type;
        $products->weight=$request->weight;
        $products->price=$request->price;
        $products->save();

        return redirect()->route('products.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Products  $products
     * @return \Illuminate\Http\Response
     */
    public function show( $products)
    {
        $products = Products::findOrFail($products);
        return view('admin.products.show',[
        'products' => $products
            ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Products  $products
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $products=Products::findORFail($id);

        return view('admin.products.edit', [
            'products'=>$products
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Products  $products
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,$id)
    {
//        dd($id);
        $products=$request->validate(
            [
                'name'=>'bail|required| min:4',
                'type'=>'required',
                'weight'=>'required',
                'price'=>'required'
            ]
        );
        $products=Products::find($id);

        $request = Products::created($products);

        $products->update();

        $products=new Products();
        $products->name=$request->name;
        $products->type=$request->type;
        $products->weight=$request->weight;
        $products->price=$request->price;
        $products->save();

        return redirect()->route('products.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Products  $products
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $products = Posts::find($id);
        $products->delete();
        return redirect()->route('products.index')->with('success','category created successfully');
    }
}
