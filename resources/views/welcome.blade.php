<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <style>
        :root {
          --logo-font: 'Josefin Slab', serif;
          --text-font: 'Jost', sans-serif;
          --color-white: #fff;
          --blue-text: #022A65;
      }
      body {
          font-family: var(--logo-font);
      }
      h1 ,h2 ,h3 ,h4 ,h5 ,h6 ,p, a{
          font-family: var(--text-font);
          color: var(--blue-text );
      }
      .attraction-buttons {
          position: relative;
          background-color: transparent;
          /* top: 1.3em;
          left: 12em; */
          display: flex;
          padding-top: 2em;
          padding-left: 1em;

      }
      .attraction-buttons a {
          background-color: #fff;
          padding: 6px 17px;
          text-decoration: none;
          border-radius: 50px;
          font-size: 0.875rem;
          font-weight: 600;
          box-shadow: 0 1px 2px rgba(60,64,67,0.3),0 1px 3px 1px rgba(60,64,67,0.15);
          display: flex;
          align-items: center;
          justify-content: center;
          margin-left: 0.5em;
      }
      .attraction-buttons a img {
          height: 18px;
          width: 18px;
          padding-right: 0.4em
      }
      .gmnoprint {
          display: none;
      }
        html,
        body {
            width: 100%;
            height: 100%;
        }

        .wrapper {
            position: relative;
            width: 100%;
            height: 100%;
            /* padding-top: 2em    ; */
        }

        #map {
            position: absolute;
            width: 100%;
            height: 100%;
            margin-left: -336px;
            margin-top: 10px;
            /* overflow: initial !important; */
        }

        .content {
        position: absolute;
        bottom: 50px;
        left: 1em;
        width: 25em;
      }
      .content .card {
        background-color: transparent;
      }
      .content .card img{
        height: 200px;
          object-fit: cover;
          object-position: bottom;
      }
      .content .card .card-body {
        background-color: rgba(0,0,0, .79);
        padding: 2em 1em;
        border-bottom-left-radius: 4px;
        border-bottom-right-radius: 4px;
      }
      .content .card .card-title, .content .card .card-text {
        color: #fff;
      }
      .content .card .card-title {
        font-size: 1.75em;
      }
      .content .card .card-text {
        font-weight: 300;
        line-height: 170%;
      }
      .attraction-buttons p {
        margin-bottom: 0
      }
      .gm-style .gm-style-iw-c {
          background-color: transparent;
          box-shadow: none;
      }
      .gm-style img {
        max-width: none;
        height: 166px;
        object-fit: cover;
      }
      .gm-style .gm-style-iw-c .card-body {
        padding-top: 2em;
        padding-bottom: 2em;
      }
      .gm-style .gm-style-iw-c .card-body a {
        color: #0B71EA;
        font-weight: 500;
        text-decoration-color: #0B71EA;
      }
      .gm-style .gm-style-iw-tc::after {
        top: -13px;
      }

      </style>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg">
                {{-- <div id="floating-panel">
                    <input type="button" value="Toggle Street View" id="toggle" />
                  </div> --}}
                <div id="map"></div>
            </div>
        </div>
    </div>
</x-app-layout>
     <script async defer
  src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBGORjYyKEgXaFYcxzx1482WLlsVGHo9x0&callback=initMap&libraries=places">
  </script>
     <script type="text/javascript">




        let panorama;

function initMap() {
    const locations = <?php echo json_encode($banners) ?>;
  // Set up the map
//   const map = new google.maps.Map(document.getElementById("map"), {
//     center: astorPlace,
//     zoom: 18,
//     streetViewControl: false,
//   });
var infowindow = new google.maps.InfoWindow();

  const map = new google.maps.Map(document.getElementById("map"));
            var bounds = new google.maps.LatLngBounds();
            const image ="/marker.gif";


  // Set up the markers on the map
            for (var location of locations) {
                var marker = new google.maps.Marker({
                    position: new google.maps.LatLng(location.lat, location.lng),
                    map: map,
                    icon:image,
                    gestureHandling: "none",
              zoomControl: false,
                });
                let astorPlace = { lat: -1.273704965978081, lng: 36.81210759390258 };

                bounds.extend(marker.position);
                google.maps.event.addListener(marker, 'mouseover', (function(marker, location) {
                    return function() {
                        infowindow.setContent(`
                        <div class="card" style="width: 18rem;">
                        <img src="/storage/${location.image}" class="card-img-top" alt="...">
                        <div class="card-body">
                            <h5 class="card-title">${location.title}</h5>
                            <li><a href="/banner-details/${location.id}" class="">Explore more</a></li>
                        </div>
                        </div>

                        `);
                        infowindow.open(map, marker);
                    }
                })(marker, location));

            }
            map.fitBounds(bounds);

  // We get the map's default panorama and set up some defaults.
  // Note that we don't yet set it visible.
  panorama = map.getStreetView(); // TODO fix type
  panorama.setPosition(astorPlace);

  panorama.setPov(
    /** @type {google.maps.StreetViewPov} */ {
      heading: 265,
      pitch: 0,
    }
  );
}

function toggleStreetView() {
    astorPlace = { lat: -4.0457268, lng: 39.661167 };
  const toggle = panorama.getVisible();

  if (toggle == false) {
    panorama.setVisible(true);
  } else {
    panorama.setVisible(false);
  }
}

window.initMap = initMap;
    </script>
