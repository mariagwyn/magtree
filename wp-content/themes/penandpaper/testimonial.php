<?php
/**
 * The template for displaying Testimonial Archive pages.
 */
get_header(); ?>

    <section class="page">
        <div class="container">

            <!--BLOG POSTS SECTION START-->
            <section id="blog_content" class="two-thirds column">
                <article <?php post_class(); ?>>

                    <?php
                    if(isset($_GET['testimonial_name'])) :
                        $curtestimonial = get_userdatabylogin($testimonial_name);
                    else :
                        $curtestimonial = get_userdata(intval($testimonial));
                    endif;
                    ?>

                    <hgroup>
                        <h1>
                            <?php _e('About', 'pp') ?>
                            <?php echo $curtestimonial->display_name; ?>
                        </h1>
                        <h2 class="curly_brackets">
                         <span>
                               <?php if ($curtestimonial->user_url): ?>
                                   <a href="<?php echo $curtestimonial->user_url; ?>">
                                       <?php _e('Visit', 'pp'); ?> <?php echo $curtestimonial->display_name; ?><?php _e("'s website", 'pp'); ?>
                                   </a>
                               <?php endif; ?>
                         </span>
                        </h2>
                    </hgroup>

                    <div class="separator"></div>

                    <p id="auth_desc"><?php echo $curtestimonial->description; ?></p>

                    <ul>
                        <?php if(have_posts()) : while(have_posts()) : the_post(); ?>
                            <li>
                                <i class="icon-ok"></i>
                                <a href="<?php the_permalink(); ?>" title="<?php the_title(); ?>">
                                    <?php the_title(); ?>
                                </a>
                            </li>
                        <?php endwhile; ?>
                    </ul>

                <?php else : ?>
                    <h1><?php _e('Not found', 'pp'); ?></h1>
                    <p><?php _e("Sorry, we can't find that.", 'pp'); ?></p>
                <?php endif; ?>

                    <br class="clear"/>
                    <?php get_template_part( 'paged-nav' ) // load numbered page navigation ?>

                </article>
            </section>
            <!--BLOG ENDS HERE-->

            <?php get_sidebar(); ?>

        </div>
    </section>

<?php get_footer(); ?>