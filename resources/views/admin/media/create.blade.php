@extends('layouts.admin')

@section('content')
    <h1>Create Photo</h1>

    <div class="col-sm-6">
        <div class="well">
            <form action="{{route('admin.medias.store')}}" method="POST" enctype="multipart/form-data">

                {{ csrf_field() }}
    
                <div class="form-group">
                    <input type="file" name="file" class="form-controll">
                </div>
                
                <button type="submit" class="btn btn-primary">Submit</button>
            
            </form>

        </div>
        
    </div>
    
@endsection