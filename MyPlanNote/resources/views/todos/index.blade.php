<x-app-layout></x-app-layout>
<body>

<div class="container index_box">
<div class="sub_box">
<h2 ><strong>プランを入力しよう！</strong></h2>
@error('title','due_date')
  <div class="mt-3">
      <p>
          {{ $message}}
      </p>
  </div>
@enderror
<form action="/todos" method="post">
  @csrf
  <table>
    <tr>
      <td><span><strong>プラン</strong></span></td>
      <td><input type="text" placeholder="プランを入力してください" name="title" /></td>
    </tr>
  </table>
  <table >
      <tr>
      <td><span><strong>予定日</strong></span></td>
      <td><input type="text" name="due_date" id="due_date" value="{{ old('due_date') }}" /></td>
    </tr>
  </table>
<button><strong>作成する</strong></button>
</form>
</div><!--side_box-->  
 
<div class="main_box">
<h1><strong>マイプランリスト</strong></h1>
<table class="table-auto">
<thead>
<tr>
<th>プラン名</th>
<th>予定日</th>
<th></th>
<th></th>
</tr>
</thead>
<!--繰り返し-->
@foreach ($todos as $todo)
<tbody>
<tr>
<td> {{ $todo->title }}</td>
<td>{{ $todo->due_date }}</td>
<td>
<div>
<!--編集ボタンは、aタグ。編集画面に遷移-->
<a href="/todos/{{ $todo->id }}/edit"><button class="green_button"><span><strong>編集</strong></span></button></a>
</div>
</td>
  
<td>
<form onsubmit="return deleteTodo();"
action="/todos/{{ $todo->id }}" method="post">
@csrf
@method('DELETE')
<button class="red_button"><span><strong>削除</strong></span></button>
</form>
</td>
</tr>
</tbody>
@endforeach
<!--繰り返し-->
</table>
</div><!--main_box-->

</div><!--main-->

<footer>
</footer>

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
    
    flatpickr(document.getElementById('due_date'), {
      locale: 'ja',
      dateFormat: "Y/m/d",
      minDate: new Date()
    });
</script>
</body>

