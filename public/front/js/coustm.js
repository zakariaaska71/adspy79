$(function(){


    $(window).scroll(function(){
    
        if($(window).scrollTop()>=$('.forWho').offset().top){
    
            $('.navbar').css('backgroundColor','#d3f1ff')
            
            }else{
                $('.navbar').css('backgroundColor','transparent')
            
            }
    
    })


    $('.navbar-toggler').click(function(){
        $('.navbar').css('backgroundColor','#fff')

    })
    


    $("body").niceScroll({
        cursorcolor:"#007bff",
        cursorwidth:"12px",
        zindex:"5",
        cursorfixedheight:90
    });




    new WOW({
        boxClass:     'wow',      
        animateClass: 'animated', 
        mobile:       false,
    }).init();

    




})