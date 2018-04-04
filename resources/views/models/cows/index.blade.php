<html>
    <head>
        <!-- Latest compiled and minified CSS -->
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">

        <!-- Optional theme -->
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap-theme.min.css" integrity="sha384-rHyoN1iRsVXV4nD0JutlnGaslCJuC7uwjduW9SVrLvRYooPp2bWYgmgJQIXwl/Sp" crossorigin="anonymous">

        <!-- Latest compiled and minified JavaScript -->
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>
    </head>

    <body class="container">
        <h1>Cows Index Page</h1>
        <table class="table table-striped">
            <thead>
                <tr>
                    <th>id</th>
                    <th>name</th>
                    <th>deleted_at</th>
                    <th>created_at</th>
                    <th>updated_at</th>
                    <th>user_id</th>
                    <th>actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach($cows as $cow)
                    <tr>
                        <td>{{$cow->id}}</td>
                        <td>{{$cow->name}}</td>
                        <td>{{$cow->deleted_at}}</td>
                        <td>{{$cow->created_at}}</td>
                        <td>{{$cow->updated_at}}</td>
                        <td>{{$cow->user_id}}</td>
                        <td><a href="/cows/{{$cow->id}}/edit" class="btn btn-primary">Edit</a></td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </body>
</html>