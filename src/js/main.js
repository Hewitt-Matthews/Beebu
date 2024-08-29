
$(document).ready(function() {

  // Open mobile navigation
  (function () {
    const body = document.querySelector("body");
    const html = document.querySelector("html");
    const hamburger = document.querySelector(".js-open-nav");
    const mobNavMenu = document.querySelector(".header__menu");
    const headerLogo = document.querySelector(".header__logo");
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
            headerLogo.classList.add('nav-open');
            setTimeout(() => {
              isNavOpen = true;
              },1)

          } else {

            body.style.overflowY = 'scroll';
            html.style.overflowY = 'scroll';
            mobNavMenu.classList.remove('nav-open');
            hamburger.classList.remove('nav-open');
            headerLogo.classList.remove('nav-open');
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


    // Adjust the .wrapper--slider left spacing so that it fits inline with other content
    if(document.querySelector('.wrapper--slider')){

      function applyPaddingAndMargin(sourceSelector, targetSelector) {
        // Get source element
        const sourceElement = document.querySelector(sourceSelector);
        // Get computed styles
        const computedStyle = window.getComputedStyle(sourceElement);
        
        // Get left padding and margin values
        const leftPadding = parseInt(computedStyle.getPropertyValue('padding-left'));
        const leftMargin = parseInt(computedStyle.getPropertyValue('margin-left'));
        
        // Apply padding and margin to target elements
        const targetElements = document.querySelectorAll(targetSelector);
        targetElements.forEach(function(targetElement) {
            targetElement.style.paddingLeft = leftPadding + 'px';
            targetElement.style.marginLeft = leftMargin + 'px';
        });
    
      }
    
      function applyStylesOnResize() {
          applyPaddingAndMargin('.wrapper', '.wrapper--slider');
      }
    
      // Apply styles when the page loads
      applyStylesOnResize();
    
      // Apply styles when the window is resized
      window.addEventListener('resize', applyStylesOnResize);

    }

      
    if(document.querySelector('.js-comparison-grid-mob')) {

      const firstTableEl = document.querySelector('.js-comparison-grid-mob');
      const allTableEls = document.querySelectorAll('.js-comparison-grid-mob');

      firstTableEl.classList.add('open');
      firstTableEl.classList.add('beebu-table-el');

      allTableEls.forEach(item => {

        if( !item.classList.contains('beebu-table-el') ) {

          item.addEventListener("click", () => {

            if(item.classList.contains('open')){

              item.classList.remove('open');

            } else {

              item.classList.add('open');
              
            }

          })

        }

      });

    }


    // Map Script
    if(document.querySelector('.locations-map')){

      const mapName = document.querySelectorAll('.js-map-name');
      const areaMarker = document.querySelectorAll('.js-area-marker');

      mapName.forEach(item => {

        // When mouse enters
        item.addEventListener('mouseenter', () => {

          const location = item.dataset.location;
          // Escape the space in the location string
          const escapedLocation = location.replace(/\s/g, '\\ ');

          const image = document.querySelector(`.js-area-marker[data-location=${escapedLocation}] img`);
          const currentSrc = image.src;
          image.parentElement.classList.add('map-hovered');
          
          // Replace end of image link
          const newSrc = currentSrc.replace('location.png', 'location-green.png');

          // Set the new image src
          image.src = newSrc;

        });

        // When mouse exits
        item.addEventListener('mouseout', () => {

          const location = item.dataset.location;
          // Escape the space in the location string
          const escapedLocation = location.replace(/\s/g, '\\ ');

          const image = document.querySelector(`.js-area-marker[data-location=${escapedLocation}] img`);
          const currentSrc = image.src;
          image.parentElement.classList.remove('map-hovered');
          
          // Replace end of image link
          const newSrc = currentSrc.replace('location-green.png', 'location.png');

          // Set the new image src
          image.src = newSrc;

        });


      });

      // Map accordion
      document.querySelectorAll('.map-accordion').forEach((accordion) => {
        const header = accordion.querySelector('.map-accordion__header');
        const inner = accordion.querySelector('.map-accordion__inner');
    
        header.addEventListener('click', () => {
            // Toggle the 'open' class on the clicked accordion
            accordion.classList.toggle('open');
    
            // If the accordion is open, set the max-height of inner to its scrollHeight
            if (accordion.classList.contains('open')) {
                inner.style.maxHeight = inner.scrollHeight + 'px';
            } else {
                // If not open, set the max-height to 0
                inner.style.maxHeight = '0';
            }
        });
    
        // Optionally, you can set initial max-height to 0 for better initial collapse
        inner.style.maxHeight = '0';
    });
    

    }
    
    // Adapt pre-built acf hero to fit careers page only
    if(window.location.pathname === '/careers/'){
      (function (){

        document.querySelector('body').classList.add('careers-page');
        
        document.querySelector('.flourish-hero .button').classList.remove('button--black');
        document.querySelector('.flourish-hero .button').classList.add('button--green');

      })();
    }
  

});