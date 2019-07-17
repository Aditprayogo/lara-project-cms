@extends('layouts.admin')

@section('content')

    <h1>Edit Categories</h1>

    <div class="col-sm-6">
        <form action="{{route('admin.categories.update', ['id' => $category->id])}}" method="POST">
            {{ csrf_field() }}
    
            {{-- Form untuk title --}}
            <div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">
                <label for="exampleInputEmail1">Name</label>
                <input type="text" class="form-control" name="name" value="{{old('name')}}">
    
                @if ($errors->has('name'))
                    <span class="help-block">
                        <strong>{{ $errors->first('name') }}</strong>
                    </span>
                @endif
            </div>
            {{-- End form title --}}

            <button type="submit" class="btn btn-primary">Submit</button>
        </form>

    </div>

   
    
@endsection