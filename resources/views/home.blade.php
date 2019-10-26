@extends('layouts.blog-home')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8">
            @if ($posts)
                @foreach ($posts as $post)
                    <h1 class="page-header">
                        Posts
                        <small>All Posts</small>
                    </h1>
            
                    <!-- First Blog Post -->
                    <h2>
                        <a href="#">{{$post->title}}</a>
                    </h2>
                    <p class="lead">
                        @foreach ($users as $user)
                            @if ($post->user_id == $user->id)
                                by <a href="index.php">{{$user->name}}</a>
                            @endif   
                        @endforeach   
                    </p>
                    <p><span class="glyphicon glyphicon-time"></span> {{$post->created_at}}</p>
                    <hr>
                    <img class="img-responsive"  src="{{$post->photo ? $post->photo->file : 'http://placehold.it/900x300'}}" alt="" width="700">
                    <hr>
                        {!! str_limit($post->body, 200) !!}

                        <br>
                        
                    <a class="btn btn-primary" href="{{route('home.post', ['id' => $post->id])}}">Read More <span class="glyphicon glyphicon-chevron-right"></span></a>
        
                    <hr>         
                @endforeach
                
            @endif
           
             <!-- Pager -->
             <ul class="pager">
                {{$posts->links()}}
            </ul>
        </div>
        {{-- end col-md-8 --}}

        <!-- Blog Sidebar Widgets Column -->
        <div class="col-md-4">

            <!-- Blog Search Well -->
            <div class="well">
                <h4>Blog Search</h4>
                <div class="input-group">
                    <input type="text" class="form-control">
                    <span class="input-group-btn">
                        <button class="btn btn-default" type="button">
                            <span class="glyphicon glyphicon-search"></span>
                    </button>
                    </span>
                </div>
                <!-- /.input-group -->
            </div>

            <!-- Blog Categories Well -->
            <div class="well">
                <h4>Blog Categories</h4>
                <div class="row">
                    <div class="col-lg-12">
                        @if ($categories)
                            @foreach ($categories as $category)
                                <ul class="list-unstyled">
                                    <li>
                                        <a href="#">{{$category->name}}</a>
                                    </li>          
                                </ul>            
                            @endforeach           
                        @endif       
                    </div>     
                </div>
                <!-- /.row -->
            </div>

            <!-- Side Widget Well -->
            <div class="well">
                <h4>Side Widget Well</h4>
                <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Inventore, perspiciatis adipisci accusamus laudantium odit aliquam repellat tempore quos aspernatur vero.</p>
            </div>

        </div>
        {{-- end -col-md4 --}}
    </div>
</div>
@endsection
