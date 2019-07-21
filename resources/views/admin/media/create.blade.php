@extends('layouts.admin')

@section('styles')

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/dropzone/4.3.0/min/dropzone.min.css">
    
@endsection

@section('content')
    <h1>Create Photo</h1>

    
        
        <form action="{{route('admin.medias.store')}}" method="POST" enctype="multipart/form-data"  id="my-awesome-dropzone" class="dropzone">

            {{ csrf_field() }}


            
            
            
        </form>

        
        
 
    
@endsection

@section('footer')
    <script src="https://cdnjs.cloudflare.com/ajax/libs/dropzone/4.3.0/min/dropzone.min.js"></script>
@endsection