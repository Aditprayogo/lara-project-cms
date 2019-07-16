@extends('layouts.admin')

@section('content')

    <h1>Create Posts</h1>

    <div class="col-sm-9">
        <form action="{{route('admin.posts.store')}}" method="POST" enctype="multipart/form-data">
            {{ csrf_field() }}
    
            <input type="hidden" name="user_id">
    
            {{-- Form untuk title --}}
            <div class="form-group{{ $errors->has('title') ? ' has-error' : '' }}">
                <label for="exampleInputEmail1">Title</label>
                <input type="text" class="form-control" name="title" value="{{old('title')}}">
    
                @if ($errors->has('title'))
                    <span class="help-block">
                        <strong>{{ $errors->first('title') }}</strong>
                    </span>
                @endif
            </div>
            {{-- End form title --}}
    
            {{-- Form untuk body --}}
            <label for="exampleInputEmail1">Body</label>
            <div class="form-group{{ $errors->has('body') ? ' has-error' : '' }}">
                
                <textarea name="body" id="" cols="100" rows="5" placeholder="Enter the body.." class="form-control"></textarea>
                @if ($errors->has('body'))
                    <span class="help-block">
                        <strong>{{ $errors->first('body') }}</strong>
                    </span>
                @endif
            </div>
            {{-- End form body --}}

            {{-- Form Untuk status --}}
            <div class="form-group">
                <label for="exampleInputPassword1">Status</label>
                <select class="form-control" id="exampleFormControlSelect1" name="category_id">
                    <option value="1">Laravel</option>
                    <option value="2">Codeigniter</option>
                </select>
            </div>
                {{-- end form untuk status --}}

             {{-- Form untuk cover_image --}}
             <div class="form group{{ $errors->has('photo_id') ? ' has-error' : '' }}">
                <label for="cover_image">Image</label>
                <input type="file" name="photo_id">

                @if ($errors->has('photo_id'))
                    <span class="help-block">
                        <strong> The Image Field Must Required </strong>
                    </span>
                @endif
            </div>
            {{-- Form untuk cover_image --}}
            <br>

            <button type="submit" class="btn btn-primary">Submit</button>  
        
        </form>
            

    </div>

   
@endsection