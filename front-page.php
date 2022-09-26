<?php /*Template Name: Home */?>
<?php get_header(); ?>

<?php require 'carousel-temp1.php';?>
<?php
if (have_posts()) {
    while (have_posts()) {
        the_post();
        the_content();
    }
} else {
    _e('Sorry, no posts matched your criteria.', 'textdomain');
} ?>
</section>

<?php get_footer(); ?>