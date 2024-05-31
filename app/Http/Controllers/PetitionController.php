<?php

namespace App\Http\Controllers;

use App\Http\Requests\StorePetitionRequest;
use App\Http\Requests\UpdatePetitionRequest;
use App\Models\Category;
use App\Models\Petition;
use App\Models\Comment;
use App\Models\Support;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class PetitionController extends Controller
{
    public function share($slug)
    {
        $petisi = Petition::where('slug', $slug)->firstOrFail();
        return view('petisi.share', [
            'petisi' => $petisi,
        ]);
    }
    public function bar($slug)
    {
        $petisi = Petition::where('slug', $slug)->with('categories')->firstOrFail();
        $supports = Support::where('petition_id', $petisi->id)->get();
        return view('petisi.bar', [
            'supports' => $supports,
        ]);
    }
    public function index()
    {
        $petisis = Petition::with(['categories', 'supporters', 'likes'])->latest()->get();
        return view('petisi.index', compact('petisis'));
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

        if (Petition::where('slug', $data['slug'])->exists()) {
            return redirect()->route('petisi.create')->with('error', 'Judul sudah ada, silahkan gunakan judul lain');
        }

        if ($request->hasFile('image')) {
            $data['image'] = $request->file('image')->store('petitions', 'public');
        }

        $send = Petition::create($data);
        $user_slug = auth()->user()->slug;

        if (!$send) {
            return redirect()->route('petisi.create')->with('error', 'Petisi gagal dibuat');
        }

        if ($request->has('categories')) {
            $petition = Petition::where('slug', $data['slug'])->first();
            $petition->categories()->attach($request->categories);
        }

        return redirect()->route('profil.show', $user_slug)->with('success', 'Petisi berhasil dibuat');
    }

    public function show($slug)
    {
        $petisi = Petition::where('slug', $slug)->with('categories')->with('supporters')->with('likes')->firstOrFail();
        
        if ($petisi) {
            return view('petisi.show', [
                'petisi' => $petisi,
            ]);
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
