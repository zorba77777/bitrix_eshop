$(document).ready(function () {

    if ($(".bxslider .banner").length === 3) {

        $(".bxslider").bxSlider({
            controls: false,
            autoStart: false
        });

    } else {

        $(".bxslider").bxSlider({
            pause: 3000
        });

        $('.bx-controls-direction a').on('click', function () {
            $(".bxslider").bxSlider({
                auto: true,
                pause: 3000
            });
        });

        $('.bx-pager-link').on('click', function () {
            $(".bxslider").bxSlider({
                auto: true,
                pause: 3000
            });
        });
    }
})
