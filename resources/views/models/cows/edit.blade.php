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
        <h1>Cows Edit Page</h1>
        <br>
        <form action="/cows/{{$cow->id}}" method="POST" class="form-horizontal">
            <input type="hidden" name="_method" value="PUT">
            <input type="hidden" name="_token" value="{{ csrf_token() }}">
            <div class="form-group">
                <label for="id">Id:</label>
                <input type="text" name="id" value="{{$cow->id}}" class="form-control">
            </div>
            <div class="form-group">
                <label for="name">Name:</label>
                <input type="text" name="name" value="{{$cow->name}}" class="form-control">
            </div>
            <div class="form-group">
                <label for="deleted_at">DeletedAt:</label>
                <input type="text" name="deleted_at" value="{{$cow->deleted_at}}" class="form-control">
            </div>
            <div class="form-group">
                <label for="created_at">CreatedAt:</label>
                <input type="text" name="created_at" value="{{$cow->created_at}}" class="form-control">
            </div>
            <div class="form-group">
                <label for="updated_at">UpdatedAt:</label>
                <input type="text" name="updated_at" value="{{$cow->updated_at}}" class="form-control">
            </div>
            <div class="form-group">
                <label for="user_id">UserId:</label>
                <input type="text" name="user_id" value="{{$cow->user_id}}" class="form-control">
            </div>

            <div class="form-group">
                <button class="btn btn-primary pull-right">Submit</button>
            </div>
        </form>

        <form action="/cows/{{$cow->id}}" method="POST" class="form-horizontal margin-top-minus-50px">
            <input type="hidden" name="_method" value="DELETE">
            <input type="hidden" name="_token" value="{{ csrf_token() }}">
            <div class="form-group">
                <button class="btn btn-danger pull-right">Delete</button>
            </div>
        </form>
    </body>
</html>