<x-app-layout></x-app-layout>
<body>

<h1>やることリストのふりわけ</h1>
<p>終わったら完了ボタンを押しましょう</p>

<div class="dolist_box">
<h2>やること</h2>
<table>
<thead>
  <tr>
    <td>プラン名</td>
    <td>予定日</td>
    <td></td>
    <td></td>
  </tr>
</thead>

@foreach ($todos as $todo)
 @if($todo->status==false)
  <tr>
    <td>{{$todo->title}}</td>
    <td>{{$todo->due_date}}</td>
    <td>
    <form action="/todos/{{$todo->id}}" method=post>
    @csrf
    @method('PUT')
    <input type="hidden" name="status" value="{{$todo->status}}">
      <button type="submit">完了</button>
    </td>
    </form>
    <td><a href="/todos/{{ $todo->id }}/edit"><button>編集</button></a></td>
  </tr>
  @endif
@endforeach
</table>
</div>

<div class="dolist_box">
<h2>終わったこと</h2>

<table>
<thead>
  <tr>
    <td>プラン名</td>
    <td>完了日</td>
    <td></td>
  </tr>
</thead>
@foreach ($todos as $todo)
 @if($todo->status==true)
  <form action="/todos/{{$todo->id}}" method=post>
    @csrf
    @method('PUT')
  <tr>
    <td>{{$todo->title}}</td>
    <td>{{$todo->updated_at->format('Y-m-d')}}</td>
    <td>
    <form onsubmit="return deleteTodo();"
      action="/todos/{{ $todo->id }}" method="post">
      @csrf
      @method('DELETE')
      <button>削除する</button>
    </form>
    </td>
  </tr>
  @endif
@endforeach
</table>
</div>

  <!-- flatpickrスクリプト -->
  <script src="https://npmcdn.com/flatpickr/dist/flatpickr.min.js"></script>
  <!-- 日本語化のための追加スクリプト -->
  <script src="https://npmcdn.com/flatpickr/dist/l10n/ja.js"></script>
  
  <script>
    function deleteTodo() {
        if (confirm('本当に削除しますか？')) {
            return true;
        } else {
            return false;
        }
    }
  </script>
</body>













 