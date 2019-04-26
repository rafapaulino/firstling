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

        $public.formValidate = function () {
            $(".formValidate").validate();
            $("#commentform").validate();
        };

        return $public;
    })();

    // Global
    window.app = app;
    app.top();
    app.animateSearch();
    app.toogleMenu();
    app.formValidate();

})(window, document, jQuery);