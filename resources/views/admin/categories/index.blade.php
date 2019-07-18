@extends('layouts.admin')

@section('content')

    <h1>Categories</h1>
    <?php $i=1; ?>
    <div class="col-sm-8">
        <table class="table table-bordered">
            <thead>
            <tr>
                <th scope="col">No </th>
                <th scope="col">Category</th>
                <th scope="col">Created</th>
                <th scope="col">Updated</th>
                <th scope="col">Action</th>

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
                            <td>

                               

                                <form action="{{route('admin.categories.destroy', ['id' => $category->id])}}" method="POST">

                                    {{ csrf_field() }}

                                    <input type="hidden" name="_method" value="DELETE">

                                    <button type="submit" class="btn btn-danger fas fa-trash" onclick="return confirm('Are you sure want to delete')"></button>

                                    <a href="{{route('admin.categories.edit', ['id' => $category->id])}}" class="btn btn-success fas fa-edit">
                                    </a>
                                    
                                </form>

                            </td>
                        </tr>

                    @endforeach
                    
                @endif
                
                
            
            
            </tbody>
        </table>
    </div>
    
@endsection