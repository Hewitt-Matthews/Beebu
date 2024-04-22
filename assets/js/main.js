
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


    if ( document.querySelector('.packages') ) {

        const observer = new IntersectionObserver(entries => {
            entries.forEach(entry => {
              if (entry.isIntersecting) {
                console.log('hello');
                // Element is in view
                entry.target.querySelectorAll('.gauge .percentage').forEach(el => {
                    el.style.animationDelay = '.5s';
                    el.style.transition = 'all 2s ease';
                  el.style.transform = 'rotate(var(--rotation-2))';
                });
              } else {
                // Element not in view
                entry.target.querySelectorAll('.gauge .percentage').forEach(el => {
                  el.style.animationDelay = '0s';
                  el.style.transition = 'none';
                  el.style.transform = 'rotate(0deg)';
                });
              }
            });
          });
          
      
              const gauges = document.querySelectorAll('.packages .gauge');
              gauges.forEach(gauge => {
                  observer.observe(gauge);
              });

    }
    

});
