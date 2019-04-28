@extends('layouts.app')

@section('content')
    <div class="row">
        <div class="card card-title text-light bg-dark text-center col-sm-12">
            <h1>All Users</h1>
        </div>
    </div>
    <div class="row">
    @include('users.users',['users'=>$users])
    </div>
@endsection