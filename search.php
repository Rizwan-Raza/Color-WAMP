<?php get_header(); ?>
<section class="pin-top">
    <?php if (get_theme_mod("color_wamp_page_header_top_option") == "image") {
        ?>
        <img src="<?php echo esc_url(get_theme_mod("color_wamp_page_header_top_image")) ?>" alt="<?php bloginfo('name', 'display'); ?>" class="banner-image w-full" />
        <br />
    <?php
    } elseif (get_theme_mod("color_wamp_page_header_top_option", "panel") == "panel") {
        ?>
        <div class="static-panel primary"></div>
    <?php
    } ?>
</section>
<div class="row px-4">
    <div class="col s12 m8">
        <?php
        if (have_posts()) {
            ?>
            <?php if (get_theme_mod("color_wamp_design_header_search_setting", 1)) {
                ?>
                <nav class="white px-4 my-4">
                    <p class="grey-text"><?php esc_html_e("Searched for", "color-wamp") ?>: <strong><?php echo get_search_query() ?></strong></p>
                </nav>
            <?php
            } ?>
            <?php
            get_template_part("content", "page");
            if (get_theme_mod('color_wamp_bf_nav_links_settings', 1)) {
                get_template_part('navigation', 'single');
            }
        } else {
            get_template_part("no-results");
        } ?>
    </div>
    <div class="col s12 m4">
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