<?php session_start(); ?>
<!doctype html>
<html>

<head>
    <meta charset="UTF-8">
    <title>CampTrek | Home</title>
    <link rel="icon" 
      type="image/png" 
      href="/images/favicon.png" />
    <?php include( 'scripts.php'); ?>
</head>

<body>
    <div id="myHeader">
        <?php include( 'includes/header.php'); ?>
    </div>
    <div class="container-fluid" id="bg-img">
        <h1 class="text-center">Welcome to CampTrek!<small> Let's plan your next trip!</small></h1>
    </div>
    <?php include( 'includes/footer.php'); ?>
</body>
<?php include('modal.php'); ?>
</html>