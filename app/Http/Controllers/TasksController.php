<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Task;
use App\ChildTask;

class TasksController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
     //トップページ　マイタスク一覧表示
    public function index()
    {
        $tasks=Task::paginate(25);
        
        return view('tasks.index',[
            'tasks'=>$tasks,
            ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
     //新規タスク投稿画面表示
    public function create()
    {
        $task=new Task;
        return view('tasks.create',[
            'task'=>$task,
            ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
     //新規タスク保存処理
    public function store(Request $request)
    {
        
        $this->validate($request,[
            'content'=>'required|max:191',
            'memo'=>'max:191',
            ]);
            
            
        $task=new Task;
        $task->user_id=null;
        $task->content=$request->content;
        $task->status=$request->status;
        $task->deadline=$request->deadline;
        $task->memo=$request->memo;
        $task->save();
        
        return redirect('/');
        
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
     //タスクの詳細ページへ移管
    public function show($id)
    {
        
        $task=Task::find($id);
        $childtasks=ChildTask::all();
        $childTasks=$childtasks->where('parent_id',$task->id);
        $finishedChildTasks = $childtasks->where('parent_id',$task->id)->where('status','完了')->count();
        
        if($childTasks->count() ==0)
        {
            $progress=0;
            
        }else{
            
            $progress = round(($finishedChildTasks/$childTasks->count()) * 100);

        }
        
        if($task->status == '完了')
        {
             $progress=100;   
        }
        
        return view('tasks.show',[
            'task'=>$task,
            'childTasks'=>$childTasks,
            'progress'=>$progress,
            ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
     //タスク更新ページへ移管
    public function edit($id)
    {
            
            $task=Task::find($id);
            
            return view('tasks.edit',[
                'task'=>$task,
                ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
     //タスク更新ボタンが押された時の処理
    public function update(Request $request, $id)
    {
        
            $task=Task::find($id);
            $task->content=$request->content;
            $task->deadline=$request->deadline;
            $task->status=$request->status;
            $task->save();
        
        return redirect('/');
        
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
     //タスク削除の処理
    public function destroy($id)
    {
            
        $task=Task::find($id);
        $task->delete();
        
        return redirect('/');
    }
    
    public function destroyChildTask($id)
    {
        $task=ChildTask::find($id);
        $task->delete();
        
        return redirect('/');
    }
    
    public function createChildTask($id) //$idは親タスクのid
    {
       $task=new ChildTask;
        return view('tasks.create',[
            'task'=>$task,
            'parentTaskId' => $id
        ]);
    }
    
    public function storeChildTask(Request $request,$parentTaskId){
         $this->validate($request,[
            'content'=>'required|max:191',
            'memo'=>'max:191',
            ]);
            
            
        $task=new ChildTask;
        $task->content=$request->content;
        $task->status=$request->status;
        $task->deadline=$request->deadline;
        $task->memo=$request->memo;
        $task->parent_id=$parentTaskId;
        
        $parentTask=Task::find($parentTaskId);
        $parentTask->child_id=$task->id;
        
        $task->save();
        
        return redirect()->route('tasks.show',['id'=>$parentTaskId]);
    }
    
     public function editChildTask($id)
    {
            $task=ChildTask::find($id);
            $parentTask=Task::find($task->parent_id);
            
            if($parentTask==null)
            {
                return redirect('/');
            
            }
            return view('tasks.edit',[
                'task'=>$task,
                'parentTaskId' => $id
                ]);    
    }
    
    public function updateChildTask(Request $request,$id){
        $task=ChildTask::find($id);
        $parentTask=Task::find($task->parent_id);
        if($parentTask==null)
        {
            return redirect('/');
        }
        $task->content=$request->content;
        $task->deadline=$request->deadline;
        $task->status=$request->status;
        $task->memo=$request->memo;
        $task->save();
        return redirect()->route('tasks.show',['id' => $task->parent_id]);   
        
        
    }
    
    public function added(Request $request,$id) //$idの値はAddボタンを押したタスクのid
    {
        if(\Auth::check()){
            
        $user=\Auth::user();
        
        $task=Task::find($id);
        $task->user_id=$user->id;
        $task->save();
        }
        return redirect('/');
    }
    
    public function un_added(Request $request,$id)
    {
        if(\Auth::check()){
            $auth_user=\Auth::user();
            $user=Task::find($id)->user();
            
            //if($auth_user == $user) //ここでログインユーザーと紐づいているユーザーが同一か確認する。
            //{
                $task=Task::find($id); 
                $task->user_id=null;
                $task->save();
            //}
            
            return redirect('/');
            
        }
    }
    
    
    public function ShowChildTask($id)
    {
        $task=ChildTask::find($id);
        $parentTask=Task::find($task->parent_id);
        
        if($parentTask==null)
        {
            return redirect('/');  
        }
        
        return view('tasks.child_tasks.show',[
            'task'=>$task,
            ]);
        
        
            
    }
}
