<x-app-layout></x-app-layout>
<body>

<div class="container index_box">
  
<div class="sub_box">
<h2 >プランを入力しよう！</h2>
@error('title','due_date')
  <div class="mt-3">
      <p>
          {{ $message}}
      </p>
  </div>
@enderror
<form action="/todos" method="post">
  @csrf
<div class="plan_create">
<label>プラン</label><input type="text" placeholder="プランを入力してください" name="title" />
<label>予定日</label>
<input type="text" name="due_date" id="due_date" value="{{ old('due_date') }}" /></br>
</br><button>作成する</button>
</div>
</form>
</div><!--side_box-->  
 
<div class="main_box">
<h1 >マイプランリスト</h1>
<table class="table-auto">
<thead>
<tr>
<th>プラン名</th>
<th>予定日</th>
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
<a href="/todos/{{ $todo->id }}/edit"><button>編集</button></a>
</div>
</td>
  
<td>
<form onsubmit="return deleteTodo();"
action="/todos/{{ $todo->id }}" method="post">
@csrf
@method('DELETE')
<button>削除</button>
</form>
</td>
</tr>
</tbody>
@endforeach
<!--繰り返し-->
</table>
</div><!--main_box-->

</div><!--main-->

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

