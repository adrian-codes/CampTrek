<?php session_start(); ?>
<!doctype html>
<html>

<head>
    <meta charset="UTF-8">
    <title>CampTrek | Find Campsites</title>
    <?php include( 'scripts.php')?>
    <script src="findcampsites.js"></script>
    <link type="text/css" rel="stylesheet" href="style.css">
</head>

<body>
    <div id="myHeader">
        <?php include( 'includes/header.php'); ?>
    </div>
    <div class="container">
        <div class="row">
            <div class="col-md-6">
                <h3>Find a campsite near you!<small> Click the icon to get directions.</small></h3>
            </div>
            <div class="col-md-5 col-md-offset-1" id="searchDiv">
                <button class="btn btn-default" id="searchBtn" onclick="performSearch()">Redo Search</button>
            </div>
        </div>

        <div class="col-md-12" id="map-canvas">

        </div>

    </div>
    <?php include( 'includes/footer.php'); ?>
</body>
<?php include( 'modal.php'); ?>

</html>