<?php

namespace App\Http\Controllers;

use App\Models\Petition;
use Illuminate\Http\Request;


class HomeController extends Controller
{
    public function index()
    {
        $trending = Petition::with(['categories', 'supporters', 'likes'])
            ->withCount('likes')
            ->orderBy('likes_count', 'desc')
            ->whereIn('status', ['published', 'win'])
            ->take(5)
            ->get();
        
        $petisis = Petition::with(['categories', 'supporters', 'likes'])->whereIn('status', ['published', 'win'])->latest()->take(3)->get();

        $publishedPetitionsCount = Petition::published()->count();
        return view('home', compact('petisis', 'trending', 'publishedPetitionsCount'));
    }
}
