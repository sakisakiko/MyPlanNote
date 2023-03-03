<x-app-layout></x-app-layout>
<body>
<div class="container edit_box">
<h1><strong>プラン編集</strong></h1>
@error('title','due_date')
  <div class="mt-3">
      <p>{{ $message}}</p>
  </div>
@enderror
<div class="edit_contents">
<form action="/todos/{{$todo->id}}" method="POST">
  @csrf
  @method('PUT')
  <div class="plan_create">
    <label>プラン</label><input type="text" value="{{$todo->title}}" name="title" />
    <label>予定日</label>
    <input type="text"  name="due_date" id="due_date" value="{{ $todo->due_date }}" /></br>
    </br><div class="edit_button"><button type="submit"><span><strong>編集する</strong></span></button></div>
    <a href="/todos"><p class="return">戻る</p></a>
  </div>
</form>
</div>
</div>

  <!-- flatpickrスクリプト -->
  <script src="https://npmcdn.com/flatpickr/dist/flatpickr.min.js"></script>
  <!-- 日本語化のための追加スクリプト -->
  <script src="https://npmcdn.com/flatpickr/dist/l10n/ja.js"></script>
  
  <script>
    flatpickr(document.getElementById('due_date'), {
      locale: 'ja',
      dateFormat: "Y/m/d",
      minDate: new Date()
    });
  </script>

</body>

