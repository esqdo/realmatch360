jQuery(document).ready(function($){

    $('.contactform').featherlight({
    CloseOnClick: false,
    afterOpen: function () {
      bindEvents();
    }
    });
    
       
    
});

