<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;

class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;
    
    public function counts($user){
        $count_tasks=$user->tasks()->count();
        
        return [
            'count_tasks'=>$count_tasks,
            ];
    }
    
    public function pankuzu($route_name)
    {
        $menu=[
            'tasks.show'=>'[Parent]' . $task->content,
            'show.childtask'=>'[Child]' . $task->content,
            'edit.childtask'=>'編集',
            'tasks.create'=>'[Parent] 新規作成',
            'create.childtask'=>'[Child] 新規作成',
            'users.index'=>'ユーザー一覧',
            'users.show'=>$user->name,];
            
        //$route_nameから現在のルート名を取得して$menuとマッチングする。
        //でも以前のルート名はどうやって表示させる…？
        
        
        
    }
   
}
