@extends('admin.main')

@section('content')

<h1 class="h3 mb-4 text-gray-800">Category Control Page</h1>

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

@if(Session::has('category_update'))
<div class="alert alert-success">
    <em>{!! session('category_update') !!}</em>
    <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
</div>
@endif

@if(Session::has('category_delete'))
<div class="alert alert-danger">
    <em>{!! session('category_delete') !!}</em>
    <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
</div>
@endif

@if(count($categories) > 0)
<div class="panel panel-default">

    <div class="panel-heading">
        All Categories
    </div>

    <div class="panel-body">
        <table class="table table-striped task-table">

            <thead>
                <th> Category</th>
                <th>&nbsp;</th>
            </thead>

            <tbody>
                @foreach($categories as $category)
                <tr>
                    <td>
                        <div>
                            {!! $category->name !!}
                        </div>
                    </td>
                    <td>
                        <a href="{!! url('category/' . $category->id . '/edit')  !!}">
                            Edit
                        </a>
                    </td>
                    <td>
                        {!! Form::open(array('url'=>'category/' . $category->id, 'method'=>'DELETE')) !!}
                        {!! csrf_field() !!}
                        {!! method_field('DELETE') !!}
                            <button class="btn btn-danger">Delete</button>
                        {!! Form::close() !!}
                    </td>
                </tr>
                @endforeach
            </tbody>

        </table>

    </div>
</div>
@endif

@endsection