<?php
session_start();

require_once('mysql_connect.php');
$errorArray = [];
$outputArray = [];

//check if post is set
if(isset($_POST)){
    
    //check if theese fields are empty and return errors if so
    if($_POST['campground'] == ''){
        $errorArray['campground'] = "There is no campground!";
    }
    if($_POST['date'] == ''){
        $errorArray['date'] = "There is no date!";
    }
    if($_POST['category'] == ''){
        $errorArray['category'] = "There is no category!";
    }
    if($_POST['rating'] == ''){
        $errorArray['rating'] = "There is no rating!";
    }
    if($_POST['summary'] == ''){
        $errorArray['summary'] = "There is no summary!";
    }
    if($_POST['tips_tricks'] == ''){
        $errorArray['tips_tricks'] = "There is no tips_tricks!";
    }
    
    //check if $errorArray is empty
    if(empty($errorArray)){
        
        //store form data into variables for easier access
        $campground = $_POST['campground'];
        $date = strtotime($_POST['date']);
        $category = $_POST['category'];
        $rating = $_POST['rating'];
        $summary = $_POST['summary'];
        $tips_tricks = $_POST['tips_tricks'];
        $user_id = $_SESSION['userinfo']['id'];
        $time_created = time(); 
        
        //query to insert into post table in database
        $sql = "INSERT INTO post(`campground`, `date`, `category`, `rating`, `summary`, `tips_tricks`, `user_id`, `time_created`) VALUES ('$campground', '$date', '$category', '$rating', '$summary', '$tips_tricks', '$user_id', '$time_created');";
        //store result of query
        $result = mysqli_query($con, $sql);
        
        //check if there was a result
        if(!$result){
            $errorArray[] = mysqli_error($con);
            $errorArray[] = "There was an error adding to database";
        }
    }
    
    //if no errors close connection and re-route to uploadphotos.php page 
    if(count($errorArray) == 0){
        $last_id = mysqli_insert_id($con);
        $_SESSION['bloginfo'] = array(
            'src_id' => $last_id,
            'src_type' => 'post'
        );
        mysqli_close($con);
        header('Location: uploadphotos.php');
        $outputArray['success'] = true;
        $outputArray['message'] = "Files uploaded successfuly!";
    } 
    else{
        $outputArray['success'] = false;
        $outputArray['message'] = "There were errors!";
        $outputArray['errors'] = $errorArray; 
    }

}
else{
    $outputArray['succes'] = false;
    $outputArray['message'] = "Post was not set!";
}

echo (json_encode($outputArray));
?>