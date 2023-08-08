    // Sticky Header
    $(window).on('scroll',function (){
        var scroll= $(window).scrollTop();
    
        if (scroll >= 150 ) {
        $('.bottom_header').addClass('fixed-top');
    }
        else{
        $('.bottom_header').removeClass('fixed-top');
    }
    });
    