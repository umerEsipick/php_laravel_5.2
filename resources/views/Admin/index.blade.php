@extends('admin.main')

@section('content')

<h1 class="h3 mb-4 text-gray-800">Blank Page</h1>

@if(Session::has('user_update'))
<div class="alert alert-success">
    <em>{!! session('user_update') !!}</em>
    <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
</div>
@endif
@endsection