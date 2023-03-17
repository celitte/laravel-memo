@extends('layouts.appdetail')

@section('content')
    <div class="card w-100">
        <div class="card-header">マイレシピ詳細</div>
        <form class="card-body"  action="{{ route ('store') }}" method="POST">
            @csrf
            <h5 class="card-title"></h5>
            <p class="card-text">
            <div class="form-group">


 <!-- <label for="name">料理名:</label>
        <!-- <input type="text" name="name" id="name"> -->
        <!-- {{$detail_memo['name'] }}<br><br> --> 
        <div class="container">
  <div class="row">
    <div class="col-md-20">
      <h2>料理名：{{$detail_memo['name']}}</h2>
      <p>{{$detail_memo['description']}}</p>
    </div>

              <label for="rating">自己満足度:</label>
              <select name="rating" id="rating">
                        <br>

                <label for="exampleFormControlTextarea1" style="margin-: 1em;">材料</label>
                <textarea class="form-control" name="content" rows="8" placeholder="材料を書きましょう" class="target1"></textarea>
                <div class="form-group">
                    <label for="time-input">調理時間</label>
                    <select class="form-control" id="time-input" name="time" required  style="margin-bottom: 10px;">
                        <option value="">--選択してください--</option>
                        <option value="5">5分</option>  
                        <option value="10">10分</option>
                        <option value="15">15分</option>
                        <option value="30">30分</option>
                        <option value="45">45分</option>    
                        <option value="60">1時間</option>
                    </select
                        <div class="invalid-feedback">
                            有効な時間単位を選択してください。
                        </div>
                        </div>



                <textarea class="form-control" name="memo" rows="8" placeholder="メモを残しましょう"></textarea>
            </div>
            <button type="submit" class="btn btn-primary">登録</button>
            <a class="btn btn-primary" href="/home">戻る</a>
            </p>
                            
        </form>
    </div>
    @endsection
