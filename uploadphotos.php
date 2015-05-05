
<?php session_start(); ?>
<!doctype html>
<html>

<head>
    <meta charset="UTF-8">
    <title>CampTrek | Upload Photos</title>
    <?php include( 'scripts.php'); ?>
</head>

<body>
    <?php include( 'includes/header.php'); ?>
    <div class="container">
        <h2 class="col-md-12">Step Two: Upload Your Photos</h2>
        <form class="form-horizontal col-md-6" action="uploadphotos.php" method="post" enctype="multipart/form-data">
            <h4 class="col-md-12">Select image to upload with your review!</h4>
            <input type="file" name="fileToUpload" id="fileToUpload">
            
            <br>
            <div class="form-group">
            <label for="Description" class="col-md-2 control-label">Caption</label>
            <div class="col-md-10">
                <input type="text" name="description" class="form-control" placeholder="Caption your photo...">
            </div>
            </div>
            <input class="btn btn-default" type="submit" value="Upload File" name="submit">
        </form>
<?php
    require_once('mysql_connect.php');
    $userID = $_SESSION['userinfo']['id'];
    
    //check if file has been submitted
    if(isset($_FILES['fileToUpload'])){
        
        $src_id = $_SESSION['bloginfo']['src_id'];
        $src_type = $_SESSION['bloginfo']['src_type'];
        $target_dir = "images/";
        $filename = md5($_FILES['fileToUpload']['name']);
        $target_file = $target_dir.$filename;
        $photoDesc = $_POST['description'];
        
        //sql query to insert into db
        $sql = "INSERT INTO images (`src_id`, `src_type`, `photoURL`, `photoDesc`, `author_id`) VALUES('$src_id', '$src_type', '$target_file', '$photoDesc', '$userID');";
        
        //flag for status of upload
        $upload_ok = true;
        //valid extensions
        $extension_array = ['jpg', 'jpeg', 'png', 'gif'];
            
            //if there are erros
            if($_FILES['fileToUpload']['error'] > 0){
                $upload_ok = false;
                echo "There was an error with your upload.";
            }
            //if file already exists
            if(file_exists($target_dir.$filename)){
                $upload_ok = false;
                echo "This filename already exists.";
            }
            //if file size is too big
            if($_FILES['fileToUpload']['size'] > 5000000){
                $upload_ok = false;
                echo "File size is too big.";   
            }
            //if file extension matches extensions in array
            if(in_array($_FILES['fileToUpload']['type'], $extension_array)){
            $upload_ok = true;  
            }
            //if passes all error ehcking move file to images folder
            if($upload_ok){
                if(move_uploaded_file($_FILES['fileToUpload']['tmp_name'], $target_file)){
                    //display uplaoded file with button to check out post
                    echo "The file ".$_FILES['fileToUpload']['name']." has been uploaded.<br><br><br><br><a href='review.php' class='btn btn-success' role='button'>Click here to check out your post!</a><br><br><br><br><div class='photoDiv col-md-8'><img class='img-responsive' alt='image' src='$target_file'/></div>";  
                }
                else{
                    print("Error saving file.");
                    }
                if($result = mysqli_query($con, $sql)){
                    //if inserted properly into db echo success
                    if(mysqli_affected_rows($con) > 0){
                    echo "File successfuly added to database";   
                    }
                }
                //if file not uploaded echo error
                else{
                    echo "Sorry, there was an error uploading your file.";   
                }          
            }
    }

?>
    </div>
</body>
</html>