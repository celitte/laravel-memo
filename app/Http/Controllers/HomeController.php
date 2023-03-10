<?php

namespace App\Http\Controllers;

// use App\Models\ModelName;
use Illuminate\Http\Request;
use App\Models\Memo;

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

        Memo::insert(['name' => $posts['name'],
                    'rating' => $posts['rating'],
                    'content' => $posts['content'],
                    'time' => $posts['time'],
                    'memo' => $posts['memo'],
                    'user_id' => \Auth::id()]);

                    return redirect ( route('home'));
    }
    
}