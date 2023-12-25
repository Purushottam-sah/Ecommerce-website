// Slider banner

$(document).ready(function(){
    $(".slider").bxSlider({
      auto:true,
      infiniteLoop: true,
    });
  });


  // owl carasoul company brand
  $('.owl-carousel').owlCarousel({
    loop:true,
    margin:10,
    autoplay:true,
    autoplayTimeout:1000,
    autoplayHoverPause:true,
    nav: true,
    responsive: {
        0: {
            items: 3
        },
        600: {
            items: 6
        },
        1000: {
            items: 6
        }
    }
})