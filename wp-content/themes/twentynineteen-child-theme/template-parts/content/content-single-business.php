<?php
/**
 * Template part for displaying posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package WordPress
 * @subpackage Twenty_Nineteen
 * @since Twenty Nineteen 1.0
 */

?>

<article id="post-<?php the_ID();?>" <?php post_class();?>>
	<?php if (!twentynineteen_can_show_post_thumbnail()): ?>
	<header class="entry-header">
		<?php get_template_part('template-parts/header/entry-header', 'business');?>
	</header>
	<?php endif;?>

	<div class="entry-content">
		<?php
        the_post_thumbnail();
        the_content(
            sprintf(
                get_the_title()
            )
        );

        wp_link_pages(
            array(
                'before' => '<div class="page-links">' . __('Pages:', 'twentynineteen'),
                'after' => '</div>',
            )
        );
        ?>
        <section class="related-events">
            <h3><?php _e('Upcoming Events', 'twentynineteen'); ?> </h3>
            <?php lpt_show_events(); ?>
        </section>
	</div><!-- .entry-content -->

	<footer class="entry-footer">
		<?php twentynineteen_entry_footer();?>
	</footer><!-- .entry-footer -->

	<?php if (!is_singular('attachment')): ?>
		<?php get_template_part('template-parts/post/author', 'bio');?>
	<?php endif;?>

</article><!-- #post-<?php the_ID();?> -->
