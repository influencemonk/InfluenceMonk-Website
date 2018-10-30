function homeScrollDown() {
    let scrollDownHeight = jQuery('.why-us').offset().top;

    jQuery('html, body').animate({
        scrollTop: scrollDownHeight
    }, 500);
}

jQuery(document).ready(function(){

    //Navbar Scroll function
    jQuery(window).scroll(function(){
        if (jQuery(window).scrollTop() > 50 && !jQuery('.navbar-fixed-top').hasClass('scrolled')) {
            jQuery('.navbar-fixed-top').addClass('scrolled');
        }else if (jQuery(window).scrollTop() <= 50 && jQuery('.navbar-fixed-top').hasClass('scrolled')){
            jQuery('.navbar-fixed-top').removeClass('scrolled');
        }
    });

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
    })

})