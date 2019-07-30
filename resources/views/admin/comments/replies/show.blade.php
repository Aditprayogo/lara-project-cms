@extends('layouts.admin')

@section('content')


<h1>Replies for {{str_limit($comment->body, 20)}}</h1>
    <?php $i = 1; ?>
    <table class="table table-bordered">
        <thead>
          <tr>
            <th scope="col">No</th>
            <th scope="col">Replies</th>
            <th scope="col">Owner</th>
            <th scope="col">Email</th>
            <th scope="col">Created</th>
            <th scope="col">Updated</th>
            <th scope="col">View Post</th>
            <th scope="col">Comment Title</th>
            <th scope="col">Status</th>
            <th scope="col">Action</th>
          </tr>
        </thead>
        <tbody>

            @foreach ($replies as $reply)
                @if ($comment->id == $reply->comment_id)         
                <tr>
                    <th scope="row">{{$i++}}</th>
                    <td>{{str_limit($reply->body, 7)}}</td>
                    <td>{{$reply->author}}</td>
                    <td>{{$reply->email}}</td>
                    <td>{{$reply->created_at->diffForHumans()}}</td>
                    <td>{{$reply->updated_at->diffForHumans()}}</td>
                    <td>
                        <a href="{{route('home.post', $reply->comment->post->id)}}" class="fas fa-eye btn btn-primary"></a>
                    </td>
                    <td>
                        @if ($comment->id == $reply->comment_id)
                        
                            {{$comment->body}}
                            
                        @endif
                    </td>
                    <td>
                        @if ($reply->is_active == 1)

                            <form action="{{route('admin.comment.replies.update', ['id' => $reply->id])}}" method="POST">  

                                {{ csrf_field() }}
                                <input type="hidden" name="_method" value="PUT">

                                <input type="hidden" name="is_active" id="" value="0">

                                <button type="submit" class="btn btn-danger">Un-Approve</button>

                            </form>     
                        @else 

                            <form action="{{route('admin.comment.replies.update', ['id' => $reply->id])}}" method="POST">  

                                {{ csrf_field() }}
                                <input type="hidden" name="_method" value="PUT">

                                <input type="hidden" name="is_active" id="" value="1">

                                <button type="submit" class="btn btn-info">Approve</button>

                            </form>     
                            
                        @endif
                       
                    </td>
                    <td>

                        <form action="{{route('admin.comment.replies.destroy', ['id' => $reply->id])}}" method="POST">

                            {{ csrf_field() }}

                            <input type="hidden" name="_method" value="DELETE">

                            <button type="submit" class="btn btn-danger fas fa-trash" onclick="return confirm('Are you sure want to delete this comment ? ')"></button>

                        </form>

                    </td>
                   
                </tr>
                @endif              
            @endforeach
          
        </tbody>
    </table>

    {{$replies->links()}}
    
@endsection