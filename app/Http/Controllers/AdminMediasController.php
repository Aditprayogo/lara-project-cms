<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Requests\MediaCreateRequest;
use App\Photo;

class AdminMediasController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $photos = Photo::all();

        return view('admin.media.index')->with('photos', $photos);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('admin.media.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(MediaCreateRequest $request)
    {
        //
        $input = $request->all();

        if ($file = $request->file('file')) {
            # code...
            $name = time() . $file->getClientOriginalName();

            $file->move('images', $name);

            $input['file'] = $name;
        }

        Photo::create($input);

        return redirect('admin/medias')->with('success', 'The image has been uploaded');
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
        $photo = Photo::findOrFail($id);

        return view('admin.media.view')->with('photo', $photo);

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
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
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
        $photo = Photo::findOrFail($id);

        unlink( public_path() . $photo->file );

        $photo->delete();

        return redirect('admin/medias')->with('success', 'The Photo Has Been Deleted');
    }

    public function deleteMedia(Request $request)
    {
        # code...
        $photos = Photo::findOrFail($request->checkBoxArray);

        foreach ($photos as $photo) {

            # code...
            $photo->delete();
            
        }

        return redirect()->back()->with('success', 'The Medias Has been deleted');

        
    }
}
