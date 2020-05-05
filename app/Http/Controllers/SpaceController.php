<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use App\Space;
use App\SpacePhoto;

class SpaceController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $space = Space::latest()->paginate(4);

        return view('pages.space.index', compact('space'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('pages.space.create');
    }

    public function browse()
    {
        return view('pages.space.browse');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $createS = [
            'title' => $request->title,
            'address' => $request->address,
            'description' => $request->description,
            'latitude' => $request->latitude,
            'longitude' => $request->longitude
        ];

        $space = Space::create($createS);

        $spacePhotos = [];

        foreach ($request->file('photo') as $jquin) {
            $path = Storage::disk('public')->putFile('spaces', $jquin);
            $spacePhotos[] = [
                'space_id' => $space->id,
                'path' => $path
            ];
        }

        SpacePhoto::insert($spacePhotos);

        return redirect()->route('home');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Request $request, $id)
    {
        $space = Space::findOrFail($id);
        
        return view('pages.space.show', compact('space'));   
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $space = Space::findOrFail($id);

        return view('pages.space.edit', compact('space'));
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
        $space = Space::findOrFail($id);
        $space->update($request->all());

        return redirect()->route('home');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $space = Space::findOrFail($id);

        foreach ($space->photos as $jquin) {
            Storage::delete('public/'.$jquin->path);
        }

        $space->delete();

        return redirect()->route('home');
    }
}
