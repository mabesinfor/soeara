<?php

namespace App\Http\Controllers;

use App\Models\Petition;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class AdminPetitionController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('dashboard.petisi.index', [
            'title' => 'petisi'
        ]);
    }

    public function indexPending()
    {
        return view('dashboard.pending.index', [
            'title' => 'pending',
            'petitions' => Petition::where('status', 'pending')->get(),
        ]);
    }

    public function terima($id)
    {
        try {
            $petition = Petition::findOrFail($id);
            $petition->status = 'terima';
            $petition->save();
            return redirect('/dashboard/pending')->with('success', 'Berhasil menerima petisi');
        } catch (\Throwable $th) {
            return redirect('/dashboard/pending')->with('error', 'Gagal menerima petisi!');
        }
    }

    public function tolak($id)
    {
        try {
            $petition = Petition::findOrFail($id);
            $petition->status = 'tolak';
            $petition->save();
            return redirect('/dashboard/pending')->with('success', 'Berhasil menolak petisi');
        } catch (\Throwable $th) {
            return redirect('/dashboard/pending')->with('error', 'Gagal menolak petisi!');
        }
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
    public function show(Petition $petition)
    {
        //
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
    public function update(Request $request, Petition $petition)
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
