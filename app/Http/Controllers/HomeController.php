<?php

namespace App\Http\Controllers;

use App\Models\ModelName;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        return view('create');
    }

    public function store(Request $request)
    {
        $posts = $request->all();
        
        dd($posts);
        return view('create');
    }



    
}
