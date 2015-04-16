<?php session_start(); ?>
<!doctype html>
<html>

<head>
    <meta charset="UTF-8">
    <title>CampTrek</title>
    <?php include( 'scripts.php'); ?>
</head>

<body>
    <?php include( 'includes/header.php'); ?>
    <div class="container-fluid" id="bg-img">
       
        <h1 class="text-center">Welcome to CampTrek!<small> Let's plan your next trip!</small></h1>
        <!-- login form -->
            <form class="form-horizontal col-md-4" action="loginpage.php" method="post">
                <h3>Login below</h3>
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
            <!--registration form -->
            <form class="form-horizontal col-md-4 col-md-offset-2" action="registrationadd.php" method="post">
                <h3>Not a member? Sign up here!</h3>
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
    <?php include('includes/footer.php'); ?>
</body>

</html>