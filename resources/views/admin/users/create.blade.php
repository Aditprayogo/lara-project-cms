@extends('layouts.admin')

@section('content')
    <h1>Create User</h1>
    <hr>
    <form action="/admin/users" method="POST">
        {{ csrf_field() }}

            <div class="form-group">
              <label for="exampleInputEmail1">Name</label>
              <input type="text" class="form-control" name="name">
              
            </div>

            <div class="form-group">
              <label for="exampleInputEmail1">Email</label>
              <input type="email" class="form-control" name="email">
              
            </div>

            <div class="form-group">
              <label for="exampleInputPassword1">Password</label>
              <input type="password" class="form-control" name="password">
            </div>

            <div class="form-group form-check">
              <input type="checkbox" class="form-check-input" id="exampleCheck1">
              <label class="form-check-label" for="exampleCheck1">Check me out</label>
            </div>

            <button type="submit" class="btn btn-primary">Submit</button>
    </form>
@endsection