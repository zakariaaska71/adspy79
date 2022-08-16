$(window).ready(function () {



    $('.btn-update').click(function(){
        if($('input').hasClass('d-none')){

            $('input').removeClass('d-none');
            $('input').addClass('d-block')

            $('.data p,.joined,.date,.btn-update').addClass('remove');

            $('.btn-ok').css("display","block");

            $('.mail').css('marginTop',"1em")
        }
    })


    $('.btn-ok').click(function(){
        $('input').removeClass('d-block');
        $('input').addClass('d-none');

        $('.data p,.joined,.date,.btn-update').removeClass('remove');

        $('.mail').css('marginTop',"0")

        $(this).hide()
    });
    

    var cleave = new Cleave('.MM', {
        date: true,
        datePattern: ['m']
    });

    var cleave = new Cleave('.YY', {
        date: true,
        datePattern: ['Y']
    });

    var cleave = new Cleave('.CVC', {
        blocks: [3]
    });

    var cleave = new Cleave('.card-num', {
        delimiter: ' ',
        blocks: [4,4,4,4]
    });



    $('.payment-box').click(function(){
        $(this).parent().parent().parent().parent().parent().hide()
        $('.triger').trigger('click')
    })


});