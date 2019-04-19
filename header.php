<!DOCTYPE html>
<html <?php echo esc_attr(language_attributes())?>>

<head>
    <meta charset="<?php bloginfo('charset')?>">
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
    <style>
    .primary,
.primary-hover:hover,
#footer::before
 {
    background-color: <?php echo esc_attr(get_theme_mod("color_wamp_theme_color_setting", "#3d85c6"))?> !important;
}

.primary-text,
.primary-text-hover:hover {
    color: <?php echo esc_attr(get_theme_mod("color_wamp_theme_color_setting", "#3d85c6"))?> !important;
}

a {
    color: <?php echo esc_attr(get_theme_mod("color_wamp_theme_color_setting", "#3d85c6"))?>;
}
.nav-content {
    position: <?php echo get_theme_mod("color_wamp_sticky_header_setting", 1) ? "sticky": "static"?> !important;
}
    
    </style>
    <?php if (get_theme_mod("color_wamp_theme_color_setting", "#3d85c6") != "#3d85c6") {
    ?>
        <style>
        ::-webkit-scrollbar-thumb,
        ::-webkit-scrollbar-thumb:hover,
        ::-webkit-scrollbar-thumb:active,
        ::-webkit-scrollbar-thumb:focus {
            background-color: <?php echo esc_attr(get_theme_mod("color_wamp_theme_color_setting", "#3d85c6"))?>
        }
        </style>
        <?php
} ?>
</head>

<body <?php body_class("custom-background")?>>
    <?php
    if (! isset($content_width)) {
        $content_width = 1140;
    }
    ?>
    <nav class="nav-extended">
        <div class="nav-wrapper white">
            <a href="<?php echo home_url()?>" class="brand-logo mx-3">
                <?php if (has_custom_logo()) {
        ?>
                <img src="<?php $img = wp_get_attachment_image_src(get_theme_mod('custom_logo', get_template_directory_uri().'/images/wamp-round-logo.png'), "full");echo esc_url($img[0])?>" alt="<?php bloginfo('name') ?>" class="brand-img hide-on-small-only" />
                <?php
    } ?>
                <h1>
                    <?php bloginfo('name')?>
                    <small class="grey-text hide-on-small-only">
                        <?php bloginfo('description')?></small>
                </h1>
            </a>
            <a href="#" data-target="mobile-demo" class="sidenav-trigger"><i class="material-icons">menu</i></a>
            <?php if (get_theme_mod("color_wamp_social_link_activate", 1) and (get_theme_mod('color_wamp_social_link_location_option', 'both') == "both" or get_theme_mod('color_wamp_social_link_location_option') == "header")) {
        ?>
                <ul class="right hide-on-med-and-down social-links">
                    <?php $social = get_theme_mod("color_wamp_social_facebook", "#facebook"); if (!empty($social)) {
            ?>
                        <li><a href="<?php echo esc_attr(get_theme_mod("color_wamp_social_facebook"))?>" <?php echo get_theme_mod("color_wamp_social_facebook_checkbox") ? "target='_blank'" : ""?> class="btn-floating btn-flat waves-effect waves-dark waves-circle facebook"><img src="<?php echo esc_attr(get_template_directory_uri())?>/images/facebook-f-brands.svg" alt="Facebook Icon" /></a></li>
                    <?php
        }
        $social = get_theme_mod("color_wamp_social_twitter", "#twitter"); if (!empty($social)) {
            ?>
                    <li><a href="<?php echo esc_attr(get_theme_mod("color_wamp_social_twitter"))?>" <?php echo get_theme_mod("color_wamp_social_twitter_checkbox") ? "target='_blank'" : ""?> class="btn-floating btn-flat waves-effect waves-dark waves-circle twitter"><img src="<?php echo esc_attr(get_template_directory_uri())?>/images/twitter-brands.svg" alt="Twitter Icon" /></a></li>
                    <?php
        }
        $social = get_theme_mod("color_wamp_social_linkedin", "#linkedin"); if (!empty($social)) {
            ?>
        <li><a href="<?php echo esc_attr(get_theme_mod("color_wamp_social_linkedin"))?>" <?php echo get_theme_mod("color_wamp_social_linkedin_checkbox") ? "target='_blank'" : ""?> class="btn-floating btn-flat waves-effect waves-dark waves-circle linkedin"><img src="<?php echo esc_attr(get_template_directory_uri())?>/images/linkedin-in-brands.svg"  alt="LinkedIn Icon"/></a></li>
        <?php
        }
        $social = get_theme_mod("color_wamp_social_instagram"); if (!empty($social)) {
            ?>
        <li><a href="<?php echo esc_attr(get_theme_mod("color_wamp_social_instagram"))?>" <?php echo get_theme_mod("color_wamp_social_instagram_checkbox") ? "target='_blank'" : ""?> class="btn-floating btn-flat waves-effect waves-dark waves-circle instagram"><img src="<?php echo esc_attr(get_template_directory_uri())?>/images/instagram-brands.svg" alt="Instagram Icon" /></a></li>
        <?php
        }
        $social = get_theme_mod("color_wamp_social_pinterest"); if (!empty($social)) {
            ?>
        <li><a href="<?php echo esc_attr(get_theme_mod("color_wamp_social_pinterest"))?>" <?php echo get_theme_mod("color_wamp_social_pinterest_checkbox") ? "target='_blank'" : ""?> class="btn-floating btn-flat waves-effect waves-dark waves-circle pinterest"><img src="<?php echo esc_attr(get_template_directory_uri())?>/images/pinterest-p-brands.svg" alt="Pinterest Icon" /></a></li>
        <?php
        }
        $social = get_theme_mod("color_wamp_social_youtube"); if (!empty($social)) {
            ?>
        <li><a href="<?php echo esc_attr(get_theme_mod("color_wamp_social_youtube"))?>" <?php echo get_theme_mod("color_wamp_social_youtube_checkbox") ? "target='_blank'" : ""?> class="btn-floating btn-flat waves-effect waves-dark waves-circle youtube"><img src="<?php echo esc_attr(get_template_directory_uri())?>/images/youtube-brands.svg"  alt="YouTube Icon" /></a></li>
        <?php
        }
        $social = get_theme_mod("color_wamp_social_tumblr"); if (!empty($social)) {
            ?>
                    <li><a href="<?php echo esc_attr(get_theme_mod("color_wamp_social_tumblr"))?>" <?php echo get_theme_mod("color_wamp_social_tumblr_checkbox") ? "target='_blank'" : ""?> class="btn-floating btn-flat waves-effect waves-dark waves-circle tumblr"><img src="<?php echo esc_attr(get_template_directory_uri())?>/images/tumblr-brands.svg" alt="Tumblr Icon" /></a></li>
                <?php
        } ?>
            
            </ul>
                <ul id="nav-mobile" class="right hide-on-large-only">
                <li><a href="#" class="dropdown-trigger btn-floating btn-flat waves-effect waves-dark waves-circle transparent"
                            data-target='mobile_more_social'><i class="material-icons">more_vert</i></a></li>
                </ul>
    <?php
    } ?>
        </div>
    </nav>
    <div class="nav-content hide-on-small-only primary">
        <ul class="tabs tabs-transparent fw-500">
            <?php if (get_theme_mod('color_wamp_home_menu_header_setting', 1)) {
        ?>
                <li class="tab scale-transition menu-item"><a href="<?php home_url()?>"><?php esc_html_e("Home", "color-wamp")?></a></li>
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
                    ?> <li class="tab right search"><form action="<?php echo esc_url(home_url('/'))?>" class="search-form clearfix" method="get"><div class="input-field my-1"><input name="s" id="search-top" type="search" class="right" placeholder="<?php esc_attr_e('Enter query and press `enter`', 'color-wamp')?>"/></div></form><button class="right btn-floating btn-flat white-text transparent waves-circle waves-effect waves-light" tabindex="-1" onclick="toggleSearch(this)"><i class="material-icons">search</i></button></li>
                <?php
                } ?>
            </ul>
    </div>

    <ul class="sidenav" id="mobile-demo">
        <li><a href="<?php home_url()?>"><?php esc_attr_e("Home", "color-wamp")?></a></li>
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
    <?php $social = get_theme_mod("color_wamp_social_facebook", "#facebook"); if (!empty($social)) {
        ?>
                        <li><a href="<?php echo esc_url(get_theme_mod("color_wamp_social_facebook"))?>" <?php echo get_theme_mod("color_wamp_social_facebook_checkbox") ? "target='_blank'" : ""?>><img class="left mr-2" src="<?php echo esc_url(get_template_directory_uri())?>/images/facebook-f-brands.svg" alt="Facebook Icon"  /> Facebook</a></li>
                    <?php
    }
    $social = get_theme_mod("color_wamp_social_twitter", "#twitter"); if (!empty($social)) {
        ?>
                    <li><a href="<?php echo esc_url(get_theme_mod("color_wamp_social_twitter"))?>" <?php echo get_theme_mod("color_wamp_social_twitter_checkbox") ? "target='_blank'" : ""?>><img class="left mr-2" src="<?php echo esc_url(get_template_directory_uri())?>/images/twitter-brands.svg"  alt="Twitter Icon" /> Twitter</a></li>
                    <?php
    }
    $social = get_theme_mod("color_wamp_social_linkedin", "#linkedin"); if (!empty($social)) {
        ?>
        <li><a href="<?php echo esc_url(get_theme_mod("color_wamp_social_linkedin"))?>" <?php echo get_theme_mod("color_wamp_social_linkedin_checkbox") ? "target='_blank'" : ""?>><img class="left mr-2" src="<?php echo esc_url(get_template_directory_uri())?>/images/linkedin-in-brands.svg" alt="LinkedIn Icon"  /> LinkedIn</a></li>
        <?php
    }
    $social = get_theme_mod("color_wamp_social_instagram"); if (!empty($social)) {
        ?>
        <li><a href="<?php echo esc_url(get_theme_mod("color_wamp_social_instagram"))?>" <?php echo get_theme_mod("color_wamp_social_instagram_checkbox") ? "target='_blank'" : ""?>><img class="left mr-2" src="<?php echo esc_url(get_template_directory_uri())?>/images/instagram-brands.svg" alt="Instagram Icon" /> Instagram</a></li>
        <?php
    }
    $social = get_theme_mod("color_wamp_social_pinterest"); if (!empty($social)) {
        ?>
        <li><a href="<?php echo esc_url(get_theme_mod("color_wamp_social_pinterest"))?>" <?php echo get_theme_mod("color_wamp_social_pinterest_checkbox") ? "target='_blank'" : ""?>><img class="left mr-2" src="<?php echo esc_url(get_template_directory_uri())?>/images/pinterest-p-brands.svg" alt="Pinterest Icon"/> Pinterest</a></li>
        <?php
    }
    $social = get_theme_mod("color_wamp_social_youtube"); if (!empty($social)) {
        ?>
        <li><a href="<?php echo esc_url(get_theme_mod("color_wamp_social_youtube"))?>" <?php echo get_theme_mod("color_wamp_social_youtube_checkbox") ? "target='_blank'" : ""?>><img class="left mr-2" src="<?php echo esc_url(get_template_directory_uri())?>/images/youtube-brands.svg" alt="Youtube Icon"/> Youtube</a></li>
        <?php
    }
    $social = get_theme_mod("color_wamp_social_tumblr"); if (!empty($social)) {
        ?>
                    <li><a href="<?php echo esc_url(get_theme_mod("color_wamp_social_tumblr"))?>" <?php echo get_theme_mod("color_wamp_social_tumblr_checkbox") ? "target='_blank'" : ""?>><img class="left mr-2" src="<?php echo esc_url(get_template_directory_uri())?>/images/tumblr-brands.svg"  alt="Tumblr Icon" /> Tumblr</a></li>
                <?php
    } ?>
    </ul>