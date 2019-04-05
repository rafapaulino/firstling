;
(function (window, document, $, undefined) {
    'use strict';

    var app = (function () {

        var $private = {};
        var $public = {};

        $public.top = function () {
            $('#stop').backToTop();
        };

        $public.animateSearch = function () {
            $('#open-search').on('click',function() {
                $('#search-content').addClass('open');
            });

            $('#close-search').on('click',function() {
                $('#search-content').removeClass('open');
            });
        };

        $public.toogleMenu = function () {
            $('#close-menu').on('click', function() {
                $(this).removeClass('open');
                $('#primary-menu').removeClass('open');
            });

            $('#menu').on('click', function() {
                $('#close-menu').addClass('open');
                $('#primary-menu').addClass('open');
            });
        };

        return $public;
    })();

    // Global
    window.app = app;
    app.top();
    app.animateSearch();
    app.toogleMenu();

})(window, document, jQuery);