var map;
var infoWindow;
var service;
var coords;

//check for users location
if (navigator.geolocation) {
    navigator.geolocation.getCurrentPosition(initialize);
    
} else {
    mapCanvas.html("Geolocation is not supported by this device.");
}

//create new map
function initialize(pos) {
    if(pos.coords = "undefined"){
        coords = { latitude: 34.1690341, longitude: -117.7846935 };
    }
    else{
        coords = pos.coords;   
    }
    console.log("2nd", coords);
    map = new google.maps.Map(document.getElementById('map-canvas'), {

        center: new google.maps.LatLng(coords.latitude, coords.longitude),
        zoom: 10,
        styles: [
            {
                stylers: [
                    {
                        visibility: 'simplified'
                    }
        ]
      },
            {
                elementType: 'labels',
                stylers: [
                    {
                        visibility: 'off'
                    }
        ]
      }
    ]
    });
    //create info window for each result with title
    infoWindow = new google.maps.InfoWindow();
    service = new google.maps.places.PlacesService(map);

    google.maps.event.addListenerOnce(map, 'bounds_changed', performSearch);
}
//peform search for campgrounds
function performSearch() {
    var request = {
        bounds: map.getBounds(),
        keyword: 'campground',
        type: 'campground',
        rankBy: 'prominence',
    };
    service.radarSearch(request, callback);
}
//create marker for all results
function callback(results, status) {
    //console.log(results);
    if (status != google.maps.places.PlacesServiceStatus.OK) {
        alert(status);
        return;
    }
    for (var i = 0, result; result = results[i]; i++) {
        createMarker(result);
    }
}
//create marker function with camping logo
function createMarker(place) {
    var image = {
        url: 'images/campingicon.svg',
        scaledSize: new google.maps.Size(15, 15)
    };
    var marker = new google.maps.Marker({
        map: map,
        position: place.geometry.location,
        icon: image,
    });

    google.maps.event.addListener(marker, 'click', function () {
        service.getDetails(place, function (result, status) {
            if (status != google.maps.places.PlacesServiceStatus.OK) {
                alert(status);
                return;
            }
            console.log(result);
            if(result.website){
                var website = '<a href="'+result.website+'"target="_blank">Click here for campground website</a>';   
            } else{
                website = "No website available.";   
            }
            if(result.reviews){
                //console.log(result.reviews);
                var reviews = 'Overall Rating: '+result.reviews[0].aspects[0].rating+'/5';
                 
            } else{
                review = "No reviews available.";
                }
            if(result.formatted_phone_number){
                var number = result.formatted_phone_number;
                var phone = "Phone Number: " + '<a href="tel:'+number+'">'+number+'</a>';   
            }
            //content of info window with button to click for directions
            var content = '<div><p>'+result.name+'</p><p>'+website+'</p><p>'+reviews+'</p><p>'+phone+'</p><a class="btn btn-success" href="http://maps.google.com/maps?saddr='+coords.latitude+', '+coords.longitude+'&daddr='+place.geometry.location+'"target="_blank">Get Directions!</a></div>'; 
            
            infoWindow.setContent(content);
            infoWindow.open(map, marker);
        });
    });
}

google.maps.event.addDomListener(window, 'load', initialize);