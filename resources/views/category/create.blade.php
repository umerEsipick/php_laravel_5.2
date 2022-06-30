@extends('admin.main')

@section('content')

<h1 class="h3 mb-4 text-gray-800">Create New Category</h1>

<nav class="navbar navbar-inverse">
    <ul class="nav navbar-nav">
        <li><a href="/category">View all categories</a></li>
    </ul>
</nav>

<div>
    @include('common.errors')

    {!! Form::open(array('url'=>'category')) !!}

    {!! Form::label('name', 'Name:') !!}
    {!! Form::text('name', null, array('class'=>'form-control')) !!}

    {!! Form::submit('Create Category', array('class'=>'btn btn-primary btn-sm')) !!}

    {!! Form::close() !!}
</div>

@endsection