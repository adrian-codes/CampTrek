<!doctype html>
<html>

<head>
    <meta charset="UTF-8">
    <title>Untitled Document</title>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.4/css/bootstrap.min.css">
    <script src="http://maps.googleapis.com/maps/api/js?libraries=places"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.4/js/bootstrap.min.js"></script>
    <script src="prototype.js"></script>
    <link type="text/css" rel="stylesheet" href="style.css">
</head>

<body>
    <div class="container">
        <h1>Welcome to the homepage!</h1>
        <form class="form-horizontal col-md-6" action="loginpage.php" method="post">
            <div class="form-group">
                <label for="inputEmail" class="col-md-2 control-label">Email</label>
                <div class="col-md-10">
                    <input type="email" name="useremail" class="form-control" id="inputEmail" placeholder="Email">
                </div>
            </div>
            <div class="form-group">
                <label for="inputPassword" class="col-md-2 control-label">Password</label>
                <div class="col-md-10">
                    <input type="password" class="form-control" id="inputPassword" name="password" placeholder="Password">
                </div>
            </div>
            <div class="form-group">
                <div class="col-md-offset-2 col-md-10">
                    <button type="submit" class="btn btn-default">Sign in</button>
                </div>
            </div>
        </form>

    </div>
</body>

</html>