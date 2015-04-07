<?php 

    session_start();
    $con = mysqli_connect("localhost", "root", "", "camptrek"); 
    $userid = $_SESSION['userinfo']['id'];
    $sql = "SELECT * FROM users WHERE id =$userid";
    $results= mysqli_query($con, $sql);
    $outputArray = [];
    $data = [];

    $row = mysqli_fetch_assoc($results);
    
    $data[] = [
        'username' => $row['username'],
        'email' => $row['email'],
        'avatar_url' => $row['avatar_url'],
        'date_created' => $row['date_created'],
        'last_login' => $row['last_login']
    ];

    if(mysqli_num_rows($results) > 0) {
        $outputArray['success'] = true;
        $outputArray['data'] = $data;
    }
    else{
        $outputArray['success'] = false;
        $outputArray['error'] = mysqli_error($con);
    }

    echo json_encode($outputArray);

 ?>