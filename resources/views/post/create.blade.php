@extends('admin.main')

@section('content')

<h1 class="h3 mb-4 text-gray-800">Create New Post</h1>

<nav class="navbar navbar-inverse">
    <ul class="nav navbar-nav">
        <li><a href="/post">View all posts</a></li>
    </ul>
</nav>

<div>
    @include('common.errors')

    {!! Form::open(array('url'=>'post', 'files'=>'true')) !!}

    {!! Form::label('category_id', 'Category:') !!}
    {!! Form::select('category_id', $categories, array('class'=>'form-control')) !!}

    {!! Form::label('title', 'Title:') !!}
    {!! Form::text('title', null, array('class'=>'form-control')) !!}

    {!! Form::label('author', 'Author:') !!}
    {!! Form::text('author', null, array('class'=>'form-control')) !!}

    {!! Form::label('image', 'Image:') !!}
    {!! Form::file('image', null, array('class'=>'form-control')) !!}

    {!! Form::label('short_desc', 'Short Description:') !!}
    {!! Form::text('short_desc', null, array('class'=>'form-control')) !!}

    {!! Form::label('description', 'Description:') !!}
    {!! Form::textarea('description', null, array('class'=>'form-control')) !!}

    {!! Form::submit('Create Post', array('class'=>'btn btn-primary btn-sm')) !!}

    {!! Form::close() !!}
</div>

@endsection