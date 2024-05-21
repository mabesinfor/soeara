<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Storage;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('dashboard.pengguna.index', [
            'title' => 'pengguna'
        ]);
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
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show($slug, Request $request)
    {
        $x = null;
        $address = null;
        $petisi = $request->query('petisi');
        $user = User::whereSlug($slug)->firstOrFail();

        $province = $user->provinceT;
        $regency = str_replace(['KABUPATEN ', 'KOTA '], '', $user->regency);

        if ($province !== null && $regency !== null){
            $address = ucwords(strtolower($regency.', '.$province));
        }

        if($user->x){
            $x = preg_replace('/^@/', '', $user->x);
        }

        if ($petisi && $petisi == 'done') {
            return view('profil.show', [
                'user' => $user,
                'title' => 'done',
                'x' => $x,
                'address' => $address,
            ]);
        }
        return view('profil.show', [
            'user' => $user,
            'title' => 'reg',
            'x' => $x,
            'address' => $address,
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($slug)
    {
        $user = User::whereSlug($slug)->firstOrFail();
        return view('profil.edit', [
            'user' => $user,
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $slug)
    {
        $user = User::where('slug', $slug)->firstOrFail();
        $user->name = $request->input('name');
        $user->bio = $request->input('bio');
        $user->x = $request->input('x');
        $user->province = $request->input('province');
        $user->provinceT = $request->input('provinceT');
        $user->regency = $request->input('regency');

        $old = $user->avatar;
        if ($request->file('avatar')) {
            if ($old) {
                Storage::disk('public')->delete($old);
            }

            $avatarPath = $request->file('avatar')->store('avatars', 'public');
            $user->avatar = $avatarPath;
        }
    
        $user->save();
    
        return redirect("/profil/{$user->slug}/edit")->with('success', 'Profil berhasil diubah!');
    }    
    
    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Request $request)
    {
        try {
            $user = User::findOrFail($request->id);

            if ($user->avatar) {
                Storage::disk('public')->delete($user->avatar);
            }

            $user->avatar = null;
            $user->save();

            return response()->json(['success' => true, 'message' => 'Berhasil menghapus avatar!']);
        } catch (\Exception $e) {
            return response()->json(['success' => false, 'message' => $e->getMessage()], 500);
        }
    }
}
