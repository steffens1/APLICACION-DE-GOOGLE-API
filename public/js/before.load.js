var $ = jQuery.noConflict();
$(document).ready(function($) {
    "use strict";
    var $body = $('body');
    mobileNavigation();
    toggleNav();
});

$(window).resize(function(){
    mobileNavigation();
});


function mobileNavigation(){
    if( $(window).width() < 979 ){
        $(".main-navigation.navigation-top-header").remove();
        $(".toggle-navigation").css("display","inline-block");
        $("body").removeClass("navigation-top-header");
        $("body").addClass("navigation-off-canvas");
    }
}

// Toggle off canvas navigation ----------------------------------------------------------------------------------------

function toggleNav() {

    if( $('body').hasClass('navigation-off-canvas') ){
        $('.header .toggle-navigation').click(function() {
            $('#outer-wrapper').toggleClass('show-nav');
        });
        $('#page-content').click(function() {
            $('#outer-wrapper').removeClass('show-nav');
        });
    }

}