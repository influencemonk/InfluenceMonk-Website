<?php

$indianStates = ['AR' => 'Arunachal Pradesh',
'AR' => 'Arunachal Pradesh',
'AS' => 'Assam',
'BR' => 'Bihar',
'CT' => 'Chhattisgarh',
'GA' => 'Goa',
'GJ' => 'Gujarat',
'HR' => 'Haryana',
'HP' => 'Himachal Pradesh',
'JK' => 'Jammu and Kashmir',
'JH' => 'Jharkhand',
'KA' => 'Karnataka',
'KL' => 'Kerala',
'MP' => 'Madhya Pradesh',
'MH' => 'Maharashtra',
'MN' => 'Manipur',
'ML' => 'Meghalaya',
'MZ' => 'Mizoram',
'NL' => 'Nagaland',
'OR' => 'Odisha',
'PB' => 'Punjab',
'RJ' => 'Rajasthan',
'SK' => 'Sikkim',
'TN' => 'Tamil Nadu',
'TG' => 'Telangana',
'TR' => 'Tripura',
'UP' => 'Uttar Pradesh',
'UT' => 'Uttarakhand',
'WB' => 'West Bengal',
'AN' => 'Andaman and Nicobar Islands',
'CH' => 'Chandigarh',
'DN' => 'Dadra and Nagar Haveli',
'DD' => 'Daman and Diu',
'LD' => 'Lakshadweep',
'DL' => 'National Capital Territory of Delhi',
'PY' => 'Puducherry'];

$generes = [];

$generes[]  = "Fashion";
$generes[]  = "Food";
$generes[]  = "Travel";
$generes[]  = "Lifestyle";
$generes[]  = "Makeup";
$generes[]  = "Fitness";
$generes[]  = "Others";


?>

<div class="modal fade" id="getstarted" role="dialog">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h4 class="modal-title">Let's get Started</h4>
            </div>
            <div class="modal-body">
                <div class="modal-formgroup">
                    <label>Instagram Id</label>
                    <input type="text" name="user-insta-id" class="form-control">
                </div>
                <div class="modal-formgroup">
                  <select name="user-location-option" class="form-control" >
              			<option value="all">Select your location</option>
              			<?php
              			foreach ($indianStates as $state){ ?>
              				<option><?php echo $state; ?></option>
              			<?php
              			}
              			?>
              		</select>
                </div>
                <div class="modal-formgroup">
                  <select name="user-generes-option" class="form-control">
                    <option>Select your genre</option>
                    <?php
                    foreach ($generes as $genre){ ?>
                      <option><?php echo $genre; ?></option>
                    <?php
                    }
                    ?>
                  </select>
                </div>
                <p class="message hide"></p>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn">Submit</button>
            </div>
        </div>

    </div>
</div>


<div class="footer">
    <div class="row">
        <div class="col-xs-12 col-sm-4 title">
            <p><span>influence</span>Monk</p>
            <p>&copy; 2018, InfluenceMonk Pvt Ltd</p>
        </div>
        <div class="col-xs-12 col-sm-8 social-icons">
            <span>Follow us around the web</span>
            <span>
                <a href="https://www.facebook.com/influencemonk" target="_blank"><img src="<?php echo get_template_directory_uri() ?>/img/facebook_logo.png" alt="facebook logo" /></a>
                <a href="https://www.instagram.com/influencemonk/" target="_blank"><img src="<?php echo get_template_directory_uri() ?>/img/instagram_logo.png" alt="instagram logo"/></a>
                <a href="https://www.twitter.com/influencemonk" target="_blank"><img src="<?php echo get_template_directory_uri() ?>/img/twitter_logo.png" alt="twitter logo"/></a>
                <a href="https://www.linkedin.com/company/influencemonk" target="_blank"><img src="<?php echo get_template_directory_uri() ?>/img/linkedin_logo.png" alt="linkedin logo"/></a>
            </span>
        </div>
    </div>
</div>

<script type="application/ld+json">
    {
        "@context" : "http://schema.org",
        "@type" : "WebSite",
        "name" : "InfluenceMonk",
        "url" : "<?php echo get_site_url(); ?>"
    }
</script>

<?php wp_footer(); ?>
</body>
</html>
