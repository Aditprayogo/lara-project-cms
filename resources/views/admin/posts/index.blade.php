@extends('layouts.admin')

@section('content')

    <h1>Posts Index</h1>

   

    <?php $i = 1; ?>
    <table class="table table-bordered">
        <thead>
            <tr>
               
                <th scope="col">id</th>
                <th scope="col">Photo</th>
                <th scope="col">Title</th>
                <th scope="col">Body</th>
                <th scope="col">Category</th>
                <th scope="col">Owner</th>
                <th scope="col">Created at</th>
                <th scope="col">Updated at</th>
                <th scope="col">Action</th>
                <th scope="col">View Post</th>
            </tr>
        </thead>
        <tbody>
            @if ($posts)
                @foreach ($posts as $post)
                    <tr>
                       
                        <td>{{$post->id}}</td>
                        <td>

                            @if ($post->photo)
                                <img src="{{$post->photo->file}}" alt="" width="60">
                            @else 
                                <img src="/images/noimg.jpg" alt="" width="60">
                            @endif

                        </td>
                        <td>{{$post->title}}</td>
                        <td>{{ str_limit($post->body , 20) }}</td>
                        <td>
                            @if ($post->category)
                            {{$post->category->name}}
                            @endif                   
                        </td>
                        <td>{{$post->user->name}}</td>
                        <td>{{$post->created_at->diffForHumans()}}</td>
                        <td>{{$post->updated_at->diffForHumans()}}</td>
                        <td>
                            
                            <form action="{{route('admin.posts.destroy', ['id' => $post->id])}}" method="POST">
                                
                                {{ csrf_field() }}

                                <input type="hidden" value="DELETE" name="_method">

                                <button type="submit" class="btn btn-danger fas fa-trash" onclick="return confirm('Are You sure want to delete this post ?')"></button>
                                
                                {{-- Untuk edit user --}}
                                <a href="{{route('admin.posts.edit', ['id' => $post->id])}}" class="btn btn-success fas fa-edit"></a> 
                                
                               
                                {{-- Untuk melihat spesific comment dari post --}}
                                <a href="{{route('admin.comments.show', ['id' => $post->id])}}" class="fas fa-eye btn btn-warning"></a>

                            </form>


                            
                        </td>
                        <td>
                            
                             {{-- Untuk melihat post --}}
                             <a href="{{route('home.post', $post->id)}}" class="fas fa-eye btn btn-primary"></a>
                        </td>
                    </tr>                   
                @endforeach           
            @endif         
        </tbody>
    </table>

    {{-- <div class="text-center">
        {{ $posts->links() }}
    </div> --}}
    
@endsection