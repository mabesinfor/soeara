<?php

namespace App\Http\Controllers;

use App\Models\Petition;
use Illuminate\Http\Request;


class HomeController extends Controller
{
    public function index()
    {
        $petisis = Petition::with(['categories', 'supporters', 'likes'])->latest()->take(3)->get();
        return view('home', compact('petisis'));
    }
}
