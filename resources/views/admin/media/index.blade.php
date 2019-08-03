@extends('layouts.admin')

@section('content')

    <h1>Media page</h1>
    <?php $i = 1; ?>

    @if ($photos)

        <form action="{{route('media.delete')}}" method="POST">

            {{ csrf_field() }}

            <input type="hidden" value="DELETE" name="_method">

            <select name="checkBoxArray" id=""></select>

            <button type="submit" class="btn btn-info" onclick="return confirm('Are you sure want to delete this item ? ')" id="deletebtn">Delete Medias</button>

            <br><br>

            <table class="table table-bordered">
                <thead>
                    <tr>
                        <th><input type="checkbox" name="" id="options"></th>
                        <th scope="col">No</th>     
                        <th scope="col">File</th>
                        <th scope="col">Created</th>          
                        <th scope="col">Action</th>
                    </tr>
                </thead>
                <tbody>
                    
                    @foreach ($photos as $photo)
                        <tr>
                            <th>
                                <input class="checkBoxes" type="checkbox" name="checkBoxArray[]" value="{{$photo->id}}">
                            </th>
                            <th scope="row">{{$i++}}</th>
                            <td><img src="{{$photo->file}}" alt="" height="80"></td>
                            <td>{{$photo->created_at}} . ({{$photo->created_at->diffForHumans()}})</td>
                            <td>

                                <form action="{{route('admin.medias.destroy', ['id' => $photo->id])}}" method="POST">
                                    {{ csrf_field() }}

                                    <input type="hidden" name="_method" value="DELETE">

                                    {{-- btn delete --}}
                                    <button type="submit" class="btn btn-danger fas fa-trash" onclick="return confirm('Are you sure want to delete')"></button>
                                    
                                    {{-- btn untuk view--}}
                                    <a href="{{route('admin.medias.show', ['id' => $photo->id])}}" class="btn btn-warning fas fa-eye"></a>          
                                </form>

                            </td>
                            
                        </tr>
                    @endforeach
                    
                </tbody>
            </table>
        </form>
        
    @endif

    
   

    
@endsection

@section('scripts')
    
    <script>

        $(document).ready(function(e) {   
                
            $('#options').click(function(){

                if (this.checked) {

                    $('.checkBoxes').each(function(){
                        
                        this.checked = true;

                    });
                    
                }else {

                    $('.checkBoxes').each(function(){
                        
                        this.checked = false;

                    });
                }

            });
    
        });
        
    </script>
    
@endsection