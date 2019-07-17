@extends('layouts.admin')

@section('content')

    <h1>Categories</h1>
    <?php $i=1; ?>
    <div class="col-sm-6">
        <table class="table table-bordered">
            <thead>
            <tr>
                <th scope="col">No </th>
                <th scope="col">Category</th>
                <th scope="col">Created</th>
                <th scope="col">Updated</th>
            </tr>
            </thead>
            <tbody>
            

                @if ($categories)
                
                    @foreach ($categories as $category)
                        <tr>
                            <th scope="row">{{$i++}}</th>
                            <td>{{$category->name}}</td>
                            <td>{{$category->created_at->diffForHumans()}}</td>
                            <td>{{$category->updated_at->diffForHumans()}}</td>
                        </tr>
                    @endforeach
                    
                @endif
                
                
            
            
            </tbody>
        </table>
    </div>
    
@endsection