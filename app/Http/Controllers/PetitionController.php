<?php

namespace App\Http\Controllers;

use App\Http\Requests\StorePetitionRequest;
use App\Http\Requests\UpdatePetitionRequest;
use App\Models\Petition;
use App\Models\Comment;
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
        //
    }

    public function store(StorePetitionRequest $request)
    {
        $data = $request->validated();
        Petition::create($data);
        return redirect()->route('petisi.show', ['slug' => Str::slug($data['title'])]);
    }

    public function show($slug)
    {
        $petisi = Petition::where('slug', $slug)->first();
        $comments = Comment::where('petisi_id', $petisi->id)->get();

        if ($petisi) {
            return view('petisi.show', compact('petisi', 'comments'));
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
