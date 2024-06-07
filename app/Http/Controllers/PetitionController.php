<?php

namespace App\Http\Controllers;

use App\Http\Requests\StorePetitionRequest;
use App\Http\Requests\UpdatePetitionRequest;
use App\Models\Category;
use App\Models\Petition;
use App\Models\Comment;
use App\Models\Support;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class PetitionController extends Controller
{
    public function tinjau($slug)
    {
        $petisi = Petition::where('slug', $slug)->with('categories')->with('supporters')->with('likes')->firstOrFail();
        
        if ($petisi) {
            return view('tinjau.index', [
                'petisi' => $petisi,
            ]);
        } else {
            abort(404, 'Petisi tidak ditemukan');
        }
    }

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
        $petisis = Petition::with(['categories', 'supporters'])
            ->withCount('likes')
            ->orderBy('likes_count', 'desc')
            ->paginate(3);
    
        $categories = Category::all();
    
        return view('petisi.index', compact('petisis', 'categories'));
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
            'title' => 'required|string|max:90',
            'desc' => 'required|string|max:1000',
            'user_id' => 'required',
        ]);

        $data['slug'] = Str::slug($data['title']);
        $data['status'] = 'pending';
        $data['desc'] = nl2br(e($request->desc));

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

    // public function like(Petition $petition)
    // {
    //     $petition->likes()->attach(auth()->user()->id);
    //     return back();
    // }

    // public function unlike(Petition $petition)
    // {
    //     $petition->likes()->detach(auth()->user()->id);
    //     return back();
    // }

    public function like(Request $request, Petition $petition)
    {
        $petition->likes()->attach(auth()->user()->id);
        $likesCount = $petition->likes()->count();

        return response()->json([
            'message' => 'Petisi berhasil disukai',
            'likesCount' => $likesCount,
        ]);
    }

    public function unlike(Request $request, Petition $petition)
    {
        $petition->likes()->detach(auth()->user()->id);
        $likesCount = $petition->likes()->count();

        return response()->json([
            'message' => 'Petisi berhasil tidak disukai',
            'likesCount' => $likesCount,
        ]);
    }

    public function search(Request $request)
    {
        $search = $request->get('search');
        $category = $request->get('category');
    
        $petisis = Petition::where(function ($query) use ($search) {
            $query->where('title', 'like', '%' . $search . '%')
                ->orWhereHas('user', function ($query) use ($search) {
                    $query->where('name', 'like', '%' . $search . '%');
                });
        });
    
        if ($category != "") {
            $petisis = $petisis->whereHas('categories', function ($query) use ($category) {
                $query->where('categories.id', $category);
            });
        }
    
        $petisis = $petisis->withCount('likes')
            ->orderBy('likes_count', 'desc')
            ->paginate(3);
    
        $categories = Category::all();
    
        return view('petisi.index', compact('petisis', 'categories'));
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
        $userSlug = $petition->user->slug;
    
        Storage::disk('public')->delete($petition->image);
    
        $petition->delete();
    
        return redirect()->route('profil.show', $userSlug)->with('success', 'Petisi berhasil dihapus');
    }

    public function close(Petition $petition)
    {
        $petition->status = 'close';
        $petition->save();
    
        return response()->json(['success' => 'Petition closed successfully']);
    }

    public function open(Petition $petition)
    {
        $petition->status = 'published';
        $petition->save();
    
        return response()->json(['success' => 'Petition published successfully']);
    }

    public function win(Petition $petition)
    {
        $petition->status = 'win';
        $petition->save();
    
        return response()->json(['success' => 'Petition Win!']);
    }


}
