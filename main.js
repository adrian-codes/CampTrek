$('document').ready(function(){
   
    //ajax call receiving data from backend
    $.ajax({
        url: 'getposts.php',
        dataType: 'json',
        method: 'POST',
        success: function(response){
            //console.log("My data: " , response.data);
            
            //loop through data and create html for them
            for(index in response.data){
                //store data in variables for easier access
                var campground = response.data[index].campground;
                var category = response.data[index].category;
                var id = response.data[index].id;
                var like_count = response.data[index].like_count;
                var rating = response.data[index].rating;
                var summary = response.data[index].summary;
                var time_created = response.data[index].time_created;
                var tips_tricks = response.data[index].tips_tricks;
                var user_id = response.data[index].user_id;
                var date = response.data[index].date;
                var photoURL = response.data[index].photoURL;
                var photoDesc = response.data[index].photoDesc;
                var username = response.data[index].username;
                
                
                var postDiv = $('<div/>').addClass('postDiv row');
                //create div with info
                $('<div class="infoDiv col-md-4" data-user="'+user_id+'" data-id="'+id+'"><p>User: '+username+'<p>Campground: '+campground+'</p><p>Date: '+date+'</p><p>Category: '+category+'</p><p>Rating: '+rating+'</p></div>').appendTo(postDiv);
                //create div with photo
                $('<div class="photoDiv col-md-8"><img src="'+photoURL+'" class="img-responsive" alt="image"><p>Description: '+photoDesc+'</p></div>').appendTo(postDiv);
                //create div with summary
                $('<div class="summaryDiv col-md-12"><p>Summary: '+summary+'</p><p>Tips & Tricks: '+tips_tricks+'</div><hr class="col-md-12">').appendTo(postDiv);
                //append to document
                postDiv.appendTo('.postContainer');
                
            }
        }
        
    });
});