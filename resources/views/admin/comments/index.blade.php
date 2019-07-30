@extends('layouts.admin')

@section('content')

    <h1>All Comment</h1>
    <?php $i = 1; ?>
    <table class="table table-bordered">
        <thead>
          <tr>
            <th scope="col">No</th>
            <th scope="col">Id</th>
            <th scope="col">Comment</th>
            <th scope="col">Owner</th>
            <th scope="col">Email</th>
            <th scope="col">Created</th>
            <th scope="col">Updated</th>
            <th scope="col">View Post</th>
            <th scope="col">View Replies</th>
            <th scope="col">Title Post</th>
            <th scope="col">Status</th>
            <th scope="col">Action</th>
          </tr>
        </thead>
        <tbody>
            @foreach ($comments as $comment)         
                <tr>
                    <th scope="row">{{$i++}}</th>
                    <td>
                        {{$comment->id}}
                    </td>
                    <td>{{str_limit($comment->body, 20)}}</td>
                    <td>{{$comment->author}}</td>
                    <td>{{$comment->email}}</td>
                    <td>{{$comment->created_at->diffForHumans()}}</td>
                    <td>{{$comment->updated_at->diffForHumans()}}</td>
                    <td>
                        <a href="{{route( 'home.post', ['id' => $comment->post->id] )}}" class="fas fa-eye btn btn-primary"></a>
                    </td>
                    <td>
                        {{-- short replies for spesific comment --}}
                        <a href="{{route('admin.comment.replies.show', ['id' => $comment->id])}}" class="fas fa-eye btn btn-warning"></a>
                    </td>
                    <td>
                         @foreach ($posts as $post)
                            @if ($comment->post_id == $post->id)
                                {{$post->title}}
                            @endif
                        @endforeach                   
                    </td>
                    <td>
                        @if ($comment->is_active == 1)

                            <form action="{{route('admin.comments.update', ['id' => $comment->id])}}" method="POST">  

                                {{ csrf_field() }}
                                <input type="hidden" name="_method" value="PUT">

                                <input type="hidden" name="is_active" id="" value="0">

                                <button type="submit" class="btn btn-danger">Un-Approve</button>

                            </form>     
                        @else 

                            <form action="{{route('admin.comments.update', ['id' => $comment->id])}}" method="POST">  

                                {{ csrf_field() }}
                                <input type="hidden" name="_method" value="PUT">

                                <input type="hidden" name="is_active" id="" value="1">

                                <button type="submit" class="btn btn-info">Approve</button>

                            </form>     
                            
                        @endif
                       
                    </td>
                    <td>

                        <form action="{{route('admin.comments.destroy', ['id' => $comment->id])}}" method="POST">

                            {{ csrf_field() }}

                            <input type="hidden" name="_method" value="DELETE">

                            <button type="submit" class="btn btn-danger fas fa-trash" onclick="return confirm('Are you sure want to delete this comment ? ')"></button>

                        </form>

                    </td>
                   
                </tr>              
            @endforeach
          
        </tbody>
    </table>
    
@endsection