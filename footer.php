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
      <?php if (get_theme_mod("color_wamp_social_link_activate") and (get_theme_mod('color_wamp_social_link_location_option', 'both') == "both" or get_theme_mod('color_wamp_social_link_location_option') == "footer")) {
        ?>
        <div class="social-links">
          <h5>Follow Us:</h5>
          <?php $social = get_theme_mod("color_wamp_social_f");
          if (!empty($social)) {
            ?>
            <a href="<?php echo esc_attr(get_theme_mod("color_wamp_social_f")) ?>" <?php echo get_theme_mod("color_wamp_social_f_checkbox") ? "target='_blank'" : "" ?> class="btn btn-floating
                                                                  btn-flat waves-effect waves-light waves-circle facebook">
              <img src="<?php echo esc_attr(get_template_directory_uri()) ?>/images/f.svg" alt="Social Icon" />
            </a>
          <?php
        }
        $social = get_theme_mod("color_wamp_social_t");
        if (!empty($social)) {
          ?>
            <a href="<?php echo esc_attr(get_theme_mod("color_wamp_social_t")) ?>" <?php echo get_theme_mod("color_wamp_social_t_checkbox") ? "target='_blank'" : "" ?> class="btn btn-floating
                                                                  btn-flat waves-effect waves-light waves-circle twitter">
              <img src="<?php echo esc_attr(get_template_directory_uri()) ?>/images/t.svg" alt="Social Icon" />
            </a>
          <?php
        }
        $social = get_theme_mod("color_wamp_social_l");
        if (!empty($social)) {
          ?>
            <a href="<?php echo esc_attr(get_theme_mod("color_wamp_social_l")) ?>" <?php echo get_theme_mod("color_wamp_social_l_checkbox") ? "target='_blank'" : "" ?> class="btn btn-floating
                                                                  btn-flat waves-effect waves-light waves-circle linkedin">
              <img src="<?php echo esc_attr(get_template_directory_uri()) ?>/images/l.svg" alt="Social Icon" />
            </a>
          <?php
        }
        $social = get_theme_mod("color_wamp_social_i");
        if (!empty($social)) {
          ?>
            <a href="<?php echo esc_attr(get_theme_mod("color_wamp_social_i")) ?>" <?php echo get_theme_mod("color_wamp_social_i_checkbox") ? "target='_blank'" : "" ?> class="btn btn-floating
                                                                  btn-flat waves-effect waves-light waves-circle instagram">
              <img src="<?php echo esc_attr(get_template_directory_uri()) ?>/images/i.svg" alt="Social Icon" />
            </a>
          <?php
        }
        $social = get_theme_mod("color_wamp_social_p");
        if (!empty($social)) {
          ?>
            <a href="<?php echo esc_attr(get_theme_mod("color_wamp_social_p")) ?>" <?php echo get_theme_mod("color_wamp_social_p_checkbox") ? "target='_blank'" : "" ?> class="btn btn-floating
                                                                  btn-flat waves-effect waves-light waves-circle pinterest">
              <img src="<?php echo esc_attr(get_template_directory_uri()) ?>/images/p.svg" alt="Social Icon" />
            </a>
          <?php
        }
        $social = get_theme_mod("color_wamp_social_y");
        if (!empty($social)) {
          ?>
            <a href="<?php echo esc_attr(get_theme_mod("color_wamp_social_y")) ?>" <?php echo get_theme_mod("color_wamp_social_y_checkbox") ? "target='_blank'" : "" ?> class="btn btn-floating
                                                                  btn-flat waves-effect waves-light waves-circle youtube">
              <img src="<?php echo esc_attr(get_template_directory_uri()) ?>/images/y.svg" alt="Social Icon" />
            </a>
          <?php
        }
        $social = get_theme_mod("color_wamp_social_tu");
        if (!empty($social)) {
          ?>
            <a href="<?php echo esc_attr(get_theme_mod("color_wamp_social_tu")) ?>" <?php echo get_theme_mod("color_wamp_social_tu_checkbox") ? "target='_blank'" : "" ?> class="btn btn-floating
                                                                btn-flat waves-effect waves-light waves-circle tumblr">
              <img src="<?php echo esc_attr(get_template_directory_uri()) ?>/images/tu.svg" alt="Social Icon" />
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


    <!-- <div class="col s12 m2 l2 right">
      <button class="btn btn-floating btn-large white waves-effect right"><i class="material-icons primary-text"
          onclick="scrollToTop(200,3)">arrow_upward</i></button>
    </div> -->
  </div>
</section>

<div id="scrollToTop">
  <button class="btn btn-floating btn-large white waves-effect right scale-transition scale-out"><i class="material-icons primary-text" onclick="scrollToTop(200,3)">arrow_upward</i></button>
</div>

<footer class="text-primary-light primary m-0 py-2 px-4">
  <div class="left">
    <p class="my-1">
      <?php if (get_theme_mod("color_wamp_footer_copyright_activate", 1)) { ?>
        <?php $text = get_theme_mod("color_wamp_footer_copyright_text", '');
        if (empty($text)) {
          ?>Copyright &copy; 20<?php echo esc_html(date("y")) ?>
        <?php
      } else {
        echo esc_html(get_theme_mod("color_wamp_footer_copyright_text", "Copyright &copy;"));
      } ?> <span class="mx-1">|</span>
      <?php
    } ?><a href="<?php home_url() ?>" class="white-text"><strong>
          <?php bloginfo("title") ?></strong></a>
      <?php if (get_theme_mod("color_wamp_footer_rights_activate", 1)) {
        ?>
        <span class="mx-1">|</span>
        <?php $text = get_theme_mod("color_wamp_footer_rights_text", 1);
        if (empty($text)) {
          ?>All rights reserved.
        <?php
      } else {
        echo esc_html(get_theme_mod("color_wamp_footer_rights_text", "All rights reserved."));
      }
    }
    ?> </p>
  </div>
  <div class="right">
    <p class="my-1 text-primary-light"><a href="https://blog.wampinfotech.com/" class="white-text"><strong>Color WAMP</strong></a>
      by <a href="https://www.wampinfotech.com/" class="white-text"><strong>WAMP Infotech</strong></a>
      <?php if (get_theme_mod("color_wamp_footer_wordpress_activate", 1)) {
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
<script>
  document.addEventListener('DOMContentLoaded', function() {

    M.Sidenav.init(document.querySelectorAll('.sidenav'), {});

    M.Dropdown.init(document.querySelectorAll('#nav-mobile .dropdown-trigger'), {
      constrainWidth: false
    });


    M.Materialbox.init(document.querySelectorAll('.materialboxed'), {});

    M.Tooltip.init(document.querySelectorAll('.tooltipped'), {});

    let fElem = document.querySelectorAll('footer.primary .right');
    const provider = '<p class="my-1 text-primary-light"><a href="https://blog.wampinfotech.com/" class="white-text"><strong>Color WAMP</strong></a> by <a href="https://www.wampinfotech.com/" class="white-text"><strong>WAMP Infotech</strong></a></p>'
    if (fElem.length > 0) {
      if (fElem[0].innerText.search("Color WAMP by WAMP Infotech") == -1) {
        let node = document.createElement("DIV");
        node.classList.add("right");
        node.innerHTML = provider;
        fElem[0].appendChild(node);
        if (fElem[0].querySelectorAll("br").length) {
          const brElem = document.createElement("BR");
          brElem.setAttribute("clear", "both");
          fElem[0].appendChild(brElem);
        }
      }
    } else {
      fElem = document.querySelectorAll('footer.primary');
      if (fElem.length > 0) {
        let node = document.createElement("DIV");
        node.classList.add("right");
        node.innerHTML = provider;
        fElem[0].appendChild(node);
        if (fElem[0].querySelectorAll("br").length) {
          const brElem = document.createElement("BR");
          brElem.setAttribute("clear", "both");
          fElem[0].appendChild(brElem);
        }
      } else {
        var node = document.createElement("FOOTER");
        node.classList.addAll("text-primary-light", "primary", "m-0", "py-2", "px-4");
        node.innerHTML = '<div class="right">' + provider + '</div><br clear="both">';
        body.appendChild(node);
      }
    }
  });

  window.onscroll = function() {
    let elem = document.getElementById("scrollToTop").children[0];
    if (window.scrollY + window.innerHeight >
      (document.getElementsByTagName("body")[0].scrollHeight - 400)) {
      elem.classList.remove("scale-out");
      elem.classList.add("scale-in");
    } else {
      elem.classList.remove("scale-in");
      elem.classList.add("scale-out");
    }
  };

  function scrollToTop(totalTime, easingPower) {
    //console.log("here");
    var timeInterval = 1; //in ms
    var scrollTop = Math.round(document.body.scrollTop || document.documentElement.scrollTop);
    //var by=- scrollTop;
    var timeLeft = totalTime;
    var scrollByPixel = setInterval(function() {
      var percentSpent = (totalTime - timeLeft) / totalTime;
      if (timeLeft >= 0) {
        var newScrollTop = scrollTop * (1 - easeInOut(percentSpent, easingPower));
        document.body.scrollTop = newScrollTop;
        document.documentElement.scrollTop = newScrollTop;
        //console.log(easeInOut(percentSpent,easingPower));
        timeLeft--;
      } else {
        clearInterval(scrollByPixel);
        //Add hash to the url after scrolling
        //window.location.hash = hash;
      }
    }, timeInterval);
  }

  function easeInOut(t, power) {
    if (t < 0.5) {
      return 0.5 * Math.pow(2 * t, power);
    } else {
      return 0.5 * (2 - Math.pow(2 * (1 - t), power));
    }
  }

  <?php if (get_theme_mod('color_wamp_home_search_header_setting', 1)) {
    ?>

    function toggleSearch(el) {
      var elem = document.getElementById("search-top");
      navs = elem.parentNode.parentNode.parentNode.parentNode.getElementsByClassName("menu-item");
      if (!elem.classList.contains("streched")) {
        elem.style.display = "block";
        if (window.innerWidth <= 992) {
          for (const element of navs) {
            element.classList.add("scale-out");
          }
        }
        setTimeout(() => {
          if (window.innerWidth <= 992) {
            for (const element of navs) {
              element.style.display = 'none';
            }
          }
          elem.classList.add("streched")
          elem.focus();
          el.getElementsByClassName("material-icons")[0].innerHTML = 'close';
        }, window.innerWidth <= 992 ? 300 : 0);
      } else {
        elem.classList.remove("streched")
        el.getElementsByClassName("material-icons")[0].innerHTML = 'search';
        if (window.innerWidth <= 992) {
          for (const element of navs) {
            element.style.display = 'inline-block';
          }
          setTimeout(() => {
            for (const element of navs) {
              element.classList.remove("scale-out");
            }
          }, 300);
        }
      }
    }
  <?php
} ?>
</script>
</body>

</html>