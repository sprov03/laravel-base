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
        <h1>[[ModelNames]] Index Page</h1>
        <table class="table table-striped">
            <thead>
                <tr>
<?php foreach ($columns as $column): ?>
                    <th><?=$column->Field?></th>
<?php endforeach; ?>
                    <th>actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach($[[model_names]] as $[[model_name]])
                    <tr>
<?php foreach ($columns as $column): ?>
                        <td>{{$[[model_name]]-><?=$column->Field?>}}</td>
<?php endforeach; ?>
                        <td><a href="/[[model_names]]/{{$[[model_name]]->id}}/edit" class="btn btn-primary">Edit</a></td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </body>
</html>