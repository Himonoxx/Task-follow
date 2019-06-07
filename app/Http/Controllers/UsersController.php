<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\User;
use App\Task;

class UsersController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
     //ユーザー一覧表示
    public function index()
    {
       
        $users=User::orderBy('id','desc')->paginate(10);
        
        
        
        

        $data=[
            'users'=>$users,
            ];
            
            
        return view('users.index',$data);
            
        
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $user=User::find($id);
        $tasks=$user->tasks();
        
        if($tasks->count() ==0)
        {
            $progress=0;
        }
        else
        {
            $all_tasks=$tasks->count();
            $comp_tasks=$tasks->where('status','完了')->count();
            $progress= ($comp_tasks == 0) ? 0 : ($comp_tasks/$all_tasks)*100;
        }

       
        
        return view('users.show',[
            'user'=>$user,
            'tasks'=>$tasks,
            'progress'=>$progress,
            ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
    
    public function progress($id)
    {
         $user=User::find($id);
        $tasks=$user->tasks();
        
        if($tasks->count() ==0)
        {
            $progress=0;
        }
        else
        {
            $all_tasks=$tasks->count();
            $comp_tasks=$tasks->where('status','完了')->count();
            $progress= ($comp_tasks == 0) ? 0 : ($comp_tasks/$all_tasks)*100;
        }
        
        return $progress;
    }
}
