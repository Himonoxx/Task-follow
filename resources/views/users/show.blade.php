@extends('layouts.app')

@section('content')
    <div class="row">
        <div class="card card-title text-light bg-info text-center col-sm-12">
            <h1>{{ $user->name }}</h1>
        </div>
      <div class="card col-sm-12">
              <ul class="list-group list-group-flush col-sm-12">
                <li class="list-group-item"><h4>@include('users.user_tasks',['user'=>$user,'tasks'=>$tasks])</h4></li>
                <li class="list-group-item"><p class="text-center">全体の進捗</p><h4><div class="progress">
                            <div class="progress-bar progress-bar-striped progress-bar-animated bg-success" role="progressbar" aria-valuenow="75" aria-valuemin="0" aria-valuemax="100" style="{{'width:'. $progress . '%'}}">{{ $progress . '%' }}</div></td></h4></li>
              </ul>
            </div>
        </div>
    </div>
@endsection