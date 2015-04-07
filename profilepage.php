<?php session_start() ?>
<!doctype html>
<html>

<head>
    <meta charset="UTF-8">
    <title>CampTrek | Profile Page</title>
    <?php include( 'scripts.php'); ?>
</head>

<body>
    <?php include( 'includes/header.php'); ?>
    <div class="container">
        <div id="profileinfo">
            <h4>Member Since: <small id="date_created"></small></h4>
            <h4>Last Login: <small id="last_login"></small></h4>
            <form action="storepost.php" method="post" class="form-horizontal col-md-6">
                <div class="form-group">
                    <label for="username" class="col-md-2 control-label">Username</label>
                    <div class="col-md-10">
                        <input type="text" name="username" class="form-control" id="username">
                    </div>
                </div>
                <div class="form-group">
                    <label for="email" class="col-md-2 control-label">Email</label>
                    <div class="col-md-10">
                        <input type="text" name="email" class="form-control" id="email">
                    </div>
                </div>
            </form>
            <div id="profileImage" class="col-md-8">
            </div>
            <form class="form-horizontal col-md-6" action="uploadphotos.php" method="post" enctype="multipart/form-data">
                <h4 class="col-md-12">Select a new profile image!</h4>
                <input type="file" name="fileToUpload" id="fileToUpload">
                <br>
                <input class="btn btn-default" type="button" value="Apply Changes" name="submit">
            </form>
        </div>
    </div>
</body>

</html>