<?php session_start(); ?>
<!doctype html>
<html>

<head>
    <meta charset="UTF-8">
    <title>CampTrek | About</title>
    <?php include( 'scripts.php'); ?>
</head>

<body id="bodyColor">
    <div id="myHeader">
        <?php include( 'includes/header.php'); ?>
    </div>
    <div class="container-fluid" id="bg-img">
        <div class="col-md-10 col-md-offset-1">
            <h1 class="text-center"><span class="textBackground">A little about CampTrek</span></h1><br>
            <p class="text-justify textBackground">Camping is one of America’s favorite pastimes. There are 58 national parks in the US, with 9 alone in California and over 13,000 campgrounds in the US. But there is no website for camping enthusiasts to share their camping experiences with others.</p>
            <p class="text-justify textBackground">Many times I have went to a new national park not know what to expect and how to prepare, leaving me wishing I had brought certain items to make the experience more pleasurable. My website is aimed at both beginning and expert campers as a platform to share photos, reviews of campgrounds, tips, tricks and other helpful information. This will help with preparing for trips along with a social twist where you can post photos of your trip. </p>
        </div>
    </div>
    <?php include( 'includes/footer.php'); ?>
</body>
<?php include( 'modal.php'); ?>

</html>