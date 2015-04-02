$('document').ready(function () {
    var mapCanvas = $('#map-canvas');
    var map;
    var service;

    function handleSearchResults(results, status) {
        var image = {
            url: 'images/campingicon.svg',
            scaledSize: new google.maps.Size(20, 20)
        };

        for (var i = 0; i < results.length; i++) {

            var marker = new google.maps.Marker({
                position: results[i].geometry.location,
                map: map,
                icon: image,
            });
        }
    }

    function performSearch() {

        var request = {
            bounds: map.getBounds(),
            keyword: 'camping',

        };

        service.nearbySearch(request, handleSearchResults);
    }

    function initialize(location) {
        console.log(location)
        var currentLocation = new google.maps.LatLng(location.coords.latitude, location.coords.longitude);

        var mapOptions = {
            center: currentLocation,
            zoom: 9,
            mapTypeId: google.maps.MapTypeId.ROADMAP
        };

        map = new google.maps.Map(mapCanvas[0], mapOptions);

        var marker = new google.maps.Marker({
            position: currentLocation,
            map: map
        });

        service = new google.maps.places.PlacesService(map);
        google.maps.event.addListenerOnce(map, 'bounds_changed', performSearch)
    }

    if (navigator.geolocation) {
        navigator.geolocation.getCurrentPosition(initialize);

    } else {
        mapCanvas.html("Geolocation is not supported by this device.");
    }

});