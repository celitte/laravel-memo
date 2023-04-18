@extends('layouts.appdetail')

@section('content')
<div class="container mx-auto px-4 py-4">
    <div class="bg-white rounded-lg shadow-md overflow-hidden">
        <div class="py-4 px-8 bg-gray-100 border-b border-gray-200">
            <h2 class="text-2xl font-bold text-gray-800">マイレシピ詳細</h2>
        </div>
        <form class="px-8 py-4" action="{{ route ('update') }}" method="POST">
            @csrf
            <input type="hidden" name="memo_id" value="{{ $detail_memo['id'] }}" /></input>

            <div class="flex items-center">
                <label for="name" class="block text-gray-700 font-bold mr-4">マイレシピ</label>
                <h1 name="name" class="text-center whitespace-no-wrap overflow-ellipsis overflow-hidden">{{ $detail_memo['name'] }}</h1>
            </div>
            <div class="mb-4 flex items-center">
                <label for="rating" class="block text-gray-700 font-bold mr-4">難易度</label>
                <select name="rating" id="rating" class="px-3 py-2 border border-gray-400 rounded-lg ml-7">
                    <option value="{{ $detail_memo['rating'] }}">{{ $detail_memo['rating'] }}</option>
                    <option value="1">1</option>
                    <option value="2">2</option>
                    <option value="3">3</option>
                    <option value="4">4</option>
                    <option value="5">5</option>

                </select>
            </div>
            <div class="mb-4 flex items-center">
                <label for="time-input" class="block text-gray-900 font-bold mb-2 mr-2">調理時間:</label>
                <div class="relative inline-block max-w-md">
                    <select class="block appearance-none w-full bg-white border border-gray-400 hover:border-gray-500 px-4 py-2 pr-10 rounded ml-5" id="time-input" name="time">
                        <option value="{{ $detail_memo['time'] }}">{{ $detail_memo['time'] }}分</option>
                        <option value="5">5分</option>
                        <option value="10">10分</option>
                        <option value="15">15分</option>
                        <option value="30">30分</option>
                        <option value="45">45分</option>
                        <option value="60">60分</option>
                    </select>
                </div>
            </div>
            <!-- <div class="form-group">
                    <label for="time-input">調理時間</label>
                    <select class="form-control" id="time-input" name="time" required  style="margin-bottom: 10px;">
                        <option value="{{ $detail_memo['time'] }}">{{ $detail_memo['time'] }}分</option>
                        
                        <option value="5">5分</option>  
                        <option value="10">10分</option>
                        <option value="15">15分</option>
                        <option value="30">30分</option>
                        <option value="45">45分</option>    
                        <option value="60">60分</option>
                    </select>
                        <div class="invalid-feedback">
                            有効な時間単位を選択してください。
                        </div>
                        </div> -->

            <div class="container mx-auto my-4">
                <form action="#" method="POST" class="grid grid-cols-1 gap-8 sm:grid-cols-2">
                    <div>
                        <label for="exampleFormControlTextarea1" class="block text-gray-700 font-bold mb-2">材料</label>
                        <textarea name="content" rows="5" placeholder="材料を書きましょう" class="w-full px-3 py-2 border rounded-lg shadow-sm focus:outline-none focus:ring-2 focus:ring-blue-600 focus:border-transparent">{{$detail_memo['content']}}</textarea>
                    </div>
                    <div>
                        <label for="exampleFormControlTextarea1" class="block text-gray-700 font-bold mb-2">メモ</label>
                        <textarea name="memo" rows="5" placeholder="メモを残しましょう" class="w-full px-3 py-2 border rounded-lg shadow-sm focus:outline-none focus:ring-2 focus:ring-blue-600 focus:border-transparent">{{$detail_memo['memo']}}</textarea>

                        <img src="{{ '/storage/' . $detail_memo['image'] }}" alt="{{ $detail_memo['name'] }}" class="object-cover  h-28 rounded-t-lg">

                        <!-- <div class="form-group">
                   <label class="col-md-5" for="title">食材</label>
                        <div class="card-body" style="padding: 0.5em;">
                             <textarea class="form-control" name="content" rows="7">{{$detail_memo['content']}}</textarea>
                        </div>


                        <div class="form-group">
                            <label class="col-md-5" for="title">メモ</label>
                            <div class="card-body" style="padding: 0.5em;">
                                <textarea class="form-control" name="memo" rows="8">{{$detail_memo['memo']}}</textarea>

                            </div>

                        </div> -->
                        <!-- <div class ="detail-button"> -->
                        <button class="button-85" role="button">更新</button>
                        <button class="bg-red-200 hover:bg-red-100 text-white rounded px-4 py-2">更新</button>
                        <a class="btn btn-primary" href="/home">戻る</a>
                </form>
                <!-- 削除ボタンの処理 -->
                <form action="{{ route('destroy') }}" method="POST">
                    @csrf
                    <input type="hidden" name="memo_id" value="{{ $detail_memo['id'] }}" />


                    <button type="submit" class="btn btn-danger  btn-delete">削除</button>
                </form>
                <!-- </div> -->


            </div>
            @endsection