<?php get_header(); ?>
<section class="pin-top">
    <?php if (get_theme_mod("color_wamp_page_header_top_option") == "image") {
        ?>
        <img src="<?php echo esc_attr(get_theme_mod("color_wamp_page_header_top_image")) ?>" alt="<?php bloginfo('name', 'display'); ?>" class="banner-image w-full" />
        <br />
    <?php
    } elseif (get_theme_mod("color_wamp_page_header_top_option", "panel") == "panel") {
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
        if (have_posts()) {
            ?>
            <?php if (get_theme_mod("color_wamp_design_header_archive_setting", 1)) {
                ?>
                <nav class="white px-4 my-4">
                    <p class="grey-text">
                        <?php
                        if (is_author()) {
                            echo esc_html("Author", "color-wamp") . ": <strong>" . esc_html(ucfirst(get_the_author())) . "</strong>";
                        } elseif (is_category()) {
                            echo esc_html("Category", "color-wamp") . ": <strong>" . single_cat_title('', false) . "</strong>";
                        } elseif (is_day()) {
                            echo esc_html("Day", "color-wamp") . ": <strong>" . get_the_time("jS F, Y") . "</strong>";
                        } elseif (is_month()) {
                            echo esc_html("Month", "color-wamp") . ": <strong>" . single_month_title(' ', false) . "</strong>";
                        } elseif (is_year()) {
                            echo esc_html("Year", "color-wamp") . ": <strong>" . get_the_time("Y") . "</strong>";
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
<?php get_footer(); ?>