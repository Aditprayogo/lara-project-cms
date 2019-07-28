@extends('layouts.blog-post')

@section('content')


<!-- Blog Post -->

        <!-- Title -->
        <h1>{{$post->title}}</h1>

        <!-- Author -->
        <p class="lead">
            by <a href="#">{{$post->user->name}}</a>
        </p>

        <hr>

        <!-- Date/Time -->
        <p>
            <span class="glyphicon glyphicon-time"></span> 
            {{$post->created_at->format('d M Y')}} {{($post->created_at->diffForHumans())}}
        </p>

        <hr>

        <!-- Preview Image -->
        <img class="img-responsive" src="{{$post->photo->file}}" alt="" width="400">

        <hr>

        <!-- Post Content -->
        <p class="lead">{{$post->body}}</p>

        <hr>

        <!-- Blog Comments -->

        <!-- Comments Form -->
        @if (!Auth::guest())
            <div class="well">
                <h4>Leave a Comment:</h4>

                <form action="{{route('admin.comments.store')}}" method="POST">

                    {{ csrf_field() }}

                    {{-- hidden untuk menangkap post id --}}
                    <input type="hidden" name="post_id" value="{{$post->id}}">

                    <div class="form-group{{ $errors->has('body') ? ' has-error' : '' }}">
                        <textarea class="form-control" rows="3" name="body"></textarea>

                        @if ($errors->has('body'))
                            <span class="help-block">
                                <strong>{{ $errors->first('body') }}</strong>
                            </span>
                        @endif
                    </div>
                    
                    <div class="form-group">
                        <button type="submit" class="btn btn-primary">Submit</button>
                    </div>

                </form>

            </div> 
        @endif
        

        <hr>

        <!-- Posted Comments -->

        <!-- Comment -->
        @foreach ($comments as $comment)
              
        <div class="media">

            <a class="pull-left" href="#">
                @if ($comment->photo)
                    <img class="media-object" src="{{$comment->photo}}" alt="" width="64" height="64">
                @else 
                    <img class="media-object" src="http://placehold.it/64x64" alt="">
                @endif    
            </a>
            
            <div class="media-body">
                <h4 class="media-heading">{{$comment->author}}

                    <small>{{$comment->updated_at->diffforHumans()}}</small>
                    
                    <div class="pull-right">

                        {{-- btn edit --}}
                        <small>
                             <a href="" data-toggle="modal" data-target="#myModal{{$comment->id}}" class="label label-primary">Edit</a>   
                        </small>

                        <small>
                              <!-- Modal -->
                            <div class="modal fade" id="myModal{{$comment->id}}" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
                                <div class="modal-dialog" role="document">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                                            <h4 class="modal-title" id="myModalLabel">Edit Comment</h4>
                                        </div>
                                        <div class="modal-body">

                                            <form action="{{route('admin.comments.update', ['id' => $comment->id])}}" method="POST">

                                                {{ csrf_field() }}

                                                <input type="hidden" name="_method" value="PUT">
                                                
                                                <div class="form-group{{ $errors->has('body') ? ' has-error' : '' }}">
                                                        <textarea class="form-control" rows="3" name="body">{{$comment->body}}</textarea>
                                
                                                        @if ($errors->has('body'))
                                                            <span class="help-block">
                                                                <strong>{{ $errors->first('body') }}</strong>
                                                            </span>
                                                        @endif
                                                    </div>
                                                

                                                
                                                <div class="modal-footer">
                                                    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                                                    <button type="submit" class="btn btn-primary">Save changes</button> 
                                                </div>

                                            </form>

                                        </div>         
                                      {{-- End Modal Body --}}
                                    </div>
                                </div>
                            </div>
                            {{-- end modal --}}         
                        </small>

                        {{-- delete button --}}
                        <small>
                            <form action="{{route('admin.comments.destroy', ['id' => $comment->id])}}" method="POST">

                                {{ csrf_field() }}
    
                                <input type="hidden" name="_method" value="DELETE">
    
                                <button type="submit" class="label label-danger" onclick="return confirm('Are you sure want to delete it ? ')">Delete</button>
                            </form>           
                        </small>

                    </div> 
                {{-- End Pull right --}}
                </h4>
                {{$comment->body}}
                
            </div>
        </div>

        @endforeach

        <!-- Comment -->
        <div class="media">
            <a class="pull-left" href="#">
                <img class="media-object" src="http://placehold.it/64x64" alt="">
            </a>
            <div class="media-body">
                <h4 class="media-heading">Start Bootstrap
                    <small>August 25, 2014 at 9:30 PM</small>
                </h4>
                Cras sit amet nibh libero, in gravida nulla. Nulla vel metus scelerisque ante sollicitudin commodo. Cras purus odio, vestibulum in vulputate at, tempus viverra turpis. Fusce condimentum nunc ac nisi vulputate fringilla. Donec lacinia congue felis in faucibus.
                <!-- Nested Comment -->
                <div class="media">
                    <a class="pull-left" href="#">
                        <img class="media-object" src="http://placehold.it/64x64" alt="">
                    </a>
                    <div class="media-body">
                        <h4 class="media-heading">Nested Start Bootstrap
                            <small>August 25, 2014 at 9:30 PM</small>
                        </h4>
                        Cras sit amet nibh libero, in gravida nulla. Nulla vel metus scelerisque ante sollicitudin commodo. Cras purus odio, vestibulum in vulputate at, tempus viverra turpis. Fusce condimentum nunc ac nisi vulputate fringilla. Donec lacinia congue felis in faucibus.
                    </div>
                </div>
                <!-- End Nested Comment -->
            </div>
        </div>

    </div>

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
                    <ul class="list-unstyled">
                        @foreach ($categories as $category)
                            <li>
                                {{$category->name}}
                            </li>
                        @endforeach
                    </ul>
                </div>
            </div>
            <!-- /.row -->
        </div>

        <!-- Side Widget Well -->
        <div class="well">
            <h4>Side Widget Well</h4>
            <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Inventore, perspiciatis adipisci accusamus laudantium odit aliquam repellat tempore quos aspernatur vero.</p>
        </div>
        

@endsection

@section('scripts')
   
@endsection

@section('footer')
    
@endsection