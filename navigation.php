<?php
if (is_archive() || is_home() || is_search()) {
    /**
     * Checking WP-PageNaviplugin exist
     */
    if (function_exists('wp_pagenavi')) :
        wp_pagenavi(); else:
        global $wp_query;
    if ($wp_query->max_num_pages > 1) :
        ?>
        <div class="page-navigation">
			<div class="left previous"><?php previous_posts_link('<button class="white btn-floating waves-effect waves-circle mr-2 tooltipped" data-tooltip="'.__('Previous Page', 'color-wamp').'"><i class="material-icons primary-text ">arrow_back</i></button> <b>'.__('Previous Page', 'color-wamp').'</b>'); ?></div>
			<div class="right next"><?php next_posts_link('<b>'.__('Next Page', 'color-wamp').'</b> <button class="white btn-floating waves-effect waves-circle ml-2 tooltipped" data-tooltip="'.__('Next Page', 'color-wamp').'"><i class="material-icons primary-text ">arrow_forward</i></button>'); ?></div>
        </div>
        <br clear="all" />
        <div class="cleafix"></div>


		<?php
        endif;
    endif;
}

if (is_single()) {
    if (is_attachment()) {
        ?>
        <div class="page-navigation">
			<div class="left previous"><?php previous_image_link(false, '<a href="%text"><button class="white btn-floating waves-effect waves-circle mr-2 tooltipped" data-tooltip="'.__('Previous Image', 'color-wamp').'"><i class="material-icons primary-text ">arrow_back</i></button></a>'); ?></div>
			<div class="right next"><?php next_image_link(false, '<a href="%text"><button class="white btn-floating waves-effect waves-circle ml-2 tooltipped" data-tooltip="'.__('Next Image', 'color-wamp').'"><i class="material-icons primary-text ">arrow_forward</i></button></a>'); ?></div>
        </div>
        <br clear="all" />
        <div class="cleafix"></div>
	<?php
    } else {
        ?>
    
		<div class="page-navigation">
			<div class="left previous"><?php previous_post_link('%link', '<button class="white btn-floating waves-effect waves-circle mr-2 tooltipped" data-tooltip="%title"><i class="material-icons primary-text ">arrow_back</i></button> <b>%title</b>'); ?></div>
			<div class="right next"><?php next_post_link('%link', '<b>%title</b> <button class="white btn-floating waves-effect waves-circle ml-2 tooltipped" data-tooltip="%title"><i class="material-icons primary-text ">arrow_forward</i></button>'); ?></div>
        </div>
        <br clear="all" />
        <div class="cleafix"></div>
	<?php
    }
}

?>
