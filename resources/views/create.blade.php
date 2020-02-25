@extends('layouts.app')
@section('content')
<div class="row">
    <div class="page-wrapper bg-dark p-t-100 p-b-50" style=" width: 100%; ">
        <div class="wrapper wrapper--w900">
            <div class="card card-6">
                <div class="card-heading">
                    <h2 class="title">Add Product</h2>
                </div>
                <div class="card-body">
                    <form action="/products/products/store" enctype="multipart/form-data" method="Post"
                        class="form-horizontal p-t-20">
                        @csrf
                        <div class="card-heading">
                            <h2 class="title">Add Product</h2>
                        </div>
                        <div class="card-body">
                            <form method="POST">
                                <div class="form-row">
                                    <div class="name" for="title">Title Product</div>
                                    <div class="value">
                                        <input class="input--style-6" type="text" name="title" id="title">
                                    </div>
                                </div>
                                <div class="form-row">
                                    <div class="Descriptions">Descriptions</div>
                                    <div class="value">
                                        <div class="input-group">
                                            <textarea class="textarea--style-6" name="body"
                                                placeholder="Descriptions Of This Product"></textarea>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-row">
                                    <div class="name" for="img">Upload Image</div>
                                    <div class="value">
                                        <input type="file" name="img" id="img">
                                        <div class="label--desc">Image size 2 MB</div>
                                    </div>
                                </div>
                        </div>
                        <div class="card-footer">
                            <button class="btn btn--radius-2 btn--blue-2" type="submit">Add Product</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
