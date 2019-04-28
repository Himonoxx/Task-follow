@extends('layouts.app')

@section('content')
    <div class="center jumbotron">
        <div class="text-center">
            <h1>日々のタスクに利便性と感動を。</h1>
            {!! link_to_route('signup.get', 'Sign up now!', [], ['class' => 'btn btn-lg btn-dark']) !!}
        </div>
    </div>
@endsection