@extends('layouts.admin')

@section('content')

    <h1>Media page</h1>
    <?php $i = 1; ?>

    @if ($photos)

        <table class="table table-bordered">
            <thead>
                <tr>
                    <th scope="col">No</th>
                   
                    <th scope="col">File</th>
                    <th scope="col">Created</th>
                   
                    
                    <th scope="col">Action</th>
                </tr>
            </thead>
            <tbody>
                
                @foreach ($photos as $photo)
                    <tr>
                        <th scope="row">{{$i++}}</th>
                        
                        <td><img src="{{$photo->file}}" alt="" height="80"></td>
                        <td>{{$photo->created_at}}. ({{$photo->created_at->diffForHumans()}})</td>
                    
                       
                        <td>

                            <form action="{{route('admin.medias.destroy', ['id' => $photo->id])}}" method="POST">
                                {{ csrf_field() }}

                                <input type="hidden" name="_method" value="DELETE">

                                <button type="submit" class="btn btn-danger fas fa-trash" onclick="return confirm('Are you sure want to delete')"></button>

                                <a href="{{route('admin.medias.show', ['id' => $photo->id])}}" class="btn btn-warning fas fa-eye"></a>
                            </form>

                        </td>
                        
                    </tr>
                @endforeach
                
            </tbody>
        </table>
        
    @endif
   

    
@endsection