var mapStyles = [ {"featureType":"road","elementType":"labels","stylers":[{"visibility":"simplified"},{"lightness":20}]},{"featureType":"administrative.land_parcel","elementType":"all","stylers":[{"visibility":"off"}]},{"featureType":"landscape.man_made","elementType":"all","stylers":[{"visibility":"on"}]},{"featureType":"transit","elementType":"all","stylers":[{"saturation":-100},{"visibility":"on"},{"lightness":10}]},{"featureType":"road.local","elementType":"all","stylers":[{"visibility":"on"}]},{"featureType":"road.local","elementType":"all","stylers":[{"visibility":"on"}]},{"featureType":"road.highway","elementType":"labels","stylers":[{"visibility":"simplified"}]},{"featureType":"poi","elementType":"labels","stylers":[{"visibility":"off"}]},{"featureType":"road.arterial","elementType":"labels","stylers":[{"visibility":"on"},{"lightness":50}]},{"featureType":"water","elementType":"all","stylers":[{"hue":"#a1cdfc"},{"saturation":30},{"lightness":49}]},{"featureType":"road.highway","elementType":"geometry","stylers":[{"hue":"#f49935"}]},{"featureType":"road.arterial","elementType":"geometry","stylers":[{"hue":"#fad959"}]}, {featureType:'road.highway',elementType:'all',stylers:[{hue:'#dddbd7'},{saturation:-92},{lightness:60},{visibility:'on'}]}, {featureType:'landscape.natural',elementType:'all',stylers:[{hue:'#c8c6c3'},{saturation:-71},{lightness:-18},{visibility:'on'}]},  {featureType:'poi',elementType:'all',stylers:[{hue:'#d9d5cd'},{saturation:-70},{lightness:20},{visibility:'on'}]} ];

var locations = [ [51.541599, -0.112588], [51.554604, -0.070767] ];
//google.maps.event.addDomListener(window, 'load', createHomepageGoogleMap());

// Set map height to 100% ----------------------------------------------------------------------------------------------

var $body = $('body');
if( $body.hasClass('map-fullscreen') ) {
    $('.map-canvas').height( $(window).height() - $('.header').height() );
}

////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
// Homepage map - Google
////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
var mapLoaded = false;
function createHomepageGoogleMap(_latitude,_longitude,json){
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
            position: google.maps.ControlPosition.RIGHT_TOP
        }
    };
    var clusterStyles = [
        {
            url: 'img/cluster.png',
            height: 34,
            width: 34
        }
    ];
    var mapElement = document.getElementById('map');
    var map = new google.maps.Map(mapElement, mapOptions);
    var newMarkers = [];
    var markerClicked = 0;
    var activeMarker = false;
    var lastClicked = false;

    for (var i = 0; i < json.length; i++) {

        // Google map marker content -----------------------------------------------------------------------------------

        var markerContent = document.createElement('DIV');
        if( json[i].featured == 1 ) {
            markerContent.innerHTML =
            '<div class="map-marker featured' + json[i].color + '">' +
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

        // Create marker on the map ------------------------------------------------------------------------------------

        var marker = new RichMarker({
            position: new google.maps.LatLng( json[i].lat, json[i].lng ),
            map: map,
            draggable: false,
            content: markerContent,
            flat: true
        });

        newMarkers.push(marker);

        // Create infobox for marker -----------------------------------------------------------------------------------

        var infoboxContent = document.createElement("div");
        infoboxOptions = {
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
        drawInfobox(category, infoboxContent, json, i);

        // Create new markers ------------------------------------------------------------------------------------------

        newMarkers[i].infobox = new InfoBox(infoboxOptions);

        // Show infobox after click ------------------------------------------------------------------------------------

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

        // Fade infobox after close is clicked -------------------------------------------------------------------------

        google.maps.event.addListener(newMarkers[i].infobox, 'closeclick', (function(marker, i) {
            return function() {
                activeMarker = 0;
                newMarkers[i].content.className = 'marker-loaded';
                newMarkers[i].infobox.setOptions({ boxClass:'fade-out-marker' });
            }
        })(marker, i));

        // Set function to load data for modal when infobox being loaded -----------------------------------------------

        google.maps.event.addListener(newMarkers[i].infobox, 'domready', (function(marker, i) {
            return function() {
                $('.quick-view').click( function(){
                    var id = $(this).attr('id');
                    loadDataForModal(json, id);
                });
            }
        })(marker, i));
    }

    // Close infobox after click on map --------------------------------------------------------------------------------

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

    // Create marker clusterer -----------------------------------------------------------------------------------------

    var markerCluster = new MarkerClusterer(map, newMarkers, { styles: clusterStyles });
    markerCluster.onClick = function(clickedClusterIcon, sameLatitude, sameLongitude) {
        return multiChoice(clickedClusterIcon.cluster_, sameLatitude, sameLongitude, json);
    };


    // Dynamic loading markers and data from JSON ----------------------------------------------------------------------

    google.maps.event.addListener(map, 'idle', function() {
//        $.each( json, function (i) {
//            setTimeout(function(){
//                if ( map.getBounds().contains(newMarkers[i].getPosition()) ){
//                    if( !newMarkers[i].content.className ){
//                        newMarkers[i].setMap(map);
//                        newMarkers[i].content.className += 'bounce-animation marker-loaded';
//                        //markerCluster.repaint();
//                    }
//                } else {
//                    newMarkers[i].content.className = '';
//                    newMarkers[i].setMap(null);
//                }
//            }, i * 50);
//        });


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
                        } else {
                            //newMarkers[i].content.className = '';
                            //newMarkers[i].setMap(null);
                        }
                    }, i * 50);
                });
            } else {
                newMarkers[i].content.className = '';
                newMarkers[i].setMap(null);
            }
        }

//        for (var i = 0; i < json.length; i++) {
//            if ( map.getBounds().contains(newMarkers[i].getPosition()) ){
//                newMarkers[i].setMap(map);
//                //markerCluster.setMap(map);
//            } else {
//                newMarkers[i].setMap(null);
//                //markerCluster.setMap(null);
//            }
//        }

        var visibleItemsArray = [];
        $.each(json, function(a) {
            if( map.getBounds().contains( new google.maps.LatLng( json[a].lat, json[a].lng ) ) ) {
                var category = json[a].category;
                pushItemsToArray(json, a, category, visibleItemsArray);
            }
        });

        // Create list of items in Results sidebar ---------------------------------------------------------------------

        $('.items-list .results').html( visibleItemsArray );

        // Check if images are cached, so will not be loaded again

        $.each(json, function(a) {
            if( map.getBounds().contains( new google.maps.LatLng( json[a].lat, json[a].lng ) ) ) {
                is_cached(json[a].path, a);
            }
        });

        // Call Rating function ----------------------------------------------------------------------------------------

        rating('.results .item');

        // Click on item in Results sidebar ----------------------------------------------------------------------------

        var $singleItem = $('.results .item');
        $singleItem.click( function(){
            var id = $(this).attr('id');
            loadDataForModal(json, id);
        });

        $singleItem.hover(
            function(){
                newMarkers[ $(this).attr('id') - 1 ].content.className = 'marker-active marker-loaded';
        },
            function() {
                newMarkers[ $(this).attr('id') - 1 ].content.className = 'marker-loaded';
            }
        );
    });

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
}

////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
// Item Detail Map - Google
////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////

function itemDetailMap(json){
    var mapCenter = new google.maps.LatLng(json.latitude,json.longitude);
    var mapOptions = {
        zoom: 14,
        center: mapCenter,
        disableDefaultUI: true,
        scrollwheel: false,
        styles: mapStyles,
        panControl: false,
        zoomControl: false,
        draggable: false
    };
    var mapElement = document.getElementById('map-detail');
    var map = new google.maps.Map(mapElement, mapOptions);

    // Google map marker content -----------------------------------------------------------------------------------

    var markerContent = document.createElement('DIV');
    markerContent.innerHTML =
        '<div class="map-marker' + json.color + '">' +
            '<div class="icon">' +
            '<img src="' + json.type_icon +  '">' +
            '</div>' +
            '</div>';

    // Create marker on the map ------------------------------------------------------------------------------------

    var marker = new RichMarker({
        //position: mapCenter,
        position: new google.maps.LatLng( json.latitude, json.longitude ),
        map: map,
        draggable: false,
        content: markerContent,
        flat: true
    });
}

////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
// Contact Map - Google
////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////

function contactMap(_latitude, _longitude){
    var mapCenter = new google.maps.LatLng(_latitude, _longitude);
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
    var mapElement = document.getElementById('map-contact');
    var map = new google.maps.Map(mapElement, mapOptions);

    // Google map marker content -----------------------------------------------------------------------------------

    var markerContent = document.createElement('DIV');
    markerContent.innerHTML =
        '<div class="map-marker">' +
            '<div class="icon"></div>' +
        '</div>';

    // Create marker on the map ------------------------------------------------------------------------------------

    var marker = new RichMarker({
        //position: mapCenter,
        position: new google.maps.LatLng( _latitude, _longitude ),
        map: map,
        draggable: false,
        content: markerContent,
        flat: true
    });
}

////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
// Functions
////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////

// Draw Infobox for marker ---------------------------------------------------------------------------------------------

function drawInfobox(category, infoboxContent, json, i){
    // Real Estate Infobox ---------------------------------------------------------------------------------------------
    if( category == 'real_estate' ){
        infoboxContent.innerHTML =
        '<div class="infobox real_estate ' + json[i].color + '">' +
            '<div class="inner">' +
                '<div class="image">' +
                    '<div class="price">$' + json[i].price +  '</div>'+
                    '<div class="item-specific">' +
                        '<span title="Bedrooms"><img src="img/bedrooms.png">' + json[i].bedrooms + '</span>' +
                        '<span title="Bathrooms"><img src="img/bathrooms.png">' + json[i].bathrooms + '</span>' +
                        '<span title="Area"><img src="img/area.png">' + json[i].area + '<sup>2</sup></span>' +
                        '<span title="Garages"><img src="img/garages.png">' + json[i].garages + '</span>' +
                    '</div>' +
                    '<div class="overlay">' +
                        '<div class="wrapper">' +
                            '<a href="#" class="quick-view" data-toggle="modal" data-target="#modal" id="' + json[i].id + '">Quick View</a>' +
                            '<hr>' +
                            '<a href="' + json[i].url +  '" class="detail">Go to Detail</a>' +
                        '</div>' +
                    '</div>' +
                    '<a href="' + json[i].url +  '" class="description">' +
                        '<div class="meta">' +
                            '<div class="type">' + json[i].type +  '</div>' +
                            '<h2>' + json[i].nombre +  '</h2>' +
                            '<figure>' + json[i].location +  '</figure>' +
                            '<i class="fa fa-angle-right"></i>' +
                        '</div>' +
                    '</a>' +
                    '<img src="' + json[i].path +  '">' +
                '</div>' +
            '</div>' +
        '</div>';
    }
    // Bar & Restaurant Infobox ----------------------------------------------------------------------------------------
    else if( category == 'bar_restaurant' ){
        infoboxContent.innerHTML =
        '<div class="infobox bar_restaurant ' + json[i].color + '">' +
            '<div class="inner">' +
                '<div class="image">' +
                    '<div class="price"><strong>Daily Menu: </strong>$' + json[i].price +  '</div>'+
                    '<div class="overlay">' +
                        '<div class="wrapper">' +
                            '<a href="#" class="quick-view" data-toggle="modal" data-target="#modal" id="' + json[i].id + '">Quick View</a>' +
                            '<hr>' +
                            '<a href="' + json[i].url +  '" class="detail">Go to Detail</a>' +
                        '</div>' +
                    '</div>' +
                    '<a href="' + json[i].url +  '" class="description">' +
                        '<div class="meta">' +
                            '<div class="type">' + json[i].type +  '</div>' +
                            '<h2>' + json[i].nombre +  '</h2>' +
                            '<figure>' + json[i].location +  '</figure>' +
                            '<i class="fa fa-angle-right"></i>' +
                        '</div>' +
                    '</a>' +
                    '<img src="' + json[i].path +  '">' +
                '</div>' +
            '</div>' +
        '</div>';
    }
    // Other Infobox ---------------------------------------------------------------------------------------------------
    else {
        infoboxContent.innerHTML =
        '<div class="infobox ' + json[i].color + '">' +
            '<div class="inner">' +
                '<div class="image">' +
                    '<div class="overlay">' +
                        '<div class="wrapper">' +
                            '<a href="#" class="quick-view" data-toggle="modal" data-target="#modal" id="' + json[i].id + '">Quick View</a>' +
                            '<hr>' +
                            '<a href="' + json[i].url +  '" class="detail">Go to Detail</a>' +
                        '</div>' +
                    '</div>' +
                    '<a href="' + json[i].url +  '" class="description">' +
                        '<div class="meta">' +
                            '<div class="type">' + json[i].type +  '</div>' +
                            '<h2>' + json[i].nombre +  '</h2>' +
                            '<figure>' + json[i].location +  '</figure>' +
                            '<i class="fa fa-angle-right"></i>' +
                        '</div>' +
                    '</a>' +
                    '<img src="' + json[i].path +  '">' +
                '</div>' +
            '</div>' +
        '</div>';
    }

}

// Push items to array and create <li> element in Results sidebar ------------------------------------------------------

function pushItemsToArray(json, a, category, visibleItemsArray){
    visibleItemsArray.push(
        '<li>' +
            '<a href="#" class="item" id="' + json[a].id + '">' +
                '<div class="image">' +
                    '<div class="inner">' +
                        '<div class="item-specific">' +
                            '<span>' + drawItemSpecific(category) + '</span>' +
                        '</div>' +
                        '<img src="' + json[a].path + '" alt="">' +
                    '</div>' +
                '</div>' +
                '<div class="wrapper">' +
                    '<div id="' + json[a].id + '"><h3>' + json[a].nombre + '</h3></div>' +
                    '<figure>' + json[a].location + '</figure>' +
                    itemPrice(json[a].price) +
                    '<div class="info">' +
                        '<div class="type">' +
                            '<i><img src="' + json[a].type_icon + '" alt=""></i>' +
                            '<span>' + json[a].type + '</span>' +
                        '</div>' +
                        '<div class="rating" data-rating="' + json[a].rating + '"></div>' +
                    '</div>' +
                '</div>' +
            '</a>' +
        '</li>'
    );

    function drawItemSpecific(category){
        if( category ){
            if( category == 'real_estate' ){
                var itemSpecific =
                '<div class="item-specific">' +
                    '<span title="Bedrooms"><img src="img/bedrooms.png">' + json[a].bedrooms + '</span>' +
                    '<span title="Bathrooms"><img src="img/bathrooms.png">' + json[a].bathrooms + '</span>' +
                    '<span title="Area"><img src="img/area.png">' + json[a].area + '<sup>2</sup></span>' +
                    '<span title="Garages"><img src="img/garages.png">' + json[a].garages + '</span>' +
                '</div>';
                return itemSpecific;
            }
            else if ( category == 'bar_restaurant' ){
                return '';
            }
        }
        else {
            return '';
        }
    }

    function itemPrice(price){
        if( price ){
            var itemPrice = '<div class="price">$' + price +  '</div>';
            return itemPrice;
        }
        else {
            return '';
        }
    }
}

// Load data for modal before it is created (drawn) --------------------------------------------------------------------

function loadDataForModal(json, id){
    $.each(json, function(a) {
        if( json[a].id == id ) {
            drawModal(json, a);
        }
    });
}

// Draw (create) modal -------------------------------------------------------------------------------------------------

function drawModal(json, a){
    var modal =
        '<div class="modal fade" id="modal" tabindex="-1" role="dialog" aria-labelledby="modalLabel" aria-hidden="true">' +
            '<div class="modal-dialog">' +
                '<div class="modal-content">' +
                    '<div class="modal-header">' +
                        '<button type="button" class="close" data-dismiss="modal"><span aria-hidden="true"><img src="img/close.png"></span></button>' +
                        '<div class="left">' +
                            '<h2>' + json[a].nombre + '</h2>' +
                            '<figure>' + json[a].location + '</figure>' +
                            '<div class="rating" data-rating="' + json[a].rating + '">' +
                                '<aside class="reviews">6 reviews</aside>' +
                            '</div>' +
                        '</div>' +
                        '<div class="right">' +
                            '<span class="type">' +
                                '<img src="' + json[a].type_icon + '">' +
                                '<span>' + json[a].type + '</span>' +
                            '</span>' +
                            '<a href="#" class="bookmark"></a>' +
                        '</div>' +
                    '</div>' +
                    '<div class="modal-body">' +
                        '<div class="row">' +
                            '<div class="col-md-6">' +
                                '<div class="image">' + drawModalGallery(json, json[a].id) + '</div>' +
                                '<div>'+ drawModalFeatures(json, json[a].id) + '</div>' +
                            '</div>' +
                            '<div class="col-md-6">' +
                                '<section>' +
                                    '<h3>Description</h3>' +
                                    '<p>Curabitur odio nibh, luctus non pulvinar a, ultricies ac diam. Donec neque massa, viverra interdum eros ut, imperdiet</p>' +
                                '</section>' +
                                '<hr>' +
                                '<section>' +
                                    '<h3>Overview</h3>' +
                                    '<dl>' +
                                        '<dt>Bedrooms</dt>' +
                                        '<dd>2</dd>' +
                                        '<dt>Bathrooms</dt>' +
                                        '<dd>2</dd>' +
                                        '<dt>Area</dt>' +
                                        '<dd>240m<sup>2</sup></dd>' +
                                        '<dt>Garages</dt>' +
                                        '<dd>1</dd>' +
                                        '<dt>Build Year</dt>' +
                                        '<dd>1990</dd>' +
                                    '</dl>' +
                                '</section>' +
                                '<hr>' +
                                '<section>' +
                                    '<h3>Last Review</h3>' +
                                    '<div class="rating" data-rating="' + json[a].rating + '">' +
                                        '<p>Curabitur odio nibh, luctus non pulvinar a, ultricies ac diam. Donec neque massa, viverra interdum eros ut, imperdiet </p>' +
                                    '</div>' +
                                '</section>' +
                            '</div>' +
                        '</div>' +
                    '</div>' +
                    '<div class="modal-footer">' +
                        '<a href="item-detail.php" class="btn btn-default btn-large">Show Detail</a>' +
                    '</div>' +
                '</div>' +
            '</div>' +
        '</div>';

    // Draw Modal gallery --------------------------------------------------------------------------------------------------

    function drawModalGallery(json, id){
        var gallery = '<div class="owl-carousel gallery">';
        $.each(json, function(a) {
            if( json[a].id == id ) {
                for( var i=0; i<json[a].gallery.length; i++ ){
                    gallery += '<img src="' + json[a].path + '">';
                }
            }
        });
        gallery += '</div>';
        return gallery;
    }

    function drawModalFeatures(json, id){
        if( json[a].features ){
            var features =
                '<div class="features expandable-content collapsed" id="modal-features">' +
                    '<div class="content">' +
                        '<h3>Features</h3>' +
                        '<ul class="bullets">';
                            $.each(json, function(a) {
                                if( json[a].id == id ) {
                                    if( json[a].features ){
                                        for( var i=0; i<json[a].features.length; i++ ){
                                            features += '<li>' + json[a].features[i] + '</li>';
                                        }
                                    }
                                }
                            });
                            features +=
                        '</ul>' +
                        '</div>' +
                    '</div>' +
                '</div>' +
                '<div class="btn btn-small expand-content height" data-expand="#modal-features" data-dimension="height">Show All<i class="fa fa-plus"></i>';
            return features;
        }
        else {
            return "";
        }
    }

    $('body').append(modal);
    var $modal = $('.modal');
    $modal.on('shown.bs.modal', function (e) {
        drawOwlCarousel();
        rating('.modal');
    });
    $modal.on('hidden.bs.modal', function (e) {
        $('.modal').remove();
    });
}

function centerMapToMarker(){
    $.each(json, function(a) {
        if( json[a].id == id ) {
            var _latitude = json[a].lat;
            var _longitude = json[a].lng;
            mapCenter = new google.maps.LatLng(_latitude,_longitude);
            map.setCenter(mapCenter);
        }
    });
}

function multiChoice(clickedCluster, sameLatitude, sameLongitude, json) {

    if (clickedCluster.getMarkers().length > 1)
    {
        var $body = $('body');
        var multipleItems = [];
        $.each(json, function(a) {
            if( json[a].lat == sameLatitude && json[a].lng == sameLongitude ) {
                pushItemsToArray(json, a, json[a].category, multipleItems);
                //$('body').append('<div class="box">asdf</div>');
                console.log(json[a].nombre);
                //alert( json[a].nombre );
            }
        });
        $('.cluster').live('click',  function(e){

            $body.append('<div class="modal-multichoice fade_in"></div>');
            $('.modal-multichoice').load( "_modal-multichoice.html" );
            //$('.modal-multichoice').html( multipleItems );

        });
        return false;
    }
    return true;
}

function expandCluster(_this){
    var _top = $(_this).offset().top + 10;
    var _left = $(_this).offset().left + 12;

    $('body').append('<div class="box"></div>');
    $('body').append('<div class="box"></div>');
    $('body').append('<div class="box"></div>');

    var noElements = $('.box').length;
    var xDistance = 30;
    var angle = 0;

    $('.box').each(function(index) {
        angle = (360 / noElements)*index;
        $(this).css( {'left': _left + ( Math.sin(angle*0.0175) * xDistance ), 'top': _top + (Math.cos(angle*0.0175) * xDistance)} );
    });
}