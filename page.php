<?php get_header(); ?>
<section class="pin-top">
<?php if (get_theme_mod("color_wamp_page_header_top_option") == "image") {
    ?>
<img src="<?php echo esc_url(get_theme_mod("color_wamp_page_header_top_image"))?>" alt="<?php bloginfo('name', 'display'); ?>" class="banner-image w-full" />
<br />
<?php
} elseif (get_theme_mod("color_wamp_page_header_top_option", "panel") == "panel") {
        ?>
    <div class="static-panel primary"></div>
<?php
    } ?>
<div class="row px-4">
        <div class="col s12 l8">
        <?php
        if (have_posts()) {
            ?>
            <?php if ((!is_front_page() and !is_home()) and get_theme_mod("color_wamp_design_breadcrumb_page_setting", 1)) {
                ?> 
                
        <nav class="white px-4 my-4">
            <a href="<?php echo esc_url(get_home_url())?>" class="breadcrumb grey-text primary-text-hover"><?php esc_html_e("Home", "color-wamp")?></a>
            <a href="<?php the_permalink()?>" class="breadcrumb grey-text primary-text-hover">
                <?php the_title()?></a>
        </nav>
        <?php
            } ?>
        <?php
            get_template_part("content");
            if (get_theme_mod('color_wamp_bf_nav_links_settings', 1)) {
                get_template_part('navigation', 'single');
            }
        } else {
            get_template_part("no-results");
        } ?>
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