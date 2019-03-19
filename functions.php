<?php
    function color_wamp_styles()
    {
        wp_enqueue_style("materializecss_css", "https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/css/materialize.min.css");
        wp_enqueue_style("material_icons", "https://fonts.googleapis.com/icon?family=Material+Icons");
        wp_enqueue_style("main_style", get_stylesheet_uri());
    }

    function color_wamp_scripts()
    {
        // wp_enqueue_script("jquery", "https://code.jquery.com/jquery-3.3.1.min.js", array(), "3.3.1", true);
        wp_enqueue_script("materializecss_js", "https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/js/materialize.min.js", array(), "1.0.0", true);
    }
    add_action("wp_enqueue_scripts", "color_wamp_styles");
    add_action("wp_enqueue_scripts", "color_wamp_scripts");

    function color_wamp_menus_registration()
    {
        register_nav_menus(
            array(
                'main-header-menu' => __('Main Header Menu', 'color-wamp'),
                'main-sidebar-menu' => __('Main Mobile Sidebar Menu', 'color-wamp')
            )
        );
    }

    add_action("init", "color_wamp_menus_registration");

    function main_header_menu_classes($classes, $item, $args, $depth)
    {
        if ($args->menu == 'main-header-menu') {
            if ($depth == 0) {
                $classes[] = 'tab scale-transition';
            }
        }
        if (in_array('current-menu-item', $classes) or in_array('current-menu-parent', $classes) or in_array('current-menu-ancestor', $classes) or in_array('current-page-ancestor', $classes)) {
            $classes[] = 'active';
        }

        return $classes;
    }
    
    add_filter('nav_menu_css_class', 'main_header_menu_classes', 1, 4);

    function color_wamp_custom_logo_setup()
    {
        $defaults = array(
            "height"=>57,
            "width"=>57
        );

        add_theme_support("custom-logo", $defaults);

        // load_theme_textdomain('color-wamp', get_template_directory() . '/languages');
    }

    add_action("after_setup_theme", "color_wamp_custom_logo_setup");

    function color_wamp_post_supports()
    {

        // Add default posts and comments RSS feed links to head
        add_theme_support('automatic-feed-links');

        add_theme_support("post-thumbnails");
        add_image_size("small-thumbnail", 320, 180, true);
        add_image_size("banner-image", 800, 450, true);

        // Setup the WordPress core custom background feature.
        add_theme_support('custom-background', apply_filters('color_wamp_custom_background_args', array(
            'default-color' => 'eaeaea',
        )));


        add_theme_support('custom-header', apply_filters('colormag_custom_header_args', array(
            'default-image'				=> '',
            'header-text'				=> '',
            'default-text-color'		=> '',
            'width'						=> 1400,
            'height'					=> 400,
            'flex-width'				=> true,
            'flex-height'				=> true,
            'wp-head-callback'			=> '',
            'admin-head-callback'		=> '',
            'video'						=> false,
            'admin-preview-callback'	=> 'colormag_admin_header_image',
        )));

        add_theme_support('title-tag');

        // Enable support for Post Formats.
        add_theme_support('post-formats', array(
            'aside',
            'image',
            'video',
            'quote',
            'link',
            'gallery',
            'chat',
            'audio',
            'status',
        ));
        // Adding excerpt option box for pages as well
        add_post_type_support('page', 'excerpt');

        /*
         * Switch default core markup for search form, comment form, and comments
         * to output valid HTML5.
         */
        add_theme_support('html5', array(
            'search-form',
            'comment-form',
            'comment-list',
            'gallery',
            'caption',
        ));

        // adding the WooCommerce plugin support
        add_theme_support('woocommerce');
        add_theme_support('wc-product-gallery-zoom');
        add_theme_support('wc-product-gallery-lightbox');
        add_theme_support('wc-product-gallery-slider');

        // Support for selective refresh widgets in Customizer
        add_theme_support('customize-selective-refresh-widgets');

        // Gutenberg layout support.
        add_theme_support('align-wide');
    }
    add_action("after_setup_theme", "color_wamp_post_supports");


    function color_wamp_widget_registration()
    {
        register_sidebar(array(
            "name"=>__("Home Right Sidebar", "color-wamp"),
            "id"=>"home-right-sidebar",
            "description" => __("Widgets in this area will be shown on all posts", "color-wamp"),
            "before_widget"=>"<aside class='card-panel my-4'>",
            "after_widget"=>"</aside>",
            "before_title"=>"<h4>",
            "after_title"=>"</h4><br />"
        ));
        
        register_sidebar(array(
            "name"=>__("404 Page", "color-wamp"),
            "id"=>"404_page",
            "description" => __("Widgets in this area will be shown on 404 Page", "color-wamp"),
            "before_widget"=>"<div class='card-panel my-4'>",
            "after_widget"=>"</div>",
            "before_title"=>"<h4>",
            "after_title"=>"</h4><br />"
        ));

        register_sidebar(array(
            "name"=>__("Footer #1", "color-wamp"),
            "id"=>"footer_01",
            "description" => __("Widgets in this area will be shown on Footer first column", "color-wamp"),
            "before_widget"=>"",
            "after_widget"=>"",
            "before_title"=>"<h5>",
            "after_title"=>"</h5>"
        ));

        register_sidebar(array(
            "name"=>__("Footer #2", "color-wamp"),
            "id"=>"footer_02",
            "description" => __("Widgets in this area will be shown on Footer second column", "color-wamp"),
            "before_widget"=>"",
            "after_widget"=>"",
            "before_title"=>"<h5>",
            "after_title"=>"</h5>"
        ));

        register_sidebar(array(
            "name"=>__("Footer #3", "color-wamp"),
            "id"=>"footer_03",
            "description" => __("Widgets in this area will be shown on Footer third column", "color-wamp"),
            "before_widget"=>"",
            "after_widget"=>"",
            "before_title"=>"<h5>",
            "after_title"=>"</h5>"
        ));
    }

    add_action("widgets_init", "color_wamp_widget_registration");


    function color_wamp_customizer_panel($wp_customize)
    {
        $wp_customize->add_section('color_wamp_social_links_option', array(
            'priority'    => 170,
            "title" => __("Social Options", "color-wamp"),
            'description' => __("Change the Social Links settings from here as you want, if you want to remove any social link just leave it empty or make it empty", "color-wamp"),
        ));

        $wp_customize->add_setting('color_wamp_social_link_activate_settings', array(
            'default'           => 1,
            'capability'        => 'edit_theme_options',
            'sanitize_callback' => 'color_wamp_checkbox_sanitize'
        ));

        $wp_customize->add_control('color_wamp_social_link_activate', array(
        'type'     => 'checkbox',
        'label'    => __("Check to activate social links area", "color-wamp"),
        'section'  => 'color_wamp_social_links_option',
        'settings' => 'color_wamp_social_link_activate_settings',
    ));

        // Social link location option.
        $wp_customize->add_setting('color_wamp_social_link_location_option', array(
        'default'           => 'both',
        'capability'        => 'edit_theme_options',
        'sanitize_callback' => 'color_wamp_radio_select_sanitize'
    ));

        $wp_customize->add_control('color_wamp_social_link_location_option', array(
        'type'     => 'radio',
        'label'    => __("Social links to display on:", "color-wamp"),
        'section'  => 'color_wamp_social_links_option',
        'settings' => 'color_wamp_social_link_location_option',
        'choices'  => array(
            'header' => __('Header only', 'color-wamp'),
            'footer' => __('Footer only', 'color-wamp'),
            'both'   => __('Both header and footer', 'color-wamp'),
        ),
    ));

        // Selective refresh for displaying social icons/links
        if (isset($wp_customize->selective_refresh)) {
            $wp_customize->selective_refresh->add_partial('color_wamp_social_links_option', array(
            'selector'        => '.social-links',
            'render_callback' => '',
        ));
        }

        $color_wamp_social_links = array(
        'color_wamp_social_facebook'   => array(
            'id'      => 'color_wamp_social_facebook',
            'title'   => 'Facebook',
            'default' => '#',
        ),
        'color_wamp_social_twitter'    => array(
            'id'      => 'color_wamp_social_twitter',
            'title'   => 'Twitter',
            'default' => '#',
        ),
        'color_wamp_social_linkedin'  => array(
            'id'      => 'color_wamp_social_linkedin',
            'title'   => 'Linkedin',
            'default' => '#',
        ),
        'color_wamp_social_instagram'  => array(
            'id'      => 'color_wamp_social_instagram',
            'title'   => 'Instagram',
            'default' => '',
        ),
        'color_wamp_social_pinterest'  => array(
            'id'      => 'color_wamp_social_pinterest',
            'title'   => 'Pinterest',
            'default' => '',
        ),
        'color_wamp_social_youtube'    => array(
            'id'      => 'color_wamp_social_youtube',
            'title'   => 'YouTube',
            'default' => '',
        ),
        'color_wamp_social_tumblr' => array(
            'id'      => 'color_wamp_social_tumblr',
            'title'   => 'Tumblr',
            'default' => '',
        )
    );

        $i = 20;

        foreach ($color_wamp_social_links as $color_wamp_social_link) {
            $wp_customize->add_setting($color_wamp_social_link['id'], array(
            'default'           => $color_wamp_social_link['default'],
            'capability'        => 'edit_theme_options',
            'sanitize_callback' => 'esc_url_raw',
        ));

            $wp_customize->add_control($color_wamp_social_link['id'], array(
            'label'    => $color_wamp_social_link['title'],
            'section'  => 'color_wamp_social_links_option',
            'settings' => $color_wamp_social_link['id'],
            'priority' => $i,
        ));

            $wp_customize->add_setting($color_wamp_social_link['id'] . '_checkbox', array(
            'default'           => 1,
            'capability'        => 'edit_theme_options',
            'sanitize_callback' => 'color_wamp_checkbox_sanitize'
        ));

            $wp_customize->add_control($color_wamp_social_link['id'] . '_checkbox', array(
            'type'     => 'checkbox',
            'label'    => __('Check to open in new tab', 'color-wamp'),
            'section'  => 'color_wamp_social_links_option',
            'settings' => $color_wamp_social_link['id'] . '_checkbox',
            'priority' => $i,
        ));

            $i ++;
        }
        // End of the Social Link Options

        // Header Options Panel
        $wp_customize->add_panel("color_wamp_header_options", array(
            "proiority"=>101,
            "title"=>__("Header Options", "color-wamp"),
            "description"=> __("Change header display options", "color-wamp")
        ));

        // Static Home Menu
        $wp_customize->add_section("color_wamp_home_menu_header_options", array(
            "priority"=> 1,
            "title"=> __("Show Home Menu", "color-wamp"),
            "description"=> __("Add or remove home menu", "color-wamp"),
            "panel" => "color_wamp_header_options"
        ));
        $wp_customize->add_setting("color_wamp_home_menu_header_setting", array(
            "default" => 1,
            "capability" => "edit_theme_options",
            'sanitize_callback' => 'color_wamp_checkbox_sanitize'
        ));

        $wp_customize->add_control('color_wamp_home_menu_header_setting', array(
            'type'     => 'checkbox',
            'label'    => __("Check to activate home links in the primary menu", "color-wamp"),
            'section'  => 'color_wamp_home_menu_header_options',
            'settings' => 'color_wamp_home_menu_header_setting',
        ));
        $wp_customize->add_section("color_wamp_home_search_header_options", array(
            "priority"=> 1,
            "title"=> __("Search Icon", "color-wamp"),
            "description"=> __("Check to display the Search Icon in the primary menu", "color-wamp"),
            "panel" => "color_wamp_header_options"
        ));
        $wp_customize->add_setting("color_wamp_home_search_header_setting", array(
            "default" => 1,
            "capability" => "edit_theme_options",
            'sanitize_callback' => 'color_wamp_checkbox_sanitize'
        ));

        $wp_customize->add_control('color_wamp_home_search_header_setting', array(
            'type'     => 'checkbox',
            'label'    => __("Check to display the Search Icon in the primary menu", "color-wamp"),
            'section'  => 'color_wamp_home_search_header_options',
            'settings' => 'color_wamp_home_search_header_setting',
        ));

        $wp_customize->add_section("color_wamp_sticky_header_options", array(
            "priority"=> 1,
            "title"=> __("Sticky Menu", "color-wamp"),
            "description"=> __("Check to enable the sticky behavior of the primary menu", "color-wamp"),
            "panel" => "color_wamp_header_options"
        ));
        $wp_customize->add_setting("color_wamp_sticky_header_setting", array(
            "default" => 1,
            "capability" => "edit_theme_options",
            'sanitize_callback' => 'color_wamp_checkbox_sanitize'
        ));

        $wp_customize->add_control('color_wamp_sticky_header_setting', array(
            'type'     => 'checkbox',
            'label'    => __("Check to enable the sticky behavior of the primary menu'", "color-wamp"),
            'section'  => 'color_wamp_sticky_header_options',
            'settings' => 'color_wamp_sticky_header_setting',
        ));

    
        // Home Header
        $wp_customize->add_section("color_wamp_home_header_options", array(
            "priority"=> 3,
            "title"=> __("Home Header", "color-wamp"),
            "description"=> __("Change home header display options", "color-wamp"),
            "panel" => "color_wamp_header_options"
        ));

        // Page Header
        $wp_customize->add_section("color_wamp_page_header_options", array(
            "priority"=> 4,
            "title"=> __("Single Page Header", "color-wamp"),
            "description"=> __("Change single page and archives header display options", "color-wamp"),
            "panel" => "color_wamp_header_options"
        ));

        // Home Header Display Option
        $wp_customize->add_setting("color_wamp_home_header_top_option", array(
            "default" => "image",
            "capability" => "edit_theme_options",
            'sanitize_callback' => 'color_wamp_radio_select_sanitize'

        ));
        // control
        $wp_customize->add_control('color_wamp_home_header_top_option', array(
            'type'     => 'radio',
            "label"=> __("Home Header Top", "color-wamp"),
            "section" => "color_wamp_home_header_options",
            'settings' => 'color_wamp_home_header_top_option',
            'choices'  => array(
                'image' => __("Banner Image", "color-wamp"),
                'panel' => __("Back Panel", "color-wamp"),
                'none'   => __("None", "color-wamp"),
            ),
        ));

        // Home Header Image
        $wp_customize->add_setting("color_wamp_home_header_top_image", array(
            "default" => get_template_directory_uri()."/images/back_banner.jpg",
            "capability" => "edit_theme_options",
            "sanitize_callback" => "color_wamp_sanitize_file"
        ));
        // control
        $wp_customize->add_control(new WP_Customize_Image_Control($wp_customize, 'color_wamp_home_header_top_image', array(
            "label"=> __("Choose Header Image", "color-wamp"),
            "section" => "color_wamp_home_header_options",
            'settings' => 'color_wamp_home_header_top_image',
            
        )));

        // Page Header Display
        $wp_customize->add_setting("color_wamp_page_header_top_option", array(
            "default" => "panel",
            "capability" => "edit_theme_options",
            "sanitize_callback" => "color_wamp_radio_select_sanitize"

        ));
        // control
        $wp_customize->add_control('color_wamp_page_header_top_option', array(
            'type'     => 'radio',
            "label"=> __("Page Header Top", "color-wamp"),
            "section" => "color_wamp_page_header_options",
            'settings' => 'color_wamp_page_header_top_option',
            'choices'  => array(
                'image' => __("Banner Image", "color-wamp"),
                'panel' => __("Back Panel", "color-wamp"),
                'none'   => __("None", "color-wamp"),
            ),
        ));

        // Page Header Image
        $wp_customize->add_setting("color_wamp_page_header_top_image", array(
            "default" => get_template_directory_uri()."/images/back_banner.jpg",
            "capability" => "edit_theme_options",
            "sanitize_callback" => "color_wamp_sanitize_file"
        ));
        // control
        $wp_customize->add_control(new WP_Customize_Image_Control($wp_customize, 'color_wamp_page_header_top_image', array(
            "label"=> __("Choose Header Image", "color-wamp"),
            "section" => "color_wamp_page_header_options",
            'settings' => 'color_wamp_page_header_top_image',
            
        )));


        // Design Options Panel
        $wp_customize->add_panel("color_wamp_design_options", array(
                    "proiority"=>102,
                    "title"=>__("Design Options", "color-wamp"),
                    "description"=> "Change designs display options"
                ));
        
        // Theme Color

        $wp_customize->add_setting('color_wamp_theme_color_setting', array(
            'default'           => '#3d85c6',
            'capability'        => 'edit_theme_options',
            'sanitize_callback' => 'sanitize_hex_color'
        ));
     
        $wp_customize->add_control(new WP_Customize_Color_Control($wp_customize, 'color_wamp_theme_color_options', array(
            'label'    => __("Theme Color", "color-wamp"),
            'section'  => 'colors',
            'settings' => 'color_wamp_theme_color_setting',
        )));

        // Breadcrumbs
        $wp_customize->add_section("color_wamp_design_breadcrumb_options", array(
                    "priority"=> 2,
                    "title"=> __("Breadcrumbs", "color-wamp"),
                    "description"=> "Add or remove breadcrumbs",
                    "panel" => "color_wamp_design_options"
                ));
        // single post breadcrumb
        $wp_customize->add_setting("color_wamp_design_breadcrumb_post_setting", array(
                    "default" => 1,
                    "capability" => "edit_theme_options",
                    "sanitize_callback" => "color_wamp_checkbox_sanitize"
                ));
        
        $wp_customize->add_control('color_wamp_design_breadcrumb_post_setting', array(
                    'type'     => 'checkbox',
                    'label'    => __("Check to activate breadcrumb in single posts only", "color-wamp"),
                    'section'  => 'color_wamp_design_breadcrumb_options',
                    'settings' => 'color_wamp_design_breadcrumb_post_setting',
                ));

        // page breadcrumb
        $wp_customize->add_setting("color_wamp_design_breadcrumb_page_setting", array(
                    "default" => 1,
                    "capability" => "edit_theme_options",
                    "sanitize_callback" => "color_wamp_checkbox_sanitize"
                ));
        
        $wp_customize->add_control('color_wamp_design_breadcrumb_page_setting', array(
                    'type'     => 'checkbox',
                    'label'    => __("Check to activate breadcrumb in pages only", "color-wamp"),
                    'section'  => 'color_wamp_design_breadcrumb_options',
                    'settings' => 'color_wamp_design_breadcrumb_page_setting',
                ));

        // Archives and Search Headers
        $wp_customize->add_section("color_wamp_design_top_header_options", array(
                    "priority"=> 3,
                    "title"=> __("Archives and Search Headers", "color-wamp"),
                    "description"=> __("Add or remove headers in archive and search result pages", "color-wamp"),
                    "panel" => "color_wamp_design_options"
                ));
        // archive
        $wp_customize->add_setting("color_wamp_design_header_archive_setting", array(
                    "default" => 1,
                    "capability" => "edit_theme_options",
                    "sanitize_callback" => "color_wamp_checkbox_sanitize"
                ));
        
        $wp_customize->add_control('color_wamp_design_header_archive_setting', array(
                    'type'     => 'checkbox',
                    'label'    => __("Check to activate top header in archive pages only", "color-wamp"),
                    'section'  => 'color_wamp_design_top_header_options',
                    'settings' => 'color_wamp_design_header_archive_setting',
                ));
        // search
        $wp_customize->add_setting("color_wamp_design_header_search_setting", array(
                    "default" => 1,
                    "capability" => "edit_theme_options",
                    "sanitize_callback" => "color_wamp_checkbox_sanitize"

                ));
        
        $wp_customize->add_control('color_wamp_design_header_search_setting', array(
                    'type'     => 'checkbox',
                    'label'    => __("Check to activate top header of query in search result pages only", "color-wamp"),
                    'section'  => 'color_wamp_design_top_header_options',
                    'settings' => 'color_wamp_design_header_search_setting',
                ));

        // Category Color Options

        $i                = 1;
        $args             = array(
        'orderby'    => 'id',
        'hide_empty' => 0,
    );
        $categories       = get_categories($args);
        $wp_category_list = array();
        foreach ($categories as $category_list) {
            $wp_category_list[ $category_list->cat_ID ] = $category_list->cat_name;

            $wp_customize->add_setting('color_wamp_category_color_' . get_cat_id($wp_category_list[ $category_list->cat_ID ]), array(
            'default'              => get_theme_mod("color_wamp_theme_color_setting", "#3d85c6"),
            'capability'           => 'edit_theme_options',
            'sanitize_callback' => 'sanitize_hex_color',
        ));

            $wp_customize->add_control(new WP_Customize_Color_Control($wp_customize, 'color_wamp_category_color_' . get_cat_id($wp_category_list[ $category_list->cat_ID ]), array(
            'label'    => $wp_category_list[ $category_list->cat_ID ]." Category Color",
            'section'  => 'colors',
            'settings' => 'color_wamp_category_color_' . get_cat_id($wp_category_list[ $category_list->cat_ID ]),
            'priority' => ($i+10),
        )));
            $i ++;
        }

        // Start of the Additional Options
        $wp_customize->add_panel('color_wamp_additional_options', array(
        'capability'  => 'edit_theme_options',
        'description' => __("Change the Additional Settings from here as you want", "color-wamp"),
        'priority'    => 171,
        'title'       => __("Additional Options", "color-wamp"),
    ));

        // related posts
        $wp_customize->add_section('color_wamp_related_posts_section', array(
        'priority' => 1,
        'title'    => __("Related Posts", "color-wamp"),
        'panel'    => 'color_wamp_additional_options',
    ));

        $wp_customize->add_setting('color_wamp_related_posts_activate', array(
        'default'           => 1,
        'capability'        => 'edit_theme_options',
        "sanitize_callback" => "color_wamp_checkbox_sanitize"
    ));

        $wp_customize->add_control('color_wamp_related_posts_activate', array(
        'type'     => 'checkbox',
        'label'    => __("Check to activate the related posts", "color-wamp"),
        'section'  => 'color_wamp_related_posts_section',
        'settings' => 'color_wamp_related_posts_activate',
    ));

        $wp_customize->add_setting('color_wamp_related_posts', array(
        'default'           => 'categories',
        'capability'        => 'edit_theme_options',
        "sanitize_callback" => "color_wamp_radio_select_sanitize"
    ));

        $wp_customize->add_control('color_wamp_related_posts', array(
        'type'     => 'radio',
        'label'    => __("Related Posts Must Be Shown As:", "color-wamp"),
        'section'  => 'color_wamp_related_posts_section',
        'settings' => 'color_wamp_related_posts',
        'choices'  => array(
            'categories' => __("Related Posts By Categories", "color-wamp"),
            'tags'       => __("Related Posts By Tags", "color-wamp"),
        ),
    ));

        // featured image popup check
        $wp_customize->add_section('color_wamp_featured_image_popup_setting', array(
        'priority' => 6,
        'title'    => __("Image Lightbox", "color-wamp"),
        'panel'    => 'color_wamp_additional_options',
    ));

        $wp_customize->add_setting('color_wamp_featured_image_popup', array(
        'default'           => 1,
        'capability'        => 'edit_theme_options',
        "sanitize_callback" => "color_wamp_checkbox_sanitize"
    ));

        $wp_customize->add_control('color_wamp_featured_image_popup', array(
        'type'     => 'checkbox',
        'label'    => __("Check to enable the lightbox for the featured images in single post", "color-wamp"),
        'section'  => 'color_wamp_featured_image_popup_setting',
        'settings' => 'color_wamp_featured_image_popup',
    ));

        // Feature Image dispaly/hide option
        $wp_customize->add_section('color_wamp_featured_image_show_setting', array(
        'priority' => 6,
        'title'    => __("Featured Image", "color-wamp"),
        'panel'    => 'color_wamp_additional_options',
    ));

        $wp_customize->add_setting('color_wamp_featured_image_show', array(
        'default'           => 1,
        'capability'        => 'edit_theme_options',
        "sanitize_callback" => "color_wamp_checkbox_sanitize"
    ));

        $wp_customize->add_control('color_wamp_featured_image_show', array(
        'type'     => 'checkbox',
        'label'    => __("Check to show the featured image in single post page.", "color-wamp"),
        'section'  => 'color_wamp_featured_image_show_setting',
        'settings' => 'color_wamp_featured_image_show',
    ));

        // Feature Image dispaly option in single page
        $wp_customize->add_section('color_wamp_featured_image_show_setting_single_page', array(
            'priority' => 6,
            'title'    => __("Featured Image In Single Page", "color-wamp"),
            'panel'    => 'color_wamp_additional_options',
        ));
    
        $wp_customize->add_setting('color_wamp_featured_image_single_page_show', array(
            'default'           => 1,
            'capability'        => 'edit_theme_options',
            "sanitize_callback" => "color_wamp_checkbox_sanitize"
        ));
    
        $wp_customize->add_control('color_wamp_featured_image_single_page_show', array(
            'type'     => 'checkbox',
            'label'    => __("Check to display the featured image in single page.", "color-wamp"),
            'section'  => 'color_wamp_featured_image_show_setting_single_page',
            'settings' => 'color_wamp_featured_image_single_page_show',
        ));

        // Back and forth navigational links
        $wp_customize->add_section('color_wamp_bf_nav_links_options', array(
            'priority' => 7,
            'title'    => __("Article Navigational Links", "color-wamp"),
            'panel'    => 'color_wamp_additional_options',
        ));
    
        $wp_customize->add_setting('color_wamp_bf_nav_links_settings', array(
            'default'           => 1,
            'capability'        => 'edit_theme_options',
            "sanitize_callback" => "color_wamp_checkbox_sanitize"
        ));
    
        $wp_customize->add_control('color_wamp_bf_nav_links_settings', array(
            'type'     => 'checkbox',
            'label'    => __("Check to display the article navigational links.", "color-wamp"),
            'section'  => 'color_wamp_bf_nav_links_options',
            'settings' => 'color_wamp_bf_nav_links_settings',
        ));
        // End of the Additional Options

        // Start of the Footer Options
        $wp_customize->add_panel('color_wamp_footer_options', array(
        'capability'  => 'edit_theme_options',
        'description' => __("Change the Footer Settings from here as you want", "color-wamp"),
        'priority'    => 172,
        'title'       => __("Footer Options", "color-wamp"),
    ));

        // Footer Copyright
        $wp_customize->add_section('color_wamp_footer_copyright_text_section', array(
        'priority' => 1,
        'title'    => __("Copyright", "color-wamp"),
        'panel'    => 'color_wamp_footer_options',
    ));

        $wp_customize->add_setting('color_wamp_footer_copyright_activate', array(
        'default'           => 1,
        'capability'        => 'edit_theme_options',
        "sanitize_callback" => "color_wamp_checkbox_sanitize"
    ));

        $wp_customize->add_control('color_wamp_footer_copyright_activate', array(
        'type'     => 'checkbox',
        'label'    => __("Check to activate the footer copyright text", "color-wamp"),
        'section'  => 'color_wamp_footer_copyright_text_section',
        'settings' => 'color_wamp_footer_copyright_activate',
    ));

        $wp_customize->add_setting('color_wamp_footer_copyright_text', array(
        'default'           => '',
        'capability'        => 'edit_theme_options',
        "sanitize_callback" => " wp_filter_nohtml_kses()"
    ));

        $wp_customize->add_control('color_wamp_footer_copyright_text', array(
        'type'     => 'text',
        'label'    => __("Footer copyright text", "color-wamp"),
        'section'  => 'color_wamp_footer_copyright_text_section',
        'settings' => 'color_wamp_footer_copyright_text',
    ));

        // Footer Rights
        $wp_customize->add_section('color_wamp_footer_rights_text_section', array(
        'priority' => 1,
        'title'    => 'Rights',
        'panel'    => 'color_wamp_footer_options',
    ));

        $wp_customize->add_setting('color_wamp_footer_rights_activate', array(
        'default'           => 1,
        'capability'        => 'edit_theme_options',
        "sanitize_callback" => "color_wamp_checkbox_sanitize"
    ));

        $wp_customize->add_control('color_wamp_footer_rights_activate', array(
        'type'     => 'checkbox',
        'label'    => __("Check to activate the footer rights text", "color-wamp"),
        'section'  => 'color_wamp_footer_rights_text_section',
        'settings' => 'color_wamp_footer_rights_activate',
    ));

        $wp_customize->add_setting('color_wamp_footer_rights_text', array(
        'default'           => '',
        'capability'        => 'edit_theme_options',
        "sanitize_callback" => " wp_filter_nohtml_kses()"
    ));

        $wp_customize->add_control('color_wamp_footer_rights_text', array(
        'type'     => 'text',
        'label'    => __("Footer rights text", "color-wamp"),
        'section'  => 'color_wamp_footer_rights_text_section',
        'settings' => 'color_wamp_footer_rights_text',
    ));

        // Footer Wordpress
        $wp_customize->add_section('color_wamp_footer_wordpress_section', array(
        'priority' => 1,
        'title'    => 'Wordpress Link',
        'panel'    => 'color_wamp_footer_options',
    ));

        $wp_customize->add_setting('color_wamp_footer_wordpress_activate', array(
        'default'           => 1,
        'capability'        => 'edit_theme_options',
        "sanitize_callback" => "color_wamp_checkbox_sanitize"
    ));

        $wp_customize->add_control('color_wamp_footer_wordpress_activate', array(
        'type'     => 'checkbox',
        'label'    => __("Check to activate the footer copyright text", "color-wamp"),
        'section'  => 'color_wamp_footer_wordpress_section',
        'settings' => 'color_wamp_footer_wordpress_activate',
    ));
    }

add_action("customize_register", "color_wamp_customizer_panel");

        
// Modify comments header text in comments
add_filter('genesis_title_comments', 'child_title_comments');
function child_title_comments()
{
    return '<h3>'.comments_number(__('No Responses', 'color-wamp'), __('1 Response', 'color-wamp'), __('% Responses...', 'color-wamp')).'</h3>';
}
 
// Unset URL from comment form
function move_comment_form_below($fields)
{
    $comment_field = $fields['comment'];
    unset($fields['comment']);
    $fields['comment'] = $comment_field;
    return $fields;
}
add_filter('comment_form_fields', 'move_comment_form_below');
 
// Add placeholder for Name and Email
// function modify_comment_form_fields($fields, $commenter)
// {
//     $fields['author'] = '<br /><p class="input-field">' . '<input id="author" name="author" type="text" value="' .
//                 esc_attr($commenter['comment_author']) . '" size="30"' . $aria_req . ' />'.
//                 '<label for="author">' . 'Your Name' . '</label> ' .
//                 ($req ? '<span class="required">*</span>' : '')  .
//                 '</p><br />';
//     $fields['email'] = '<p class="input-field">' . '<input id="email" name="email" type="text" value="' . esc_attr($commenter['comment_author_email']) .
//                 '" size="30"' . $aria_req . ' />'  .
//                 '<label for="email">' . 'Your Email' . '</label> ' .
//                 ($req ? '<span class="required">*</span>' : '')
//                  .
//                 '</p><br />';
//     $fields['url'] = '<p class="input-field">' .
//              '<input id="url" name="url" type="text" value="' . esc_attr($commenter['comment_author_url']) . '" size="30" /> ' .
//             '<label for="url">' . 'Website' . '</label>' .
//                '</p>';

    
//     return $fields;
// }
// add_filter('comment_form_default_fields', 'modify_comment_form_fields');

function color_wamp_comment_form_defaults($defaults)
{
    $defaults['class_submit'] = 'btn primary waves-effect waves-light';
    $defaults['submit_button'] = '<button name="%1$s" id="%2$s" class="%3$s">%4$s</button>';

    $defaults['comment_field'] = '<br /><p class="input-field"><label for="comment">Comment</label> <textarea id="comment" class="materialize-textarea" name="comment" cols="45" rows="8" maxlength="65525" required="required"></textarea></p><br />';

    return $defaults;
}
add_filter('comment_form_defaults', 'color_wamp_comment_form_defaults', 10, 1);

function simple_callback($comment, $args, $depth)
{
    print '<li><div class="left mr-1">' .get_avatar($comment, $args['avatar_size']).'</div>' . '<div class="left"><h4 style="line-height: '.$args['avatar_size'].'px" class="m-0">'.get_comment_author_link() ."</h4>";
    comment_text();
    comment_reply_link(array_merge($args, array('depth' => $depth,'max_depth' => $args['max_depth'])));
    print '<br /><br /></div><div class="clearfix"></div></li>';
}
/*
 * Display the related posts
 */
if (! function_exists('color_wamp_related_posts_function')) {
    function color_wamp_related_posts_function()
    {
        wp_reset_postdata();
        global $post;

        // Define shared post arguments
        $args = array(
            'no_found_rows'          => true,
            'update_post_meta_cache' => false,
            'update_post_term_cache' => false,
            'ignore_sticky_posts'    => 1,
            'orderby'                => 'rand',
            'post__not_in'           => array( $post->ID ),
            'posts_per_page'         => 3,
        );

        // Related by categories
        if (get_theme_mod('color_wamp_related_posts', 'categories') == 'categories') {
            $cats = get_post_meta($post->ID, 'related-posts', true);

            if (! $cats) {
                $cats                 = wp_get_post_categories($post->ID, array( 'fields' => 'ids' ));
                $args['category__in'] = $cats;
            } else {
                $args['cat'] = $cats;
            }
        }
        // Related by tags
        if (get_theme_mod('color_wamp_related_posts', 'categories') == 'tags') {
            $tags = get_post_meta($post->ID, 'related-posts', true);

            if (! $tags) {
                $tags            = wp_get_post_tags($post->ID, array( 'fields' => 'ids' ));
                $args['tag__in'] = $tags;
            } else {
                $args['tag_slug__in'] = explode(',', $tags);
            }
            if (! $tags) {
                $break = true;
            }
        }

        $query = ! isset($break) ? new WP_Query($args) : new WP_Query();

        return $query;
    }
}

// checkbox sanitization
function color_wamp_checkbox_sanitize($input)
{
    if ($input == 1) {
        return 1;
    } else {
        return '';
    }
}
// radio/select buttons sanitization
function color_wamp_radio_select_sanitize($input, $setting)
{
    // Ensuring that the input is a slug.
    $input = sanitize_key($input);
    // Get the list of choices from the control associated with the setting.
    $choices = $setting->manager->get_control($setting->id)->choices;

    // If the input is a valid key, return it, else, return the default.
    return (array_key_exists($input, $choices) ? $input : $setting->default);
}
function color_wamp_sanitize_file($file, $setting)
{
         
    //allowed file types
    $mimes = array(
        'jpg|jpeg|jpe' => 'image/jpeg',
        'gif'          => 'image/gif',
        'png'          => 'image/png'
    );
     
    //check file type from file name
    $file_ext = wp_check_filetype($file, $mimes);
     
    //if file has a valid mime type return it, otherwise return default
    return ($file_ext['ext'] ? $file : $setting->default);
}
function wpdocs_theme_name_wp_title( $title, $sep ) {
    if ( is_feed() ) {
        return $title;
    }
     
    global $page, $paged;
 
    // Add the blog name
    $title .= get_bloginfo( 'name', 'display' );
 
    // Add the blog description for the home/front page.
    $site_description = get_bloginfo( 'description', 'display' );
    if ( $site_description && ( is_home() || is_front_page() ) ) {
        $title .= " $sep $site_description";
    }
 
    // Add a page number if necessary:
    if ( ( $paged >= 2 || $page >= 2 ) && ! is_404() ) {
        $title .= " $sep " . sprintf( __( 'Page %s', 'color-wamp' ), max( $paged, $page ) );
    }
    return $title;
}
add_filter( 'wp_title', 'wpdocs_theme_name_wp_title', 10, 2 );