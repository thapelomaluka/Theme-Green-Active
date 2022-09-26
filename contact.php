<?php /*Template Name: contact page */?>
<?php get_header(); ?>

<?php

if (have_posts()) {
    while (have_posts()) {
        the_post();
        the_content();
    }
} else {
    _e('Sorry, no posts matched your criteria.', 'textdomain');
} ?>

<div class="jumbotron">
  <h1 class="display-4">Contact</h1>
</div>

<?php get_footer(); ?>