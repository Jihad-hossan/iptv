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

        // Swiper
        var swiper = new Swiper(".swiper", {
            effect: "cards",
            grabCursor: true,
            navigation: {
              nextEl: '.swiper-button-next',
              prevEl: '.swiper-button-prev',
            },
            keyboard: {
              enabled: true,
              onlyInViewport: false,
            },
        });
          
    });
    
}( jQuery ) );