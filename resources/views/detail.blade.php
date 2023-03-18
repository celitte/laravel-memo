@extends('layouts.appdetail')

@section('content')
    <div class="card w-100">
        <div class="card-header">マイレシピ詳細</div>
        <form class="card-body"  action="{{ route ('store') }}" method="POST">
            @csrf
            <h5 class="card-title"></h5>
            <p class="card-text">
            <div class="form-group">


 <label for="name">料理名:</label>
 <input type="text" name="name" id="name"> 
         
         <textarea class="form-control" name="content" rows="2">{{$detail_memo['name'] }}</textarea>
</input><br><br> 
            <!-- <div class="container">
                <div class="row">
                    <div class="col-md-20  text-center">
                        <h2>{{$detail_memo['name']}}</h2>
                    </div>
                </div> -->

              <label for="rating">自己満足度:</label>
              <select name="rating" id="rating">
                  <option value="1">1</option>
                  <option value="1.5">1.5</option>
                  <option value="2">2</option>
                  <option value="2.5">2.5</option>
                  <option value="3">3</option>
                  <option value="3.5">3.5</option>
                  <option value="4">4</option>
                  <option value="4.5">4.5</option>
                  <option value="5">5</option>
              </select>
                        <br>

                <!-- <label for="exampleFormControlTextarea1" style="margin-: 1em;">材料</label>
                <textarea class="form-control" name="content" rows="8" placeholder="材料を書きましょう" class="target1"></textarea> -->

                <div class="form-group">
                   <label class="col-md-5" for="title">食材</label>
                        <div class="card-body" style="padding: 0.5em;">
                             <textarea class="form-control" name="content" rows="7">{{$detail_memo['content']}}</textarea>
                        </div>


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
                    </select>
                        <div class="invalid-feedback">
                            有効な時間単位を選択してください。
                        </div>
                        </div>



                        <div class="form-group">
                            <label class="col-md-5" for="title">メモ</label>
                            <div class="card-body" style="padding: 0.5em;">
                                <textarea class="form-control" name="content" rows="5" style="width: 100%">{{$detail_memo['memo']}}</textarea>
                            </div>
                        </div>

            </div>
            <button type="submit" class="btn btn-primary">更新</button>
            <a class="btn btn-primary" href="/home">戻る</a>
            </p>
                            
        </form>
    </div>
    @endsection
