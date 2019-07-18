<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Requests\UsersRequest;
use App\Http\Requests\UsersEditRequest;
use App\User;
use App\Role;
use App\Photo;
use Auth;

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

        $hashedpassword = $user->password;

        if ($file = $request->file('photo_id')) {

            # code...
            $name = time() . $file->getClientOriginalName();

            $file->move('images', $name);

            $photo = Photo::create(['file' => $name]);

            $input['photo_id'] = $photo->id;
            
        }

        //check jika old password sama dengan password di database
        if (\Hash::check($input['old_password'], $hashedpassword)) {

            # code...

            //check jika input password baru tidak sama dengan password di database
            if (!\Hash::check($request->input('password'), $hashedpassword)) {

                # code...
                
                //jika password yang di inputkan kosong
                if ($input['password'] == '') {

                    # code...
                    $input['password'] = $hashedpassword;

                } else {

                    # code...
                    $input['password'] = bcrypt($request->input('password'));
                }
               
                
            } else {

                # code...
                //check jika input password baru sama dengan password di database
                session()->flash('error', 'The new password cannot same as old password');
                return redirect()->back();
            }

        } else {

            # code...
            //check jika old password tidak sama dengan password di database
            session()->flash('error', 'The old password does not same in database');
            return redirect()->back();

        }

        // Auth::user()->findOrFail($id)->update($input);
            
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
