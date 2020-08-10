<?php

namespace App\Http\Controllers;
use App\Product;

use App\Exports\ProductExport;
use Maatwebsite\Excel\Facades\Excel;
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
        $products = Product::all();

        return view('products.index', compact('products'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('products.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Http\RedirectResponse|\Illuminate\Http\Response|\Illuminate\Routing\Redirector
     */
    public function store(Request $request)
    {
        $request->validate([
        'name'=>'required',
            'email'=>'required',
            'phone' => 'required'
    ]);

        $product = new Product([
            'name' => $request->get('name'),
            'email' => $request->get('email'),
            'phone' => $request->get('phone')
        ]);
        $product->save();
        return redirect('/products')->with('success', 'product saved!');
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

    public function excelDownload()
    {

        return Excel::download(new ProductExport, 'products.xlsx');
    }
    public function search(Request $request)
    {
        $id = $request->get('id');
        $name = $request->get('name');
        $email = $request->get('email');
        $phone = $request->get('phone');

        $products = Product::where([
            ['id', 'LIKE', '%' . $id . '%'],
            ['name', 'LIKE', '%' . $name . '%'],
            ['email', 'LIKE', '%'.$email.'%'],
            ['phone','LIKE','%'.$phone.'%']
        ])->get();

        return view('products.index', compact('products'));
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
        return view('products.edit', compact('product'));
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
        $request->validate([
            'name'=>'required',
            'email'=>'required',
            'phone' => 'required'
        ]);

        $product = Product::find($id);
        $product->name = $request->get('name');
        $product->email = $request->get('email');
        $product->phone =$request->get('phone');
        $product->save();
        return redirect('/products')->with('success', 'product updated!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $product = Product::find($id);
        $product->delete();

        return redirect('/products')->with('success', 'Product deleted!');
    }


}
