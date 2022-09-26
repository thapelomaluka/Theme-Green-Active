<?php /*Template Name: Cat*/ ?>
<?php get_header(); ?>
<div class="jumbotron jumbosection d-flex align-items-center justify-content-center bg-secondary">
    <div class="bcg"
        style="background-image: url(<?php echo get_the_post_thumbnail_url($post->ID); ?>); background-size: cover; background-position: center">
    </div>
    <div class="hero-content">
        <h1 class=""><?php the_title(); ?></h1>
    </div>
</div>
<div class="container py-5">
    <div class="row">
        <div class="col">
            <nav style="--bs-breadcrumb-divider: url(&#34;data:image/svg+xml,%3Csvg xmlns='http://www.w3.org/2000/svg' width='8' height='8'%3E%3Cpath d='M2.5 0L1 1.5 3.5 4 1 6.5 2.5 8l4-4-4-4z' fill='currentColor'/%3E%3C/svg%3E&#34;);"
                aria-label="breadcrumb">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="/home">Home</a></li>
                    <?php if (!is_page(['experiences'])) { ?><li class="breadcrumb-item"><a
                            href="/destinations">Destinations</a></li><?php }?>
                    <?php if (is_page_template(['Single.php'])) { ?><li class="breadcrumb-item"><a
                            href="/destinations">Destinations</a></li><?php }?>
                    <li class="breadcrumb-item active" aria-current="page"><?php the_title(); ?></li>
                </ol>
            </nav>
        </div>
    </div>
    <div class="row">
        <div class="col">
            <?php
   $pagename = $post->post_title;
if (have_posts()) {
    while (have_posts()) {
        the_post();
        the_content();
    }
} else {
    _e('Sorry, no posts matched your criteria.', 'textdomain');
}
?>
        </div>
    </div>
</div>


<?php get_footer(); ?>