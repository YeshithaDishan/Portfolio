;(function($){
    $(window).on('elementor/frontend/init',function(){
      

        elementorFrontend.hooks.addAction( 'frontend/element_ready/hero-banner.default', function(scope,$){

          $('[data-src]').each(function () {
              var src = $(this).attr('data-src');
              $(this).css({
                  'background-image': 'url(' + src + ')',
              });
          });

         if ($.exists('.odometer')) {
          function winScrollPosition() {
            var scrollPos = $(window).scrollTop(),
              winHeight = $(window).height();
            var scrollPosition = Math.round(scrollPos + winHeight / 1.2);
            return scrollPosition;
          }

          $('.odometer').each(function () {
            var elemOffset = $(this).offset().top;
            if (elemOffset < winScrollPosition()) {
              $(this).html($(this).data('count-to'));
            }
          });
        }         

        });

        elementorFrontend.hooks.addAction( 'frontend/element_ready/about.default', function(scope,$){

        if ($.exists('.odometer')) {
          function winScrollPosition() {
            var scrollPos = $(window).scrollTop(),
              winHeight = $(window).height();
            var scrollPosition = Math.round(scrollPos + winHeight / 1.2);
            return scrollPosition;
          }

          $('.odometer').each(function () {
            var elemOffset = $(this).offset().top;
            if (elemOffset < winScrollPosition()) {
              $(this).html($(this).data('count-to'));
            }
          });
        }

        $('.cs_tabs .cs_tab_links a').on('click', function (e) {
          var currentAttrValue = $(this).attr('href');
          $('.cs_tabs ' + `[data-id="${currentAttrValue}"]`)
            .fadeIn(400)
            .siblings()
            .hide();
          $(this).parents('li').addClass('active').siblings().removeClass('active');
          isotopInit();
          e.preventDefault();
        });

        $('.cs_progress').each(function () {
          var progressPercentage = $(this).data('progress') + '%';
          $(this).find('.cs_progress_in').css('width', progressPercentage);
        });        

        });   


        elementorFrontend.hooks.addAction( 'frontend/element_ready/portfolio-list.default', function(scope,$){

          $('[data-src]').each(function () {
              var src = $(this).attr('data-src');
              $(this).css({
                  'background-image': 'url(' + src + ')',
              });
          });


            if ($.exists('.cs_isotop')) {
              $('.cs_isotop').isotope({
                itemSelector: '.cs_isotop_item',
                transitionDuration: '0.60s',
                percentPosition: true,
                masonry: {
                  columnWidth: '.cs_grid_sizer',
                },
              });
              /* Active Class of Portfolio*/
              $('.cs_isotop_filter ul li').on('click', function (event) {
                $(this).siblings('.active').removeClass('active');
                $(this).addClass('active');
                event.preventDefault();
              });
              /*=== Portfolio filtering ===*/
              $('.cs_isotop_filter ul').on('click', 'a', function () {
                var filterElement = $(this).attr('data-filter');
                $('.cs_isotop').isotope({
                  filter: filterElement,
                });
              });
            }

        });


        elementorFrontend.hooks.addAction( 'frontend/element_ready/services.default', function(scope,$){
          $('[data-src]').each(function () {
              var src = $(this).attr('data-src');
              $(this).css({
                  'background-image': 'url(' + src + ')',
              });
          });

        });


        elementorFrontend.hooks.addAction( 'frontend/element_ready/testimonial.default', function(scope,$){

          $('[data-src]').each(function () {
              var src = $(this).attr('data-src');
              $(this).css({
                  'background-image': 'url(' + src + ')',
              });
          });


          $(window).on('load', function () {
            isotopInit();
          });

          function isotopInit() {
            if ($.exists('.cs_isotop')) {
              $('.cs_isotop').isotope({
                itemSelector: '.cs_isotop_item',
                transitionDuration: '0.60s',
                percentPosition: true,
                masonry: {
                  columnWidth: '.cs_grid_sizer',
                },
              });
              /* Active Class of Portfolio*/
              $('.cs_isotop_filter ul li').on('click', function (event) {
                $(this).siblings('.active').removeClass('active');
                $(this).addClass('active');
                event.preventDefault();
              });
              /*=== Portfolio filtering ===*/
              $('.cs_isotop_filter ul').on('click', 'a', function () {
                var filterElement = $(this).attr('data-filter');
                $('.cs_isotop').isotope({
                  filter: filterElement,
                });
              });
            }
          }

          isotopInit();

        });


        elementorFrontend.hooks.addAction( 'frontend/element_ready/blogpost.default', function(scope,$){
          $('[data-src]').each(function () {
              var src = $(this).attr('data-src');
              $(this).css({
                  'background-image': 'url(' + src + ')',
              });
          });

        });

        elementorFrontend.hooks.addAction( 'frontend/element_ready/tp-fact.default', function(scope,$){
          
          $('[data-src]').each(function () {
              var src = $(this).attr('data-src');
              $(this).css({
                  'background-image': 'url(' + src + ')',
              });
          });

          if ($.exists('.odometer')) {
            function winScrollPosition() {
              var scrollPos = $(window).scrollTop(),
                winHeight = $(window).height();
              var scrollPosition = Math.round(scrollPos + winHeight / 1.2);
              return scrollPosition;
            }

            $('.odometer').each(function () {
              var elemOffset = $(this).offset().top;
              if (elemOffset < winScrollPosition()) {
                $(this).html($(this).data('count-to'));
              }
            });
          }

        });        


        elementorFrontend.hooks.addAction( 'frontend/element_ready/education-skills.default', function(scope,$){
          $('[data-src]').each(function () {
              var src = $(this).attr('data-src');
              $(this).css({
                  'background-image': 'url(' + src + ')',
              });
          });

        });


        elementorFrontend.hooks.addAction( 'frontend/element_ready/advanced-tab.default', function(scope,$){
          $('[data-src]').each(function () {
              var src = $(this).attr('data-src');
              $(this).css({
                  'background-image': 'url(' + src + ')',
              });
          });


         $('.cs_tabs .cs_tab_links a').on('click', function (e) {
          var currentAttrValue = $(this).attr('href');
          $('.cs_tabs ' + `[data-id="${currentAttrValue}"]`)
            .fadeIn(400)
            .siblings()
            .hide();
          $(this).parents('li').addClass('active').siblings().removeClass('active');
          isotopInit();
          e.preventDefault();
        });
        
        });


        elementorFrontend.hooks.addAction( 'frontend/element_ready/brand.default', function(scope,$){
          $('[data-src]').each(function () {
              var src = $(this).attr('data-src');
              $(this).css({
                  'background-image': 'url(' + src + ')',
              });
          });

        });


    });
})(jQuery);