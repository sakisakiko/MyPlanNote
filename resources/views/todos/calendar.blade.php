@extends('layouts.app')
@section('content')
  <!--<div class="container about_box">-->
  <!--  <h1><strong>ご利用方法</strong></h1>-->
  <!--</div>-->
<div id="app" style="padding:100px;">
  <div class="m-auto w-50 m-5 p-5" style="width:800px; height:300px; margin-left:300px">
      <div id='calendar'></div>
  </div>
</div>
  
　<!--カレンダー表示のためのscriptタグ-->
  <script src='https://cdn.jsdelivr.net/npm/fullcalendar@6.1.4/index.global.min.js'></script>
        
  <script>
    document.addEventListener('DOMContentLoaded', function() {
    　var calendarEl = document.getElementById('calendar');
      var calendar = new FullCalendar.Calendar(calendarEl, {
      initialView: 'dayGridMonth',    //  'dayGridMonth' 'dayGridWeek''timeGridDay' 'listWeek'などのカレンダースタイルもある
      locale: 'ja',                   // ja:日本語
      firstDay: 1,　　　　　　　　　　// firstDay:開始曜日を設定　0(日曜日)〜6(土曜日)
      headerToolbar: {
        left: "dayGridMonth,listMonth",　　// headerToolbarはカレンダー上部の「表示切り替え」「タイトル」「日付切り替え」を設定
        center: "title",
        right: "today prev,next"
      },
      
       buttonText: {
          today: '今月',
          month: '月',
          list: 'リスト'
      },
      
      noEventsContent: 'スケジュールはありません',　// noEventsContent：リスト表示時にイベントが１件もないときのテキストを設定
                     
      eventSources: [          // ←★追記
                      {
                        url: '/get_events',
                      },
                    ],
                    

      eventSourceFailure () { // ←★追記　eventSourceFailure:読み込み失敗時
        console.error('エラーが発生しました。');
      },
                    
      eventMouseEnter (info) { // ←★追記
        $(info.el).popover({
          title: info.event.title,
          content: info.event.extendedProps.description,
          trigger: 'hover',
          placement: 'top',
          container: 'body',
          html: true
        });
      }
    });
                 
    calendar.render();
    });
    
  </script>
  
  
  
        
                
        <!--title:カレンダーに表示するテキストです-->
        <!--description	:イベントの詳細のテキストを持たせられます。-->
         <!--カレンダー上でイベントにカーソルを合わせるとポップアップが表示させる際に表示されます。-->
        <!--start:イベントの開始日時-->
        <!--end:イベントの終了日時-->
        <!--url:カレンダー上でイベントにリンクを貼ることができます。-->
        <!--color:イベントの色を変更できます。-->
@endsection
