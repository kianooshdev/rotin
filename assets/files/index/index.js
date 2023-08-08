$('.main_slider').owlCarousel({
    loop:true,
    autoplay:true,
    margin:10,
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
    animateOut: 'slideOutDown',
    animateIn: 'flipInX',
    animateOut: 'fadeOut',
    items:1,
    margin:30,
    stagePadding:30,
    smartSpeed:450
});