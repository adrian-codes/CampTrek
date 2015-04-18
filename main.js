$('document').ready(function () {

    //ajax call receiving data from backend
    $.ajax({
        url: 'getposts.php',
        dataType: 'json',
        method: 'POST',
        cache: false,
        success: function (response) {
            //console.log("My data: " , response.data);

            //loop through data and create html for them
            for (index in response.data) {
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
                $('<div class="infoDiv col-md-4" data-user="' + user_id + '" data-id="' + id + '"><p>User: ' + username + '<p>Campground: ' + campground + '</p><p>Date: ' + date + '</p><p>Category: ' + category + '</p><p>Rating: ' + rating + '</p></div>').appendTo(postDiv);
                //create div with photo
                $('<div class="photoDiv col-md-8"><img src="' + photoURL + '" class="img-responsive" alt="image"><p>Caption: ' + photoDesc + '</p></div>').appendTo(postDiv);
                //create div with summary
                $('<div class="summaryDiv col-md-12"><p>Summary: ' + summary + '</p><p>Tips & Tricks: ' + tips_tricks + '</div><hr class="col-md-12">').appendTo(postDiv);
                //append to document
                postDiv.appendTo('#postContainer');

            }
        }

    }); //end of ajax

    //ajax call receiving user info for profile page
    $.ajax({
        url: 'getprofile.php',
        dataType: 'json',
        method: 'post',
        success: function (response) {
            //console.log(response);

            var username = response.data[0].username;
            var email = response.data[0].email;
            var date_created = response.data[0].date_created;
            var last_login = response.data[0].last_login;
            var avatar_url = response.data[0].avatar_url;

            $('#username').attr('placeholder', username);
            $('#email').attr('placeholder', email);
            $('#date_created').text(date_created);
            $('#last_login').text(last_login);
            $('#profileImage').html('<p><strong>Profile Image:</strong></p><img src="' + avatar_url + '" class="img-responsive" alt="image">');

        }
    }); // end of ajax call

    $('#updatebtn').click(function () {
        
        //create formdata object with image data
        var form = $('#uploadImage')[0];

        //append username and email input into formata object
        var data = new FormData(form);

        //store values to update profile data

        $('input').each(function(){
            var inputs = $(this);
            //check if values are different from db
            if (inputs.val() != "" && inputs.val() != inputs.attr('placeholder')) {
                data.append(inputs.attr('name'), inputs.val());
            }
        });

        //ajax call sending updated data to updateprofile.php
        $.ajax({
            url: 'updateprofile.php',
            dataType: 'json',
            data: data,
            method: 'post',
            contentType: false,
            processData: false,
            cache: false,
            success: function (response) {
                console.log(response.url);
                $('img').attr('src', response.url +"?timestamp=" + new Date().getTime());
            },
           // error: function (response){
            // console.log(response);   
           // }

        }); //end of ajax
    }); //end of click function
    
    //login ajax call
    $('#loginBtn').click(function(){
        var data = {
            useremail: $('#inputEmail').val(),
            password: $('#inputPassword').val(),
        };
        
        $.ajax({
            url: 'loginpage_ajax.php',
            dataType: 'json',
            data: data,
            method: 'post',
            success: function(response) {
                window.response = response;
                var myHeader =  $('#myHeader');
                var headerHeight = myHeader.height();
                console.log("my resonse: ", response);
                myHeader.css('height', headerHeight+'px');
                    myHeader.find('header').hide('slow').html(response.header).show('slow');
                $('#modalClose').click();
            }
        });
    }); //end of click function
    
    //register ajax call
        $('#registerBtn').click(function(){
        var data = {
            username: $('#regUsername').val(),
            useremail: $('#regEmail').val(),
            password: $('#regPassword').val(),
        };
        
        $.ajax({
            url: 'registrationadd_ajax.php',
            dataType: 'json',
            data: data,
            method: 'post',
            success: function(response) {
                var myHeader =  $('#myHeader');
                var headerHeight = myHeader.height();
                myHeader.css('height', headerHeight+'px');
                myHeader.find('header').hide('slow').html(response.header).show('slow');
                $('#modalClose').click();
            }
        });
    }); //end of click function
    
    
}); //end of document.ready 