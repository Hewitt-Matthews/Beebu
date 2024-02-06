
$(document).ready(function() {

    $('#tabs li a').click(function(){
        var t = $(this).attr('id');
        if($(this).hasClass('inactive')){ //this is the start of our condition
            $('#tabs li a').addClass('inactive');
            $(this).removeClass('inactive');

            $('.container').hide();
            $('#'+ t + 'C').fadeIn('slow');
        }
    });
    
    $('.js-question-toggle').each(function(i, elem) {
        // console.log(e);
        $(elem).parent().parent().addClass('is-closed');
    });

    $('.js-question-toggle').click(function(e) {
        $(e.target).parent().parent().toggleClass('is-closed');
    });

});
