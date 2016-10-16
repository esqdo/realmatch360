jQuery(document).ready(function($){

    $('.contactform').featherlight({
    CloseOnClick: false,
    afterOpen: function () {
      bindEvents();
    }
    });

    $('.toggle-menu').on("click touchstart", function(){
        $(".mobile-menu .menu-main-container").toggleClass("active");
    });
    
});

