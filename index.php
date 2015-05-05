<?php session_start(); ?>
<!doctype html>
<html>

<head>
    <meta charset="UTF-8">
    <title>CampTrek | Home</title>
    <?php include( 'scripts.php'); ?>
</head>

<body id="bodyColor">
    <div id="myHeader">
        <?php include( 'includes/header.php'); ?>
    </div>
    <div class="container-fluid" id="bg-img">
        <h1 class="text-center"><span class="textBackground">Welcome to CampTrek!<small> Let's plan your next trip!</small></span></h1>
        <h4 class="text-center"><span class="textBackground">CampTrek is a platform for camping beginners and experts to find campsites, share photos, tips/tricks and reviews of campsites.</span></h4><br>
        <div class="col-md-5 col-md-offset-1 textBackground">
            <h3 class="text">Step 1: Find a campsite</h3>
            
            <h3>Step 2: Get Directions</h3>
            
            <h3>Step 3: Go camping!</h3>

        </div>
        <div class="col-md-5 col-md-offset-1 textBackground">
            <div>
            <h4>Become a part of the CampTrek community and help others by leaving reviews of campsites, posting pictures, and sharing your words of wisdom.</h4>
            </div>
            <?php include('signup.php'); ?>
        </div>
    </div>
    <?php include( 'includes/footer.php'); ?>
</body>
<?php include( 'modal.php'); ?>

</html>