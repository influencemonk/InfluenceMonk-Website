<?php
/*
========================================================
 * Include CSS and JS Files
========================================================
*/

session_start();


function files_enqueue() {
    wp_enqueue_script('bootstrapjs', get_template_directory_uri().'/assets/js/bootstrap.min.js', array(), '1.0.0', true);
    wp_enqueue_script('customjs', get_template_directory_uri().'/assets/js/index.js', array(), '1.0.0', true);
    wp_enqueue_style('bootstrapcss', get_template_directory_uri().'/assets/css/bootstrap.min.css', array(), '1.0.0', 'all' );
    wp_enqueue_style('customcss', get_template_directory_uri().'/assets/css/index.css', array(), '1.0.0', 'all' );

    wp_enqueue_script('jquery');
}

add_action('wp_enqueue_scripts', 'files_enqueue');

/*
========================================================
 * Activate Theme Supports
========================================================
*/

function theme_supports() {
    add_theme_support('post-thumbnails');
    add_theme_support('custom-background');
    add_theme_support('menus');

    register_nav_menu('primary', "Primary Header Menu");
}

add_action('init', 'theme_supports');


/*
========================================================
 * Include Walker Class
========================================================
*/
require get_template_directory() . '/inc/walker_class.php';



/*
========================================================
 * Blogs Page Filter
========================================================
*/
function count_total_blogs() {
	if ($_POST['category'] === 'all'){
		echo wp_count_posts()->publish;
	}else {
		echo get_category(get_cat_ID($_POST['category']))->count;
	}
}

add_action('wp_ajax_count_total_blogs', 'count_total_blogs');
add_action('wp_ajax_nopriv_count_total_blogs', 'count_total_blogs');


function filter_blogs() {
	$args = array('category_name' => 'Blogs', 'post_type' => 'post', 'posts_per_page' => 1);
	$query = new WP_Query($args);

	if ($query -> have_posts()):
		while ($query -> have_posts()): $query->the_post();
			$_SESSION['first_id'] = get_the_ID();
		endwhile;
	endif;

	if ($_POST['category'] === 'all') {
		$category = 'Blogs';
	}else {
		$category = $_POST['category'];
	}

	if ($_POST['called_at'] === 'load_more') {
		$offset = (int)$_POST['displayedPosts'];
	}else {
		$offset = 0;
	}

	$args = array('category_name' => $category, 'post_type' => 'post', 'posts_per_page' => 6, 'offset' => $offset, 'post__not_in' => array($_SESSION['first_id']));
	$query = new WP_Query($args);

	if ($query -> have_posts()):
		while ($query -> have_posts()): $query->the_post(); ?>
            <div class="col-xs-12 col-sm-6 col-md-4">
                <a href="<?php echo get_the_permalink(); ?>">
                    <div class="blog-box">
                        <div class="image">
                            <img src="<?php echo get_the_post_thumbnail_url() ?>" />
                        </div>
                        <h2><?php echo get_the_title(); ?></h2>
                        <p><?php echo get_the_excerpt(); ?></p>
                        <div class="blog-footer">
                            <span class="date"><?php echo get_the_date(); ?></span>
                            <span class="author"><?php echo get_the_author(); ?></span>
                        </div>
                        <hr class="divider">
                    </div>
                </a>
            </div>
		<?php endwhile;
	endif;

	wp_reset_postdata();
}

add_action('wp_ajax_filter_blogs', 'filter_blogs');
add_action('wp_ajax_nopriv_filter_blogs', 'filter_blogs');