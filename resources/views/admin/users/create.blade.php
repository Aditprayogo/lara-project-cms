@extends('layouts.admin')

@section('content')
    <h1>Create User</h1>
    <form action="/admin/users" method="POST" enctype="multipart/form-data">
        {{ csrf_field() }}

            {{-- Form untuk nama --}}
            <div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">
              <label for="exampleInputEmail1">Name</label>
              <input type="text" class="form-control" name="name">

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
              <input type="email" class="form-control" name="email">   
              
                @if ($errors->has('email'))
                    <span class="help-block">
                        <strong>{{ $errors->first('email') }}</strong>
                    </span>
                @endif
            </div>
            {{-- End form untuk email --}}
            
            {{-- Form untuk password --}}
            <div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">
              <label for="exampleInputPassword1">Password</label>
              <input type="password" class="form-control" name="password">

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
                        <option value="{{$role->id}}">{{$role->name}}</option>
                    @endforeach   

                </select>
            </div>
            {{-- end form untuk role --}}

            {{-- Form Untuk status --}}
            <div class="form-group">
                <label for="exampleInputPassword1">Status</label>
                <select class="form-control" id="exampleFormControlSelect1" name="is_active">
                    <option>Active</option>
                    <option>Not Active</option>
                </select>
            </div>
            {{-- end form untuk status --}}

            <div class="form group">
                <label for="file">Image</label>
                <input type="file" name="file">
            </div>

            <div class="form-group form-check">

              <input type="checkbox" class="form-check-input" id="exampleCheck1">
              <label class="form-check-label" for="exampleCheck1">Check me out</label>
            </div>

            <button type="submit" class="btn btn-primary">Submit</button>

           
    </form>
@endsection

@section('footer')
    <br>

@endsection