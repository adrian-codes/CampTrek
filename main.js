$('document').ready(function(){
   
    $.ajax({
        url: 'getposts.php',
        dataType: 'json',
        method: 'POST',
        success: function(response){
            console.log("My data: " , response.data);
            
            
            for(index in response.data){
                
                var campground = response.data[index].campground;
                var category = response.data[index].category;
                var id = response.data[index].id;
                var like_count = response.data[index].like_count;
                var rating = response.data[index].rating;
                var summary = response.data[index].summary;
                var time_created = response.data[index].time_created;
                var tips_tricks = response.data[index].tips_tricks;
                var user_id = response.data[index].user_id;
           
                
                var postDiv = $('<div/>').addClass('postDiv');
                $('<div class="infoDiv"><p>'+campground+'</p><p>'+category+'</p></div>').appendTo(postDiv);
                postDiv.appendTo('.postContainer');
                
            }
        }
        
    });
});