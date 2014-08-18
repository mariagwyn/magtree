<?php
/**
 * The template for displaying testimonials about section.
 * It can be loaded by placing [testimonials category=""] shortcode inside your page.
 * If the category is not specified, all posts will be shown.
 */

global $post, $category;
$testimonials_query = new WP_Query(array( 'post_type' => 'testimonial_type', 'testimonials' => $category, 'posts_per_page' =>'-1') );
$count = 1;
?>

<!-- tabs start // one for each pane  -->
<?php if ( $testimonials_query->post_count > 1 ) { ?>
    <ul class="tabs curly_brackets sixteen columns">
        <?php if ($testimonials_query->have_posts()) : while ($testimonials_query->have_posts()) : $testimonials_query->the_post(); ?>
            <li><a href="#"><?php the_title(); ?></a></li>
            <?php $count++; endwhile; endif; ?>
    </ul>
<?php } ?>
<!-- tabs end -->

<div class="separator"></div>

<!-- panes start -->
<div class="panes">
    <?php
    if ($testimonials_query->have_posts()) : while ($testimonials_query->have_posts()) : $testimonials_query->the_post();
        $testimonial_caption = get_post_meta($post->ID, 'testimonials_caption_meta', true);
        ?>

        <!-- testimonial pane start -->
        <div class="clearfix">
            <figure class="eight columns">
                <?php if ( has_post_thumbnail() ) { ?>
                    <div class="styled">
                        <?php the_post_thumbnail('testimonial-thumbnail'); ?>
                    </div>
                <?php } else { ?>
                    <div class="styled">
                        <img src="<?php echo get_template_directory_uri(); ?>/lib/images/photos/testimonial.png" alt="<?php get_the_title(); ?>" />
                    </div>
                <?php } ?>

                <?php if ( $testimonial_caption !='' ) { ?>
                    <figcaption><?php echo $testimonial_caption; ?></figcaption>
                <?php } ?>
            </figure>

            <div class="eight columns">
                <h3><?php the_title(); ?></h3>
                <?php the_content(); ?>
            </div>
        </div>
        <!-- testimonial pane end -->

        <?php $count++; endwhile; endif; ?>
</div>
<!-- panes end -->