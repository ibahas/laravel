<?php

namespace App\Http\Controllers\products;


use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\models\products;
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


    /**
     * All Products JSON
     *
     * @return Response
     */
    public function showAllProducts()
    {
        return $this->products->showProducts();
    }


    /**
     * Undocumented function
     *
     * @param [type] $id
     * @return Response
     */
    public function showProductById($id)
    {
        return $this->products->showProductById($id);
    }

    /**
     * Show Products for User ID :)
     * return Respose
     */

    public function showUserIdProducts($user_id)
    {
        return $this->products->showByUserId($user_id);
    }

    /**
     * Store Products
     *
     * @param Request $request
     * @return Response
     */
    public function storeProduct(Request $request)
    {
        return $this->products->storeProducts($request);
    }

    /**
     * function to Update data
     */

    public function updateProduct(Request $request, $id)
    {
        return $this->products->updateProductWithUserId($request, $id);
    }

    /**
     * Function to Edit and show and check this user how is publish this product or no.
     * @param $id
     * @return Response
     */

    public function editProductWithId($id)
    {
        return $this->products->editProductWithUserId($id);
    }

    /**
     * function to destroy a product with id
     * @param Id $id
     * @return Response
     */
    public function destroyProduct($id)
    {
        return $this->products->destroyProduct($id);
    }
}
