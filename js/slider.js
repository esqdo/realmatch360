jQuery(document).ready(function($){
    $(".featuredslides").responsiveSlides({
        auto:true,
        nav:true,
        speed:500,
        navContainer:'.navcontainer',
        prevText: "&#xe07a;",
        nextText: "&#xe079;"
    });
    
    $(".partnerslider").responsiveSlides({
        auto:false,
        pager:true,
        namespace:'partner',
        manualControls:'.partnerpager'
    
    });
    

    $('.contactform').featherlight({
    CloseOnClick: false,
    afterOpen: function () {
      bindEvents();
    }
    });
    
       
    
});

