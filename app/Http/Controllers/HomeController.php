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

        $memos = Memo::select('memos.*')
        ->where('user_id', '=', \Auth::id())
        ->whereNull('deleted_at')
        ->orderBy('updated_at','desc')
        ->get();
    


        return view('create',compact('memos'));
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


    public function detail()
    {

        $memos = Memo::select('memos.*')
        ->where('user_id', '=', \Auth::id())
        ->whereNull('deleted_at')
        ->orderBy('updated_at','desc')
        ->get();
    
        $detail_memo = Memo::find($id);

        return view('detail',compact('memos', 'detail_memo'));
    }
    
}