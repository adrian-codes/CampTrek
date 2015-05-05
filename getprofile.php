<?php 

    session_start();
    require_once('mysql_connect.php');
    //userid used to retreive user info for profile page
    $userid = $_SESSION['userinfo']['id'];
    $sql = "SELECT * FROM users WHERE id =$userid";
    $results= mysqli_query($con, $sql);
    $outputArray = [];
    $data = [];
    
    //fetch user info
    $row = mysqli_fetch_assoc($results);
    
    //store user info into data array
    $data[] = [
        'username' => $row['username'],
        'email' => $row['email'],
        'avatar_url' => $row['avatar_url'],
        'date_created' => date("F d Y", $row['date_created']),
        'last_login' => date("F d Y", $row['last_login'])
    ];
    
    //attach data array to output array
    if(mysqli_num_rows($results) > 0) {
        $outputArray['success'] = true;
        $outputArray['data'] = $data;
    }
    else{
        //if failure attach errors to output array
        $outputArray['success'] = false;
        $outputArray['error'] = mysqli_error($con);
    }
    
    //json encode and echo output array
    echo json_encode($outputArray);

 ?>