@extends('layouts.appdetail')

@section('content')
    <div class="card w-100">
        <div class="card-header"><strong>マイレシピ詳細</strong></div>
        <form class="card-body"  action="{{ route ('update') }}" method="POST">
            @csrf
            <input type="hidden" name="memo_id" value="{{ $detail_memo['id'] }}" />
            <h5 class="card-title"></h5>
            <p class="card-text">
            <div class="form-group">
            </input>

            <div dish-menu="display: flex;">
                <label for="name">料理名:</label>
                <h1 name="name" style="text-align:center;">{{ $detail_memo['name'] }}</h1>
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
            <div class ="detail-button">
                <button type="submit" class="btn btn-primary">更新</button>
                <a class="btn btn-primary" href="/home">戻る</a>
</form>
            <!-- 削除ボタンの処理 -->
            <form action="{{ route('destroy') }}" method="POST">
                @csrf
                <input type="hidden" name="memo_id" value="{{ $detail_memo['id'] }}"/>
          

                <button type="submit" class="btn btn-danger  btn-delete">削除</button>
            </form>
            </div>


    </div>
    @endsection
