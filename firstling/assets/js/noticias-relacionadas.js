(function (window, document, $, undefined) {
    'use strict';

    var nrJCarousel = (function () {

        var $private = {};
        var $public = {};

        //inicia o carousel dos vídeos (apenas os links das tabs) 
        //https://sorgalla.com/jcarousel/examples/responsive/
        $public.initCarousel = function() {
            $( window ).on("load", function() {
                var jcarousel = $('.jcarousel-related-posts').jcarousel({
                    wrap: 'circular'
                });
        
                $('.jcarousel-related-posts-control-prev')
                    .jcarouselControl({
                        target: '-=1'
                });
        
                $('.jcarousel-related-posts-control-next')
                    .jcarouselControl({
                        target: '+=1'
                });  
            });              
        };
        return $public;
    })();

    // Global
    window.nrJCarousel = nrJCarousel;
    nrJCarousel.initCarousel();
})(window, document, jQuery);

