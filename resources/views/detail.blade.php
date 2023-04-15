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

              <label for="rating">難易度:</label>
              <select name="rating" id="rating">
              <option value="{{ $detail_memo['rating'] }}">{{ $detail_memo['rating'] }}</option>
              
                  <option value="1">1</option>
                  <option value="2">2</option>
                  <option value="3">3</option>
                  <option value="4">4</option>
                  <option value="5">5</option>
              </select>
                        <br>

                        <div class="form-group">
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
                        </div>

                <div class="form-group">
                   <label class="col-md-5" for="title">食材</label>
                        <div class="card-body" style="padding: 0.5em;">
                             <textarea class="form-control" name="content" rows="7">{{$detail_memo['content']}}</textarea>
                        </div>


                        <div class="form-group">
                            <label class="col-md-5" for="title">メモ</label>
                            <div class="card-body" style="padding: 0.5em;">
                                <textarea class="form-control" name="memo" rows="8">{{$detail_memo['memo']}}</textarea>

                            </div>

                        </div>
            <!-- <div class ="detail-button"> -->
                <button class="bg-red-200 hover:bg-red-100 text-white rounded px-4 py-2">Red 200</button>
                <a class="btn btn-primary" href="/home">戻る</a>
</form>
            <!-- 削除ボタンの処理 -->
            <form action="{{ route('destroy') }}" method="POST">
                @csrf
                <input type="hidden" name="memo_id" value="{{ $detail_memo['id'] }}"/>
          

                <button type="submit" class="btn btn-danger  btn-delete">削除</button>
            </form>
            <!-- </div> -->


    </div>
    @endsection
