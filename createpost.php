<?php session_start(); ?>
<!doctype html>
<html>
<head>
    <meta charset="UTF-8">
    <title>CampTrek | Post Review</title>
    <?php include('scripts.php'); ?>
</head>
<body>
    <div id="myHeader">
    <?php include( 'includes/header.php'); ?>
    </div>
    <div class="container">
        <h2>Step One: Submit Review</h2>
        <form  action="storepost.php" method="post" class="form-horizontal col-md-6">
            <div class="form-group">
                <label for="Category" class="col-md-4 control-label">Campground</label>
                <div class="col-md-8">
                    <input type="text" name="campground" class="form-control" placeholder="Campground name">
                </div>
            </div>
           <div class="form-group">
                <label for="Date" class="col-md-4 control-label">Date</label>
                <div class="col-md-8">
                    <input type="text" name="date" class="form-control" placeholder="mm/dd/yyyy">
                </div>
            </div>
            <div class="form-group">
                <label for="Category" class="col-md-4 control-label">Category</label>
                <div class="col-md-8">
                    <input type="text" name="category" class="form-control" placeholder="e.g. Hiking">
                </div>
            </div>
            <div class="form-group">
                <label for="Rating" class="col-md-4 control-label">Rating</label>
                <div class="col-md-8">
                    <input type="text" name="rating" class="form-control" placeholder="Rating">
                </div>
            </div>
            <div class="form-group" id="textareaform">
                <label for="Summary" class="col-md-4 control-label">Summary</label>
                <div class="col-md-8">
                    <textarea class="form-control" rows="8" name="summary" placeholder="Tell us about your trip..."></textarea>
                </div>
            </div>
            <div class="form-group" id="textareaform">
                <label for="Tips & Tricks" class="col-md-4 control-label">Tips &amp; Tricks</label>
                <div class="col-md-8">
                    <textarea class="form-control" rows="8" name="tips_tricks" placeholder="Tips & tricks..."></textarea>
                </div>
            </div>
            <button type="submit" name="submitbutton" value="submit" class="btn btn-default" id="form_submit_button">Submit</button>
        </form>
    </div>
    <?php include( 'includes/footer.php'); ?>
</body>
</html>