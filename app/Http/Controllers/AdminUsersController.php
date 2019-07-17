<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Requests\UsersRequest;
use App\Http\Requests\UsersEditRequest;
use App\User;
use App\Role;
use App\Photo;

class AdminUsersController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $users = User::all();
        return view('admin.users.index')->with('users', $users);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        $roles = Role::all();
        return view('admin.users.create')->with('roles', $roles);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(UsersRequest $request)
    {

        $input = $request->all();

        if ($file = $request->file('photo_id')) {

            # code...
            //dapetin extensi namanya
            $name = time() . $file->getClientOriginalName();

            //bikin directori di public
            $file->move('images', $name);

            //buat photo di tabel photo
            $photo = Photo::create(['file' => $name]);

            //input photo_id berdasarkan dari photo id
            $input['photo_id'] = $photo->id;
         
        }

        $input['password'] = bcrypt($request->input('password'));

        User::create($input);

        return redirect('/admin/users')->with('success', 'The User Has Been Created');

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
        $user = User::findOrFail($id);
        $roles = Role::all();

        return view('admin.users.edit', compact('user', 'roles'));

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(UsersEditRequest $request, $id)
    {
        //
        $user = User::findOrFail($id);

        $input = $request->all();

        if ($file = $request->file('photo_id')) {

            # code...
            $name = time() . $file->getClientOriginalName();

            $file->move('images', $name);

            $photo = Photo::create(['file' => $name]);

            $input['photo_id'] = $photo->id;
            
        }

        //Jika password kosong
        if ($input['password'] == '') {

            # code...
            $input['password'] = $request->input('old_password');


        } else {

            # code...
            $input['password'] = bcrypt($request->input('password'));
            
        }
            
        $user->update($input);
        
        return redirect('/admin/users')->with('success', 'The User Has Been Updated');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
        $user = User::findOrFail($id);

        // unlink(public_path() .  $user->photo->file);

        $user->delete();

        return redirect('/admin/users')->with('success', 'The User Has Been Deleted');
    }
}
