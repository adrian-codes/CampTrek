var map;
var infoWindow;
var service;
var coords;

if (navigator.geolocation) {
    navigator.geolocation.getCurrentPosition(initialize);

} else {
    mapCanvas.html("Geolocation is not supported by this device.");
}

function initialize(pos) {
    coords = pos.coords;
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

    infoWindow = new google.maps.InfoWindow();
    service = new google.maps.places.PlacesService(map);

    google.maps.event.addListenerOnce(map, 'bounds_changed', performSearch);
}

function performSearch() {
    var request = {
        bounds: map.getBounds(),
        keyword: 'campground',
        type: 'campground',
        rankBy: 'prominence',
    };
    service.radarSearch(request, callback);
}

function callback(results, status) {
    console.log(results);
    if (status != google.maps.places.PlacesServiceStatus.OK) {
        alert(status);
        return;
    }
    for (var i = 0, result; result = results[i]; i++) {
        createMarker(result);
    }
}

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
            
            var content = '<div><p>'+result.name+'</p><a class="btn btn-success" href="http://maps.google.com/maps?saddr='+coords.latitude+', '+coords.longitude+'&daddr='+place.geometry.location+'"target="_blank">Get Directions!</a></div>'; 
            
            infoWindow.setContent(content);
            infoWindow.open(map, marker);
        });
    });
}

google.maps.event.addDomListener(window, 'load', initialize);