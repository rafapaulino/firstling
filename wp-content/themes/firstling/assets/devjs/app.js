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

        $public.formValidate = function () {
            $(".formValidate").validate();
            $("#commentform").validate();
        };

        $public.customAudioPlayer = function () {
            $( window ).on( "load", function() {
                //audio
                var audio = document.querySelectorAll('audio');
                var total = audio.length;
                var audio_loop;
                if (total > 0) {
                    for (audio_loop = 0; audio_loop < total; audio_loop++) {
                        new Plyr(audio[audio_loop]);
                    }
                }
            });
        };

        $public.customVideoPlayer = function () {
            $( window ).on( "load", function() {
                //video
                var video = document.querySelectorAll('video');
                var total = video.length;
                var video_loop;
                if (total > 0) {
                    for (video_loop = 0; video_loop < total; video_loop++) {
                        new Plyr(video[video_loop]);
                    }
                }
            });
        };

        //http://jsfiddle.net/mica/mZdFS/2/
        $public.customIframeMediaPlayer = function () {
            $( window ).on( "load", function() {
                //iframe (youtube/vimeo)
                var iframe = document.querySelectorAll('iframe');
                var total = iframe.length;
                var iframe_loop;
                if (total > 0) {
                    for (iframe_loop = 0; iframe_loop < total; iframe_loop++) {
                        var url = iframe[iframe_loop].src;

                        if ($private.testYouTubeUrl(url)) {
                            var youtubeId = $private.getYouTubeId(url); 
                            youtubeId = 'youtube-' + youtubeId[1] + iframe_loop;                          
                            $(iframe[iframe_loop]).wrap( '<div class="plyr__video-embed" id="' + youtubeId + '"></div>' );
                            
                            new Plyr(iframe[iframe_loop]);
                        }
                    }
                }
            });
        };

        $private.testVimeoUrl = function (str) {
            var exp = new RegExp(/(vimeo\.com)/);
            return exp.test(str);
        };

        $private.getVimeoUrl = function (url) {
            var regExp = /^.*(vimeo\.com\/)((channels\/[A-z]+\/)|(groups\/[A-z]+\/videos\/))?([0-9]+)/;
            var parseUrl = regExp.exec(url);
            return parseUrl[5];
        };

        $private.testYouTubeUrl = function (str) {
            var exp = new RegExp(/(youtu\.be|youtube\.com)/);
            return exp.test(str);
        };

        $private.getYouTubeId = function (url) {
            var exp = /(?:youtube\.com\/(?:[^\/]+\/.+\/|(?:v|e(?:mbed)?)\/|.*[?&]v=)|youtu\.be\/)([^"&?\/ ]{11})/i;
            return exp.exec(url);         
        };

        $public.initMenu = function () {
            $( window ).on( "load", function() {
               $('#navbarNavDropdown').smartmenus();;
            });
        };


        return $public;
    })();

    // Global
    window.app = app;
    app.top();
    app.animateSearch();
    app.formValidate();
    app.customAudioPlayer();
    app.customVideoPlayer();
    //app.customIframeMediaPlayer();
    app.initMenu();

})(window, document, jQuery);