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
                'main-header-menu' => 'Main Header Menu',
                'main-sidebar-menu' => 'Main Mobile Sidebar Menu',
                'footer-menu' => 'Footer Menu'
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
            "description" => "Widgets in this area will be shown on all posts",
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
    }

    add_action("widgets_init", "color_wamp_widget_registration");


    function color_wamp_customizer_panel($wp_customize)
    {
        $wp_customize->add_section('color_wamp_social_links_option', array(
            'priority'    => 170,
            "title" => "Social Options",
            'description' => 'Change the Social Links settings from here as you want, if you want to remove any social link just leave it empty or make it empty',
        ));

        $wp_customize->add_setting('color_wamp_social_link_activate_settings', array(
            'default'           => 1,
            'capability'        => 'edit_theme_options',
            'sanitize_callback' => 'color_wamp_checkbox_sanitize'
        ));

        $wp_customize->add_control('color_wamp_social_link_activate', array(
        'type'     => 'checkbox',
        'label'    => 'Check to activate social links area',
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
        'label'    => 'Social links to display on:',
        'section'  => 'color_wamp_social_links_option',
        'settings' => 'color_wamp_social_link_location_option',
        'choices'  => array(
            'header' => 'Header only',
            'footer' => 'Footer only',
            'both'   => 'Both header and footer',
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
        'color_wamp_social_googleplus' => array(
            'id'      => 'color_wamp_social_googleplus',
            'title'   => 'Google-Plus',
            'default' => '#',
        ),
        'color_wamp_social_linkedin'  => array(
            'id'      => 'color_wamp_social_linkedin',
            'title'   => 'Linkedin',
            'default' => '',
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
            'label'    => 'Check to open in new tab',
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
            "title"=>"Header Options",
            "description"=> "Change header display options"
        ));

        // Static Home Menu
        $wp_customize->add_section("color_wamp_home_menu_header_options", array(
            "priority"=> 1,
            "title"=> "Show Home Menu",
            "description"=> "Add or remove home menu",
            "panel" => "color_wamp_header_options"
        ));
        $wp_customize->add_setting("color_wamp_home_menu_header_setting", array(
            "default" => 1,
            "capability" => "edit_theme_options",
            'sanitize_callback' => 'color_wamp_checkbox_sanitize'
        ));

        $wp_customize->add_control('color_wamp_home_menu_header_setting', array(
            'type'     => 'checkbox',
            'label'    => 'Check to activate home links in the primary menu',
            'section'  => 'color_wamp_home_menu_header_options',
            'settings' => 'color_wamp_home_menu_header_setting',
        ));
        $wp_customize->add_section("color_wamp_home_search_header_options", array(
            "priority"=> 1,
            "title"=> "Search Icon",
            "description"=> "Check to display the Search Icon in the primary menu",
            "panel" => "color_wamp_header_options"
        ));
        $wp_customize->add_setting("color_wamp_home_search_header_setting", array(
            "default" => 1,
            "capability" => "edit_theme_options",
            'sanitize_callback' => 'color_wamp_checkbox_sanitize'
        ));

        $wp_customize->add_control('color_wamp_home_search_header_setting', array(
            'type'     => 'checkbox',
            'label'    => 'Check to display the Search Icon in the primary menu',
            'section'  => 'color_wamp_home_search_header_options',
            'settings' => 'color_wamp_home_search_header_setting',
        ));

        $wp_customize->add_section("color_wamp_sticky_header_options", array(
            "priority"=> 1,
            "title"=> "Sticky Menu",
            "description"=> "Check to enable the sticky behavior of the primary menu",
            "panel" => "color_wamp_header_options"
        ));
        $wp_customize->add_setting("color_wamp_sticky_header_setting", array(
            "default" => 1,
            "capability" => "edit_theme_options",
            'sanitize_callback' => 'color_wamp_checkbox_sanitize'
        ));

        $wp_customize->add_control('color_wamp_sticky_header_setting', array(
            'type'     => 'checkbox',
            'label'    => 'Check to enable the sticky behavior of the primary menu',
            'section'  => 'color_wamp_sticky_header_options',
            'settings' => 'color_wamp_sticky_header_setting',
        ));

    
        // Home Header
        $wp_customize->add_section("color_wamp_home_header_options", array(
            "priority"=> 3,
            "title"=> "Home Header",
            "description"=> "Change home header display options",
            "panel" => "color_wamp_header_options"
        ));

        // Page Header
        $wp_customize->add_section("color_wamp_page_header_options", array(
            "priority"=> 4,
            "title"=> "Single Page Header",
            "description"=> "Change single page and archives header display options",
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
            "label"=> "Home Header Top",
            "section" => "color_wamp_home_header_options",
            'settings' => 'color_wamp_home_header_top_option',
            'choices'  => array(
                'image' => 'Banner Image',
                'panel' => 'Back Panel',
                'none'   => 'None',
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
            "label"=> "Choose Header Image",
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
            "label"=> "Page Header Top",
            "section" => "color_wamp_page_header_options",
            'settings' => 'color_wamp_page_header_top_option',
            'choices'  => array(
                'image' => 'Banner Image',
                'panel' => 'Back Panel',
                'none'   => 'None',
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
            "label"=> "Choose Header Image",
            "section" => "color_wamp_page_header_options",
            'settings' => 'color_wamp_page_header_top_image',
            
        )));


        // Design Options Panel
        $wp_customize->add_panel("color_wamp_design_options", array(
                    "proiority"=>102,
                    "title"=>"Design Options",
                    "description"=> "Change designs display options"
                ));
        
        // Theme Color

        $wp_customize->add_setting('color_wamp_theme_color_setting', array(
            'default'           => '#3d85c6',
            'capability'        => 'edit_theme_options',
            'sanitize_callback' => 'sanitize_hex_color'
        ));
     
        $wp_customize->add_control(new WP_Customize_Color_Control($wp_customize, 'color_wamp_theme_color_options', array(
            'label'    => 'Theme Color',
            'section'  => 'colors',
            'settings' => 'color_wamp_theme_color_setting',
        )));

        // Breadcrumbs
        $wp_customize->add_section("color_wamp_design_breadcrumb_options", array(
                    "priority"=> 2,
                    "title"=> "Breadcrumbs",
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
                    'label'    => 'Check to activate breadcrumb in single posts only',
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
                    'label'    => 'Check to activate breadcrumb in pages only',
                    'section'  => 'color_wamp_design_breadcrumb_options',
                    'settings' => 'color_wamp_design_breadcrumb_page_setting',
                ));

        // Archives and Search Headers
        $wp_customize->add_section("color_wamp_design_top_header_options", array(
                    "priority"=> 3,
                    "title"=> "Archives and Search Headers",
                    "description"=> "Add or remove headers in archive and search result pages",
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
                    'label'    => 'Check to activate top header in archive pages only',
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
                    'label'    => 'Check to activate top header of query in search result pages only',
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
        'description' => 'Change the Additional Settings from here as you want',
        'priority'    => 171,
        'title'       => 'Additional Options',
    ));

        // related posts
        $wp_customize->add_section('color_wamp_related_posts_section', array(
        'priority' => 1,
        'title'    => 'Related Posts',
        'panel'    => 'color_wamp_additional_options',
    ));

        $wp_customize->add_setting('color_wamp_related_posts_activate', array(
        'default'           => 1,
        'capability'        => 'edit_theme_options',
        "sanitize_callback" => "color_wamp_checkbox_sanitize"
    ));

        $wp_customize->add_control('color_wamp_related_posts_activate', array(
        'type'     => 'checkbox',
        'label'    => 'Check to activate the related posts',
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
        'label'    => 'Related Posts Must Be Shown As:',
        'section'  => 'color_wamp_related_posts_section',
        'settings' => 'color_wamp_related_posts',
        'choices'  => array(
            'categories' => 'Related Posts By Categories',
            'tags'       => 'Related Posts By Tags',
        ),
    ));

        // featured image popup check
        $wp_customize->add_section('color_wamp_featured_image_popup_setting', array(
        'priority' => 6,
        'title'    => 'Image Lightbox',
        'panel'    => 'color_wamp_additional_options',
    ));

        $wp_customize->add_setting('color_wamp_featured_image_popup', array(
        'default'           => 1,
        'capability'        => 'edit_theme_options',
        "sanitize_callback" => "color_wamp_checkbox_sanitize"
    ));

        $wp_customize->add_control('color_wamp_featured_image_popup', array(
        'type'     => 'checkbox',
        'label'    => 'Check to enable the lightbox for the featured images in single post',
        'section'  => 'color_wamp_featured_image_popup_setting',
        'settings' => 'color_wamp_featured_image_popup',
    ));

        // Feature Image dispaly/hide option
        $wp_customize->add_section('color_wamp_featured_image_show_setting', array(
        'priority' => 6,
        'title'    => 'Featured Image',
        'panel'    => 'color_wamp_additional_options',
    ));

        $wp_customize->add_setting('color_wamp_featured_image_show', array(
        'default'           => 1,
        'capability'        => 'edit_theme_options',
        "sanitize_callback" => "color_wamp_checkbox_sanitize"
    ));

        $wp_customize->add_control('color_wamp_featured_image_show', array(
        'type'     => 'checkbox',
        'label'    => 'Check to show the featured image in single post page.',
        'section'  => 'color_wamp_featured_image_show_setting',
        'settings' => 'color_wamp_featured_image_show',
    ));

        // Feature Image dispaly option in single page
        $wp_customize->add_section('color_wamp_featured_image_show_setting_single_page', array(
            'priority' => 6,
            'title'    => 'Featured Image In Single Page',
            'panel'    => 'color_wamp_additional_options',
        ));
    
        $wp_customize->add_setting('color_wamp_featured_image_single_page_show', array(
            'default'           => 1,
            'capability'        => 'edit_theme_options',
            "sanitize_callback" => "color_wamp_checkbox_sanitize"
        ));
    
        $wp_customize->add_control('color_wamp_featured_image_single_page_show', array(
            'type'     => 'checkbox',
            'label'    => 'Check to display the featured image in single page.',
            'section'  => 'color_wamp_featured_image_show_setting_single_page',
            'settings' => 'color_wamp_featured_image_single_page_show',
        ));

        // Back and forth navigational links
        $wp_customize->add_section('color_wamp_bf_nav_links_options', array(
            'priority' => 7,
            'title'    => 'Article Navigational Links',
            'panel'    => 'color_wamp_additional_options',
        ));
    
        $wp_customize->add_setting('color_wamp_bf_nav_links_settings', array(
            'default'           => 1,
            'capability'        => 'edit_theme_options',
            "sanitize_callback" => "color_wamp_checkbox_sanitize"
        ));
    
        $wp_customize->add_control('color_wamp_bf_nav_links_settings', array(
            'type'     => 'checkbox',
            'label'    => 'Check to display the article navigational links.',
            'section'  => 'color_wamp_bf_nav_links_options',
            'settings' => 'color_wamp_bf_nav_links_settings',
        ));
        // End of the Additional Options

        // Start of the Footer Options
        $wp_customize->add_panel('color_wamp_footer_options', array(
        'capability'  => 'edit_theme_options',
        'description' => 'Change the Footer Settings from here as you want',
        'priority'    => 172,
        'title'       => 'Footer Options',
    ));

        // Footer Copyright
        $wp_customize->add_section('color_wamp_footer_copyright_text_section', array(
        'priority' => 1,
        'title'    => 'Copyright',
        'panel'    => 'color_wamp_footer_options',
    ));

        $wp_customize->add_setting('color_wamp_footer_copyright_activate', array(
        'default'           => 1,
        'capability'        => 'edit_theme_options',
        "sanitize_callback" => "color_wamp_checkbox_sanitize"
    ));

        $wp_customize->add_control('color_wamp_footer_copyright_activate', array(
        'type'     => 'checkbox',
        'label'    => 'Check to activate the footer copyright text',
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
        'label'    => 'Footer copyright text',
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
        'label'    => 'Check to activate the footer rights text',
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
        'label'    => 'Footer rights text',
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
        'label'    => 'Check to activate the footer copyright text',
        'section'  => 'color_wamp_footer_wordpress_section',
        'settings' => 'color_wamp_footer_wordpress_activate',
    ));
    }

add_action("customize_register", "color_wamp_customizer_panel");

        
// Modify comments header text in comments
add_filter('genesis_title_comments', 'child_title_comments');
function child_title_comments()
{
    return comments_number('<h3>No Responses</h3>', '<h3>1 Response</h3>', '<h3>% Responses...</h3>');
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
