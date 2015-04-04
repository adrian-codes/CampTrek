<?php
    $con = mysqli_connect('localhost', 'root', '', 'camptrek');
    $sql = 'SELECT p.*, i.src_id, i.src_type, i.photoURL, i.photoDesc, i.author_id, you.username FROM `post` AS p JOIN `images` AS i ON p.id = i.src_id JOIN `users` AS you ON p.user_id = you.id';
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
        $date = $post_row['date'];
        $image_src_id = $post_row['src_id'];
        $image_src_type = $post_row['src_type'];
        $image_photoURL = $post_row['photoURL'];
        $image_photoDesc = $post_row['photoDesc'];
        $image_author_id = $post_row['author_id'];
        $username = $post_row['username'];

        $data[] = [
            'id' => $id,
            'campground' => $campground,
            'time_created' => $time_created,
            'category' => $category,
            'rating' => $rating,
            'summary' => $summary,
            'tips_tricks' => $tips_tricks,
            'user_id' => $user_id,
            'like_count' => $like_count,
            'date' => $date,
            'src_id' => $image_src_id,
            'src_type' => $image_src_type,
            'photoURL' => $image_photoURL,
            'photoDesc' => $image_photoDesc,
            'author_id' => $image_author_id,
            'username' => $username
        ];
        
    }


    if(mysqli_num_rows($results) > 0){
        $outputArray['success'] = true; 
        $outputArray['data'] = $data;
    }
    else  {
        $outputArray['success'] = false;
        $outputArray['message'] = "There was nothing retrieved!";
        
    }

    echo (json_encode($outputArray));
?> 