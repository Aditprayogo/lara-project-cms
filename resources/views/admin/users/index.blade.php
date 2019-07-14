@extends('layouts.admin')

@section('content')
    <?php $i=1; ?>
    <h1>Users</h1>
    <table class="table">
        <thead>
          <tr>
            <th scope="col">No</th>
            <th scope="col">name</th>
            <th scope="col">Photo</th>           
            <th scope="col">email</th>
            <th scope="col">Role</th>
            <th scope="col">Active</th>
            <th scope="col">created</th>           
            <th scope="col">updated</th>           
          </tr>
        </thead>
        <tbody>

            @if ($users)

                @foreach ($users as $user)
                    <tr>
                        <th scope="row">{{$i++}}</th>
                        <td>
                            <a href="{{route('admin.users.edit', ['id' => $user->id])}}">{{$user->name}}</a>
                        </td>
                        <td>
                            @if($user->photo)
                                 <img src="{{$user->photo->file}}" width="50">
                            @else
                                <img src="/images/noimage.jpg" width="50">
                            @endif

                        </td>
                        <td>{{$user->email}}</td>
                        <td>{{$user->role->name}}</td>
                        <td>

                            @if ($user->is_active == 1)
                                 Active   
                            @else
                                Not active
                            @endif         

                        </td>
                        <td>{{$user->created_at->diffForHumans()}}</td>
                        <td>{{$user->updated_at->diffForHumans()}}</td>
                    </tr>    
                @endforeach
                
            @endif
          
        </tbody>
      </table>
@endsection