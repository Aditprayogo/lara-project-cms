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
            <th scope="col">Action</th>           
        </tr>
        </thead>
        <tbody>

            @if ($users)

                @foreach ($users as $user)
                    <tr>
                        <th scope="row">{{$i++}}</th>
                        <td>
                            {{$user->name}}
                        </td>
                        <td>
                            @if($user->photo)
                                 <img src="{{$user->photo->file}}" width="50">
                            @else
                                <img src="/images/noimage.png" width="50">
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
                        <td>
                            <a href="{{route('admin.users.edit', ['id' => $user->id])}}" class="btn btn-success fas fa-edit"></a> 
                            <br>
                            
                            <form action="{{route('admin.users.destroy', ['id'=>$user->id])}}" method="POST">

                                {{ csrf_field() }}
                                <input type="hidden" name="_method" value="DELETE">

                                <button type="submit" class="btn btn-danger fas fa-user-minus" onclick="return confirm('Are You Sure want to delete ? ')"></button>

                            </form>
                        </td>
                    </tr>    
                @endforeach
                
            @endif
          
        </tbody>
      </table>
@endsection