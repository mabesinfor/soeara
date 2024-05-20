<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
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
        $petisi = $request->query('petisi');
        $user = User::whereSlug($slug)->firstOrFail();

        if ($petisi && $petisi == 'done') {
            return view('profil.show', [
                'user' => $user,
                'title' => 'done'
            ]);
        }
        return view('profil.show', [
            'user' => $user,
            'title' => 'reg'
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
    public function update(Request $request, User $user)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Request $request)
    {
        try {
            $user = User::findOrFail($request->id);

            if ($user->avatar) {
                // Hapus file avatar dari server jika ada
                Storage::delete($user->avatar);
            }

            $user->avatar = null;
            $user->save();

            return response()->json(['success' => true]);
        } catch (\Exception $e) {
            return response()->json(['success' => false, 'message' => $e->getMessage()], 500);
        }
    }
}
