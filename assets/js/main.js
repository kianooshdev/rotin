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
    $(document).ready(function() {
        $("#toggle").click(function() {
          var elem = $(".toggle-text").text();
          if (elem == "ادامه مطالب") {
            //Stuff to do when btn is in the read more state
            $(".toggle-text").text("بستن");
            $('#toggle').addClass('tg-ic');
            $("#fade").slideDown();
          } else {
            //Stuff to do when btn is in the read less state
            $(".toggle-text").text("ادامه مطالب");
            $('#toggle').removeClass('tg-ic');
            $("#fade").slideUp();
          }
        });
     });
