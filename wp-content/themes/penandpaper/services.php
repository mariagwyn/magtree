<?php
/*
Template Name: Services

Template used for displaying the front page.
It loads homepage scrolling sections, which are custom post types named 'service'.
*/
get_header();

$service_query = new WP_Query( array( 'post_type' => 'service', 'posts_per_page' => -1, 'order' => 'ASC' ) );
if($service_query->have_posts()) : while($service_query->have_posts()) : $service_query->the_post();

    $service_title = get_post_meta($post->ID, 'service_title_meta', true);
    $service_subtitle = get_post_meta($post->ID, 'service_subtitle_meta', true);
    $stellar_ratio = get_post_meta($post->ID, 'service_bg_ratio_meta',  true);
    $service_bg_set = get_post_meta($post->ID, 'service_bg_set_meta', true);
    $service_bg = get_post_meta($post->ID, 'service_bg_meta', true);
    $service_bg_repeat = get_post_meta($post->ID, 'service_bg_repeat_meta', true);
    ?>

    <section id="<?php echo $post->post_name ?>" class="slide" data-stellar-background-ratio="<?php echo $stellar_ratio; ?>" <?php if ( $service_bg !='' ) { ?>style="background:url(<?php echo $service_bg; ?>) <?php echo $service_bg_repeat; ?>;"<?php } elseif ( $service_bg_set !='' ) { ?> style="background:url(<?php echo get_template_directory_uri(); ?>/lib/images/<?php echo $service_bg_set; ?>.png) <?php echo $service_bg_repeat; ?>;"<?php } ?>>

        <div class="container">
            <div class="sixteen columns">
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
            <div class="offset-by-one columns"><?php the_content(); ?></div>
        </div></div>

    </section>

<?php endwhile; endif; ?>
<?php get_footer(); ?>