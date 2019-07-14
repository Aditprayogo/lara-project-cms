@extends('layouts.admin')

@section('content')
    <h1>Edit User</h1>

    {{-- Untuk image --}}
    <div class="col-sm-3">
        @if ($user->photo)
            <img src="{{$user->photo->file}}" alt="" class="img-responsive img-rounded">
        @else 
            <img src="/images/noimage.jpg" alt="" class="img-responsive img-rounded">
        @endif
        
    </div>

    <div class="col-sm-9">
        <form action="{{route('admin.users.update', ['id'=>$user->id])}}" method="POST" enctype="multipart/form-data">
            {{ csrf_field() }}

                <input type="hidden" name="_method" value="PUT">

                {{-- Form untuk nama --}}
                <div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">
                    <label for="exampleInputEmail1">Name</label>
                    <input type="text" class="form-control" name="name" value="{{$user->name}}">

                        @if ($errors->has('name'))
                            <span class="help-block">
                                <strong>{{ $errors->first('name') }}</strong>
                            </span>
                        @endif
                </div>
                {{-- End form nama --}}

                {{-- Form Untuk email --}}
                <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
                    <label for="exampleInputEmail1">Email</label>
                    <input type="email" class="form-control" name="email" value="{{$user->email}}">   
                
                        @if ($errors->has('email'))
                            <span class="help-block">
                                <strong>{{ $errors->first('email') }}</strong>
                            </span>
                        @endif
                </div>
                {{-- End form untuk email --}}

                {{-- Form untuk password --}}
                <div class="form-group{{ $errors->has('old_password') ? ' has-error' : '' }}">
                    <label for="exampleInputPassword1">Password</label>
                    <input type="password" class="form-control" name="old_password" value="{{$user->password}}">

                        @if ($errors->has('password'))
                            <span class="help-block">
                                <strong>{{ $errors->first('old_password') }}</strong>
                            </span>
                        @endif

                </div>
                {{-- end form untuk password --}}
                
                {{-- Form untuk password --}}
                <div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">
                    <label for="exampleInputPassword1">New Password</label>
                    <input type="password" class="form-control" name="password" >

                        @if ($errors->has('password'))
                            <span class="help-block">
                                <strong>{{ $errors->first('password') }}</strong>
                            </span>
                        @endif

                </div>
                {{-- end form untuk password --}}

                {{-- Form COnfirm password --}}
                <div class="form-group{{ $errors->has('password_confirmation') ? ' has-error' : '' }}">
                    <label for="password-confirm">Confirm Password</label>
                    <input id="password-confirm" type="password" class="form-control" name="password_confirmation">

                        @if ($errors->has('password_confirmation'))
                            <span class="help-block">
                                <strong>{{ $errors->first('password_confirmation') }}</strong>
                            </span>
                        @endif
                
                </div>
                {{-- end form confirm password --}}

                {{-- Form untuk Role --}}   
                <div class="form-group">
                    <label for="exampleInputPassword1">Role</label>
                    <select class="form-control" id="exampleFormControlSelect1" name="role_id">
                    
                        @foreach ($roles as $id => $role)      
                            @if ($user->role_id == $role->id)
                                <option value="{{$role->id}}" selected>{{$role->name}}</option>
                            @else 
                                <option value="{{$role->id}}">{{$role->name}}</option>
                            @endif                
                        @endforeach   

                    </select>
                </div>
                {{-- end form untuk role --}}

                {{-- Form Untuk status --}}
                <div class="form-group">
                    <label for="exampleInputPassword1">Status</label>
                    <select class="form-control" id="exampleFormControlSelect1" name="is_active" value="{{$user->is_active}}">
                        @if ($user->is_active == 1)
                            <option value="1" selected>Active</option>
                            <option value="2">Not Active</option>
                        @else 
                            <option value="1">Active</option>
                            <option value="2" selected>Not Active</option>
                        @endif
                    
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


                <div class="form-group form-check">
                    <input type="checkbox" class="form-check-input" id="exampleCheck1">
                    <label class="form-check-label" for="exampleCheck1">Check me out</label>
                </div>

                <button type="submit" class="btn btn-primary">Submit</button>

            
        </form>
    </div>
@endsection

@section('footer')
    <br>

@endsection