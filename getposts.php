<?php
    $con = mysqli_connect('localhost', 'root', '', 'camptrek');
    $sql = 'SELECT * FROM post ORDER BY ID desc';
    $results = mysqli_query($con, $sql);
   
    $outputArray = [];
        
    $data = [];

    while($post_row = mysqli_fetch_assoc($results)){

        $id = $post_row['id'];
        $campground = $post_row['campground'];
        $time_created = $post_row['time_created'];   
        $category = $post_row['category'];
        $rating = $post_row['rating'];
        $summary = $post_row['summary'];
        $tips_tricks = $post_row['tips_tricks'];
        $user_id= $post_row['user_id'];
        $like_count = $post_row['like_count']; 

        $data[] = [
            'id' => $id,
            'campground' => $campground,
            'time_created' => $time_created,
            'category' => $category,
            'rating' => $rating,
            'summary' => $summary,
            'tips_tricks' => $tips_tricks,
            'user_id' => $user_id,
            'like_count' => $like_count
        ];
        
    }

    if(mysqli_num_rows($results) > 0){
        $outputArray['success'] = true; 
        $outputArray['data'] = $data;
    }
    else  
    {
        $outputArray['success'] = false;
        $outputArray['message'] = "There was nothing retrieved!";
        
    }
    echo (json_encode($outputArray));
?>  