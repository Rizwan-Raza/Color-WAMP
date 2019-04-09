<?php while (have_posts()) {
    the_post(); ?>
        <div id="post-<?php the_ID(); ?>" <?php post_class("card my-4"); ?>>
            
        <?php if (has_post_thumbnail() and ((is_single() and get_theme_mod("color_wamp_featured_image_show", 1)) or (is_page() and get_theme_mod("color_wamp_featured_image_single_page_show", 1)))) {
        ?>
        <div class="card-image">
          <?php the_post_thumbnail("banner-image", get_theme_mod("color_wamp_featured_image_popup") ? array("class"=>"materialboxed banner-img"):array("class"=>"banner-img"));
    } else {
        ?>
                <div class="card-content">
            <?php
    } ?>
          <span class="card-title"><h1 class="my-2">
                <?php the_title()?>
            </h1>
            <hr class="short-border primary" />
            </span>
            <?php if (has_post_thumbnail() and ((is_single() and get_theme_mod("color_wamp_featured_image_show", 1)) or (is_page() and get_theme_mod("color_wamp_featured_image_single_page_show", 1)))) {
        ?> </div>
            <div class="card-content"> <?php
    } else {
        echo "<br /> ";
    } ?><time class="grey-text left mr-2"><a href="<?php echo esc_attr(get_day_link(get_the_time('Y'), get_the_time('m'), get_the_time('d')))?>" class="grey-text primary-text-hover tooltipped" data-tooltip="<?php echo esc_attr(get_the_time("D, j M Y \a\\t h:i A"))?>"><i class="material-icons left mr-1">access_time</i> <?php echo esc_html(human_time_diff(get_the_time('U'), current_time('timestamp'))) . ' ago'?></a></time>
    <span class="left mr-2"><a href="<?php the_author_link()?>" class="grey-text primary-text-hover"><i class="material-icons left mr-1">person</i> <?php echo esc_html(ucfirst(get_the_author()))?></a></span>
    <span class="left mr-2"><a href="<?php echo esc_attr(get_comments_link())?>" class="grey-text primary-text-hover"><i class="material-icons left mr-1">forum</i> <?php comments_number()?> </a></span>
    <?php foreach (get_the_category() as $item) {
        ?>
    <a href="<?php echo esc_attr(get_category_link($item->term_id))?>"><span class="chip white-text right" style="background-color: <?php echo esc_attr(get_theme_mod('color_wamp_category_color_' . $item->term_id, get_theme_mod("color_wamp_theme_color_setting", "#3d85c6")))?>" data-badge-caption=""><?php echo esc_html($item->name)?></span></a>
    <?php
    } ?>
    <div class="clearfix"></div>
    <br />
    <div class="post-content">
        <?php the_content()?>
</div>
    <?php
    wp_link_pages(array(
        'before'            => '<div class="clearfix"></div><div class="pagination clearfix">Pages:',
        'after'             => '</div>',
        'link_before'       => '<span>',
        'link_after'        => '</span>'
  ));
  
    $tags_list = get_the_tag_list('<div class="tag-links my-2"><i class="material-icons left">local_offer</i>', ', ', '</div>');
    if ($tags_list) {
        echo esc_html($tags_list);
    }
    // If comments are open or we have at least one comment, load up the comment template
    if (comments_open() || '0' != get_comments_number()) {
        comments_template();
    } ?>
    <?php edit_post_link('Edit', '<br /><i class="material-icons left">edit</i>'); ?>
            </div>
        </div>
        <?php
} ?>