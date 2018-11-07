function homeScrollDown() {
    let scrollDownHeight = jQuery('.why-us').offset().top - jQuery('.navbar').height();

    jQuery('html, body').animate({
        scrollTop: scrollDownHeight
    }, 500);
}


jQuery(document).ready(function(){

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
                jQuery('.contact-us input[name=emailFrom]').val('');
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

    // -------------------------------------------------------------------
    // Leads Submit
    // -------------------------------------------------------------------
    jQuery('#getstarted button.btn').click(function() {
        let fdLeads = new FormData();

        fdLeads.append('username', jQuery('#getstarted input[name=user-name]').val());
        fdLeads.append('useremail', jQuery('#getstarted input[name=user-email]').val());
        fdLeads.append('userinstaid', jQuery('#getstarted input[name=user-insta-id]').val());

        jQuery.ajax({
            url: '/api-submit-leads',
            method: 'POST',
            data: fdLeads,
            processData: false,
            contentType: false,
            success: function(){
                jQuery('#getstarted input').val('');
                jQuery('#getstarted').modal('hide');
            }
        })
    })
})