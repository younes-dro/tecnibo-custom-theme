;
(function ($){
    
    $(document).ready(function(){
            /* Stick navigation and scroll top on window scrolling  */
//    var stickyNavTopMobile = $('.#transparent-header-wrap').css({"position": "fixed"}).offset().top;
    var stickyNavTop = $('#transparent-header-wrap').offset().top;
    $(window).scroll(function () {
        var scrollToTop = $(window).scrollTop();
        //Mobile
//        if (scrollToTop > stickyNavTopMobile) {
//            $('.toggle-menu-container-class').addClass('sticky-header');
//        } else {
//            $('.toggle-menu-container-class').removeClass('sticky-header');
//        }
        // Large screen 

        if (scrollToTop > stickyNavTop) {
            $('#transparent-header-wrap').addClass('sticky-header');
        } else {
            $('#transparent-header-wrap').removeClass('sticky-header');
        }
        // Scroll to the top
//        if ($(this).scrollTop() > 200) {
//            $('.scrollup').fadeIn();
//        } else {
//            $('.scrollup').fadeOut();
//        }

    }); 
    });
    
   
    
})(jQuery);