<?php while (have_posts()) {
    the_post(); ?>
    <div id="post-<?php the_ID(); ?>" <?php post_class("card my-4"); ?>>
        <?php if (has_post_thumbnail()) {
            ?>
            <div class="card-image">
                <?php the_post_thumbnail("color-wamp-banner-image", array("class" => "materialboxed banner-img"));
            } else {
                ?>
                <div class="card-content">
                <?php
                } ?>
                <a href="<?php the_permalink() ?>" class="grey-text text-darken-3 primary-text-hover"><span class="card-title">
                        <h3><?php the_title() ?></h3>
                    </span></a>
                <?php if (has_post_thumbnail()) {
                    ?> </div>
                <div class="card-content"> <?php
                                        } ?>
                <?php if (get_the_modified_time() != get_the_time()) { ?>
                    <time class="left mr-2"><a href="<?php echo esc_url(get_day_link(get_the_modified_time('Y'), get_the_modified_time('m'), get_the_modified_time('d'))) ?>" class="grey-text primary-text-hover tooltipped" data-tooltip="Last updated: <?php echo esc_attr(get_the_modified_time("D, j M Y \a\\t h:i A")) ?>"><i class="material-icons left mr-1">&#xe923</i> <?php echo esc_html(human_time_diff(get_the_modified_time('U'), current_time('timestamp'))) . ' ago' ?></a></time>
                <?php } ?>

                <time class="left mr-2"><a href="<?php echo esc_url(get_day_link(get_the_time('Y'), get_the_time('m'), get_the_time('d'))) ?>" class="grey-text primary-text-hover tooltipped" data-tooltip="Posted on: <?php echo esc_attr(get_the_time("D, j M Y \a\\t h:i A")) ?>"><i class="material-icons left mr-1">&#xe192</i> <?php echo esc_html(human_time_diff(get_the_time('U'), current_time('timestamp'))) . ' ago' ?></a></time>

                <span class="left mr-2"><a href="<?php echo esc_url(get_author_posts_url(get_the_author_meta('ID'))) ?>" data-tooltip="Posts by <?php echo esc_attr(ucfirst(get_the_author())) ?>" class="grey-text primary-text-hover tooltipped"><i class="material-icons left mr-1">&#xe7fd</i> <?php echo esc_html(ucfirst(get_the_author())) ?></a></span>

                <span class="left mr-2"><a href="<?php echo esc_url(get_comments_link()) ?>" class="grey-text primary-text-hover"><i class="material-icons left mr-1">&#xe0bf</i> <?php esc_html(comments_number()) ?> </a></span>
                <?php foreach (get_the_category() as $item) {
                    ?>
                    <a href="<?php echo esc_url(get_category_link($item->term_id)) ?>"><span class="chip white-text right" style="background-color: <?php echo esc_attr(get_theme_mod('color_wamp_category_color_' . $item->term_id, get_theme_mod("color_wamp_theme_color_setting", "#3d85c6"))) ?>" data-badge-caption=""><?php echo esc_html($item->name) ?></span></a>
                <?php
                } ?>
                <div class="clearfix"></div>
                <br />
                <?php the_excerpt() ?>
            </div>
            <div class="card-action">
                <a class="fw-500 m-0 primary-text right" href="<?php the_permalink() ?>"><?php esc_html_e('Read more', 'color-wamp') ?></a>
                <div class="clearfix"></div>
            </div>
        </div>
    <?php
    } ?>