<?php

namespace App\Http\Controllers;

use App\Models\Support;
use App\Http\Requests\StoreSupportRequest;
use App\Http\Requests\UpdateSupportRequest;
use App\Models\Comment;
use App\Models\Petition;
use GuzzleHttp\Psr7\Response;

class SupportController extends Controller
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
    public function store(StoreSupportRequest $request)
    {
        if (Support::where('petition_id', $request->petition_id)->where('user_id', $request->user_id)->exists()) {
            return redirect()->route('petisi.show', ['slug' => Petition::find($request->petition_id)->slug])->with('error', 'Anda sudah mendukung petisi ini!');
        }

        Support::create([
            'petition_id' => $request->petition_id,
            'user_id' => $request->user_id,
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        if(!empty($request->content)) {
            Comment::create([
                'petisi_id' => $request->petition_id,
                'user_id' => $request->user_id,
                'content' => $request->content,
                'likes_count' => 0,
                'created_at' => now(),
                'updated_at' => now(),
            ]);
        }

        return response()->json([
            'message' => 'success',
        ]);
    }

    /**
     * Display the specified resource.
     */
    public function show(Support $support)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Support $support)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateSupportRequest $request, Support $support)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Support $support)
    {
        //
    }
}
