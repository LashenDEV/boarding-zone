@extends('layouts.boarding-owner')
@section('main')
    <div class="container mt-5">
        <div id="map" class="w-full min-h-screen"></div>
    </div>

    <script type="text/javascript">
        function initMap() {
            const myLatLng = {lat: 7.508767189516151, lng: 80.34035688565491};
            const map = new google.maps.Map(document.getElementById("map"), {
                zoom: 8 ,
                center: myLatLng,
            });

            var locations = {{ Js::from($locations) }};

            var infowindow = new google.maps.InfoWindow();

            var marker, i;

            var icon = {
                url: '{{asset('asserts/icons/boarding-mark.png')}}',
                scaledSize: new google.maps.Size(20, 30),
            };

            for (i = 0; i < locations.length; i++) {
                marker = new google.maps.Marker({
                    position: new google.maps.LatLng(locations[i]['latitude'], locations[i]['longitude']),
                    map: map,
                    icon: icon,
                });

                google.maps.event.addListener(marker, 'click', (function (marker, i) {
                    return function () {
                        infowindow.setContent(locations[i]['name']);
                        infowindow.open(map, marker);
                    }
                })(marker, i));

            }
        }

        window.initMap = initMap;
    </script>

    <script type="text/javascript"
            src="https://maps.google.com/maps/api/js?key={{ env('GOOGLE_MAP_KEY') }}&callback=initMap"></script>

@endsection
