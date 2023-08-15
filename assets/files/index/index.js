$('.main_slider').owlCarousel({
    loop:true,
    autoplay:true,
    margin:10,
    autoplay:true,
    autoplayTimeout:3000,
    autoplayHoverPause:true,
    nav:true,
    responsive:{
        0:{
            items:1
        },
        600:{
            items:1
        },
        1000:{
            items:1
        }
    }
})
$('.offer').owlCarousel({
    loop: true,
    autoplay:true,
    autoplayTimeout:3000,
    autoplayHoverPause:true,
    animateOut: 'slideOutDown',
    animateIn: 'flipInX',
    animateOut: 'fadeOut',
    items:1,
    margin:30,
    stagePadding:30,
    smartSpeed:450
});
$('.slider_product').owlCarousel({
    items:4,
    loop:true,
    center:true,
    dots: false,
    margin:10,
    URLhashListener:true,
    autoplayHoverPause:true,
    startPosition: 'URLHash'
});

jQuery(document).ready(function($){
    $('.countdown_time').each(function() {
        var endTime = $(this).data('time');
        $(this).countdown(endTime, function(tm) {
            $(this).html(tm.strftime('<div class="countdown_box"><div class="countdown-wrap"><span class="countdown days">%D </span><span class="cd_text">روز</span></div></div><div class="countdown_box"><div class="countdown-wrap"><span class="countdown hours">%H</span><span class="cd_text">ساعت</span></div></div><div class="countdown_box"><div class="countdown-wrap"><span class="countdown minutes">%M</span><span class="cd_text">دقیقه</span></div></div><div class="countdown_box"><div class="countdown-wrap"><span class="countdown seconds">%S</span><span class="cd_text">ثانیه</span></div></div>'));
        });
    });
});