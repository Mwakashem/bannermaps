<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg">
                <x-welcome />
            </div>
        </div>
    </div>
</x-app-layout>
<script>
      function initializeMap() {
            const locations = <?php echo json_encode($banners) ?>;

            const map = new google.maps.Map(document.getElementById("map"));
            var infowindow = new google.maps.InfoWindow();
            var bounds = new google.maps.LatLngBounds();
            const image ="/download.png";
            for (var location of locations) {
                var marker = new google.maps.Marker({
                    position: new google.maps.LatLng(location.lat, location.lng),
                    map: map,
                    icon:image,
                    gestureHandling: "none",
              zoomControl: false,
                });
                bounds.extend(marker.position);
                google.maps.event.addListener(marker, 'mouseover', (function(marker, location) {
                    return function() {
                        infowindow.setContent(`
                        <div class="card" style="width: 18rem;">
                        <img src="/storage/${location.image}" class="card-img-top" alt="...">
                        <div class="card-body">
                            <h5 class="card-title">${location.title}</h5>
                            <a href="/location-details/${location.id}" class="">Explore More</a>
                        </div>
                        </div>

                        `);
                        infowindow.open(map, marker);
                    }
                })(marker, location));

            }
            map.fitBounds(bounds);

        }
</script>
