@extends('layouts.admin')

@section('content')

    <img src="{{$photo->file}}" alt="" class="img-responsive img-rounded" width="600">

    <br>

    <a href="{{route('admin.medias.index')}}" class="btn btn-primary text-center">Back</a>
    
@endsection

@section('footer')

<br>
    
@endsection