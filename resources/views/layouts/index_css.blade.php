@if(request()->path() == '/')
            <link rel="stylesheet" href="/css/fullscreen.css">
            <link rel="stylesheet" href="/css/fadein.css">
            <link rel="stylesheet" href="/css/button_index.css">
            @if(Auth::check())
            @else
                <link rel="stylesheet" href="/css/font.css">
            @endif
@endif