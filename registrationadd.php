<?php 
    $errorArray = [];
    //if post set then register user to blog db
    if(isset($_POST)){
        $con = mysqli_connect('localhost', 'root', '', 'camptrek');
        
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
                 echo("$useremail is a valid email address<br>");
            } else {
                 echo("$useremail is not a valid email address<br>");
        }
        }
        if($_POST['password'] == ''){
            $errorArray['password'] = "There is no password";
        } else{
        $password = sha1($_POST['password']);
        }
        $date_created = time();
        $sql = "INSERT INTO users (username, email, password, date_created) VALUES ('$username', '$useremail', '$password', $date_created);";
        print "<br>"; echo $sql;
        $results = mysqli_query($con, $sql);
        //if user was added successfully redirect to login page
        if(mysqli_affected_rows($con) > 0){
            header('Location: index.php');
        }
        else{
            //user was not added into db
            print " There was a problem with the registration! ";
            $errorArray[] = mysqli_error($con);
            echo json_encode($errorArray);
        }
    }

?>