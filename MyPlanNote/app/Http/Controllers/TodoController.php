<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Todo;//追加
use App\Models\User;//追加

class TodoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
       $todos = Todo::where('status',false)->get();
       return view('todos.index',compact('todos'));
    }
    
    public function devide()
    {
       $todos = Todo::all();
       return view('todos.devide',compact('todos'));
    }
  
    

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
          // バリデーション
          $rules = [
            'title' => 'required|max:30',
          ];
        
          $messages = ['required' => '必須項目です', 'max' => '30文字以下にしてください。'];
          Validator::make($request->all(), $rules, $messages)->validate();
          
          // 新規作成
          $todo = new Todo;
         
          //データを割り当てる
          $todo->title = $request->input('title');
          $todo->due_date = $request->input('due_date');
          $todo->user_id = $request->user()->id;
        
          //保存
          $todo->save();
          //リダイレクト
          return redirect('/todos');
        }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {}

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
      $todo = Todo::find($id);
      return view('todos.edit',compact('todo'));
      
    }
  
  

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        
      if($request->status===null){
        //バリデーション
        $rules = [
          'title' => 'required|max:30',
          'due_date'=> 'required'
        ];
      
        $messages = ['required' => '必須項目です', 'max' => '30文字以下にしてください。'];
        Validator::make($request->all(), $rules, $messages)->validate();
        
      // 編集ボタンを押した時
      
      // 該当データを検索
        $todo=Todo::find($id);
        
        // データの割り当て
        $todo->title = $request->input('title');
        $todo->due_date = $request->input('due_date');
        $todo->save();
        return redirect('/todos');

      }else{
        // 完了ボタンを押した時
        $todo = Todo::find($id);
        // データの割り当て。true:完了、false:未完了
        $todo->status = true;
         //データベースに保存
        $todo->save();
        return redirect('/todos_devide');
      }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
     
    public function destroy($id)
    {
      $todo=Todo::find($id);
    if($todo->status===false){
        $todo->delete();
        return redirect('/todos');
      }else{
        $todo->delete();
        return redirect('/todos_devide');
        
      }
    }
    
}
