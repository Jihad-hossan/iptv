( function( $ ) {
	$(document).ready(function () {

        // Data Background
        $("[data-bg]").each(function () {
            let bg = $(this).attr("data-bg");
            $(this).css({
                "background-image": `url(${bg})`,
                "background-size": "cover",
                "background-position": "center",
                "background-repeat": "no-repeat"
            });
        });

        // Hero card Swiper
        var swiper = new Swiper(".hero-card-swiper", {
            effect: "cards",
            grabCursor: true,
            initialSlide: 2,
            loop: true,
            mousewheel: {
              invert: false,
            },
            navigation: {
              nextEl: '.swiper-button-next',
              prevEl: '.swiper-button-prev',
            },
            keyboard: {
              enabled: true,
              onlyInViewport: false,
            },
        });

      // Pricing Slider
      var pricing_swiper = new Swiper(".pricing-swiper", {
          slidesPerView: 3,
          spaceBetween: 30,
          initialSlide: 1,
          navigation: {
              nextEl: '.swiper-button-next',
              prevEl: '.swiper-button-prev',
          },
          pagination: {
            el: '.swiper-pagination',
            clickable: true
          }
      });
          
    });
    
}( jQuery ) );