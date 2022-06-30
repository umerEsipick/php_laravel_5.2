@extends('layouts.main')

@section('content')

    <div class="col-lg-8">

        @foreach($posts as $post)
        
        <div class="card mb-4">
            <a href="/store/view/{!! $post->id !!}">{{ Html::image('/img/posts/'. $post->image, $post->title, array('style'=>'width:675px; height: 225px')) }}</a>
            <div class="card-body">
                <div class="small text-muted">{!! $post->created_at !!}</div>
                <h2 class="card-title h4">{!! $post->title !!}</h2>
                <p>by {!! $post->author !!}</p>
                <p class="card-text">{!! $post->short_desc !!}</p>
                <a class="btn btn-primary" href="#!">Read more →</a>
            </div>
        </div>

        @endforeach

        {!! $posts->links('pagination::bootstrap-4') !!}
    </div>

    <div class="col-lg-4">
        <!-- Search widget-->
        <div class="card mb-4">
            <div class="card-header">Search</div>
            {!! Form::open(array('url'=>'store/search', 'method'=>'get')) !!}
            <div class="card-body">
                <div class="input-group">
                    {!! Form::text('keyword',null,array('placeholder'=>'Search', 'class'=>'form-control')) !!}
                    {!! Form::submit('Go', array('class'=>'btn btn-primary btn-sm')) !!}
                </div>
            </div>
            {!! Form::close() !!}
        </div>
        <!-- Categories widget-->
        <div class="card mb-4">
            <div class="card-header">Categories</div>
            <div class="card-body">
                <div class="row">
                    <div class="col-sm-6">
                        <ul class="list-unstyled mb-0">
                            @foreach($categories as $category)
                                
                                <li><a href="/store/category/{{$category->id}}">{!! $category->name !!}</a></li>

                            @endforeach
                        </ul>
                    </div>
                </div>
            </div>
        </div>
        <!-- Side widget-->
        <div class="card mb-4">
            <div class="card-header">Side Widget</div>
            <div class="card-body">You can put anything you want inside of these side widgets. They are easy to use, and feature the Bootstrap 5 card component!</div>
        </div>
    </div>


@endsection