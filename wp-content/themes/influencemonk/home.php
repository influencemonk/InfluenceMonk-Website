<?php get_header(); ?>

<div class="blogs-banner">

	<?php
	$args = array('category_name' => 'Blogs', 'post_type' => 'post', 'posts_per_page' => 1);
	$query = new WP_Query($args);

	if ($query -> have_posts()):
		while ($query -> have_posts()): $query->the_post(); ?>


			<div class="image">
				<img src="<?php echo get_template_directory_uri() ?>/img/blog-banner.jpg">
			</div>
			<div class="container">
				<h1>Influencer Marketing Blog</h1>
				<div class="row">
					<div class="col-xs-12 col-sm-6 col-md-7 blog-first-image">
						<img src="<?php echo get_the_post_thumbnail_url(get_the_ID()) ?>" alt="<?php echo get_the_title(); ?> : InfluenceMonk"/>
					</div>
					<div class="col-xs-12 col-sm-6 col-md-5 blog-first-content">
						<h2><?php echo get_the_title(); ?></h2>
						<p><?php echo get_the_excerpt()?></p>
						<a class="read-more" href="<?php echo get_the_permalink(); ?>">Read More</a>
					</div>
				</div>
			</div>

	<?php
		endwhile;
	endif;
	?>
</div>

<div class="blog-search">
	<p>
		I want to learn more about
		<select name="blog-option">
			<option value="all">everything</option>
			<?php
			$args = array('parent' => get_cat_ID('Blogs'));
			$categories = get_categories($args);

			foreach ($categories as $category){ ?>
				<option><?php echo strtolower($category->name); ?></option>
			<?php
			}
			?>
		</select>
	</option>
</div>

<div class="blog-container container">
	<div class="row">
		<?php
		$args = array('category_name' => 'Blogs', 'post_type' => 'post', 'posts_per_page' => 6, 'offset' => 1);
		$query = new WP_Query($args);

		if ($query -> have_posts()):
			while ($query -> have_posts()): $query->the_post(); ?>

				<div class="col-xs-12 col-sm-6 col-md-4">
					<a href="<?php echo get_the_permalink(); ?>">
                        <div class="blog-box">
                            <div class="image">
                                <img src="<?php echo get_the_post_thumbnail_url() ?>" alt="<?php echo get_the_title(); ?> : InfluenceMonk"/>
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

			<?php
			endwhile;
		endif; ?>
	</div>
	<button class="load-more"><span class="glyphicon glyphicon-menu-down"></span>Load More</button>
</div>

<?php get_footer(); ?>
