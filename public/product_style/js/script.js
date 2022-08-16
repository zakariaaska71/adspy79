
$(document).ready(function() {


    $('select').niceSelect();





    $('.collapse ul li a').click(function(){

        $(this).parent().siblings().find('.active').removeClass('active')
        $(this).addClass('active')
    
    })

    $('.slider').bxSlider({
        mode: 'fade',
        captions: true,
        slideWidth: 600,
        pager:false
      });



      
  });