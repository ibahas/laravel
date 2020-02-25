@extends('layouts.app')
@section('content')

<section class="section_inner_page">
    <div class="container" dir="ltr">
        <h2 style="margin-bottom:30px;"><a href="#" class="inner_title"> All <span>Products</span></a></h2>
        <div class="news_inner_list" style="margin-top:30px;">
            @foreach($data as $row)
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
                    </div>
                </div>
            </div>
            @endforeach
        </div>
    </div>
</section>
@endsection
