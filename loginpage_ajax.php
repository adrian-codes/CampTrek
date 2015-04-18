<?php
    session_start();
    require_once('mysql_connect.php');
        //error check email
        if($_POST['useremail'] == ''){
            $errorArray['useremail'] = "There is no email";
        } else {
            //store, sanitize and validate email
            $useremail = $_POST['useremail'];
            $useremail = filter_var($useremail, FILTER_SANITIZE_EMAIL);
        }
        //error check password
        if($_POST['password'] == ''){
         $errorArray['password'] = "There is no password";   
        } else{
            $password = sha1($_POST['password']);
        }
        //query database for userEmail and password
        $sql = "SELECT * FROM users WHERE email='$useremail' AND password='$password'";
        $results = mysqli_query($con, $sql);

        if(mysqli_num_rows($results) > 0){
            $userinfo = mysqli_fetch_assoc($results);
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
?>