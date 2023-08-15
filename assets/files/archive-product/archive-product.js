jQuery(document).ready(function($){
    $('.shorting_icon').on('click', function (){
        if($(this).hasClass('grid')){
            $('.shop_container').removeClass('list').addClass('grid');
            $(this).addClass('active').siblings().removeClass('active');
        }
        else if($(this).hasClass('list')){
            $('.shop_container').removeClass('grid').addClass('list');
            $(this).addClass('active').siblings().removeClass('active');
        }
    });
});