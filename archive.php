<?php get_header(); ?>
<section class="pin-top">
<?php if (get_theme_mod("color_wamp_page_header_top_option") == "image") {
    ?>
<img src="<?php echo esc_attr(get_theme_mod("color_wamp_page_header_top_image"))?>" alt="<?php bloginfo('name', 'display'); ?>" class="banner-image w-full"/>
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
            <?php if (get_theme_mod("color_wamp_design_header_archive_setting", 1)) {
                ?> 
        <nav class="white px-4 my-4">
            <p class="grey-text">
            <?php
            if (is_author()) {
                esc_html_e("Author", "color-wamp").": <strong>".esc_html(ucfirst(get_the_author()))."</strong>";
            } elseif (is_category()) {
                esc_html_e("Category", "color-wamp").": <strong>".single_cat_title('', false) ."</strong>";
            } elseif (is_day()) {
                esc_html_e("Day", "color-wamp").": <strong>".get_the_time("jS F, Y")."</strong>";
            } elseif (is_month()) {
                esc_html_e("Month", "color-wamp").": <strong>".single_month_title(' ', false)."</strong>";
            } elseif (is_year()) {
                esc_html_e("Year", "color-wamp").": <strong>".get_the_time("Y")."</strong>";
            } ?>
            </strong></p>
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
</div>
<?php get_footer(); ?>