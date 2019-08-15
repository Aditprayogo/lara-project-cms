@extends('layouts.admin')

@section('content')

    <h1>Posts {{$user->name}}</h1>

   

    <?php $i = 1; ?>

    <form action="{{route('posts.delete')}}" method="POST">

        <input type="hidden" name="_method" value="DELETE">

        <button type="submit" class="btn btn-info" onclick="return confirm('Are you sure want to delete this item ?')">Delete</button>

        <br><br>
        

        <table class="table table-bordered" id="myTable">
            <thead>
                <tr>
                    <th><input type="checkbox" id="options"></th>
                    <th scope="col">No</th>
                    <th scope="col">Photo</th>
                    <th scope="col">Title</th>
                    {{-- <th scope="col">Body</th> --}}
                    <th scope="col">Category</th>
                    <th scope="col">Owner</th>
                    <th scope="col">Created at</th>
                    <th scope="col">Updated at</th>
                    <th scope="col">Action</th>
                </tr>
            </thead>
            <tbody>
                @if ($posts)
                    @foreach ($posts as $post)
                        @if ($post->user_id == $user->id)
                            <tr>
                                <td>
                                    <input type="checkbox" name="checkBoxArray[]" class="checkBoxes" value="{{$post->id}}">
                                </td>
                                <th scope="row">{{$i++}}</th>
                                <td>

                                    @if ($post->photo)
                                        <img src="{{$post->photo->file}}" alt="" width="60">
                                    @else 
                                        <img src="/images/noimg.jpg" alt="" width="60">
                                    @endif

                                </td>
                                <td>{{str_limit($post->title, 10)}}</td>
                                {{-- <td>{{ str_limit($post->body , 20) }}</td> --}}
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
                                        
                                        {{-- Untuk melihat post --}}
                                        <a href="{{route('home.post', ['id' => $post->id])}}" class="fas fa-eye btn btn-primary"></a>

                                        {{-- Untuk melihat spesific comment dari post --}}
                                        <a href="{{route('admin.comments.show', ['id' => $post->id])}}" class="fas fa-eye btn btn-warning"></a>

                                    </form>
                                    
                                </td>
                            </tr>   
                        @endif                                  
                    @endforeach           
                @endif 
                
                
            </tbody>
        </table>
    </form>

    {{-- <div class="text-center">
        {{$posts->links()}}
    </div> --}}
    
@endsection

@section('scripts')

    <script>

        $(document).ready(function(){

            $('#myTable').dataTable()

            $('#options').click(function(){

                if (this.checked) {
                    
                    $('.checkBoxes').each(function(){

                        this.checked = true;

                    });

                } else {

                    $('.checkBoxes').each(function(){

                         this.checked = false;

                    });

                }
                
            })

        })
    
    
    </script>
    
@endsection