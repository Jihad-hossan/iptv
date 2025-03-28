( function( $ ) {
	$(document).ready(function () {

        // Data Background
        $('[data-background-image]').each(function() {
          var imageUrl = $(this).data('background-image');
          
          // Set the background image
          $(this).css({
            'background-image': 'url(' + imageUrl + ')',
            'background-size': 'cover', // or 'contain' based on your needs
            'background-position': 'center center',
            'background-repeat': 'no-repeat'
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
        slidesPerView: 1, // Default for mobile first approach
        spaceBetween: 20,
        initialSlide: 1,
        breakpoints: {
            640: {
                slidesPerView: 1,
                spaceBetween: 20,
            },
            768: {
                slidesPerView: 2,
                spaceBetween: 40,
            },
            992: {
                slidesPerView: 3,
                spaceBetween: 50,
            },
        },
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