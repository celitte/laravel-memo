@extends('layouts.app')

@section('content')
    <div class="container mx-auto px-4 py-4">
        <div class="bg-white rounded-lg shadow-md overflow-hidden">
            <div class="py-4 px-8 bg-gray-100 border-b border-gray-200">
                <h2 class="text-2xl font-bold text-gray-800">マイレシピ作成</h2>
            </div>
            <form class="px-4 py-4" action="{{ route ('store') }}" method="POST">
                @csrf
                @if ($errors->any())
                    <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 mb-4 rounded relative" role="alert">
                        <ul>
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif
                <div class="mb-4 flex items-center">
    <label for="name" class="block text-gray-700 font-bold mr-4">マイレシピ</label>
    <input type="text" name="name" id="name" placeholder="料理名" class="px-3 py-2 border border-gray-400 rounded-lg flex-grow">
</div>
<div class="mb-4 flex items-center">
    <label for="rating" class="block text-gray-700 font-bold mr-4">難易度</label>
    <select name="rating" id="rating" class="px-3 py-2 border border-gray-400 rounded-lg ml-7">
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



                            <!-- <label for="time-input" style="display:">調理時間</label>
                        <select class="form-control" id="time-input" name="time" required style="display: inline-block; margin: 5px; width: 170px; ">
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
                        </div> -->

                <div class="container mx-auto my-4">
  <form action="#" method="POST" class="grid grid-cols-1 gap-8 sm:grid-cols-2">
    <div>
      <label for="exampleFormControlTextarea1" class="block text-gray-700 font-bold mb-2">材料</label>
      <textarea name="content" rows="5" placeholder="材料を書きましょう" class="w-full px-3 py-2 border rounded-lg shadow-sm focus:outline-none focus:ring-2 focus:ring-blue-600 focus:border-transparent"></textarea>
    </div>
    <div>
      <label for="exampleFormControlTextarea1" class="block text-gray-700 font-bold mb-2">メモ</label>
      <textarea name="memo" rows="5" placeholder="メモを残しましょう" class="w-full px-3 py-2 border rounded-lg shadow-sm focus:outline-none focus:ring-2 focus:ring-blue-600 focus:border-transparent"></textarea>
      <button type="submit" onclick="showPopup()" class="mt-4 w-full inline-flex justify-center rounded-md border border-transparent shadow-sm px-4 py-2 bg-blue-600 text-base font-medium text-white hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-blue-600 sm:mt-0 sm:ml-3 sm:w-auto sm:text-sm">
  保存！
</button>



<div id="popup" class="fixed top-0 left-0 right-0 bottom-0 flex items-center justify-center hidden">
  <div class="bg-white rounded-lg shadow-lg p-4">
  <p class="text-lg font-medium text-blue-800 font-bold text-center">登録中です</p>

  </div>
</div>



<script>
  function showPopup() {
    // ポップアップの要素を取得
    const popup = document.getElementById('popup');
    // ポップアップを表示
    popup.classList.remove('hidden');
    // 3秒後にポップアップを非表示にする
    setTimeout(function() {
      popup.classList.add('hidden');
    }, 3000);
  }
</script>

    </div>
  </form>
</div>

@endsection
