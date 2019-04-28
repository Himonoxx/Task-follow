<!DOCTYPE html>
<html lang="ja">
    <head>
        <meta charset="utf-8">
        <title>TaskFollow</title>
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/css/bootstrap.min.css">
        <link href="https://fonts.googleapis.com/css?family=M+PLUS+Rounded+1c" rel="stylesheet">
    </head>

    <body>

        @include('commons.navbar')
        
        <div class="container">
            @include('commons.error_messages')
            
            @yield('content')
        </div>
        
        <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.6/umd/popper.min.js"></script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/js/bootstrap.min.js"></script>
        <script defer src="https://use.fontawesome.com/releases/v5.7.2/js/all.js"></script>
        <script src="https://code.jquery.com/jquery-1.10.2.min.js" type="text/javascript" language="javascript"></script>
        <script src="../common/js/bootstrap.js"></script>
        <link rel="stylesheet" href="../common/css/bootstrap.css">
        <link href="//netdna.bootstrapcdn.com/font-awesome/4.0.3/css/font-awesome.min.css" rel="stylesheet">
        <link rel="stylesheet" type="text/css" href="bootstrap-datepicker/css/bootstrap-datepicker.min.css">
        <script type="text/javascript" src="bootstrap-datepicker/js/bootstrap-datepicker.min.js"></script>
        <script type="text/javascript" src="bootstrap-datepicker/locales/bootstrap-datepicker.ja.min.js"></script>
        
        <link rel="stylesheet" href="/css/fonts.css">
    </body>
</html>