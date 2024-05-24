<?php

namespace App\Http\Controllers;

use App\Http\Requests\StorePetitionRequest;
use App\Http\Requests\UpdatePetitionRequest;
use App\Models\Category;
use App\Models\Petition;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class PetitionController extends Controller
{
    public function index()
    {
        $petisi = Petition::all();
        return view('petisi.index', compact('petisi'));
    }

    public function create()
    {
        return view('petisi.create', [
            'categories' => Category::all(),
        ]);
    }

    public function store(StorePetitionRequest $request)
    {
        $data = $request->validate([
            'title' => 'required',
            'desc' => 'required',
            'image' => 'nullable|image',
            'user_id' => 'required',
        ]);

        $data['slug'] = Str::slug($data['title']);
        $data['status'] = 'pending';

        if ($request->hasFile('image')) {
            $data['image'] = $request->file('image')->store('petitions', 'public');
        }

        Petition::create($data);
        $user_slug = auth()->user()->slug;

        return redirect()->route('profil.show', $user_slug);
    }

    public function show($slug)
    {
        $petisi = Petition::where('slug', $slug)->first();

        if ($petisi) {
            return view('petisi.show', compact('petisi'));
        } else {
            abort(404, 'Petisi tidak ditemukan');
        }
    }

    public function edit(Petition $petition)
    {
        //
    }

    public function update(UpdatePetitionRequest $request, Petition $petition)
    {
        //
    }

    public function destroy(Petition $petition)
    {
        //
    }
}
