@extends('layouts.appdetail')

@section('content')
<div class="container mx-auto px-2 py-1">
    <div class="bg-white rounded-lg shadow-md overflow-hidden">
        <div class="py-2.5 px-8 bg-yellow-300 border-b border-gray-200">
            <h2 class="font-sans text-2xl text-gray-800">マイレシピ</h2>
        </div>
        <form class="px-4 py-3" action="{{ route ('update') }}" method="POST">
            @csrf
            <input type="hidden" name="memo_id" value="{{ $detail_memo['id'] }}" /></input>

            @if($detail_memo['image'])
            <img src="https://recipe-notebook.s3.ap-northeast-1.amazonaws.com/public/{{ $detail_memo['image'] }}" alt="{{ '料理の画像' }}" class="object-cover w-400 rounded-t-lg">
            @else
            <img src="https://recipe-notebook.s3.ap-northeast-1.amazonaws.com/images/Ciid.png" alt="{{ 'ダミー画像' }}" class="object-cover w-48 h-48 rounded-t-lg">
            @endif


            <div class="flex items-center">
                <label for="name" class="font-sans block text-gray-700 font-bold mr-4">マイレシピ</label>
                <h1 name="name" class="font-sans text-center whitespace-no-wrap overflow-ellipsis overflow-hidden">{{ $detail_memo['name'] }}</h1>
            </div>
            <div class="mb-4 flex items-center">
                <label for="rating" class="font-sans block text-gray-700 font-bold mr-4">難易度</label>
                <select name="rating" id="rating" class="font-sans px-3 py-2 border border-gray-400 rounded-lg ml-7">
                    <option value="{{ $detail_memo['rating'] }}">{{ $detail_memo['rating'] }}</option>
                    <option value="1">1</option>
                    <option value="2">2</option>
                    <option value="3">3</option>
                    <option value="4">4</option>
                    <option value="5">5</option>

                </select>
            </div>
            <div class="mb-4 flex items-center">
                <label for="time-input" class="font-sans block text-gray-900 font-bold mb-2 mr-2">調理時間</label>
                <div class="relative inline-block max-w-md">
                    <select class="font-sans block appearance-none w-full bg-white border border-gray-400 hover:border-gray-500 px-4 py-2 pr-10 rounded ml-5" id="time-input" name="time">
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


            <div class="container" style="padding-left: 0; padding-right: 0;">
                <form action="#" method="POST" class="grid grid-cols-1 gap-8 sm:grid-cols-2">
                    <div>
                        <label for="exampleFormControlTextarea1" class="font-sans block text-gray-700 font-bold mb-2">材料</label>
                        <textarea name="content" rows="5" placeholder="材料を書きましょう" class="w-full px-3 py-2 border rounded-lg shadow-sm focus:outline-none focus:ring-2 focus:ring-blue-600 focus:border-transparent">{{$detail_memo['content']}}</textarea>
                    </div>
                    <div>
                        <label for="exampleFormControlTextarea1" class="font-sans block text-gray-700 font-bold mb-2">メモ</label>
                        <textarea name="memo" rows="5" placeholder="メモを残しましょう" class="w-full px-3 py-2 border rounded-lg shadow-sm focus:outline-none focus:ring-2 focus:ring-blue-600 focus:border-transparent">{{$detail_memo['memo']}}</textarea>
                    </div>
                </form>
                <div class="mt-4 flex">
                    <button class="bg-custom-yellow font-sans text-black font-bold py-2 px-4 rounded shadow-md hover:bg-dark-orange hover:text-white transition-colors duration-300 ease-in-out mr-3">更新</button>

                    <a class="font-sans bg-custom-yellow text-black font-bold py-2 px-4 rounded shadow-md hover:bg-dark-orange hover:text-white transition-colors duration-300 ease-in-out mr-3" href="/home">戻る</a>

                    <!-- 削除ボタンの処理 -->
                    <form action="{{ route('destroy') }}" method="POST" class="ml-auto">
                        @csrf
                        <input type="hidden" name="memo_id" value="{{ $detail_memo['id'] }}" />
                        <button type="submit" class="btn btn-danger font-sans bg-red-500 hover:bg-red-400 text-white font-bold py-2 px-4 rounded">削除</button>
                    </form>
                </div>
            </div>

            @endsection