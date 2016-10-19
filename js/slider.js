jQuery(document).ready(function($){

    $('.contactform').featherlight({
    CloseOnClick: false,
    afterOpen: function () {
      bindEvents();
    }
    });

    $('.toggle-menu').on("click", function(){
        $(".mobile-menu > ul > div").toggleClass("active");
    });
    
});

