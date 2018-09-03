<?php get_header(); ?>
		<main>
			<section class="intro-section">
				<h2 class="intro-section__expressive-type"><span>Farm-Fresh</span> <span>Homemade</span> <span>Ice Cream</span></h2>
                <?php if (have_posts()) : ?><?php while (have_posts()) : the_post(); ?>
                <?php if ( has_post_thumbnail() ) { ?><div class="intro-section__image"><?php the_post_thumbnail('full'); ?></div><?php } ?>
				<div class="intro-section__intro-text">
                    <p><b><?php echo get_post_meta($post->ID, 'Hours', true); ?></b></p>
                    <p><?php the_content();?><?php endwhile; ?><?php endif; ?></p>
                </div>
				<a href="<?php echo get_permalink(get_page_by_path( 'visit' )); ?>" class="intro-section__cta btn btn--special"><?php echo get_post_meta($post->ID, 'Primary CTA', true); ?> &rarr;</a>
			</section>
			<section class="ice-cream-teaser">
				<h2 class="ice-cream-teaser__heading"><?php echo get_post_meta($post->ID, 'Ice Cream Section Title', true); ?></h2>
				<a href="<?php echo get_permalink(get_page_by_path( 'menu' )); ?>" class="ice-cream-teaser__cta"><?php echo get_post_meta($post->ID, 'Ice Cream Section CTA', true); ?> &rarr;</a>
                <div class="ice-cream-teaser__images">
                    <img src="<?php bloginfo('template_directory'); ?>/assets/chocolate.png">
                    <img src="<?php bloginfo('template_directory'); ?>/assets/cookiesandcream.png">
                    <img src="<?php bloginfo('template_directory'); ?>/assets/oreo.png">
                </div>
			</section>
			<section class="social-media-section">
				<div class="social-media-section__blurb">
					<p><?php echo get_post_meta($post->ID, 'Social Media Blurb', true); ?></p>
					<p class="social-media-section__blurb-hashtag"><?php echo get_post_meta($post->ID, 'Hashtag', true); ?></p>
				</div>
				<ul class="social-media-section__user-photos">
					<li>
                        <div>
                            <?php echo wp_get_attachment_image( get_post_meta($post->ID, 'Social Media Photo 1 Attachment ID', true), 'full', false); ?>
                        </div>
                        <p class="social-media-section__photo-attribution"><?php echo get_post_meta($post->ID, 'Social Media Photo 1 Photo Credit', true); ?></p>
					</li>
					<li>
                        <div>
                            <?php echo wp_get_attachment_image( get_post_meta($post->ID, 'Social Media Photo 2 Attachment ID', true), 'full', false); ?>
                        </div>
                        <p class="social-media-section__photo-attribution"><?php echo get_post_meta($post->ID, 'Social Media Photo 2 Photo Credit', true); ?></p>
					</li>
					<li>
                        <div>
                            <?php echo wp_get_attachment_image( get_post_meta($post->ID, 'Social Media Photo 3 Attachment ID', true), 'full', false); ?>
                        </div>
                        <p class="social-media-section__photo-attribution"><?php echo get_post_meta($post->ID, 'Social Media Photo 3 Photo Credit', true); ?></p>
					</li>
					<li>
                        <div>
                            <?php echo wp_get_attachment_image( get_post_meta($post->ID, 'Social Media Photo 4 Attachment ID', true), 'full', false); ?>
                        </div>
                        <p class="social-media-section__photo-attribution"><?php echo get_post_meta($post->ID, 'Social Media Photo 4 Photo Credit', true); ?></p>
					</li>
				</ul>
				<h2 class="follow-us-stamp"><img src="<?php bloginfo('template_directory'); ?>/assets/follow-us-stamp.svg" alt="Follow Us"></h2>
				<ul class="social-media-section__follow-btns">
					<li class="btn btn--facebook"><a href="<?php echo get_post_meta($post->ID, 'Facebook Link', true); ?>">Facebook</a></li>
					<li class="btn btn--twitter"><a href="<?php echo get_post_meta($post->ID, 'Twitter Link', true); ?>">Twitter</a></li>
					<li class="btn btn--primary"><a href="<?php echo get_post_meta($post->ID, 'Instagram Link', true); ?>">Instagram</a></li>
				</ul>
			</section>
		</main>
<?php get_footer(); ?>