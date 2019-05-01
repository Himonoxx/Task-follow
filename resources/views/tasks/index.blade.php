@extends('layouts.app')

@section('content')
    @if(Auth::check())
        <div class="col-sm-12">
        @include('tasks.all_tasks',['tasks'=>$tasks])
        </div>
        <div class="col-sm-12">
            <h4>{!! link_to_route('tasks.create','Add Task',null,['class'=>'btn btn-secondary col-sm-12']) !!}</h4>
        </div>
    @else
            <div class="row">
                <div class="center-jumbotron">
                    <div class="text-center"><h1>タスクに追われる毎日から卒業しませんか？</h1></div>
            
                    <p>毎日何かに追われて生きている。</br>
                    仕事で人生が終わってしまうと危機感を感じている。</br>
                    そんな人の手助けになればいいなと思って作ったタスク管理アプリです。</p>
                  
                        <div class="mx-auto button01 col-sm-5">
                            {!! link_to_route('login','Login >>',null,['class'=>'btn btn-info mx-auto btn-block rounded-pill']) !!}
                        </div>
            
                        <div class="mx-auto button02 col-sm-5">
                            {!! link_to_route('signup.get','Signup >>',null,['class'=>'btn btn-outline-info mx-auto btn-block rounded-pill']) !!}
                        </div>
                    
            
                </div>
            </div>
                
           
    
        
    @endif
@endsection
        