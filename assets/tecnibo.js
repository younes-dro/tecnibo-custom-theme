;
(function ($) {



    $(document).ready(function () {

        /**
         * Aply Blur effect when the mobile menu is opened
         */
        
        /**
         * Creating the mobile menu.
         * 
         */
        // Main Menu 
        var tecniboMainMenu = $('nav.main-navigation ul.main-menu').clone(true, true);
        $(tecniboMainMenu).droSlidingMenu();
        // Top Bar elements(Jobs and contact)
        $('div#top-bar nav.elementor-nav-menu--main').find('li.menu-item').each(function(){
            var tecniboTopMenu = $(this).clone(true, true);
            $('div.wp_mm_wrapper ul.main-menu').append(tecniboTopMenu);
        });
        // Search Form
       $('div#top-bar').find('form').each(function(){
           var formSearch = $(this).clone(true,true);
           $('div.wp_mm_wrapper ul.main-menu').append(formSearch);
       });
        
        var trp = $ ('div.elementor-location-footer div.trp-language-switcher-container');
        trp.addClass('tecnibo-language-switcher').appendTo($('div#site-header-inner'));

        /* Stick navigation and scroll top on window scrolling  */
        var stickyNavTop = $('#transparent-header-wrap').offset().top;
        $(window).scroll(function () {
            var scrollToTop = $(window).scrollTop();

            if (scrollToTop > stickyNavTop) {
                $('#transparent-header-wrap').addClass('sticky-header');
            } else {
                $('#transparent-header-wrap').removeClass('sticky-header');
            }

        });
        /* Add close button submenu */
        
        $('nav.main-navigation ul.main-menu').find('ul.megamenu').each(function(){
            var $closeSubmenu = $("<span/>", {"class": "close fa fa-times"});
            $(this).append($closeSubmenu);
            $(this).find('span.close').each(function(){
                $(this).on('click',function(){
                    $(this).closest('ul').css('display','none');
                });
            });
        });
        
    });



})(jQuery);