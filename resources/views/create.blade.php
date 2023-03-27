@extends('layouts.app')

@section('content')
    <div class="card w-100">
        <div class="card-header">マイレシピ作成</div>
        <form class="card-body" action="{{ route ('store') }}" method="POST">
            @csrf
            <h5 class="card-title"></h5>
            <p class="card-text">
            <div class="form-group">


            <label for="name">料理名:</label>
            <input type="text" name="name" id="name"><br><br>
        <div levelcook>
              <label for="rating">難易度:</label>
              <select name="rating" id="rating">
                  <option value="1">1</option>
                  <option value="2">2</option>
                  <option value="3">3</option>
                  <option value="4">4</option>
                  <option value="5">5</option>
              </select>
                        <br>


                        <label for="time-input" style="display: inline-block;">調理時間</label>
                    <select class="form-control" id="time-input" name="time" required style="display: inline-block; margin-bottom: 10px; width: 200px;">
                        <option value="">--選択してください--</option>
                        <option value="5">5分</option>  
                        <option value="10">10分</option>
                        <option value="15">15分</option>
                        <option value="30">30分</option>
                        <option value="45">45分</option>    
                        <option value="60">1時間</option>
                    </select>
                </div>
    </div>
                <label for="exampleFormControlTextarea1" style="margin-: 1em;">材料</label>
                <textarea class="form-control" name="content" rows="8" placeholder="材料を書きましょう" class="target1"></textarea>
                <div class="form-group">
                <br>
                        <div class="invalid-feedback">
                            有効な時間単位を選択してください。
                        </div>
                        </div>



                <textarea class="form-control" name="memo" rows="8" placeholder="メモを残しましょう"></textarea>
            </div>
            <button type="submit" class="btn btn-primary">保存！</button>
            </p>
                            
        </form>
    </div>
@endsection
