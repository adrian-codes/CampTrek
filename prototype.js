$('document').ready(function () {
            var mapCanvas = $('#map-canvas');
            var map;
            var service;

            function handleSearchResults(place, status) {
                console.log(place);
                var image = {
                    url: 'images/campingicon.svg',
                    scaledSize: new google.maps.Size(20, 20)
                };

                for (var i = 0; i < place.length; i++) {

                    var request = {
                        placeId: place[i].place_id,
                    }
                    var infowindow = new google.maps.InfoWindow();
                    var service = new google.maps.places.PlacesService(map);

                    service.getDetails(request, function (place, status) {
                        if (status == google.maps.places.PlacesServiceStatus.OK) {

                            var coords = new google.maps.LatLng(place[i].geometry.location.lat(), place[i].geometry.location.lng());

                            var marker = new google.maps.Marker({
                                position: coords,
                                map: map,
                                icon: image,
                            });
                            google.maps.event.addListener(marker, 'click', function () {
                                infowindow.setContent(place[i].name);
                                infowindow.open(map, this);
                            });
                        }
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