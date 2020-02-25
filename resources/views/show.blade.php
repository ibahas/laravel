@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-12">
            <div class="text-left">
                <h2><a href="products/{{$data->id}}/show/">{{ $data->title }} </a></h2>
                <br>
                <div class="product_created_at">{{ $data->created_at->format('Y-m-d') }} &HumpDownHump; <span> Views :
                        <span style="color:red;">{{$data->counter}} </span></span></div>
            </div>
        </div>
        <div class="col-12" style="background-color: #e5e5e5">
            <div class="text-center">
                @if($data->img)
                <img src="{{ asset('/images/'.$data->img)}}" style=" height: 91%; width: 70%; " />
                @else
                <img src="{{ asset('/images/defult.jpeg')}}" style=" height: 91%; width: 70%; " />
                @endif
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-md-12">
            <div class="card text-left">
                <p>{{$data->body}}</p>
            </div>
        </div>
        <div class="row">
            <div class="col-md-12">
                <div class="user_add">
                    <p>Product for : <span>{{ App\User::find($data->user_id)->name}}</span></p>
                    <p>Email publisher : <span>{{ App\User::find($data->user_id)->email}}</span></p>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection
