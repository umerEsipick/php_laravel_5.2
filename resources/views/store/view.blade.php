@extends('layouts.app')

@section('content')


    <div class="col-lg-8">
        <!-- Post content-->
        <article>
            <!-- Post header-->
            <header class="mb-4">
                <!-- Post title-->
                <h1 class="fw-bolder mb-1">{!! $posts->title !!}</h1>
                <!-- Post meta content-->
                <div class="text-muted fst-italic mb-2">Posted on {!! $posts->created_at !!} by {!! $posts->author !!}</div>
                <!-- Post categories-->
                <a class="badge bg-secondary text-decoration-none link-light" href="#!">Web Design</a>
                <a class="badge bg-secondary text-decoration-none link-light" href="#!">Freebies</a>
            </header>
            <!-- Preview image figure-->
            <figure class="mb-4">{!! Html::image('/img/posts/'. $posts->image, $posts->title, array('style'=>'width:675px; height: 225px')) !!}</figure>
            <!-- Post content-->
            <section class="mb-5">
                <p class="fs-5 mb-4">{!! $posts->short_desc !!}</p>
                <hr>
                <p class="fs-5 mb-4">{!! $posts->description !!}</p>
            </section>
        </article>
        <!-- Comments section-->
        <section class="mb-5">
            <div class="card bg-light">
                <div class="card-body">
                    <!-- Comment form-->
                    <form class="mb-4"><textarea class="form-control" rows="3" placeholder="Join the discussion and leave a comment!"></textarea></form>
                    <!-- Comment with nested comments-->
                    <div class="d-flex mb-4">
                        <!-- Parent comment-->
                        <div class="flex-shrink-0"><img class="rounded-circle" src="https://dummyimage.com/50x50/ced4da/6c757d.jpg" alt="..." /></div>
                        <div class="ms-3">
                            <div class="fw-bold">Commenter Name</div>
                            If you're going to lead a space frontier, it has to be government; it'll never be private enterprise. Because the space frontier is dangerous, and it's expensive, and it has unquantified risks.
                            <!-- Child comment 1-->
                            <div class="d-flex mt-4">
                                <div class="flex-shrink-0"><img class="rounded-circle" src="https://dummyimage.com/50x50/ced4da/6c757d.jpg" alt="..." /></div>
                                <div class="ms-3">
                                    <div class="fw-bold">Commenter Name</div>
                                    And under those conditions, you cannot establish a capital-market evaluation of that enterprise. You can't get investors.
                                </div>
                            </div>
                            <!-- Child comment 2-->
                            <div class="d-flex mt-4">
                                <div class="flex-shrink-0"><img class="rounded-circle" src="https://dummyimage.com/50x50/ced4da/6c757d.jpg" alt="..." /></div>
                                <div class="ms-3">
                                    <div class="fw-bold">Commenter Name</div>
                                    When you put money directly to a problem, it makes a good headline.
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- Single comment-->
                    <div class="d-flex">
                        <div class="flex-shrink-0"><img class="rounded-circle" src="https://dummyimage.com/50x50/ced4da/6c757d.jpg" alt="..." /></div>
                        <div class="ms-3">
                            <div class="fw-bold">Commenter Name</div>
                            When I look at the universe and all the ways the universe wants to kill us, I find it hard to reconcile that with statements of beneficence.
                        </div>
                    </div>
                </div>
            </div>
        </section>
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