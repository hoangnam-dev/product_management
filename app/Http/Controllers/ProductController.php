<?php

namespace App\Http\Controllers;
use Carbon\Carbon;
use App\Http\Requests\StoreProductRequest;
use App\Models\Product;
use Illuminate\Http\Request;


class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('products.index');
    }
    public function list(Request $request)
    {
        $pagination = 10;
        $category = $request->category;

        if(isset($category) && is_numeric($category)) {
            $products = Product::join('tbl_category', 'tbl_product.category_id', '=', 'tbl_category.category_id')
                                ->where('tbl_category.category_id', '=', $category)
                                ->paginate($pagination);
        } else {
            $products = Product::join('tbl_category', 'tbl_product.category_id', '=', 'tbl_category.category_id')->paginate($pagination);
        }    
        return $products->toArray();
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('products.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreProductRequest $request)
    {
        $product = new Product();
        $product->product_code = $request->product_code;
        $product->product_name = $request->product_name;
        $product->product_unit = $request->product_unit;
        $product->product_price = $request->product_price;
        $product->category_id = $request->category_id;

        $result = false;
        if($product->save()) {
            $result = true;
        }

        return $result;
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
