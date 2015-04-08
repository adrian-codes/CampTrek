<?php
session_start();
$id = $_SESSION['userinfo']['id'];
    $outputArray = [];
    $errorArray = [];
    //array to store keys&values for sql query
    $values = [];

    //image upload
    if(isset($_FILES['fileToUpload'])){
        $target_dir = "images/";
        $filename = 'user'.$id.'avatar.jpg';
        $target_file = $target_dir.$filename;
        //flag to check if ok to upload file
        $upload_ok = false;
        //array to hold allowable extensions 
        $extension_array = ['jpg', 'jpeg', 'png', 'gif', 'image/jpeg'];

            if($_FILES['fileToUpload']['error'] > 0){
                $upload_ok = false;
                $errorArray['fileupload'] =  "There was an error with your upload.";
            }
            if($_FILES['fileToUpload']['size'] > 5000000){
                $upload_ok = false;
                $errorArray['filesize'] =  "File size is too big.";   
            }
            if(in_array($_FILES['fileToUpload']['type'], $extension_array)){
                $upload_ok = true;  
            } else{
             $errorArray['filetype'] =  "Not a valid type!";   
            }
            if($upload_ok){
                if(move_uploaded_file($_FILES['fileToUpload']['tmp_name'], $target_file)){
                    $values[]= "`avatar_url`='$target_file'";
                    $outputArray['image'] =   "Profile image has been updated.";    
                }         
            }
    }

    //data from inputs
    if(isset($_POST)){

        //updated username
        if($_POST['username']){
            //store and sanitize username
            $username = $_POST['username'];
            $username = htmlentities($username);
            $username = stripslashes($username);
            $values[]= "`username`='$username'";
        }
        //updated email
        if($_POST['email']){
            //store, sanitize and validate email
            $email = $_POST['email'];
            $email = filter_var($email, FILTER_SANITIZE_EMAIL);
            if (!filter_var($email, FILTER_VALIDATE_EMAIL) === false) {
                 $values[]= "`email`='$email'";
            } else {
                 $errorArray['email'] = "$email is not a valid email address";
            }   
        }
        $values = join(", ", $values);
        require_once('mysql_connect.php');
        $sql = "UPDATE users SET $values WHERE id=$id;";

        if($results = mysqli_query($con, $sql)){
        //if user was updated successfully
        if(mysqli_affected_rows($con) > 0){
            $outputArray['success'] = "true";
            $outputArray['url']= "$target_file";
            echo json_encode($outputArray);
            
            }
        }
        else{
            //user was not updated in db
            $errorArray[] = mysqli_error($con);
            echo json_encode($errorArray);
        }
    }

?>