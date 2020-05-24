function initMap() {
    var coords = {
      lat: 41.8933181,
      lng: 12.4932009
    };
    var infoWindow;
    var map = new google.maps.Map(document.getElementById("map"), {
      zoom: 17,
      center: coords,
      mapTypeControl: false,
      streetViewControl: false,
      styles: [{
          featureType: "administrative.land_parcel",
          stylers: [{
            visibility: "off",
          }, ],
        },
        {
          featureType: "administrative.neighborhood",
          stylers: [{
            visibility: "off",
          }, ],
        },
        {
          featureType: "poi",
          elementType: "labels.text",
          stylers: [{
            visibility: "off",
          }, ],
        },
        {
          featureType: "poi.business",
          stylers: [{
            visibility: "off",
          }, ],
        },
        {
          featureType: "road",
          elementType: "labels",
          stylers: [{
            visibility: "off",
          }, ],
        },
        {
          featureType: "road",
          elementType: "labels.icon",
          stylers: [{
            visibility: "off",
          }, ],
        },
        {
          featureType: "road.local",
          stylers: [{
            visibility: "on",
          }, ],
        },
        {
          featureType: "transit",
          stylers: [{
            visibility: "off",
          }, ],
        },
        {
          featureType: "water",
          elementType: "labels.text",
          stylers: [{
            visibility: "off",
          }, ],
        },
      ],
    });
    infoWindow = new google.maps.InfoWindow();
    // The marker, positioned at coords
    var marker = new google.maps.Marker({
      position: coords,
      map: map,
      icon: "img/rover_icon.png",
    });
    /*center map on target listener*/
    map.addListener("center_changed", function () {
      window.setTimeout(function () {
        map.panTo(marker.getPosition());
      }, 1000);
    });
    /*click on marker listener*/
    marker.addListener("click", function () {
      infoWindow.setPosition(coords);
      infoWindow.setContent("Current weather in Rome");
      infoWindow.open(map);
      map.setCenter(pos);
      map.setCenter(marker.getPosition());
    });
    var markers = [];
  }