<?php get_header(); ?>

<?php if (have_posts()):
	while (have_posts()): the_post(); ?>

		<div class="container blog-single">
			<div class="row">
				<div class="col-xs-12 col-sm-6 col-md-5">
					<h1 class="title"><?php echo get_the_title(); ?></h1>
					<p class="date"><?php echo get_the_date(); ?></p>
				</div>
				<div class="col-xs-12 col-sm-6 col-md-7">
					<img src="<?php echo get_the_post_thumbnail_url(); ?>" alt="<?php echo get_the_title(); ?> : InfluenceMonk"/>
				</div>
			</div>
			<div class="row">
				<div class="col-xs-12 col-sm-1">
					<div class="share-icons">
						<a href="http://www.facebook.com/sharer.php?u=<?php echo get_the_permalink(); ?>" target="_blank" title="Share on Facebook"><img src="<?php echo get_template_directory_uri() ?>/img/facebook.svg"/></a>
						<a href="http://twitter.com/share?text=<?php echo get_the_title(); ?>&url=<?php echo get_the_permalink(); ?>" target="_blank" title="Share on Twitter"><img src="<?php echo get_template_directory_uri() ?>/img/twitter.svg"/></a>
						<a href="https://wa.me/?text=<?php echo get_the_permalink(); ?>" data-action="share/whatsapp/share" target="_blank" title="Share on LinkedIn"><img src="<?php echo get_template_directory_uri() ?>/img/whatsapp.svg"/></a>
						<a href="https://www.linkedin.com/shareArticle?mini=true&url=<?php echo get_the_permalink(); ?>&title=<?php echo get_the_title(); ?>&summary=<?php echo get_the_excerpt(); ?>&source=LinkedIn" target="_blank" title="Share on LinkedIn"><img src="<?php echo get_template_directory_uri() ?>/img/linkedin.svg"/></a>
<!--						<img src="--><?php //echo get_template_directory_uri() ?><!--/img/facebook.svg"/>-->
					</div>
				</div>
				<div class="col-xs-12 col-sm-8 col-sm-offset-1">
					<div class="content">
						<?php echo get_the_content(); ?>
					</div>
                    <p class="author"><img alt="<?php echo get_the_author(); ?>" src="<?php echo get_avatar_url( get_user_by('login', get_the_author())->ID ); ?>"/><?php echo get_user_by('login', get_the_author())->first_name . " " . get_user_by('login', get_the_author())->last_name; ?></p>
				</div>
			</div>
		</div>

        <script type="application/ld+json">
            {
                "@context": "http://schema.org",
                "@type": "BlogPosting",
                "mainEntityOfPage":{
                    "@type":"WebPage",
                    "@id":"<?php echo get_the_permalink(); ?>"
                },
                "headline": "<?php echo get_the_title(); ?>",
                "image": {
                    "@type": "ImageObject",
                    "url": "<?php echo get_the_post_thumbnail_url(); ?>",
                    "height": 512,
                    "width": 1024
                },
                "datePublished": "<?php echo get_the_date(); ?>",
                "dateModified": "<?php echo get_the_modified_date(); ?>",
                "author": {
                    "@type": "Person",
                    "name": "<?php echo get_the_author(); ?>",
                    "image": {
                        "@type": "ImageObject",
                        "url":"<?php echo get_avatar_url( get_user_by('login', get_the_author())->ID ); ?>",
                        "height":"60",
                        "width":"60"
                    }
                },
                "publisher": {
                    "@type": "Organization",
                    "name": "InfluenceMonk",
                    "logo": {
                        "@type": "ImageObject",
                        "url": "<?php echo get_template_directory_uri() ?>/img/influenceMonk.png",
                        "width": "380",
                        "height": "60"
                    }
                },
                "description": "<?php echo get_the_excerpt(); ?>",
                "articleBody": "<?php echo strip_tags(get_the_content() ); ?>"
            }
        </script>

	<?php endwhile;
endif; ?>

<?php get_footer(); ?>