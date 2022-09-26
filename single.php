<?php /*Template Name: Blog Archive*/ ?>
<?php get_header();
 $subdestination = $wpdb->get_results("SELECT * FROM wp_subservices WHERE name = '$post->post_title'");
  ?>

<div class="jumbotron jumbosection d-flex align-items-center justify-content-center bg-secondary bcg-parallax">
    <div class="bcg"
        style="background-image: url('<?php bloginfo('template_directory'); ?>/img/subdestinations_banner/<?php echo $subdestination[0]->banner; ?>'); background-size: cover; background-position: center">
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
                    <?php
$category = get_the_category(); 
$parent = get_category($category[0]->category_parent);
    for ($i=0; $i < count($category); $i++) { 
        echo '<li class="breadcrumb-item"><a href="/'.$category[$i]->slug.'">'.$category[$i]->name.'</a></li>';
    }
    ?>

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