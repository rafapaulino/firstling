;
(function (window, document, $, undefined) {
    'use strict';

    var app = (function () {

        var $private = {};
        var $public = {};

        $public.top = function () {
            $('#stop').backToTop();
        };
        return $public;
    })();

    // Global
    window.app = app;
    app.top();
})(window, document, jQuery);