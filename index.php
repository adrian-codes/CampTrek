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
        <h1 class="text-center">Welcome to CampTrek!<small> Let's plan your next trip!</small></h1>
        <div class="col-md-5 col-md-offset-1 textBackground">
            <p>CampTrek is a platform for camping beginners and experts to find campsites, share photos, tips/tricks and reviews of campsites.</p>
            <h3 class="text"><span class="label">Step 1:</span> <a href="findcampsites.php">Find a campsite</a></h3>

            <h3><span class="label">Step 2:</span> <a href="reviews.php">Read Reviews</a></h3>

            <h3><span class="label">Step 3:</span> <a href="http://www.lovetheoutdoors.com/camping/checklists.htm" target="_blank">Get Prepared</a></h3>
            <h3><span class="label">Go Camping!</span></h3>

        </div>
        <div class="col-md-5 col-md-offset-1 textBackground">
            <div>
                <h3>Join the Community</h3>
                <p>Become a part of the CampTrek community and help others by leaving reviews of campsites, posting pictures, and sharing your words of wisdom.</p>
            </div>
            <?php include( 'signup.php'); ?>
        </div>
    </div>
    <?php include( 'includes/footer.php'); ?>
</body>
<?php include( 'modal.php'); ?>

</html>