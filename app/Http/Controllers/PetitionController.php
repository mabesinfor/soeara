<?php

namespace App\Http\Controllers;

use App\Models\Petition;
use App\Http\Requests\StorePetitionRequest;
use App\Http\Requests\UpdatePetitionRequest;

class PetitionController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StorePetitionRequest $request)
    {
        $data = $request->validated();
        Petition::create($data);
        return redirect()->route('petisi.show', ['slug' => Str::slug($data['title'])]);
    }

    /**
     * Display the specified resource.
     */
    public function show($slug)
    {
        $petisi = Petition::where('slug', $slug)->first();

        if ($petisi) {
            return view('petisi.show', compact('petisi'));
        } else {
            abort(404, 'Petisi tidak ditemukan');
        }
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Petition $petition)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdatePetitionRequest $request, Petition $petition)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Petition $petition)
    {
        //
    }
}
