<?php get_header(); ?>

<div class="banner">
    <div class="container">
        <div class="row">

            <div class="col-xs-12 col-sm-7 content">
                <h1>
                    <span>Targeted Influencer Marketing</span>
                    <span>at your fingertips</span>
                </h1>
                <span>We help you with branding and generating leads using many influencers who have a small targeted following that trusts them.</span>

                <div class="buttons">
                    <a target="_blank" href="https://calendly.com/influencemonk/influencer-marketing">Let's get started</a>
                    <button onclick="homeScrollDown()">Tell me more<span class="glyphicon glyphicon-menu-down"></span></button>
                </div>
            </div>

            <div class="col-xs-12 col-sm-5 image">
                <img src="<?php echo get_template_directory_uri() ?>/img/city.png" alt="city"/>
                <img src="<?php echo get_template_directory_uri() ?>/img/influencer.png" alt="influencer"/>
            </div>
        </div>
    </div>
</div>

<div class="why-us">
    <div class="container">

        <div class="header">
            <h2 class="heading">Why Influencer Marketing?</h2>
        </div>

        <div class="row">
            <div class="col-xs-12 col-sm-6">
                <img src="<?php echo get_template_directory_uri() ?>/img/higher_conversions.png" alt="higher conversion"/>
                <div class="content">
                    <h3 class="title">Quality Conversions</h3>
                    <p class="description">Get higher quality conversions than traditional campaigns.</p>
                </div>
            </div>
            <div class="col-xs-12 col-sm-6">
                <img src="<?php echo get_template_directory_uri() ?>/img/cheaper.png" alt="cheaper"/>
                <div class="content">
                    <h3 class="title">36% Lower Cost</h3>
                    <p class="description">A more cost-efficient solution for your marketing campaigns.</p>
                </div>
            </div>
            <div class="col-xs-12 col-sm-6">
                <img src="<?php echo get_template_directory_uri() ?>/img/loyal_community.png" alt="loyal community"/>
                <div class="content">
                    <h3 class="title">Loyal Community</h3>
                    <p class="description">Build a loyal community of customers who recommend you to other prospects.</p>
                </div>
            </div>
            <div class="col-xs-12 col-sm-6">
                <img src="<?php echo get_template_directory_uri() ?>/img/customers_trust.png" alt="customers trust"/>
                <div class="content">
                    <h3 class="title">Customers' Trust</h3>
                    <p class="description">People trust people, not ads. Gain your potential customers' trust.</p>
                </div>
            </div>
        </div>

    </div>
</div>


<div class="how-we-help">
    <div class="container">
        <div class="header">
            <span class="subheading">We provide you with expertise, insights and do the heavy lifting.</span>
            <h2 class="heading">How do we help you succeed?</h2>
        </div>
        <div class="row">
            <div class="col-xs-12 col-sm-6 image">
                <img src="<?php echo get_template_directory_uri() ?>/img/instagram_post.png" alt="instagram post"/>
            </div>
            <div class="col-xs-12 col-sm-6 content">
                <ul>
                    <li>
                        <h3 class="heading">1000+ Influencers</h3>
                        <p class="content">We connect you with over 1000 influencers.</p>
                    </li>
                    <li>
                        <h3 class="heading">Shipment &amp; Tracking</h3>
                        <p class="content">We handle all your product shipment & tracking.</p>
                    </li>
                    <li>
                        <h3 class="heading">AI Powered Insights</h3>
                        <p class="content">We provide you with AI powered campaign insights.</p>
                    </li>
                    <li>
                        <h3 class="heading">Targeted Audience</h3>
                        <p class="content">We help you select your audience and reach them.</p>
                    </li>
                    <li>
                        <h3 class="heading">Post Tracking</h3>
                        <p class="content">We check the posts' content and timing.</p>
                    </li>
                </ul>
            </div>
        </div>
    </div>
</div>

<div class="bottom-cta">
    <div class="container">
        <h2 class="title">Ready to rock your influencer marketing campaigns?</h2>
        <a href="https://calendly.com/influencemonk/influencer-marketing" class="button">Get started now</a>
    </div>
</div>

<div class="contact-us">
    <div class="container">
        <h2 class="title">Want us to get back to you?</h2>
        <span class="content">We will get in touch</span>
        <div class="formgroup">
            <label>Your message</label>
            <textarea rows="5" class="form-control" name="message"></textarea>
        </div>
        <p class="message hide"></p>
        <div class="button-div">
            <label>Your email</label>
            <input type="text" name="emailFrom" class="form-control"/>
            <button class="btn" class="submit" type="button">Let's Go</button>
        </div>
    </div>
</div>



<script type="application/ld+json">
    {
        "@context": "http://schema.org",
        "@type": "Organization",
        "name": "InfluenceMonk",
        "url": "<?php echo get_site_url(); ?>",
        "logo": "<?php echo get_template_directory_uri(); ?>/img/influencemonk.png",
        "foundingDate": "2018"
    },
    "contactPoint": {
        "@type": "ContactPoint",
        "contactType": "customer success",
        "email": "hello@influencemonk.com"
    },
    "sameAs": [
        "https://www.facebook.com/influencemonk",
        "https://www.instagram.com/influencemonk/",
        "https://twitter.com/influencemonk",
        "https://www.linkedin.com/company/influencemonk"
    ]
}
</script>

<?php get_footer(); ?>
