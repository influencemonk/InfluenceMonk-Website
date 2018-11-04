function homeScrollDown() {
    let scrollDownHeight = jQuery('.why-us').offset().top;

    jQuery('html, body').animate({
        scrollTop: scrollDownHeight
    }, 500);
}

jQuery(document).ready(function(){

    // -------------------------------------------------------------------
    // Add Itemprops and Itemscopes
    // -------------------------------------------------------------------
    jQuery('#navbar ul.nav').attr('itemscope', '');
    jQuery('#navbar ul.nav').attr('itemtype', 'http://www.schema.org/SiteNavigationElement');


    // -------------------------------------------------------------------
    // Navbar Scroll function
    // -------------------------------------------------------------------
    jQuery(window).scroll(function(){
        if (jQuery(window).scrollTop() > 50 && !jQuery('.navbar-fixed-top').hasClass('scrolled')) {
            jQuery('.navbar-fixed-top').addClass('scrolled');
        }else if (jQuery(window).scrollTop() <= 50 && jQuery('.navbar-fixed-top').hasClass('scrolled')){
            jQuery('.navbar-fixed-top').removeClass('scrolled');
        }
    });

    // -------------------------------------------------------------------
    // Contact Form Submit
    // -------------------------------------------------------------------
    jQuery('.contact-us .btn').click(function(){

        let fd = new FormData();
        fd.append('emailTo', 'sagnikpaul2882@gmail.com');
        fd.append('emailFrom', jQuery('.contact-us input[name=emailFrom]').val());
        fd.append('message', jQuery('.contact-us textarea').val());
        fd.append('subject', 'Home Contact Us Form');

        jQuery.ajax({
            url: '/api-submit-contact-form',
            method: 'POST',
            data: fd,
            processData: false,
            contentType: false,
            success: function(){
                jQuery('.contact-us input[name=emailFrom]').addClass('submitted');
                jQuery('.contact-us input[name=emailFrom]').val('s');
                jQuery('.contact-us .btn').addClass('submitted');
                jQuery('.contact-us .btn').text('Submitted');
            }
        })
    });

    // -------------------------------------------------------------------
    // If page size is less
    // -------------------------------------------------------------------
    if (jQuery('body').height() < jQuery(window).height()) {
        jQuery('.footer').addClass('fixed');
        jQuery('body').addClass('vertical-center');
    }
})