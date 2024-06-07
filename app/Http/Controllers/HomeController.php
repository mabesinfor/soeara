<?php

namespace App\Http\Controllers;

use App\Models\Petition;
use Illuminate\Http\Request;


class HomeController extends Controller
{
    public function index()
    {
        $petisis = Petition::with(['categories', 'supporters', 'likes'])->latest()->take(3)->get();
        $trending = Petition::with(['categories', 'supporters', 'likes'])
            ->withCount('likes')
            ->orderBy('likes_count', 'desc')
            ->take(5)
            ->get();
        return view('home', compact('petisis', 'trending'));
    }
}
