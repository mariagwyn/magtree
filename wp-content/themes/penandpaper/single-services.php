<?php
/* 
 Single post template used for displaying the service page section (used for preview only!)
*/
get_header(); ?>

<?php if(have_posts()) : while(have_posts()) : the_post();
	
		$service_title = get_post_meta($post->ID, 'service_title_meta', true); 
		$service_subtitle = get_post_meta($post->ID, 'service_subtitle_meta', true); 
		$stellar_ratio = get_post_meta($post->ID, 'service_bg_ratio_meta',  true);
		$service_bg_set = get_post_meta($post->ID, 'service_bg_set_meta', true);				
		$service_bg = get_post_meta($post->ID, 'service_bg_meta', true);	
		$service_bg_repeat = get_post_meta($post->ID, 'service_bg_repeat_meta', true); 
	?>

	<section id="<?php echo $post->post_name ?>" class="slide" data-stellar-background-ratio="<?php echo $stellar_ratio; ?>" <?php if ( $service_bg !='' ) { ?>style="background:url(<?php echo $service_bg; ?>) <?php echo $service_bg_repeat; ?>;"<?php } elseif ( $service_bg_set !='' ) { ?> style="background:url(<?php echo get_template_directory_uri(); ?>/lib/images/<?php echo $service_bg_set; ?>.png) <?php echo $service_bg_repeat; ?>;"<?php } ?>>
		
		<div class="container">
			<?php if ( $service_title != '' || $service_subtitle != '' ) { ?> 
				<hgroup>
					<?php if ( $service_title != '' ) { ?>
						<h1><?php echo do_shortcode($service_title); ?></h1>
					<?php } ?>
					<?php if ( $service_subtitle != '' ) { ?>
						<h2 class="curly_brackets"><span><?php echo do_shortcode($service_subtitle); ?></span></h2>
					<?php } ?>
				</hgroup> 
			<?php } ?> 
			<?php the_content(); ?>
		</div>
		
	</section>

<?php endwhile; endif; ?>
<?php get_footer(); ?>