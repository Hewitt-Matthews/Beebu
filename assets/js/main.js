
$(document).ready(function() {

  // Open mobile navigation
  (function () {
    const body = document.querySelector("body");
    const html = document.querySelector("html");
    const hamburger = document.querySelector(".js-open-nav");
    const mobNavMenu = document.querySelector(".header__menu");
    let isNavOpen = false;

    // Add navopen class to hamburger too

    const openMobileNav = function () {
      
      if (window.innerWidth <= 768) {

        hamburger.addEventListener('click', () => {
          
          if (!isNavOpen) {

            body.style.overflowY = 'hidden';
            html.style.overflowY = 'hidden';
            mobNavMenu.classList.add('nav-open');
            hamburger.classList.add('nav-open');
            setTimeout(() => {
              isNavOpen = true;
              },1)

          } else {

            body.style.overflowY = 'scroll';
            html.style.overflowY = 'scroll';
            mobNavMenu.classList.remove('nav-open');
            hamburger.classList.remove('nav-open');
            setTimeout(() => {
              isNavOpen = false;
              },1)

          }

        })

      }

    }

    // Trigger function straight away
    openMobileNav();

    // Trigger function on screensize change
    window.addEventListener('resize', () => {

      openMobileNav();
      body.style.overflowY = 'scroll';
      html.style.overflowY = 'scroll';
      mobNavMenu.classList.remove('nav-open');
      hamburger.classList.remove('nav-open');
      isNavOpen = false;

    });


  })();


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



    // Animate guages
    if ( document.querySelector('.js-packages') ) {

        const observer = new IntersectionObserver(entries => {
            entries.forEach(entry => {
              if (entry.isIntersecting) {
                // Element is in view
                entry.target.querySelectorAll('.js-percentage').forEach(el => {
                    el.style.animationDelay = '.5s';
                    el.style.transition = 'all 2s ease';
                  el.style.transform = 'rotate(var(--rotation-2))';
                });
              } else {
                // Element not in view
                entry.target.querySelectorAll('.js-percentage').forEach(el => {
                  el.style.animationDelay = '0s';
                  el.style.transition = 'none';
                  el.style.transform = 'rotate(0deg)';
                });
              }
            });
          });
          
      
              const gauges = document.querySelectorAll('.js-gauge');
              gauges.forEach(gauge => {
                  observer.observe(gauge);
              });

    }

});