@extends('layouts.admin')

@section('content')

<h1>Welcome {{Auth::user()->name}}</h1>

    <div class="col-sm-3">
        @if (Auth::user()->photo)
            <img src="{{Auth::user()->photo->file}}" alt="" class="img-responsive img-rounded" width="200">
        @else 
            <img src="/images/noimage.png" alt="" class="img-responsive img-rounded">
        @endif      
    </div>
    
    <div class="col-sm-9">
        <div class="well">
            <ul>
                <li>
                    Name : {{Auth::user()->name}}
                </li>
                <li>
                    Role : {{Auth::user()->role->name}}
                </li>
                <li>
                    Created :  {{Auth::user()->created_at->diffForHumans()}}
                </li>
                <li>
                    @if (Auth::user()->is_active == 1)

                        Status :    <span class="label label-primary">Active</span> 
                        
                    @else 
                        Status :    <span class="label label-danger">Not Active</span> 
             
                    @endif
                </li>
                <li>
                    Posts :  {{Auth::user()->posts()->count()}}
                </li>
            </ul>
        </div>
        <div class="well">
            <ul>
                <li>
                    Current date : {{Carbon\Carbon::now()->format('d-m-Y')}}
                </li>
            </ul>
        </div>
    </div>

    
@endsection