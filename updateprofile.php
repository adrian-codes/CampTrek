<?php
session_start();
    $errorArray = [];
    //image upload
    if(isset($_FILES['fileToUpload'])){

    $target_dir = "images/";
    $filename = 'user'.$id.'avatar.jpg';
    $target_file = $target_dir.$filename;

    $upload_ok = false;
    $extension_array = ['jpg', 'jpeg', 'png', 'gif'];

        if($_FILES['fileToUpload']['error'] > 0){
            $upload_ok = false;
            echo "There was an error with your upload.";
        }
        if($_FILES['fileToUpload']['size'] > 5000000){
            $upload_ok = false;
            echo "File size is too big.";   
        }
        if(in_array($_FILES['fileToUpload']['type'], $extension_array)){
            $upload_ok = true;  
        }
        if($upload_ok){
            if(move_uploaded_file($_FILES['fileToUpload']['tmp_name'], $target_file)){
                echo "Profile image has been updated.";    
            }         
        }
    }

    //data from inputs
    if(isset($_POST)){

        //updated username
        if($_POST['username'] == ''){
            $errorArray['username'] = "There is no username";
        } else {
            //store and sanitize username
            $username = $_POST['username'];
            $username = htmlentities($username);
            $username = stripslashes($username);
            $id = $_SESSION['userinfo']['id'];
        }
        //updated email
        if($_POST['email'] == ''){
            $errorArray['email'] = "There is no email";
        } else {
            //store, sanitize and validate email
            $email = $_POST['email'];
            $email = filter_var($useremail, FILTER_SANITIZE_EMAIL);
            if (!filter_var($email, FILTER_VALIDATE_EMAIL) === false) {
                 echo("$email is a valid email address<br>");
            } else {
                 echo("$email is not a valid email address<br>");
            }   
        }
        
        $con = mysqli_connect('localhost', 'root', '', 'camptrek');
        $sql = "UPDATE users SET username='$username' WHERE id=$id;";


        if($results = mysqli_query($con, $sql)){
        //if user was updated successfully
        if(mysqli_affected_rows($con) > 0){
            header("Location: profilepage.php");
            }
        }
        else{
            //user was not updated in db
            print "There was a problem updating username";
            $errorArray[] = mysqli_error($con);
            echo json_encode($errorArray);
        }
    }

?>