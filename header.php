<!DOCTYPE html>
<html <?php language_attributes(); ?>>

<head>
    <meta charset="<?php bloginfo('charset') ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">

    <link rel="manifest" href="manifest.json">
    <meta name="msapplication-TileColor" content="#ffffff">
    <meta name="theme-color" content="#ffffff">
    <!-- Compiled and minified CSS -->
    <?php wp_head(); ?>
</head>

<body <?php body_class("custom-background") ?>>
    <nav class="nav-extended">
        <div class="nav-wrapper white">
            <?php if (has_custom_logo()) {
                the_custom_logo();
            } else { ?>
                <a href="<?php echo esc_url(home_url()) ?>" class="brand-logo mx-3">
                    <h1>
                        <?php bloginfo('name') ?>
                        <small class="grey-text hide-on-small-only">
                            <?php bloginfo('description') ?></small>
                    </h1>
                </a>
            <?php } ?>
            <a href="#" data-target="mobile-demo" class="sidenav-trigger"><i class="material-icons">menu</i></a>
            <?php if (get_theme_mod("color_wamp_social_link_activate_settings") and (get_theme_mod('color_wamp_social_link_location_option', 'both') == "both" or get_theme_mod('color_wamp_social_link_location_option') == "header")) {
                ?>
                <ul class="right hide-on-med-and-down social-links">
                    <?php $social = get_theme_mod("color_wamp_social_f");
                    if (!empty($social)) {
                        ?>
                        <li><a href="<?php echo esc_url(get_theme_mod("color_wamp_social_f")) ?>" target="<?php echo get_theme_mod("color_wamp_social_f_checkbox") ? "_blank" : "_self" ?>" class="btn-floating btn-flat waves-effect waves-dark waves-circle facebook"><img src="<?php echo esc_url(get_template_directory_uri()) ?>/images/f.svg" alt="<?php esc_attr_e("Social Icon", "color-wamp") ?>" /></a></li>
                    <?php
                    }
                    $social = get_theme_mod("color_wamp_social_t");
                    if (!empty($social)) {
                        ?>
                        <li><a href="<?php echo esc_url(get_theme_mod("color_wamp_social_t")) ?>" target="<?php echo get_theme_mod("color_wamp_social_t_checkbox") ? "_blank" : "_self" ?>" class="btn-floating btn-flat waves-effect waves-dark waves-circle twitter"><img src="<?php echo esc_url(get_template_directory_uri()) ?>/images/t.svg" alt="<?php esc_attr_e("Social Icon", "color-wamp") ?>" /></a></li>
                    <?php
                    }
                    $social = get_theme_mod("color_wamp_social_l");
                    if (!empty($social)) {
                        ?>
                        <li><a href="<?php echo esc_url(get_theme_mod("color_wamp_social_l")) ?>" target="<?php echo get_theme_mod("color_wamp_social_l_checkbox") ? "_blank" : "_self" ?>" class="btn-floating btn-flat waves-effect waves-dark waves-circle linkedin"><img src="<?php echo esc_url(get_template_directory_uri()) ?>/images/l.svg" alt="<?php esc_attr_e("Social Icon", "color-wamp") ?>" /></a></li>
                    <?php
                    }
                    $social = get_theme_mod("color_wamp_social_i");
                    if (!empty($social)) {
                        ?>
                        <li><a href="<?php echo esc_url(get_theme_mod("color_wamp_social_i")) ?>" target="<?php echo get_theme_mod("color_wamp_social_i_checkbox") ? "_blank" : "_self" ?>" class="btn-floating btn-flat waves-effect waves-dark waves-circle instagram"><img src="<?php echo esc_url(get_template_directory_uri()) ?>/images/i.svg" alt="<?php esc_attr_e("Social Icon", "color-wamp") ?>" /></a></li>
                    <?php
                    }
                    $social = get_theme_mod("color_wamp_social_p");
                    if (!empty($social)) {
                        ?>
                        <li><a href="<?php echo esc_url(get_theme_mod("color_wamp_social_p")) ?>" target="<?php echo get_theme_mod("color_wamp_social_p_checkbox") ? "_blank" : "_self" ?>" class="btn-floating btn-flat waves-effect waves-dark waves-circle pinterest"><img src="<?php echo esc_url(get_template_directory_uri()) ?>/images/p.svg" alt="<?php esc_attr_e("Social Icon", "color-wamp") ?>" /></a></li>
                    <?php
                    }
                    $social = get_theme_mod("color_wamp_social_y");
                    if (!empty($social)) {
                        ?>
                        <li><a href="<?php echo esc_url(get_theme_mod("color_wamp_social_y")) ?>" target="<?php echo get_theme_mod("color_wamp_social_y_checkbox") ? "_blank" : "_self" ?>" class="btn-floating btn-flat waves-effect waves-dark waves-circle youtube"><img src="<?php echo esc_url(get_template_directory_uri()) ?>/images/y.svg" alt="<?php esc_attr_e("Social Icon", "color-wamp") ?>" /></a></li>
                    <?php
                    }
                    $social = get_theme_mod("color_wamp_social_tu");
                    if (!empty($social)) {
                        ?>
                        <li><a href="<?php echo esc_url(get_theme_mod("color_wamp_social_tu")) ?>" target="<?php echo get_theme_mod("color_wamp_social_tu_checkbox") ? "_blank" : "_self" ?>" class="btn-floating btn-flat waves-effect waves-dark waves-circle tumblr"><img src="<?php echo esc_url(get_template_directory_uri()) ?>/images/tu.svg" alt="<?php esc_attr_e("Social Icon", "color-wamp") ?>" /></a></li>
                    <?php
                    } ?>

                </ul>
                <ul id="nav-mobile" class="right hide-on-large-only">
                    <li><a href="#" class="dropdown-trigger btn-floating btn-flat waves-effect waves-dark waves-circle transparent" data-target='mobile_more_social'><i class='material-icons'>&#xe5d4</i></a></li>
                </ul>
            <?php
            } ?>
        </div>
    </nav>
    <div class="nav-content hide-on-small-only primary">
        <ul class="tabs tabs-transparent fw-500">
            <?php if (get_theme_mod('color_wamp_home_menu_header_setting', 1)) {
                ?>
                <li class="tab scale-transition menu-item"><a href="<?php home_url() ?>"><?php esc_html_e("Home", "color-wamp") ?></a></li>
            <?php
            } ?>
            <?php if (has_nav_menu("main-header-menu")) {
                wp_nav_menu(array(
                    'theme_location' => 'main-header-menu',
                    'menu' => 'main-header-menu',
                    'container' => '',
                    'items_wrap' => '%3$s'
                ));
            }
            ?>
            <?php if (get_theme_mod('color_wamp_home_search_header_setting', 1)) {
                ?> <li class="tab right search">
                    <form action="<?php echo esc_url(home_url('/')) ?>" class="search-form clearfix" method="get">
                        <div class="input-field my-1"><input name="s" id="search-top" type="search" class="right" placeholder="<?php esc_attr_e('Enter query and press `enter`', 'color-wamp') ?>" /></div>
                    </form><button class="right btn-floating btn-flat white-text transparent waves-circle waves-effect waves-light" tabindex="-1" onclick="toggleSearch(this)"><i class='material-icons'>&#xe8b6</i></button>
                </li>
            <?php
            } ?>
        </ul>
    </div>

    <ul class="sidenav" id="mobile-demo">
        <li><a href="<?php echo esc_url(get_home_url()) ?>"><?php esc_attr_e("Home", "color-wamp") ?></a></li>
        <?php
        wp_nav_menu(array(
            'theme_location' => 'main-sidebar-menu',
            'container' => '',
            'items_wrap' => '%3$s'
        ));
        ?>
        <?php if (get_theme_mod('color_wamp_home_search_header_setting')) {
            ?> <li class="divider"></li>
            <li class="px-4 search">
                <?php get_search_form(); ?></li>
        <?php
        } ?>
    </ul>

    <!-- Dropdown Structure -->
    <ul id='mobile_more_social' class='dropdown-content'>
        <?php $social = get_theme_mod("color_wamp_social_f");
        if (!empty($social)) {
            ?>
            <li><a href="<?php echo esc_url(get_theme_mod("color_wamp_social_f")) ?>" <?php echo get_theme_mod("color_wamp_social_f_checkbox") ? "target='_blank'" : "" ?>><img class="left mr-2" src="<?php echo esc_url(get_template_directory_uri()) ?>/images/f.svg" alt="<?php esc_attr_e("Social Icon", "color-wamp") ?>" /> <?php esc_attr_e("Facebook", "color-wamp") ?></a></li>
        <?php
        }
        $social = get_theme_mod("color_wamp_social_t");
        if (!empty($social)) {
            ?>
            <li><a href="<?php echo esc_url(get_theme_mod("color_wamp_social_t")) ?>" <?php echo get_theme_mod("color_wamp_social_t_checkbox") ? "target='_blank'" : "" ?>><img class="left mr-2" src="<?php echo esc_url(get_template_directory_uri()) ?>/images/t.svg" alt="<?php esc_attr_e("Social Icon", "color-wamp") ?>" /> <?php esc_attr_e("Twitter", "color-wamp") ?></a></li>
        <?php
        }
        $social = get_theme_mod("color_wamp_social_l");
        if (!empty($social)) {
            ?>
            <li><a href="<?php echo esc_url(get_theme_mod("color_wamp_social_l")) ?>" <?php echo get_theme_mod("color_wamp_social_l_checkbox") ? "target='_blank'" : "" ?>><img class="left mr-2" src="<?php echo esc_url(get_template_directory_uri()) ?>/images/l.svg" alt="<?php esc_attr_e("Social Icon", "color-wamp") ?>" /> <?php esc_attr_e("LinkedIn", "color-wamp") ?></a></li>
        <?php
        }
        $social = get_theme_mod("color_wamp_social_i");
        if (!empty($social)) {
            ?>
            <li><a href="<?php echo esc_url(get_theme_mod("color_wamp_social_i")) ?>" <?php echo get_theme_mod("color_wamp_social_i_checkbox") ? "target='_blank'" : "" ?>><img class="left mr-2" src="<?php echo esc_url(get_template_directory_uri()) ?>/images/i.svg" alt="<?php esc_attr_e("Social Icon", "color-wamp") ?>" /> <?php esc_attr_e("Instagram", "color-wamp") ?></a></li>
        <?php
        }
        $social = get_theme_mod("color_wamp_social_p");
        if (!empty($social)) {
            ?>
            <li><a href="<?php echo esc_url(get_theme_mod("color_wamp_social_p")) ?>" <?php echo get_theme_mod("color_wamp_social_p_checkbox") ? "target='_blank'" : "" ?>><img class="left mr-2" src="<?php echo esc_url(get_template_directory_uri()) ?>/images/p.svg" alt="<?php esc_attr_e("Social Icon", "color-wamp") ?>" /> <?php esc_attr_e("Pinterest", "color-wamp") ?></a></li>
        <?php
        }
        $social = get_theme_mod("color_wamp_social_y");
        if (!empty($social)) {
            ?>
            <li><a href="<?php echo esc_url(get_theme_mod("color_wamp_social_y")) ?>" <?php echo get_theme_mod("color_wamp_social_y_checkbox") ? "target='_blank'" : "" ?>><img class="left mr-2" src="<?php echo esc_url(get_template_directory_uri()) ?>/images/y.svg" alt="<?php esc_attr_e("Social Icon", "color-wamp") ?>" /> <?php esc_attr_e("Youtube", "color-wamp") ?></a></li>
        <?php
        }
        $social = get_theme_mod("color_wamp_social_tu");
        if (!empty($social)) {
            ?>
            <li><a href="<?php echo esc_url(get_theme_mod("color_wamp_social_tu")) ?>" <?php echo get_theme_mod("color_wamp_social_tu_checkbox") ? "target='_blank'" : "" ?>><img class="left mr-2" src="<?php echo esc_url(get_template_directory_uri()) ?>/images/tu.svg" alt="<?php esc_attr_e("Social Icon", "color-wamp") ?>" /> <?php esc_attr_e("Tumblr", "color-wamp") ?></a></li>
        <?php
        } ?>
    </ul>