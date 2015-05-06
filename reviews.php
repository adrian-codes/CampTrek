<?php session_start(); ?>
<!doctype html>
<html>
<head>
    <meta charset="UTF-8">
    <title>CampTrek | Reviews</title>
    <?php include('scripts.php'); ?>
</head>
<body>
    <div id="myHeader">
    <?php include('includes/header.php'); ?>
    </div>
    <div class="container">
        <h1 class="text-center">Check out the lastest reviews.</h1><br>
        <div id="postContainer">
        
        </div>
    </div>
    <?php include( 'includes/footer.php'); ?>
</body>
    <?php include('modal.php'); ?>
</html>