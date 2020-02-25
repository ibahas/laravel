<?php

namespace App\Http\Controllers\products;


use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Repositories\ProductsInterface;

class productsController extends Controller
{
    protected $products;

    public function __construct(ProductsInterface $products)
    {
        $this->products = $products;
    }

    public function showByUserId($user_id)
    {
        $products = $this->products->getProductsByUserId($user_id);
        return view('user_id', compact('products'));
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $data = $this->products->getProducts();
        return view('news', compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $data = $this->products->createProduct();
        return view('create', compact('data'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     * @var \Illuminate\Http\UploadedFile|\Illuminate\Http\UploadedFile[]|array|null $files
     */
    public function store(Request $request)
    {
        return $this->products->storeProduct($request);
    }
    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     * @var \App\Repositories\ProductsInterface $products
     */
    public function show($id)
    {
        //
        $data = $this->products->getProduct($id);
        return view('show', compact('data'));
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
        $product = $this->products->editProduct($id);
        return $product;
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
        /**
         * return $request , $id
         */
        $product = $this->products->updateProduct($request, $id);
        return $product;
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
        $data = $this->products->deleteProduct($id);
        return $data;
    }
}
