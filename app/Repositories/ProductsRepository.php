<?php

namespace App\Repositories;

use App\Models\products;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

/**
 * Class ProductsRepository.
 */
class ProductsRepository implements ProductsInterface
{
    /**
     * @return string
     *  Return the getProducts
     *
     */
    public function getProducts()
    {
        $products = products::all();
        return $products;
    }
    /**
     * getProduct function
     *
     * @param [type] $id
     * @return void
     *
     */
    public function getProduct($id)
    {
        $product = products::find($id);
        $count = $product->counter + 1;

        $data = [
            'counter' => $count
        ];

        products::where('id', $id)->update($data);
        return $product;
    }
    /**
     * getProductsByUserId function
     *
     * @param [type] $user_id
     * @return void
     * @param array|mixed $user_id
     */
    public function getProductsByUserId($user_id)
    {
        $products = products::all()->where('user_id', '=', $user_id);
        return $products;
    }
    /**
     * Undocumented function
     * @param array|mixed $columns
     * @return void
     */
    public function createProduct()
    {
        $products = products::all();
        return $products;
    }

    /**
     * Undocumented function
     *
     * @param Request $request
     * @return create products
     */
    public function storeProduct(Request $request)
    {
        //
        request()->validate([
            'img'  => 'mimes:jpg,jpeg,png,gif|max:2048',
        ]);

        if ($files = $request->file('img')) {

            $destinationPath = public_path() . "/images/";
            $imgfile = date('YmdHis') . "." . $files->getClientOriginalExtension();
            $files->move($destinationPath, $imgfile);
        } else {
            $imgfile = "NULL";
        }
        $user_id = Auth::user()->id;
        $data = [
            'title' => $request->title,
            'body' => $request->body,
            'user_id' => $user_id,
            'img' => $imgfile,
            'counter' => 0
        ];
        products::create($data);
        return redirect('products/' . Auth::user()->id . '/user_id');
    }
    /**
     * Undocumented function
     *
     * @param [type] $id >> products
     * @return delete
     */
    public function deleteProduct($id)
    {

        $data = [
            'deleted_at' => now(),
        ];

        products::where('id', $id)->update($data);
        return redirect('products/' . Auth::user()->id . '/user_id');
    }
    /**
     * Undocumented function
     *
     * @param [type] $id
     * @return void
     */
    public function editProduct($id)
    {
        $product = products::find($id);
        return view('edit', compact('product'));
    }



    /**
     * Undocumented function
     *
     * @param Request $request
     * @param [type] $id
     * @return void
     */
    public function updateProduct(Request $request, $id)
    {
        // if ($request->isMethod('post')) {
        //     request()->validate([
        //         'img'  => 'mimes:jpg,jpeg,png,gif|max:2048',
        //     ]);

        //     if ($files = $request->file('img')) {

        //         $destinationPath = public_path() . "/images/";
        //         $imgfile = date('YmdHis') . "." . $files->getClientOriginalExtension();
        //         $files->move($destinationPath, $imgfile);
        //     } else {
        //         $imgfile = "NULL";
        //     }
        //     $user_id = Auth::user()->id;
        //     $data = [
        //         'title' => $request->title,
        //         'body' => $request->body,
        //         'img' => $imgfile,
        //     ];
        //     products::where('id', $id)->update($data);
        //     return redirect('products/' . Auth::user()->id . '/user_id');
        // } else {
        //     return "Erorr ...";
        // }


        //========================================//
        request()->validate([
            'title' => 'required|max:200',
            'body' => 'required'
        ]);
        $data = [
            'title' => $request->title,
            'body' => $request->body,
        ];
        products::where('id', $id)->update($data);
        return redirect('products/' . Auth::user()->id . '/user_id');
    }
}
