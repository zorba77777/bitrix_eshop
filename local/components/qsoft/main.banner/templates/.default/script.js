$(document).ready(function () {
   
   if ($(".bxslider").length > 0 && $(".bxslider .banner").length > 1) {
       var slider = $(".bxslider").bxSlider({
           auto: true,
           pause: 3000,
           onSlideAfter: function() {
               slider.startAuto();
           }
       });
   }
});
