<?php $related_posts = color_wamp_related_posts_function(); ?>
<?php if ($related_posts->have_posts()) : ?>

   <h4><?php esc_html_e("You May Also Like", "color-wamp") ?></h4>

   <div class="row clearfix">
      <?php while ($related_posts->have_posts()) : $related_posts->the_post(); ?>
         <div class="col s12 m6 l4">
            <?php if (has_post_thumbnail()) {
               ?>
               <div class="card force-a-white" style="background-image: url('<?php the_post_thumbnail_url('small-thumbnail') ?>')">
               <?php
            } else {
               ?>
                  <div class="card">
                  <?php
               } ?>
                  <div class="card-content">
                     <h3 class="card-title my-1 truncate fw-500">
                        <a href="<?php the_permalink(); ?>" rel="bookmark" title="<?php the_title(); ?>">
                           <?php the_title(); ?></a>
                     </h3>

                     <div class="posted-on"><a href="<?php echo esc_url(get_permalink()) ?>" data-tooltip="<?php echo esc_attr(get_the_time("D, j M Y \a\\t h:i A")) ?>" rel="bookmark" class="tooltipped"><i class="material-icons left">access_time</i><time datetime="<?php echo esc_attr(get_the_date('c')) ?>"><?php echo esc_html(human_time_diff(get_the_time('U'), current_time('timestamp'))) ?></time> ago</a></div>

                     <div class="clearfix"><a class="tooltipped" href="<?php echo esc_url(get_author_posts_url(get_the_author_meta('ID'))) ?>" data-tooltip="Posted by <?php echo esc_attr(ucfirst(get_the_author())) ?>">
                           <i class="material-icons left">person</i><?php echo esc_html(ucfirst(esc_html(get_the_author()))) ?></a></div>
                     <div class="clearfix"><a href="<?php echo esc_url(get_comments_link()) ?>"><i class="material-icons left">forum</i> <?php comments_number() ?> </a></div>
                  </div>
               </div>
            </div>
            <!--/.related-->
         <?php endwhile; ?>

      </div>
      <!--/.post-related-->
   <?php endif; ?>

   <?php wp_reset_query(); ?>