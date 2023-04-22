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
            ->orderBy('updated_at', 'desc')
            ->paginate(6);



        return view('create', compact('memos'));
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required',
            'content' => 'required',
            'time' => 'required',
        ]);

        $posts = $request->all();
        $image = $request->file('image');

        $path = null; // デフォルトはnull

        // 画像がアップロードされている場合は、storageに保存
        if ($request->hasFile('image') && $image->isValid()) {
            $path = \Storage::put('/public', $image);
            $path = explode('/', $path)[1];
        }

        Memo::insert([
            'name' => $posts['name'],
            'rating' => $posts['rating'],
            'content' => $posts['content'],
            'time' => $posts['time'],
            'memo' => $posts['memo'],
            'image' => $path,
            'user_id' => \Auth::id(),
        ]);

        return redirect(route('home'));
    }


    public function detail($id)
    {

        $memos = Memo::select('memos.*')
            ->where('user_id', '=', \Auth::id())
            ->whereNull('deleted_at')
            ->orderBy('updated_at', 'desc')
            ->get();

        $detail_memo = Memo::find($id);

        return view('detail', compact('memos', 'detail_memo'));
    }



    public function update(Request $request)
    {
        $posts = $request->all();

        Memo::where('id', $posts['memo_id'])
            ->update([
                // 'name' => $posts['name'],
                'rating' => $posts['rating'],
                'content' => $posts['content'],
                'time' => $posts['time'],
                'memo' => $posts['memo'],
                'user_id' => \Auth::id()
            ]);


        return redirect(route('home'));
    }


    public function destroy(Request $request)
    {
        $posts = $request->all();
        Memo::where('id', $posts['memo_id'])
            ->update(['deleted_at' => date("Y-m-d H:i:s", time())]);



        return redirect(route('home'));
    }
}
