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
        var droPizzaMainMenu = $('nav.main-navigation ul.main-menu').clone(true, true);
//        console.log(droPizzaMainMenu);

        $(droPizzaMainMenu).droSlidingMenu();

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
    });



})(jQuery);