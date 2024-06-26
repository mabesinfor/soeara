<?php

namespace App\Http\Controllers;

use App\Models\Comment;
use App\Http\Requests\StoreCommentRequest;
use App\Http\Requests\UpdateCommentRequest;
use App\Models\Petition;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class CommentController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index($slug)
    {
        $petisi = Petition::where('slug', $slug)->firstOrFail();
        $comments = Comment::where('petisi_id', $petisi->id)
                            ->orderBy('likes_count', 'desc')
                            ->with('likes')
                            ->get();

        return view('petisi.comments', [
            'comments' => $comments
        ]);
    }

    public function index_tinjau($slug)
    {
        $petisi = Petition::where('slug', $slug)->firstOrFail();
        $comments = Comment::where('petisi_id', $petisi->id)
                            ->orderBy('likes_count', 'desc')
                            ->with('likes')
                            ->get();

        return view('tinjau.comments', [
            'comments' => $comments
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
        $request->validate([
            'petisi_id' => 'required',
            'content' => 'required',
        ]);

        $comment = new Comment;
        $comment->user_id = Auth::id();
        $comment->petisi_id = $request->petisi_id;
        $comment->content = $request->content;

        $comment->save();
        return back()->with('success', 'Komentar berhasil ditambahkan.');
    }

    /**
     * Display the specified resource.
     */
    public function show($slug)
    {
        $petisi = Petition::where('slug', $slug)->firstOrFail();
        $comments = Comment::where('petisi_id', $petisi->id)->get();

        return view('petisi.comments-modal', [
            'comments' => $comments
        ]);
    }

    public function like(Request $request, $id)
    {
        $comment = Comment::findOrFail($id);
        $user = Auth::user();

        if ($comment->likes()->where('user_id', $user->id)->exists()) {
            $comment->likes()->detach($user->id);
            $comment->decrement('likes_count');
            return response()->json(['liked' => false, 'likes_count' => $comment->likes_count]);
        } else {
            $comment->likes()->attach($user->id);
            $comment->increment('likes_count');
            return response()->json(['liked' => true, 'likes_count' => $comment->likes_count]);
        }
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Comment $comment)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateCommentRequest $request, Comment $comment)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Request $request)
    {
        Comment::destroy($request->id);
        return response()->json(['success' => true, 'message' => 'Berhasil menghapus komentar!']);
    }
}
