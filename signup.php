<?php session_start(); ?>
<!doctype html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Untitled Document</title>
    <?php include('scripts.php'); ?>

</head>
<body>
    <?php include( 'includes/header.php'); ?>
    <div class="container">
        <h3 class="col-md-12">Sign up!<small>&nbsp;If successful you will be redirected to login page.</small></h3>
        <form class="form-horizontal col-md-6" action="registrationadd.php" method="post">
            <div class="form-group">
                <label for="inputUsername" class="col-md-2 control-label">Username</label>
                <div class="col-md-10">
                    <input type="text" name="username" class="form-control" id="inputUsername" placeholder="Username">
                </div>
            </div>
            <div class="form-group">
                <label for="inputEmail" class="col-md-2 control-label">Email</label>
                <div class="col-md-10">
                    <input type="email" name="useremail" class="form-control" id="inputEmail" placeholder="Email">
                </div>
            </div>
            <div class="form-group">
                <label for="inputPassword" class="col-md-2 control-label">Password</label>
                <div class="col-md-10">
                    <input type="password" name="password" class="form-control" id="inputPassword" placeholder="Password">
                </div>
            </div>
            <div class="form-group">
                <div class="col-md-offset-2 col-md-10">
                    <button type="submit" class="btn btn-default">Register</button>
                </div>
            </div>
        </form>
    </div>
</body>
</html>