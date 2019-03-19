<?php while (have_posts()) {
    the_post(); ?>
            <div id="post-<?php the_ID(); ?>" <?php post_class("card my-4"); ?>>
    <?php if (has_post_thumbnail()) {
        ?>
        <div class="card-image">
          <?php the_post_thumbnail("banner-image", array("class"=>"materialboxed banner-img"));
    } else {
        ?>
                <div class="card-content">
            <?php
    } ?>
          <a href="<?php echo get_the_permalink()?>" class="grey-text text-darken-3 primary-text-hover"><span class="card-title"><h3><?php echo get_the_title()?></h3></span></a>
            <?php if (has_post_thumbnail()) {
        ?> </div>
            <div class="card-content"> <?php
    } ?>
            <time class="left mr-2"><a href="<?php echo get_day_link(get_the_time('Y'), get_the_time('m'), get_the_time('d'))?>" class="grey-text primary-text-hover tooltipped" data-tooltip="<?php echo get_the_time("D, j M Y \a\\t h:i A")?>"><i class="material-icons left mr-1">access_time</i> <?php echo human_time_diff(get_the_time('U'), current_time('timestamp')) . ' ago'?></a></time>
            
            <span class="left mr-2"><a href="<?php echo get_author_posts_url(get_the_author_ID()) ?>" data-tooltip="Posts by <?php echo ucfirst(get_the_author())?>" class="grey-text primary-text-hover tooltipped"><i class="material-icons left mr-1">person</i> <?php echo ucfirst(get_the_author())?></a></span>
            
            <span class="left mr-2"><a href="<?php echo get_comments_link()?>" class="grey-text primary-text-hover"><i class="material-icons left mr-1">forum</i> <?php comments_number()?> </a></span>
            <?php foreach (get_the_category() as $item) {
        ?>
            <a href="<?php echo get_category_link($item->term_id)?>"><span class="chip white-text right" style="background-color: <?php echo get_theme_mod('color_wamp_category_color_' . $item->term_id, get_theme_mod("color_wamp_theme_color_setting", "#3d85c6"))?>" data-badge-caption=""><?php echo $item->name?></span></a>
            <?php
    } ?>
            <div class="clearfix"></div>
            <br />
            <?php the_excerpt()?>
        </div>
        <div class="card-action">
            <a class="fw-500 m-0 primary-text right" href="<?php echo get_the_permalink()?>"><?php _e('Read more', 'color-wamp')?></a>
            <div class="clearfix"></div>
        </div>
    </div>
<?php
} ?>