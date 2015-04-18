<?php
    session_start();
    $errorArray = [];
    //if post set then register user to blog db
    if(isset($_POST)){
        require_once('mysql_connect.php');
        if($_POST['username'] == ''){
            $errorArray['username'] = "There is no username";
        } else {
            //store and sanitize username
            $username = $_POST['username'];
            $username = htmlentities($username);
            $username = stripslashes($username);
        }
        if($_POST['useremail'] == ''){
            $errorArray['email'] = "There is no email";
        } else {
            //store, sanitize and validate email
            $useremail = $_POST['useremail'];
            $useremail = filter_var($useremail, FILTER_SANITIZE_EMAIL);
            if (!filter_var($useremail, FILTER_VALIDATE_EMAIL) === false) {
                $errorArray['useremail']="$useremail is a valid email address";
            } 
            else {
                 $errorArray['useremail']="$useremail is not a valid email address";
            }
        }
        if($_POST['password'] == ''){
            $errorArray['password'] = "There is no password";
        } else{
            $password = sha1($_POST['password']);
        }
        
        $date_created = time();
        $sql = "INSERT INTO users (username, email, password, date_created) VALUES ('$username', '$useremail', '$password', $date_created);";
        $results = mysqli_query($con, $sql);
        //if user was added successfully, set session
        if(mysqli_affected_rows($con) > 0){
            
            //reconnect to db and set session
            $loginsql = "SELECT * FROM users WHERE email='$useremail' AND password='$password'";
            $loginResults = mysqli_query($con, $loginsql);
            
            if(mysqli_num_rows($loginResults) > 0){
                $userinfo = mysqli_fetch_assoc($loginResults);
                $_SESSION['userinfo'] = $userinfo;
                ob_start();
                include('includes/header.php');
                $header_output = ob_get_contents();
                ob_end_clean();
                echo json_encode(['header'=>$header_output,
                          'success'=>true]);
            }
            else{
                //user was not found in database
                $errorArray['loginError'] = "Username/Password is incorrect";
                echo json_encode($errorArray);
            }
        }
        else{
            //user was not added into db
            print " There was a problem with the registration! ";
            $errorArray[] = mysqli_error($con);
            echo json_encode($errorArray);
        }
    }
?>