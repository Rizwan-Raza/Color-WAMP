<?php get_header(); ?>
<section class="pin-top">
    <?php if (get_theme_mod("color_wamp_home_header_top_option", "image") == "image") {
        ?>

        <div id="site-header">
            <a href="<?php echo esc_url(home_url('/')); ?>" rel="home">
                <img src="<?php echo esc_url(get_theme_mod("color_wamp_home_header_top_image", get_template_directory_uri() . "/images/back_banner.jpg")) ?>" alt="<?php bloginfo('name', 'display'); ?>" class="banner-image home-banner w-full">
            </a>
        </div>
        <br />


    <?php
    } elseif (get_theme_mod("color_wamp_home_header_top_option") == "panel") {
        ?>
        <div class="static-panel primary"></div>
    <?php
    } ?>
</section>
<?php if (!isset($content_width)) {
    $content_width = 1440;
} ?>
<div class="row px-4" style="max-width: <?php echo $content_width ?>px;">
    <div class="col s12 l8">
        <?php
        // $wpb_all_query = new WP_Query(array("post_type"=>"post", "post_status"=>"publish"));
        if (have_posts()) {
            get_template_part("content", "page");
            if (get_theme_mod('color_wamp_bf_nav_links_settings', 1)) {
                get_template_part('navigation', 'single');
            }
        } else {
            get_template_part('no-results');
        }
        ?>

    </div>
    <div class="col s12 l4">
        <?php
        if (is_active_sidebar("home-right-sidebar")) {
            dynamic_sidebar("home-right-sidebar");
        } else {
            get_template_part("no-sidebar");
        }
        ?>
    </div>
</div>

<?php get_footer(); ?>