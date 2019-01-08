const emailSentTo = 'sagnikpaul2882@gmail.com';

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
        if (jQuery(window).scrollTop() > 0 && !jQuery('.navbar-fixed-top').hasClass('scrolled')) {
            jQuery('.navbar-fixed-top').addClass('scrolled');
        }else if (jQuery(window).scrollTop() === 0 && jQuery('.navbar-fixed-top').hasClass('scrolled')){
            jQuery('.navbar-fixed-top').removeClass('scrolled');
        }
    });

    // -------------------------------------------------------------------
    // Contact Form Submit
    // -------------------------------------------------------------------
    jQuery('.contact-us .btn').click(function(){

        let emailFrom = jQuery('.contact-us input[name=emailFrom]');
        let emailMessage = jQuery('.contact-us textarea');
        let button = jQuery('.contact-us .btn');
        let messageSpan = jQuery('.contact-us p');

        messageSpan.addClass('hide');

        if (/[a-z0-9!#$%&'*+/=?^_`{|}~-]+(?:\.[a-z0-9!#$%&'*+/=?^_`{|}~-]+)*@(?:[a-z0-9](?:[a-z0-9-]*[a-z0-9])?\.)+[a-z0-9](?:[a-z0-9-]*[a-z0-9])?/.test(emailFrom.val()) === false){
            messageSpan.removeClass('hide');
            messageSpan.text('Please provide a valid email');
        }else if (emailMessage.val().trim().length === 0) {
            messageSpan.removeClass('hide');
            messageSpan.text('Please provide a valid message');
        }else {

            button.text('Submitting');

            let apiBody = {
                "to": [emailSentTo],
                "subject": "Contact Form",
                "body": "Email From:" + emailFrom.val() + "\nMessage: " + emailMessage.val()
            };

            jQuery.ajax({
                url: 'https://infinite-peak-58946.herokuapp.com/Blog/sendEmail',
                method: 'POST',
                crossDomain: true,
                data: JSON.stringify(apiBody),
                headers: {
                    "Content-Type": "application/json"
                },
                success: function (res) {
                    if (res.error) {
                        messageSpan.removeClass('hide');
                        messageSpan.text(res.message);
                    } else {
                        emailFrom.addClass('submitted');
                        emailFrom.val('');
                        emailMessage.val('');
                        button.addClass('submitted');
                        button.text('Submitted');
                    }
                },
                error: function (err) {
                    messageSpan.removeClass('hide');
                    messageSpan.text(err);
                }
            });
        }
    });

    // -------------------------------------------------------------------
    // If page size is less
    // -------------------------------------------------------------------
    if (jQuery('body').height() < jQuery(window).height()) {
        jQuery('.footer').addClass('fixed');
        jQuery('body').addClass('vertical-center');
    }



    // -------------------------------------------------------------------
    // Call Are You an Influencer Modal
    // -------------------------------------------------------------------
    jQuery('.menu-item:last-child').click(function(event) {
        event.preventDefault();
        jQuery('#getstarted.modal').modal();
    });


    // -------------------------------------------------------------------
    // Leads Submit
    // -------------------------------------------------------------------
    jQuery('#getstarted button.btn').click(function() {

        let username = jQuery('#getstarted input[name=user-name]');
        let useremail = jQuery('#getstarted input[name=user-email]');
        let userinsta = jQuery('#getstarted input[name=user-insta-id]');
        let message = jQuery('#getstarted p');

        if (/[a-z0-9!#$%&'*+/=?^_`{|}~-]+(?:\.[a-z0-9!#$%&'*+/=?^_`{|}~-]+)*@(?:[a-z0-9](?:[a-z0-9-]*[a-z0-9])?\.)+[a-z0-9](?:[a-z0-9-]*[a-z0-9])?/.test(useremail.val()) == false) {
            message.text('Please enter valid email id');
            message.removeClass('hide');
        }else if (username.val().trim().length === 0) {
            message.text('Please enter proper name');
            message.removeClass('hide');
        }else if (userinsta.val().trim().length === 0) {
            message.text('Please enter proper instagram id');
            message.removeClass('hide');
        }else {
            message.text('Submitting...');
            message.removeClass('hide');
            let apiBody = {
                "to": [emailSentTo],
                "subject": "Leads",
                "body": "Email From:" + useremail.val() + "\nName: " + username.val() + "\nInstagram ID: " + userinsta.val()
            };

            jQuery.ajax({
                url: 'https://infinite-peak-58946.herokuapp.com/Blog/sendEmail',
                method: 'POST',
                crossDomain: true,
                data: JSON.stringify(apiBody),
                headers: {
                    "Content-Type": "application/json"
                },
                success: function (res) {
                    if (res.error) {
                        message.removeClass('hide');
                        message.text(res.message);
                    } else {
                        username.val('');
                        useremail.val('');
                        userinsta.val('');
                        username.parent().find('label').removeClass('active');
                        useremail.parent().find('label').removeClass('active');
                        userinsta.parent().find('label').removeClass('active');
                        message.removeClass('hide');
                        message.text(res.message);
                    }
                },
                error: function (err) {
                    message.removeClass('hide');
                    message.text('Something went wrong');
                    console.log(err);
                }
            });
        }
    });


    // -------------------------------------------------------------------
    // Modal Labels
    // -------------------------------------------------------------------
    jQuery('#getstarted .modal-body input').focusin(function() {
        jQuery(this).parent().find('label').addClass('active');
    });
    jQuery('#getstarted .modal-body input').focusout(function() {
        if (jQuery(this).val().trim() === ''){
            jQuery(this).parent().find('label').removeClass('active');
        }
    });


    // -------------------------------------------------------------------
    // Contact Us Labels
    // -------------------------------------------------------------------
    jQuery('.contact-us').find('textarea, input').focusin(function() {
        jQuery(this).parent().find('label').addClass('active');
    });
    jQuery('.contact-us').find('textarea, input').focusout(function() {
        if (jQuery(this).val().trim() === ''){
            jQuery(this).parent().find('label').removeClass('active');
        }
    });


    // -------------------------------------------------------------------
    // Select2
    // -------------------------------------------------------------------
    jQuery('.blog-search select').select2();



    // -------------------------------------------------------------------
    // Blogs Filtering Ajax
    // -------------------------------------------------------------------
    let blogsNumber = 0;

    jQuery('.load-more').click(function() {
        let thisText = jQuery(this).html();
        jQuery(this).html('Loading...');
        jQuery.post('/wp-admin/admin-ajax.php',
            {
                'action': 'count_total_blogs',
                'category': jQuery('[name=blog-option]').val()
            },
            function(response){
                blogsNumber = response/10;
                response.exit;

                jQuery.post('/wp-admin/admin-ajax.php',
                    {
                        'action' : 'filter_blogs',
                        'displayedPosts': jQuery('.blog-box').length,
                        'category': jQuery('[name=blog-option]').val(),
                        'called_at': 'load_more'
                    },
                    function(response){
                        jQuery('.load-more').html(thisText);
                        response=jQuery(response);
                        jQuery('.blog-container .row').append(response);
                        response.exit;

                        if (blogsNumber == jQuery('.blog-box').length + 1) {
                            jQuery('.load-more').hide();
                        }else {
                            jQuery('.load-more').show();
                        }
                    });


            });
    });


    jQuery('[name=blog-option]').change(function() {
        jQuery.post('/wp-admin/admin-ajax.php',
            {
                'action': 'count_total_blogs',
                'category': jQuery('[name=blog-option]').val()
            },
            function(response){
                blogsNumber = response/10;
                response.exit;

                jQuery.post('/wp-admin/admin-ajax.php',
                    {
                        'action' : 'filter_blogs',
                        'displayedPosts': jQuery('.blog-box').length,
                        'category': jQuery('[name=blog-option]').val(),
                        'called_at': 'category_change'
                    },
                    function(response){
                        response=jQuery(response);
                        jQuery('.blog-container .row').html(response);
                        response.exit;

                        if (blogsNumber == jQuery('.blog-box').length) {
                            jQuery('.load-more').hide();
                        }else {
                            jQuery('.load-more').show();
                        }
                    });


            });
    });
});