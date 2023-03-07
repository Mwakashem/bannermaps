<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta name="title" content="" />
<meta name="description" content="" />
<meta name="keywords" content="" />
<meta name="author" content="" />
<meta name="publisher" content="" />
<meta name="copyright" content="" />
<meta name="creation_Date" content="06/10/2022" />
<meta name="expires" content="" />
<link rel="icon" href="images/favicon.ico" type="image/x-icon">
<title>Iavi | Add Events</title>

<!--StyleSheet-->
<link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Roboto:wght@300;400;500;600;700;800&display=swap" rel="stylesheet">
<link href="css/style.min.css" rel="stylesheet">
<link href="css/style.css" rel="stylesheet">

<!--Javascript-->
<script src="js/google.api.js" type="text/Javascript"></script>
</head>

<body>

<div class="mobile-search">
  <form class="search-form">
    <span data-feather="search"></span>
    <input class="form-control mr-sm-2 box-shadow-none" type="text" placeholder="Search...">
  </form>
</div>
<div class="mobile-author-actions"></div>
<header class="header-top">
  <nav class="navbar navbar-light">
    <div class="navbar-left">
        <a class="navbar-brand" href="#">
            {{-- <img class="dark" src="images/ivai-logo.png" alt="svg">
            <img class="light" src="images/ivai-logo.png" alt="img"> --}}
        </a>
        <a href="" class="sidebar-toggle"> <img class="svg" src="images/svg/bars.svg" alt="img"></a>
      <form action="/" class="search-form">
        <span data-feather="search"></span>
        <input class="form-control mr-sm-2 box-shadow-none" type="text" placeholder="Search...">
      </form>
    </div>
    <!-- ends: navbar-left -->

    <div class="navbar-right">
      <ul class="navbar-right__menu">
        <li class="nav-search d-none"> <a href="#" class="search-toggle"> <i class="la la-search"></i> <i class="la la-times"></i> </a>
          <form action="/" class="search-form-topMenu">
            <span class="search-icon" data-feather="search"></span>
            <input class="form-control mr-sm-2 box-shadow-none" type="text" placeholder="Search...">
          </form>
        </li>

        <li class="nav-author">
          <div class="dropdown-custom">
            <a href="javascript:;" class="nav-item-toggle">
            <img src="images/avatar/author-nav.png" alt="" class="rounded-circle">
            <span>Shem Mwaka</span> <i class="icofont-rounded-down"></i>
          </a>
            <!-- ends: .dropdown-wrapper -->
          </div>
        </li>
        <!-- ends: .nav-author -->
      </ul>
      <!-- ends: .navbar-right__menu -->
      <div class="navbar-right__mobileAction d-md-none">
        <a href="#" class="btn-search">
            <span data-feather="search"></span>
            <span data-feather="x"></span></a>
            <a href="#" class="btn-author-action"> <span data-feather="more-vertical"></span></a>
        </div>
    </div>
    <!-- ends: .navbar-right -->
  </nav>
</header>
<main class="main-content">
  <aside class="sidebar-wrapper">
    <div class="sidebar sidebar-collapse" id="sidebar">
      <div class="sidebar__menu-group">
        <ul class="sidebar_nav">
          <!-- <li class="menu-title"> <span>Main menu</span> </li> -->
          <li> <a href="#"><span class="nav-icon fas fa-home"></span> <span class="menu-text">Dashboard</span></a></li>
          <li><a href="{{route('banner.create')}}" class=""><span class="nav-icon fas fa-list"></span> <span class="menu-text">Add Banners</span> </a></li>
        </ul>
      </div>
    </div>
  </aside>

  <div class="contents">
    <div class="main-container container-fluid">
      <!-- PAGE-HEADER -->
    <div class="page-header">Banner
      <h1 class="page-title">Add Banners</h1>
    </div>
    <!-- PAGE-HEADER END -->

    <!-- Row -->
    <div class="row row-sm">
  <div class="col-lg-12">
    <div class="card">
      <div class="card-body">
          <div class="form-modal formsection">
                  <form class="formareaModal" method="post" action="{{ route('banners.store') }}" enctype="multipart/form-data">
                    @csrf
                    <div class="row">
                      <div class="col-md-12">
                        <div class="form-group">
                          <label for="fullName" class="form-label">Banner Title</label>
                          <input type="text" name="title" class="form-control" id="title" placeholder="">
                        </div>
                      </div>

                      <div class="col-lg-6">
                        <div class="form-group">
                          <label for="status" class="form-label">Select Cover Image</label>
                        <input type="file" name="file" class="dropify" data-default-file="images/1.jpg" data-bs-height="180" />
                      </div>
                      </div>
                      <div class="form-group">
                        <label class="form-label">Property Description</label>
                        <input type="text" name="lat" id="lat" hidden>
                        <input type="text" name="lng" id="lng" hidden>
                        <input class="form-control" id="pac-input" type="text" placeholder="Enter a location" />


                          <div id="map" style="width: 100%; height: 300px;"></div>
                      </div>
                      <div class="modal-footer">
                          <button type="button" class="btn btn-outline-secondary btn-border" data-bs-dismiss="modal">Cancel</button>
                          <button type="submit" class="btn btn-primary btn-border">Save</button>
                      </div>
                    </div>
                  </form>
                </div>
      </div>
    </div>
  </div>
</div>
    </div>
  </div>

  <footer class="footer-wrapper">
    <div class="container-fluid">
      <div class="row">
        <div class="col-md-6">
          <div class="footer-copyright">
            <p>2022 @<a href="#">Iavi</a> </p>
          </div>
        </div>
        <div class="col-md-6">
          <div class="footer-menu text-right float-end">
            <ul>
              <li><a href="#">Privacy Policy</a></li>
              <li><a href="#">Terms & Conditions</a></li>
              <li><a href="#">Help</a></li>
            </ul>
          </div>
          <!-- ends: .Footer Menu -->
        </div>
      </div>
    </div>
  </footer>
</main>
<div class="overlay-dark-sidebar"></div>


<!-- jQuery -->
<script src="js/jquery.min.js" type="text/Javascript"></script>

<!-- FILE UPLOADES JS -->
<script src="assets/fileuploads/js/fileupload.js"></script>
<script src="assets/fileuploads/js/file-upload.js"></script>

<!-- INTERNAL SUMMERNOTE Editor JS -->
<script src="js/summernote/summernote1.js"></script>
<script src="js/summernote.js"></script>

<script src="js/main.js" type="text/Javascript"></script>

<script async defer
src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBGORjYyKEgXaFYcxzx1482WLlsVGHo9x0&callback=initMap&libraries=places">
</script>
<script>
var map;
var marker;
var markers = [];
var infowindow;
var messagewindow;
//  var addmarker = 0;
var imglimit = 5;
//var uploadimage = 0;

console.log(default_img_url);


function initMap() {
// var lagoas = {lat: 6.5244, lng: 3.3792};
//var lagoas = {lat: 33.780452, lng: -84.422852}; atlanta
//var lagoas = {lat: 39.872572, lng: -101.705962};
//var lagoas = {lat: 7.96662, lng: -1.22256};
var lagoas = {lat: 0.56057, lng: 37.54084};

map = new google.maps.Map(document.getElementById('map'), {
center: lagoas,
zoom: 5
});
  const input = document.getElementById("pac-input");

  const options = {
      fields: ['address_components','type','geometry'],
      types: ['establishment','geocode'],
      componentRestrictions: {country: 'ke'}
  };

  const autocomplete = new google.maps.places.Autocomplete(input, options);

  // Bind the map's bounds (viewport) property to the autocomplete object,
  // so that the autocomplete requests use the current map bounds for the
  // bounds option in the request.
  autocomplete.bindTo("bounds", map);
  autocomplete.addListener('place_changed', function() {
      var place = autocomplete.getPlace();
      if (!place.geometry) {
          // User entered the name of a Place that was not suggested and
          // pressed the Enter key, or the Place Details request failed.
          window.alert("No details available for input: '" + place.name + "'");
          return;
      }

      geocoder = new google.maps.Geocoder();
      geocoder.geocode({
          address: document.getElementById('pac-input').value
      }, function(results, status) {
          if (status == "OK") {
              if (results[0].geometry.viewport) map.fitBounds(results[0].geometry.viewport);
              else if (results[0].geometry.bounds) map.fitBounds(results[0].geometry.bounds);
          }
      })
      console.log(place);
  });
  var listenerHandle = google.maps.event.addListener(map, 'click', function(event) {


        marker = new google.maps.Marker({
          position: event.latLng,
          map: map
        });
        var latlng = marker.getPosition();
            var lat = function() {
                return latlng.lat();
            };
            var lng = function() {
                return latlng.lng();
            };
            document.getElementById('lat').value = lat();
            document.getElementById('lng').value = lng();
                  markers.push(marker);
        google.maps.event.addListener(marker, 'click', function() {


         //infowindow.open(map, marker);
        });

      });
    }


</script>
</body>

</html>
