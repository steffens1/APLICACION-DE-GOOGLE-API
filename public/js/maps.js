function DibujaCajaInfo(category, infoboxContent, json, i){

    if(json[i].color)          { var color = json[i].color }
        else                        { color = '' }
    if( json[i].precio )        { var price = '<div class="price">' + json[i].precio +  '</div>' }
        else                        { price = '' }
    if(json[i].id)             { var id = json[i].id }
        else                        { id = '' }
    if(json[i].url)            { var url = json[i].url }
        else                        { url = '' }
    if(json[i].type)           { var type = json[i].type }
        else                        { type = '' }
    if(json[i].titulo)          { var title = json[i].titulo }
        else                        { title = '' }
    if(json[i].direccion)       { var location = json[i].direccion }
        else                        { location = '' }
    if(json[i].galeria[0])     { var gallery = json[i].galeria[0] }
        else                        { gallery = '../img/default-item.jpg' }

    var ibContenedor = '';
    ibContenedor =
    '<div class="infobox ' + color + '">' +
        '<div class="inner">' +
            '<div class="image">' +
                '<div class="item-specific">' + drawItemSpecific(category, json, i) + '</div>' +
                '<div class="overlay">' +
                    '<div class="wrapper">' +
                        '<a href="#" class="quick-view" data-toggle="modal" data-target="#modal" id="' + id + '">Vista Previa</a>' +
                        '<hr>' +
                        '<a href="'+ url +'/'+ id + '" class="detail">Mas detalles </a>' +
                    '</div>' +
                '</div>' +
                '<a href="' + url +'/'+ id + '" class="description">' +
                    '<div class="meta">' +
                        price +
                        '<h2>' + title +  '</h2>' +
                        '<figure>' + location +  '</figure>' +
                        '<i class="fa fa-angle-right"></i>' +
                    '</div>' +
                '</a>' +
                '<img src="' + gallery +  '">' +
            '</div>' +
        '</div>' +
    '</div>';

    return ibContenedor;
}


"use strict";


var $ = jQuery.noConflict();

var mapStyles =[
    {
      "elementType": "geometry",
      "stylers": [
        {
          "color": "#f5f5f5"
        }
      ]
    },
    {
      "elementType": "labels.icon",
      "stylers": [
        {
          "visibility": "off"
        }
      ]
    },
    {
      "elementType": "labels.text.fill",
      "stylers": [
        {
          "color": "#616161"
        }
      ]
    },
    {
      "elementType": "labels.text.stroke",
      "stylers": [
        {
          "color": "#f5f5f5"
        }
      ]
    },
    {
      "featureType": "administrative.land_parcel",
      "elementType": "labels.text.fill",
      "stylers": [
        {
          "color": "#bdbdbd"
        }
      ]
    },
    {
      "featureType": "landscape",
      "elementType": "geometry",
      "stylers": [
        {
          "color": "#c0c0c0"
        }
      ]
    },
    {
      "featureType": "landscape.natural",
      "elementType": "geometry",
      "stylers": [
        {
          "color": "#808080"
        }
      ]
    },
    {
      "featureType": "landscape.natural.terrain",
      "elementType": "geometry",
      "stylers": [
        {
          "color": "#804040"
        }
      ]
    },
    {
      "featureType": "poi",
      "elementType": "geometry",
      "stylers": [
        {
          "color": "#eeeeee"
        }
      ]
    },
    {
      "featureType": "poi",
      "elementType": "labels.text.fill",
      "stylers": [
        {
          "color": "#757575"
        }
      ]
    },
    {
      "featureType": "poi.park",
      "elementType": "geometry",
      "stylers": [
        {
          "color": "#e5e5e5"
        }
      ]
    },
    {
      "featureType": "poi.park",
      "elementType": "labels.text.fill",
      "stylers": [
        {
          "color": "#9e9e9e"
        }
      ]
    },
    {
      "featureType": "road",
      "elementType": "geometry",
      "stylers": [
        {
          "color": "#ffffff"
        }
      ]
    },
    {
      "featureType": "road.arterial",
      "elementType": "labels.text.fill",
      "stylers": [
        {
          "color": "#757575"
        }
      ]
    },
    {
      "featureType": "road.highway",
      "elementType": "geometry",
      "stylers": [
        {
          "color": "#dadada"
        }
      ]
    },
    {
      "featureType": "road.highway",
      "elementType": "labels.text.fill",
      "stylers": [
        {
          "color": "#616161"
        }
      ]
    },
    {
      "featureType": "road.local",
      "elementType": "labels.text.fill",
      "stylers": [
        {
          "color": "#9e9e9e"
        }
      ]
    },
    {
      "featureType": "transit.line",
      "elementType": "geometry",
      "stylers": [
        {
          "color": "#e5e5e5"
        }
      ]
    },
    {
      "featureType": "transit.station",
      "elementType": "geometry",
      "stylers": [
        {
          "color": "#eeeeee"
        }
      ]
    },
    {
      "featureType": "water",
      "stylers": [
        {
          "color": "#48d0f2"
        }
      ]
    },
    {
      "featureType": "water",
      "elementType": "geometry",
      "stylers": [
        {
          "color": "#07c1f8"
        },
        {
          "saturation": 100
        },
        {
          "lightness": -25
        },
        {
          "weight": 5.5
        }
      ]
    },
    {
      "featureType": "water",
      "elementType": "labels.text.fill",
      "stylers": [
        {
          "color": "#9e9e9e"
        }
      ]
    }
  ];

// Establecer la altura del mapa al 100% ----------------------------------------------------------------------------------------------

var $body = $('body');
if( $body.hasClass('map-fullscreen') ) {
    if( $(window).width() > 768 ) {

        $('.map-canvas').height( $(window).height() - $('.header').height() );
    }
    else {
        $('.map-canvas #map').height( $(window).height() - $('.header').height() );
    }
}

////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
//pagina de inicio - google
////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////

function CrearPaginaInicioGoogleMap(_latitude,_longitude,json){
   // console.log(json);
    $.get("external/_infobox.js", function() {
        gMap();
    });
    function gMap(){
        var mapCenter = new google.maps.LatLng(_latitude,_longitude);
        var mapOptions = {
            zoom: 14,
            center: mapCenter,
            disableDefaultUI: false,
            scrollwheel: false,
            styles: mapStyles,
            mapTypeControlOptions: {
                style: google.maps.MapTypeControlStyle.HORIZONTAL_BAR,
                position: google.maps.ControlPosition.BOTTOM_CENTER
            },
            panControl: false,
            zoomControl: true,
            zoomControlOptions: {
                style: google.maps.ZoomControlStyle.LARGE,
                position: google.maps.ControlPosition.LEFT_BOTTOM
            }
        };
        var mapElement = document.getElementById('map');
        var map = new google.maps.Map(mapElement, mapOptions);
        var newMarkers = [];
        var markerClicked = 0;
        var activeMarker = false;
        var lastClicked = false;

        

        for (var i = 0; i < json.length; i++) {

            //Marcadores -----------------------------------------------------------------------------------

            if( json[i].color ) var color = json[i].color;
            else color = '';

            var markerContent = document.createElement('DIV');
            if( json[i].featured == 1 ) {
                markerContent.innerHTML =
                    '<div class="map-marker featured' + color + '">' +
                        '<div class="icon">' +
                        '<img src="' + json[i].type_icon +  '">' +
                        '</div>' +
                    '</div>';
            }
            else {
                markerContent.innerHTML =
                    '<div class="map-marker ' + json[i].color + '">' +
                        '<div class="icon">' +
                        '<img src="' + json[i].type_icon +  '">' +
                        '</div>' +
                    '</div>';
            }

            // crear marcador de mapa------------------------------------------------------------------------------------

            var marker = new RichMarker({
                position: new google.maps.LatLng( json[i].lat, json[i].lng ),
                map: map,
                draggable: false,
                content: markerContent,
                flat: true
            });

            newMarkers.push(marker);

            // crear caja de detalles -----------------------------------------------------------------------------------

            var infoboxContent = document.createElement("div");
            var infoboxOptions = {
                content: infoboxContent,
                disableAutoPan: false,
                pixelOffset: new google.maps.Size(-18, -42),
                zIndex: null,
                alignBottom: true,
                boxClass: "infobox",
                enableEventPropagation: true,
                closeBoxMargin: "0px 0px -30px 0px",
                closeBoxURL: "img/close.png",
                infoBoxClearance: new google.maps.Size(1, 1)
            };

            // Infobox HTML element ----------------------------------------------------------------------------------------

            var category = json[i].category;
            infoboxContent.innerHTML = DibujaCajaInfo(category, infoboxContent, json, i);

            // creandi nuevo marcadores ------------------------------------------------------------------------------------------

            newMarkers[i].infobox = new InfoBox(infoboxOptions);

            // mostrar infobox ------------------------------------------------------------------------------------
           


            google.maps.event.addListener(marker, 'click', (function(marker, i) {
                return function() {
                    google.maps.event.addListener(map, 'click', function(event) {
                        lastClicked = newMarkers[i];
                    });
                    activeMarker = newMarkers[i];
                    if( activeMarker != lastClicked ){
                        for (var h = 0; h < newMarkers.length; h++) {
                            newMarkers[h].content.className = 'marker-loaded';
                            newMarkers[h].infobox.close();
                        }
                        newMarkers[i].infobox.open(map, this);
                        newMarkers[i].infobox.setOptions({ boxClass:'fade-in-marker'});
                        newMarkers[i].content.className = 'marker-active marker-loaded';
                        markerClicked = 1;
                    }
                }
            })(marker, i));

            // ocultar al cerrar imagen-------------------------------------------------------------------------

            google.maps.event.addListener(newMarkers[i].infobox, 'closeclick', (function(marker, i) {
                return function() {
                    activeMarker = 0;
                    newMarkers[i].content.className = 'marker-loaded';
                    newMarkers[i].infobox.setOptions({ boxClass:'fade-out-marker' });
                }
            })(marker, i));
        }

        google.maps.event.addListener(map, 'click', function(event) {
            if( activeMarker != false && lastClicked != false ){
                if( markerClicked == 1 ){
                    activeMarker.infobox.open(map);
                    activeMarker.infobox.setOptions({ boxClass:'fade-in-marker'});
                    activeMarker.content.className = 'marker-active marker-loaded';
                }
                else {
                    markerClicked = 0;
                    activeMarker.infobox.setOptions({ boxClass:'fade-out-marker' });
                    activeMarker.content.className = 'marker-loaded';
                    setTimeout(function() {
                        activeMarker.infobox.close();
                    }, 350);
                }
                markerClicked = 0;
            }
            if( activeMarker != false ){
                google.maps.event.addListener(activeMarker, 'click', function(event) {
                    markerClicked = 1;
                });
            }
            markerClicked = 0;
        });

        // crear cluster -----------------------------------------------------------------------------------------

        var clusterStyles = [
            {
                url: 'img/cluster.png',
                height: 34,
                width: 34
            }
        ];

        var markerCluster = new MarkerClusterer(map, newMarkers, { styles: clusterStyles, maxZoom: 19 });
        markerCluster.onClick = function(clickedClusterIcon, sameLatitude, sameLongitude) {
            return multiChoice(sameLatitude, sameLongitude, json);
        };

        // carga dinamica  ----------------------------------------------------------------------

        google.maps.event.addListener(map, 'idle', function() {
            var visibleArray = [];
            for (var i = 0; i < json.length; i++) {
                if ( map.getBounds().contains(newMarkers[i].getPosition()) ){
                    visibleArray.push(newMarkers[i]);
                    $.each( visibleArray, function (i) {
                        setTimeout(function(){
                            if ( map.getBounds().contains(visibleArray[i].getPosition()) ){
                                if( !visibleArray[i].content.className ){
                                    visibleArray[i].setMap(map);
                                    visibleArray[i].content.className += 'bounce-animation marker-loaded';
                                    markerCluster.repaint();
                                }
                            }
                        }, i * 50);
                    });
                } else {
                    newMarkers[i].content.className = '';
                    newMarkers[i].setMap(null);
                }
            }

            var visibleItemsArray = [];
            $.each(json, function(a) {
                if( map.getBounds().contains( new google.maps.LatLng( json[a].lat, json[a].lng ) ) ) {
                    var category = json[a].category;
                    pushItemsToArray(json, a, category, visibleItemsArray);
                }
            });

            // crear lista de items---------------------------------------------------------------------

            $('.items-list .results').html( visibleItemsArray );

            // revisar si las imagenes fueron cargadas

            $.each(json, function(a) {
                if( map.getBounds().contains( new google.maps.LatLng( json[a].lat, json[a].lng ) ) ) {
                    is_cached(json[a].galeria[0], a);
                }
            });

            // llamar funcion de evaluacin ----------------------------------------------------------------------------------------

            //rating('.results .item');

            var $singleItem = $('.results .item');
            $singleItem.hover(
                function(){
                    newMarkers[ $(this).attr('id') - 1 ].content.className = 'marker-active marker-loaded';
                },
                function() {
                    newMarkers[ $(this).attr('id') - 1 ].content.className = 'marker-loaded';
                }
            );
        });

        redrawMap('google', map);

        function is_cached(src, a) {
            var image = new Image();
            var loadedImage = $('.results li #' + json[a].id + ' .image');
            image.src = src;

            if( image.complete ){
                $(".results").each(function() {
                    loadedImage.removeClass('loading');
                    loadedImage.addClass('loaded');
                });
            }
            else {
                $(".results").each(function() {
                    $('.results li #' + json[a].id + ' .image').addClass('loading');
                });
                $(image).load(function(){
                    loadedImage.removeClass('loading');
                    loadedImage.addClass('loaded');
                });
            }
        }

$("#btn-localizar").click(function(){
  
    if (navigator.geolocation) {
        navigator.geolocation.getCurrentPosition(success);
    } else {
        console.log('geolocalizacion no soportada');
    }

    function success(position) {
        var locationCenter = new google.maps.LatLng( position.coords.latitude, position.coords.longitude);
        map.setCenter( locationCenter );
        map.setZoom(14);
    }

}) ;
   
    
      

        

        // Autocomplete address ----------------------------------------------------------------------------------------
    /*
        var caja  = document.getElementById('local-box');
        var input = document.getElementById('location-usr');
        map.controls[google.maps.ControlPosition.TOP_RIGHT].push(caja);
        var autocomplete =new google.maps.places.Autocomplete(input);

        autocomplete.setFields(
            ['address_components', 'geometry', 'icon', 'name']);

        var infowindow = new google.maps.InfoWindow();
        var infowindowContent = document.getElementById('infowindow-content');
        infowindow.setContent(infowindowContent);
        var marker = new google.maps.Marker({
          map: map,
          anchorPoint: new google.maps.Point(0, -29)
        });

        autocomplete.addListener('place_changed', function() {
          infowindow.close();
          marker.setVisible(false);
          var place = autocomplete.getPlace();
          if (!place.geometry) {
            // User entered the name of a Place that was not suggested and
            // pressed the Enter key, or the Place Details request failed.
            window.alert("No details available for input: '" + place.name + "'");
            return;
          }

          // If the place has a geometry, then present it on a map.
          if (place.geometry.viewport) {
            map.fitBounds(place.geometry.viewport);
          } else {
            map.setCenter(place.geometry.location);
            map.setZoom(17);  // Why 17? Because it looks good.
          }
          marker.setPosition(place.geometry.location);
          marker.setVisible(true);

          var address = '';
          if (place.address_components) {
            address = [
              (place.address_components[0] && place.address_components[0].short_name || ''),
              (place.address_components[1] && place.address_components[1].short_name || ''),
              (place.address_components[2] && place.address_components[2].short_name || '')
            ].join(' ');
          }

          infowindowContent.children['place-icon'].src = place.icon;
          infowindowContent.children['place-name'].textContent = place.name;
          infowindowContent.children['place-address'].textContent = address;
          infowindow.open(map, marker);
        });
        */

        

    }

    


}


$("#search-location").click(function(){
    var direccion = $("#location-usr").val(); 
    var dir;

            $.ajax({
                url: "https://maps.googleapis.com/maps/api/geocode/json?address="+direccion+"&key=AIzaSyCVIDoPcGW-nEx3tPx4iH3VYETVgfMy-YU",
                success: function(sa){
                    dir= sa.results[0].geometry.location; 
                    var _latitude = dir.lat;
                    var _longitude = dir.lng;
                    var jsonPath   = 'Home/consulta';
    
                    // Load JSON data and create Google Maps
                    $.getJSON(jsonPath) 
                        .done(function(json) {
                                // console.log(json); 
                            CrearPaginaInicioGoogleMap(_latitude,_longitude,json);
                            
                        })
                        .fail(function( jqxhr, textStatus, error ){
                            console.log(error);
                        });
                }
            });
})


//google.maps.event.addDomListener(window, 'load', CrearPaginaInicioGoogleMap);


////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
// detalle
////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
/*
function itemDetailMap(json){
    var mapCenter = new google.maps.LatLng(json.lat,json.lng);
    console.log(json.lat, json .lng);
    
    var mapOptions = {
        zoom: 14,
        center: mapCenter,
        disableDefaultUI: true,
        scrollwheel: false,
        styles: mapStyles,
        panControl: false,
        zoomControl: false,
        draggable: true
    };

    var mapElement = document.getElementById('map-detail');
    var map = new google.maps.Map(mapElement, mapOptions);
    var icon
    if( json.type_icon ) icon = '<img src="' + json.type_icon +  '">';
    else icon = '';

    var markerContent = document.createElement('DIV');
    markerContent.innerHTML =
        '<div class="map-marker">' +
            '<div class="icon">' +
            icon +
            '</div>' +
        '</div>';

    // crear marcador en el mapa ------------------------------------------------------------------------------------

    var marker = new RichMarker({
        position: new google.maps.LatLng( json.lat, json.lng ),
        map: map,
        draggable: false,
        content: markerContent,
        flat: true
    });

    marker.content.className = 'marker-loaded';
}*/
function itemDetailMap(json){
    var mapCenter = new google.maps.LatLng(json.lat,json.lng);
    var mapOptions = {
        zoom: 14,
        center: mapCenter,
        disableDefaultUI: true,
        scrollwheel: false,
        styles: mapStyles,
        panControl: false,
        zoomControl: false,
        draggable: true
    };
    var mapElement = document.getElementById('map-detail');
    var map = new google.maps.Map(mapElement, mapOptions);
    if( json.type_icon ) var icon = '<img src="' + json.type_icon +  '">';
    else icon = '';

    // Google map marker content -----------------------------------------------------------------------------------

    var markerContent = document.createElement('DIV');
    markerContent.innerHTML =
        '<div class="map-marker">' +
            '<div class="icon">' +
            icon +
            '</div>' +
        '</div>';

    // Create marker on the map ------------------------------------------------------------------------------------

    var marker = new RichMarker({
        position: new google.maps.LatLng( json.lat, json.lng ),
        map: map,
        draggable: false,
        content: markerContent,
        flat: true
    });

    marker.content.className = 'marker-loaded';
}

////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
// mapa simple (Publicar ...)
////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////

function simpleMap(_latitude, _longitude, draggableMarker){
    var mapCenter = new google.maps.LatLng(_latitude, _longitude);
    var mapOptions = {
        zoom: 16,
        center: mapCenter,
        disableDefaultUI: true,
        scrollwheel: false,
        styles: mapStyles,
        panControl: false,
        zoomControl: true,
        zoomControlOptions: {
            style: google.maps.ZoomControlStyle.LARGE,
            position: google.maps.ControlPosition.BOTTOM_LEFT
        },
        draggable: true
    };
    var mapElement = document.getElementById('map-simple');
    var map = new google.maps.Map(mapElement, mapOptions);


    var markerContent = document.createElement('DIV');
    markerContent.innerHTML =
        '<div class="map-marker">' +
            '<div class="icon"></div>' +
        '</div>';
 

    var marker = new RichMarker({


        position: new google.maps.LatLng( _latitude, _longitude ),
        map: map,
        draggable: draggableMarker,
        content: markerContent,
        flat: true
    });
    
    marker.addListener('drag', function (event) {
      // console.log(this.getPosition().lat());
        $("#latitudx").val( this.getPosition().lat());
        $("#longitudx").val(this.getPosition().lng());
       // console.log(this);
    });

    marker.content.className = 'marker-loaded';
}


function pushItemsToArray(json, a, category, visibleItemsArray){
    var itemPrice;
    visibleItemsArray.push(
        '<li>' +
            '<div class="item" id="' + json[a].id + '">' +
                '<a href="#" class="image">' +
                    '<div class="inner">' +
                        '<div class="item-specific">' +
                            drawItemSpecific(category, json, a) +
                        '</div>' +
                        '<img src="' + json[a].galeria[0] + '" alt="">' +
                    '</div>' +
                '</a>' +
                '<div class="wrapper">' +
                    '<a href="#" id="' + json[a].id + '"><h3>' + json[a].titulo + '</h3></a>' +
                    '<figure>' + json[a].direccion + '</figure>' +
                    drawPrice(json[a].precio) +
                    '<div class="info">' +
                        '<div class="type">' +
                            '<i><img src="' + json[a].type_icon + '" alt=""></i>' +
                            '<span>' + json[a].type + '</span>' +
                        '</div>' +
                        '<div class="rating" data-rating="' + json[a].rating + '"></div>' +
                        '</div>' +
                '</div>' +
            '</div>' +
        '</li>'
    );

    function drawPrice(price){
        if( price ){
            itemPrice = '<div class="price">' + price +  '</div>';
            return itemPrice;
        }
        else {
            return '';
        }
    }
}


function centerMapToMarker(){
    $.each(json, function(a) {
        if( json[a].id == id ) {
            var _latitude = json[a].lat;
            var _longitude = json[a].lng;
            var mapCenter = new google.maps.LatLng(_latitude,_longitude);
            map.setCenter(mapCenter);
        }
    });
}

function redrawMap(mapProvider, map){
    $('.map .toggle-navigation').click(function() {
        $('.map-canvas').toggleClass('results-collapsed');
        $('.map-canvas .map').one("transitionend webkitTransitionEnd oTransitionEnd MSTransitionEnd", function(){
            if( mapProvider == 'osm' ){
                map.invalidateSize();
            }
            else if( mapProvider == 'google' ){
                google.maps.event.trigger(map, 'resize');
            }
        });
    });
}



