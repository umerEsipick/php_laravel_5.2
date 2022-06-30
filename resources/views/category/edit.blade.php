@extends('admin.main')

@section('content')

<h1 class="h3 mb-4 text-gray-800">Edit Category</h1>

<nav class="navbar navbar-inverse">
    <ul class="nav navbar-nav">
        <li><a href="">View all categories</a></li>
        <li><a href="category/create">Create new category</a></li>
    </ul>
</nav>

@if(Session::has('category_create'))
<div class="alert alert-success">
    <em>{!! session('category_create') !!}</em>
    <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
</div>
@endif

<div>
    @include('common.errors')

    {!! Form::model($categories, array('route' => array('category.update', $categories->id), 'method'=>'PUT')) !!}

    {!! Form::label('name', 'Name:') !!}
    {!! Form::text('name', null, array('class'=>'form-control')) !!}

    {!! Form::submit('Update Category', array('class'=>'btn btn-primary btn-sm')) !!}

    {!! Form::close() !!}
</div>

@endsection