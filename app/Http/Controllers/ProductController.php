<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Category;

class ProductController extends Controller
{
    function __construct()
    {
        $this->middleware('permission:product-list',   ['only' => ['index']]);
        $this->middleware('permission:product-create', ['only' => ['create', 'store']]);
        $this->middleware('permission:product-edit',   ['only' => ['edit', 'update']]);
        $this->middleware('permission:product-delete', ['only' => ['destroy']]);
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $all_products = Product::get();
        return view('dashboard.products.index', compact('all_products'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $product_category    = Category::whereNull('parent_id')->get();
        $product_subcategory = Category::whereNotNull('parent_id')->get();

        return view('dashboard.products.create', compact('product_category', 'product_subcategory'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // $validator = Validator::make(
        //     ['keywords' => 'nullable']
        // );

        $pic_name = $request->file('image')->getClientOriginalName();
        

        $product                   = new Product;
        $product->title            = $request->title;
        $product->price            = $request->price;
        $product->discount         = $request->discount;
        $product->description      = $request->description;
        $product->meta_description = $request->meta_description;
        $product->keywords         = $request->keywords;
        $product->image            = '/assets/images/' . $pic_name;
        $product->category_id      = $request->category_id;
        $product->sub_category     = $request->sub_category;
        $product->save();

        return redirect()->route('products.index')
            ->with('success', __('master.messages_save'));
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
        //
    }
}
