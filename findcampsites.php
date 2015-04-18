<?php session_start(); ?>
<!doctype html>
<html>
<head>
    <meta charset="UTF-8">
    <title>CampTrek | Find Campsites</title>
    <?php include('scripts.php')?>
    <script src="http://maps.googleapis.com/maps/api/js?libraries=places"></script>
    <script src="findcampsites.js"></script>
    <link type="text/css" rel="stylesheet" href="style.css">
</head>
<body>
    <?php include('includes/header.php'); ?>
    <h3>Find a campsite near you!<small> Click the icon to get directions.</small></h3>
    <div class="container-fluid">
        <div id="map-canvas">

        </div>
        <button class="btn btn-default" onclick="performSearch()">Redo Search</button>
    </div>
</body>
    <?php include('modal.php'); ?>
</html>