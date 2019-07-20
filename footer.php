<section class="white-text m-0" id="footer">
  <div class="row p-4 m-0">
    <?php
    $medium = 6;
    $mRowWrap = false;
    $fm = 6;
    $fl = 6;
    if (is_active_sidebar("footer_01")) {
      if (is_active_sidebar("footer_02")) {
        $medium = 4;
        $fm = 4;
        $fl = 4;
        if (is_active_sidebar("footer_03")) {
          $medium = 3;
          $mRowWrap = true;
          $fm = 4;
          $fl = 4;
        }
      } elseif (is_active_sidebar("footer_03")) {
        $medium = 4;
        $fm = 4;
        $fl = 4;
      }
    } elseif (is_active_sidebar("footer_02")) {
      if (is_active_sidebar("footer_03")) {
        $medium = 4;
        $fm = 4;
        $fl = 4;
      }
    } ?>
    <div class="col s12 m<?php echo esc_attr($medium) ?>">
      <?php if (has_custom_logo()) {
        ?>
        <div class="left mr-2 logo">
          <img src="<?php $img = wp_get_attachment_image_src(get_theme_mod('custom_logo'), "
          full");
                    echo esc_url($img[0]) ?>" alt="<?php bloginfo('name') ?>" />
        </div>
      <?php
      } ?>
      <div class="left">
        <h5 class="my-1"><strong>
            <?php bloginfo("title") ?></strong></h5>
        <p class="m-0 text-primary-light">
          <?php bloginfo("description") ?>
        </p>
      </div>
      <div class="clearfix"></div>
      <?php if (get_theme_mod("color_wamp_social_link_activate_settings") and (get_theme_mod('color_wamp_social_link_location_option', 'both') == "both" or get_theme_mod('color_wamp_social_link_location_option') == "footer")) {
        ?>
        <div class="social-links">
          <h5>Follow Us:</h5>
          <?php $social = get_theme_mod("color_wamp_social_f");
          if (!empty($social)) {
            ?>
            <a href="<?php echo esc_url(get_theme_mod("color_wamp_social_f")) ?>" target="<?php echo get_theme_mod("color_wamp_social_f_checkbox") ? "_blank" : "_self" ?>" class="btn btn-floating btn-flat waves-effect waves-light waves-circle facebook">
              <img src="<?php echo esc_url(get_template_directory_uri()) ?>/images/f.svg" alt="Social Icon" />
            </a>
          <?php
          }
          $social = get_theme_mod("color_wamp_social_t");
          if (!empty($social)) {
            ?>
            <a href="<?php echo esc_url(get_theme_mod("color_wamp_social_t")) ?>" target="<?php echo get_theme_mod("color_wamp_social_t_checkbox") ? "_blank" : "_self" ?>" class="btn btn-floating btn-flat waves-effect waves-light waves-circle twitter">
              <img src="<?php echo esc_url(get_template_directory_uri()) ?>/images/t.svg" alt="Social Icon" />
            </a>
          <?php
          }
          $social = get_theme_mod("color_wamp_social_l");
          if (!empty($social)) {
            ?>
            <a href="<?php echo esc_url(get_theme_mod("color_wamp_social_l")) ?>" target="<?php echo get_theme_mod("color_wamp_social_l_checkbox") ? "_blank" : "_self" ?>" class="btn btn-floating btn-flat waves-effect waves-light waves-circle linkedin">
              <img src="<?php echo esc_url(get_template_directory_uri()) ?>/images/l.svg" alt="Social Icon" />
            </a>
          <?php
          }
          $social = get_theme_mod("color_wamp_social_i");
          if (!empty($social)) {
            ?>
            <a href="<?php echo esc_url(get_theme_mod("color_wamp_social_i")) ?>" target="<?php echo get_theme_mod("color_wamp_social_i_checkbox") ? "_blank" : "_self" ?>" class="btn btn-floating btn-flat waves-effect waves-light waves-circle instagram">
              <img src="<?php echo esc_url(get_template_directory_uri()) ?>/images/i.svg" alt="Social Icon" />
            </a>
          <?php
          }
          $social = get_theme_mod("color_wamp_social_p");
          if (!empty($social)) {
            ?>
            <a href="<?php echo esc_url(get_theme_mod("color_wamp_social_p")) ?>" target="<?php echo get_theme_mod("color_wamp_social_p_checkbox") ? "_blank" : "_self" ?>" class="btn btn-floating btn-flat waves-effect waves-light waves-circle pinterest">
              <img src="<?php echo esc_url(get_template_directory_uri()) ?>/images/p.svg" alt="Social Icon" />
            </a>
          <?php
          }
          $social = get_theme_mod("color_wamp_social_y");
          if (!empty($social)) {
            ?>
            <a href="<?php echo esc_url(get_theme_mod("color_wamp_social_y")) ?>" target="<?php echo get_theme_mod("color_wamp_social_y_checkbox") ? "_blank" : "_self" ?>" class="btn btn-floating btn-flat waves-effect waves-light waves-circle youtube">
              <img src="<?php echo esc_url(get_template_directory_uri()) ?>/images/y.svg" alt="Social Icon" />
            </a>
          <?php
          }
          $social = get_theme_mod("color_wamp_social_tu");
          if (!empty($social)) {
            ?>
            <a href="<?php echo esc_url(get_theme_mod("color_wamp_social_tu")) ?>" target="<?php echo get_theme_mod("color_wamp_social_tu_checkbox") ? "_blank" : "_self" ?>" class="btn btn-floating btn-flat waves-effect waves-light waves-circle tumblr">
              <img src="<?php echo esc_url(get_template_directory_uri()) ?>/images/tu.svg" alt="Social Icon" />
            </a>
          <?php
          } ?>
          <br />
        </div>
      <?php
      } ?>
    </div>
    <?php if ($mRowWrap) {
      ?>
      <div class="col s12 l9">
        <div class="row">
        <?php
        } ?>

        <?php if (is_active_sidebar("footer_01")) {
          ?>
          <div class="col s12 m<?php echo esc_attr($fm) ?> l<?php echo esc_attr($fl) ?>">
            <?php dynamic_sidebar("footer_01"); ?>

          </div>
        <?php
        } else {
          ?>
          <div class="col s12 m<?php echo esc_attr($fm) ?> l<?php echo esc_attr($fl) ?>"><?php esc_attr_e('Add some widgets from Admin Panel', 'color-wamp') ?></div>
        <?php
        } ?>
        <?php if (is_active_sidebar("footer_02")) {
          ?>
          <div class="col s12 m<?php echo esc_attr($fm) ?> l<?php echo esc_attr($fl) ?>">
            <?php dynamic_sidebar("footer_02"); ?>

          </div>
        <?php
        } ?>
        <?php if (is_active_sidebar("footer_03")) {
          ?>
          <div class="col s12 m<?php echo esc_attr($fm) ?> l<?php echo esc_attr($fl) ?>">
            <?php dynamic_sidebar("footer_03"); ?>

          </div>
        <?php
        } ?>

        <?php if ($mRowWrap) {
          ?>
        </div>
      </div>
    <?php
    } ?>
  </div>
</section>

<div id="scrollToTop">
  <button class="btn btn-floating btn-large white waves-effect right scale-transition scale-out" onclick="scrollToTop(200,3)"><i class="material-icons primary-text">&#xe5d8</i></button>
</div>

<footer class="text-primary-light primary m-0 py-2 px-4">
  <div class="left">
    <p class="my-1">
      <?php if (get_theme_mod("color_wamp_footer_copyright_activate")) { ?>
        <?php $text = get_theme_mod("color_wamp_footer_copyright_text");
        if (empty($text)) {
          ?>Copyright &copy; 20<?php echo esc_html(date("y")) ?>
        <?php
        } else {
          echo esc_html(get_theme_mod("color_wamp_footer_copyright_text"));
        } ?> <span class="mx-1">|</span>
      <?php
      } ?><a href="<?php home_url() ?>" class="white-text"><strong>
          <?php bloginfo("title") ?></strong></a>
      <?php if (get_theme_mod("color_wamp_footer_rights_activate")) {
        ?>
        <span class="mx-1">|</span>
        <?php $text = get_theme_mod("color_wamp_footer_rights_text");
        if (empty($text)) {
          esc_html_e('All rights reserved.', 'color-wamp');
        } else {
          echo esc_html(get_theme_mod("color_wamp_footer_rights_text", "All rights reserved."));
        }
      }
      ?> </p>
  </div>
  <div class="right">
    <p class="my-1 text-primary-light"><a href="<?php home_url() ?>" class="white-text"><strong>Color WAMP</strong></a>
      by <a href="https://www.wampinfotech.com/team" class="white-text"><strong>WAMP Infotech</strong></a>
      <?php if (get_theme_mod("color_wamp_footer_wordpress_activate")) {
        ?> <span class="mx-1">|</span>
        Powered by <a href="https://wordpress.org/" class="white-text"><strong>WordPress</strong></a>
      <?php
      } ?> </p>
  </div>
  <br clear="both" />
</footer>

<?php wp_footer(); ?>
<?php if (is_singular()) {
  wp_enqueue_script("comment-reply");
} ?>
</body>

</html>