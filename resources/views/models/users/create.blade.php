<!DOCTYPE html>
<html>
    <head>
        <title>Base</title>
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.2/css/bootstrap.min.css" integrity="sha384-PsH8R72JQ3SOdhVi3uxftmaW6Vc51MKb0q5P2rRUpPvrszuE4W1povHYgTpBfshb" crossorigin="anonymous">
        <link rel="stylesheet" href="/font-awesome/css/font-awesome.min.css">

        <link rel="stylesheet" href="/css/app.css">
        <link rel="stylesheet" href="/css/custom.css">
    </head>
    <body class="container">
        <div id="app">
            <users-create v-state="{{$state}}"></users-create>
        </div>
    </body>
</html>

<script src="/js/app.js"></script>