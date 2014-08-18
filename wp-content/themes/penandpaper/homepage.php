<?php
/* 
Template Name: Homepage
 
Template used for displaying the front page. 
It loads homepage scrolling sections, which are custom post types named 'sections'.
*/
get_header();

$home_query = new WP_Query( array( 'post_type' => 'sections', 'posts_per_page' => -1, 'order' => 'ASC' ) ); 
if($home_query->have_posts()) : while($home_query->have_posts()) : $home_query->the_post();

		$section_title = get_post_meta($post->ID, 'home_title_meta', true); 
		$section_subtitle = get_post_meta($post->ID, 'home_subtitle_meta', true); 
		$stellar_ratio = get_post_meta($post->ID, 'home_bg_ratio_meta',  true);
		$section_bg_set = get_post_meta($post->ID, 'home_bg_set_meta', true);				
		$section_bg = get_post_meta($post->ID, 'home_bg_meta', true);	
		$section_bg_repeat = get_post_meta($post->ID, 'home_bg_repeat_meta', true); 
	?>
	
	<section id="<?php echo $post->post_name ?>" class="slide" data-stellar-background-ratio="<?php echo $stellar_ratio; ?>" <?php if ( $section_bg !='' ) { ?>style="background:url(<?php echo $section_bg; ?>) <?php echo $section_bg_repeat; ?>;"<?php } elseif ( $section_bg_set !='' ) { ?> style="background:url(<?php echo get_template_directory_uri(); ?>/lib/images/<?php echo $section_bg_set; ?>.png) <?php echo $section_bg_repeat; ?>;"<?php } ?>>
	
		<div class="container">
            <div class="sixteen columns">
			<?php if ( $section_title != '' || $section_subtitle != '' ) { ?> 
				<hgroup>
					<?php if ( $section_title != '' ) { ?>
						<h1><?php echo do_shortcode($section_title); ?></h1>
					<?php } ?>
					<?php if ( $section_subtitle != '' ) { ?>
						<h2 class="curly_brackets"><span><?php echo do_shortcode($section_subtitle); ?></span></h2>
					<?php } ?>
				</hgroup> 
			<?php } ?>
            <div class="offset-by-one columns"><?php the_content(); ?></div>
        </div>
		</div>
		
	</section>

<?php endwhile; endif; ?>
<?php get_footer(); ?>