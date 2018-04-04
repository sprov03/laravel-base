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
        <h1>[[ModelNames]] Edit Page</h1>
        <br>
        <form action="/[[model_names]]" method="PUT" class="form-horizontal">
            <div class="form-group">
<?php foreach ($columns as $column): ?>
                <div class="form-control">
                    <label for="<?=$column->Field?>"><?=studly_case($column->Field)?>:</label>
                    <input type="text" name="<?=$column->Field?>" value="{{$[[model_name]]-><?=$column->Field?>}}" class="form-control">
                </div>
<?php endforeach; ?>
            </div>

            <div class="form-group">
                <button class="btn btn-primary pull-right">Submit</button>
                <a href="/[[model_names]]/{{$[[model_name]]->id}}/delete" class="btn btn-danger pull-left">Delete</a>
            </div>
        </form>
    </body>
</html>