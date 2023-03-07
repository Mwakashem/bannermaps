<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ $banner->title }}
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

        #pano {
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
        #map{
            display: none;
        }
      </style>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg">

                <div id="map"></div>
                <div id="pano"></div>
            </div>
        </div>
    </div>
</x-app-layout>
<script async defer
src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBGORjYyKEgXaFYcxzx1482WLlsVGHo9x0&callback=initialize&libraries=geometry">
</script>
  <script>
 /**
 * @license
 * Copyright 2019 Google LLC. All Rights Reserved.
 * SPDX-License-Identifier: Apache-2.0
 */
function initialize() {
  const fenway = { lat: {{ $banner->lat }}, lng: {{ $banner->lng }} };
  const map = new google.maps.Map(document.getElementById("map"), {
    center: fenway,
    zoom: 14,
  });
//   const cafeMarker = new google.maps.Marker({
//     position: { lat: 42.345573, lng: -71.098326 },
//     map,
//     icon: "https://furtherafrica.com/content-files/uploads/2021/05/safaricom-logo.png",
//     title: "Cafe",
//   });
  const panorama = new google.maps.StreetViewPanorama(
    document.getElementById("pano"),
    {
      position: fenway,
      pov: {
        heading: 25,
        pitch: 12,
      },
    }
  );
  const cafeMarker = new google.maps.Marker({
    position: { lat: {{ $banner->lat }}, lng: {{ $banner->lng }}},
    map: panorama,
    icon: "/storage/{{$banner->image}}",
    title: "Cafe",
  });

  map.setStreetView(panorama);
}

window.initialize = initialize;

  </script>
