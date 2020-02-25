@extends('layouts.app')
@section('content')

<section class="section_inner_page">
    <div class="container" dir="ltr">
        <div class="row">
            <div class="col-md-6 text-left">
                <h2 style="margin-bottom:30px;"><a href="#" class="inner_title"> All <span>Products</span> for you :)
                    </a></h2>
            </div>
            <div class="col-md-6">
                <div class="text-right">
                    <a href="/products/create" class="btn btn-info">Add Product</a>
                </div>
            </div>
        </div>
        <div class="news_inner_list" style="margin-top:30px;">
            @foreach($products as $row)
            <div class="news_block row">
                <div class="col-md-3 col-xs-4">
                    <div class="news_inner_thumb">
                        @if($row->img)
                        <img src="{{ asset('/images/'.$row->img)}}"
                            style="height: 134px;margin-top: 8px;margin-bottom: 8px;width: 259px;" />
                        @else
                        <img src="{{ asset('/images/defult.jpeg')}}"
                            style="height: 134px;margin-top: 8px;margin-bottom: 8px;width: 259px;" />
                        @endif
                    </div>
                </div>
                <div class="col-md-9 col-xs-8">
                    <div class="news_inner_txt">
                        <h2><a href="/products/{{$row->id}}/show/">{{ $row->title }} </a></h2>
                        <p> Views : <span style="color:red;">{{$row->counter}} </span></p>
                        <div class="news_date"><i
                                class="zmdi zmdi-calendar-note"></i>{{ $row->created_at->format('Y-m-d') }}</div>
                        <a href="/products/{{ $row->id }}/show" class="read_more_link"> Read More >> <i
                                class="zmdi zmdi-arrow-right"></i></a>
                        <div class="text-right" style="margin-top: -11.6%">
                            <div class="buttons">
                                <a class="btn btn-info" href="/products/{{$row->id}}/edit">Update</a>
                                <form style="display: inline-block;" action="/products/products/{{$row->id}}/destroy/"
                                    method="post">
                                    @csrf
                                    <button class="btn btn-sm btn-danger delete" data-toggle="tooltip"
                                        data-original-title="حذف"
                                        onclick="return confirm(' هل أنت متأكد من حذف المنتج || {{ $row->title }} ؟')"
                                        type="submit"><i class="fa fa-trash"></i>
                                        Delete
                                    </button>
                                </form>

                            </div>
                        </div>
                    </div>

                </div>

            </div>
            @endforeach

        </div>
    </div>
</section>
@endsection
