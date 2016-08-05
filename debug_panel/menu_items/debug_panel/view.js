(function($){
    $('#debug-panel-launcher').on('click', function(e){
        e.preventDefault();
        if (! html.hasClass('ccm-panel-open')) {
            html.addClass('ccm-panel-open ccm-panel-left');
            $(this).addClass('ccm-launch-panel-active');
            $('#ccm-panel-debug').addClass('ccm-panel-active ccm-panel-loading');

            // hide mobile menu
            $('.ccm-toolbar-mobile-menu-button').removeClass('ccm-mobile-close');
            $('.ccm-mobile-menu-overlay').slideUp();
        } else {
            html.removeClass('ccm-panel-left');
            html.removeClass('ccm-panel-open');
            $(this).removeClass('ccm-launch-panel-active');
            $('#ccm-panel-debug').removeClass('ccm-panel-active');
            $('#ccm-panel-debug').removeClass('ccm-launch-panel-active');
        }
    });
})(jQuery)