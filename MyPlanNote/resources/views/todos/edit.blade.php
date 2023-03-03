<x-app-layout></x-app-layout>
<body>
<h1>プラン編集</h1>
@error('title','due_date')
  <div class="mt-3">
      <p>{{ $message}}</p>
  </div>
@enderror
<div class="edit_box">
<form action="/todos/{{$todo->id}}" method="POST">
  @csrf
  @method('PUT')
  <div class="plan_create">
    <label>プラン</label><input type="text" value="{{$todo->title}}" name="title" />
    <label>予定日</label>
    <input type="text"  name="due_date" id="due_date" value="{{ $todo->due_date }}" /></br>
    </br><button type="submit">編集する</button>
    <a href="/todos"><p>戻る</p></a>
  </div>
</form>
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

