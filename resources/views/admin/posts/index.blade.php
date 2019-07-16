@extends('layouts.admin')

@section('content')

    <h1>Posts Index</h1>

    <?php $i = 1; ?>
    <table class="table table-bordered">
        <thead>
            <tr>
                <th scope="col">No</th>
                <th scope="col">Photo</th>
                <th scope="col">Owner</th>
                <th scope="col">Category</th>
                <th scope="col">Title</th>
                <th scope="col">Body</th>
                <th scope="col">Created at</th>
                <th scope="col">Updated at</th>
            </tr>
        </thead>
        <tbody>
            @if ($posts)
                @foreach ($posts as $post)
                    <tr>
                        <th scope="row">{{$i++}}</th>
                        <td>
                            @if ($post->photo)
                                <img src="{{$post->photo->file}}" alt="" width="60">
                            @endif
                        </td>
                        <td>{{$post->user->name}}</td>
                        <td>{{$post->category_id}}</td>
                        <td>{{$post->title}}</td>
                        <td>{{ str_limit($post->body , 40) }}</td>
                        <td>{{$post->created_at->diffForHumans()}}</td>
                        <td>{{$post->updated_at->diffForHumans()}}</td>
                    </tr>                   
                @endforeach           
            @endif         
        </tbody>
    </table>
    
@endsection