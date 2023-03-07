@extends('layouts.app')

@section('content')
    <div class="card w-100">
        <div class="card-header">投稿</div>
        <form class="card-body" action="/store" method="POST">
            @csrf
            <h5 class="card-title"></h5>
            <p class="card-text">
            <div class="form-group">
                <label for="exampleFormControlTextarea1">新規作成</label>

                <div class="form-group">
  <label for="time-input">時間を入力してください:</label>
  <select class="form-control" id="time-input" name="time" required>
    <option value="">--選択してください--</option>
    <option value="5">5分</option>  
    <option value="10">10分</option>
    <option value="15">15分</option>
    <option value="30">30分</option>
    <option value="45">45分</option>    
    <option value="60">1時間</option>
  </select>
  <div class="invalid-feedback">
    有効な時間単位を選択してください。
  </div>
</div>



                <textarea class="form-control" name="content" rows="8" placeholder="メモを残しましょう"></textarea>
            </div>
            <button type="submit" class="btn btn-primary">保存！</button>
            </p>
                            
        </form>
    </div>
@endsection
