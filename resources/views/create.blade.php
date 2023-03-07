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
                <textarea class="form-control" name="content" rows="8" placeholder="メモを残しましょう"></textarea>
            </div>
            <button type="submit" class="btn btn-primary">保存！</button>
            </p>
                            
        </form>
    </div>
@endsection
