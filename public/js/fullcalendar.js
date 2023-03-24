//  document.addEventListener('DOMContentLoaded', function() {
//                 var calendarEl = document.getElementById('calendar');
//                 var calendar = new FullCalendar.Calendar(calendarEl, {
//                     initialView: 'dayGridMonth',    //  'dayGridMonth' 'dayGridWeek''timeGridDay' 'listWeek'などのカレンダースタイルもある
//                     locale: 'ja',                   // ja:日本語
//                     firstDay: 1,　　　　　　　　　　// firstDay:開始曜日を設定　0(日曜日)〜6(土曜日)
//                     headerToolbar: {
//                         left: "dayGridMonth,listMonth",　　// headerToolbarはカレンダー上部の「表示切り替え」「タイトル」「日付切り替え」を設定
//                         center: "title",
//                         right: "today prev,next"
//                     },
//                     buttonText: {
//                         today: '今月',
//                         month: '月',
//                         list: 'リスト'
//                     },
//                     noEventsContent: 'スケジュールはありません',　// noEventsContent：リスト表示時にイベントが１件もないときのテキストを設定
                     
//                       eventSources: [          // ←★追記
//                       {
//                         @foreach
//                           title: '打ち合わせ',
//                           start: '2021-02-04',
//                           allDay : true,
//                           constraint: '予定１',
//                           color: '#257e4a',
//                         },
//                     ],
                    
//                     eventSourceFailure () { // ←★追記　eventSourceFailure:読み込み失敗時
//                       console.error('エラーが発生しました。');
//                     },
                    
//                     eventMouseEnter (info) { // ←★追記
//                       $(info.el).popover({
//                         title: info.event.title,
//                         content: info.event.extendedProps.description,
//                         trigger: 'hover',
//                         placement: 'top',
//                         container: 'body',
//                         html: true
//                       });
//                     }
                    
//                  });
                 
//                  calendar.render();
//             });
            
            
            
//             document.addEventListener('DOMContentLoaded', function() {
//     var calendarEl = document.getElementById('calendar');

//     var calendar = new FullCalendar.Calendar(calendarEl, {
//         plugins: [ 'interaction', 'dayGrid' ],
//         //プラグイン読み込み
//         defaultView: 'dayGridMonth',
//         //カレンダーを月ごとに表示
//         editable: true,
//         //イベント編集
//         firstDay : 1,
//         //秋の始まりを設定。1→月曜日。defaultは0(日曜日)
//         eventDurationEditable : false,
//         //イベントの期間変更
//         selectLongPressDelay:0,
//         // スマホでタップしたとき即反応
//         events: [
//             {
//                 title: 'イベント',
//                 start: '2019-01-01'
//             }
//         ],
//         //一旦イベントのサンプルを表示。動作確認用。

//         eventDrop: function(info){
//         //eventをドラッグしたときの処理
//              //editEventDate(info);
//             //あとで使う関数
//         },

//         dateClick: function(info) {
//         //日付をクリックしたときの処理
//             //addEvent(calendar,info);
//             //あとで使う関数
//         },
//     });
//     calendar.render();
// });
