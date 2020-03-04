<?php

namespace App\Repositories;

use App\models\products;
use Illuminate\Http\Request;

interface ProductsInterface
{

    /**
     * @return string
     *  Return the getProducts
     */
    public function getProducts();
    /**
     * Undocumented function
     *
     * @param [type] $id
     * @return product
     */
    public function getProduct($id);


    /**
     * getProductsByUserId function
     *
     * @param [type] $user_id
     * @return void
     * @param array|mixed $user_id
     */
    public function getProductsByUserId($user_id);

    /**
     * Undocumented function
     * @param array|mixed $columns
     * @return void
     */
    public function createProduct();
    /**
     * Undocumented function
     *
     * @param Request $request
     * @return create products
     */
    public function storeProduct(Request $request);
    /**
     * Undocumented function
     *
     * @param [type] $id >> products
     * @return delete
     */
    public function deleteProduct($id);

    /**
     * Undocumented function
     *
     * @param [type] $id
     * @return void
     */
    public function editProduct($id);


    /**
     * Undocumented function
     *
     * @param Request $request
     * @param [type] $id
     * @return void
     */
    public function updateProduct(Request $request, $id);


    //===============================\\
    /**
     * function to show all products
     *
     * @return void
     */
    public function showProducts();


    /**
     *  Function to show Product By Id
     *
     * @param [type] $id
     * @return Response
     */
    public function showProductById($id);



    /**
     * Show To User Id Now Logined
     *
     * @param [Id] $user_id
     * @return void
     */
    public function showByUserId($user_id);



    /**
     * Store Products
     * return redirect a view
     */

    public function storeProducts(Request $request);


    /**
     * Update To Product where id = id and this aouther publisher this Product .
     *
     * @param Request $request
     * @param [type] $id
     * @return void
     */
    public function updateProductWithUserId(Request $request, $id);
    /**
     * Show Product To Edit. ...
     *
     * @param [type] $id
     * @return void
     */
    public function editProductWithUserId($id);

    /**
     * function to destroy a product with id
     * @param Id $id
     * @return Response
     */
    public function destroyProduct($id);
}
