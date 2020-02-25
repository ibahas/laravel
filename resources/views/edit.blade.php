@extends('layouts.app')
@section('content')
<div class="row">
    <div class="page-wrapper bg-dark p-t-100 p-b-50" style=" width: 100%; ">
        <div class="wrapper wrapper--w900">
            <div class="card card-6">
                <div class="card-heading">
                    <h2 class="title">Edit Product</h2>
                </div>
                <div class="card-body">
                    <form action="{{action('products\ProductsController@update',$product->id)}}" method="POST"
                        class="form-horizontal p-t-20">
                        @csrf
                        @method('PUT')

                        <div class="card-heading">
                            <h2 class="title">Edit Product</h2>
                        </div>
                        <div class="card-body">
                            <form method="POST">
                                <div class="form-row">
                                    <div class="name" for="title">Title Product</div>
                                    <div class="value">
                                        <input class="input--style-6" type="text" name="title" id="title"
                                            value="{{$product->title}}" required>
                                    </div>
                                </div>
                                <div class="form-row">
                                    <div class="Descriptions">Descriptions</div>
                                    <div class="value">
                                        <div class="input-group">
                                            <textarea class="textarea--style-6" name="body"
                                                placeholder="Descriptions Of This Product" required>{{$product->body}}</textarea>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-row">
                                    <div class="name" for="img">Upload Image</div>
                                    <div class="value">
                                        <input type="file" name="img" id="img" value="{{ $product->img }}">
                                        <div class="label--desc">Image size 2 MB</div>
                                    </div>
                                    <div class="text-center">
                                        @if($product->img)
                                        <img src="/images/{{$product->img}}" style="height: 70%; width: 80%;">
                                        @else
                                        <img src="{{ asset('/images/defult.jpeg')}}" style="height: 70%; width: 80%;">
                                        @endif
                                    </div>
                                </div>
                        </div>
                        <div class="card-footer">
                            <button class="btn btn-info" type="submit">Update Product</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
