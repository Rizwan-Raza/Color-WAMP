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
    <div class="col s12 m<?php echo $medium ?> mb-2">
      <?php if (has_custom_logo()) {
        ?>
      <div class="left mr-2 logo">
        <img src="<?php echo esc_url(wp_get_attachment_image_src(get_theme_mod('custom_logo', get_template_directory_uri().'/images/wamp-round-logo.png'), "
          full")[0])?>" alt="<?php echo get_bloginfo('name')?>" />
      </div>
      <?php
    } ?>
      <div class="left">
        <h5 class="my-1"><strong>
            <?php echo get_bloginfo("title")?></strong></h5>
        <p class="m-0 text-primary-light">
          <?php echo get_bloginfo("description")?>
        </p>
      </div>
      <div class="clearfix"></div>
      <?php if (get_theme_mod("color_wamp_social_link_activate", 1) and (get_theme_mod('color_wamp_social_link_location_option', 'both') == "both" or get_theme_mod('color_wamp_social_link_location_option') == "footer")) {
        ?>
      <div class="social-links">
        <h5>Follow Us:</h5>
        <?php if (!empty(get_theme_mod("color_wamp_social_facebook", "#"))) {
            ?>
        <a href="<?php echo get_theme_mod("color_wamp_social_facebook")?>"
          <?php echo get_theme_mod("color_wamp_social_facebook_checkbox") ? "target='_blank'" : ""?> class="btn btn-floating
          btn-flat waves-effect waves-light waves-circle facebook">
          <img src="<?php echo get_template_directory_uri()?>/images/facebook-f-brands.svg" alt="Facebook Icon" />
        </a>
        <?php
        }
        if (!empty(get_theme_mod("color_wamp_social_twitter", "#"))) {
            ?>
        <a href="<?php echo get_theme_mod("color_wamp_social_twitter")?>"
          <?php echo get_theme_mod("color_wamp_social_twitter_checkbox") ? "target='_blank'" : ""?> class="btn btn-floating
          btn-flat waves-effect waves-light waves-circle twitter">
          <img src="<?php echo get_template_directory_uri()?>/images/twitter-brands.svg" alt="Twitter Icon"/>
        </a>
        <?php
        }
        if (!empty(get_theme_mod("color_wamp_social_linkedin", "#"))) {
            ?>
        <a href="<?php echo get_theme_mod("color_wamp_social_linkedin")?>"
          <?php echo get_theme_mod("color_wamp_social_linkedin_checkbox") ? "target='_blank'" : ""?> class="btn btn-floating
          btn-flat waves-effect waves-light waves-circle linkedin">
          <img src="<?php echo get_template_directory_uri()?>/images/linkedin-in-brands.svg" alt="LinkedIn Icon" />
        </a>
        <?php
        }
        if (!empty(get_theme_mod("color_wamp_social_instagram"))) {
            ?>
        <a href="<?php echo get_theme_mod("color_wamp_social_instagram")?>"
          <?php echo get_theme_mod("color_wamp_social_instagram_checkbox") ? "target='_blank'" : ""?> class="btn btn-floating
          btn-flat waves-effect waves-light waves-circle instagram">
          <img src="<?php echo get_template_directory_uri()?>/images/instagram-brands.svg" alt="Instagram Icon"/>
        </a>
        <?php
        }
        if (!empty(get_theme_mod("color_wamp_social_pinterest"))) {
            ?>
        <a href="<?php echo get_theme_mod("color_wamp_social_pinterest")?>"
          <?php echo get_theme_mod("color_wamp_social_pinterest_checkbox") ? "target='_blank'" : ""?> class="btn btn-floating
          btn-flat waves-effect waves-light waves-circle pinterest">
          <img src="<?php echo get_template_directory_uri()?>/images/pinterest-p-brands.svg" alt="Pinterest Icon" />
        </a>
        <?php
        }
        if (!empty(get_theme_mod("color_wamp_social_youtube"))) {
            ?>
        <a href="<?php echo get_theme_mod("color_wamp_social_youtube")?>"
          <?php echo get_theme_mod("color_wamp_social_youtube_checkbox") ? "target='_blank'" : ""?> class="btn btn-floating
          btn-flat waves-effect waves-light waves-circle youtube">
          <img src="<?php echo get_template_directory_uri()?>/images/youtube-brands.svg" alt="YouTube Icon"/>
        </a>
        <?php
        }
        if (!empty(get_theme_mod("color_wamp_social_tumblr"))) {
            ?>
      <a href="<?php echo get_theme_mod("color_wamp_social_tumblr")?>"
        <?php echo get_theme_mod("color_wamp_social_tumblr_checkbox") ? "target='_blank'" : ""?> class="btn btn-floating
        btn-flat waves-effect waves-light waves-circle tumblr">
        <img src="<?php echo get_template_directory_uri()?>/images/tumblr-brands.svg" alt="Tumblr Icon"/>
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
      <div class="col s12 l9"><div class="row">
    <?php
    } ?>

    <?php if (is_active_sidebar("footer_01")) {
        ?>
    <div class="col s12 m<?php echo $fm?> l<?php echo $fl?>">
        <?php dynamic_sidebar("footer_01"); ?>

    </div>
    <?php
    } else {
        ?>
      <div class="col s12 m<?php echo $fm?> l<?php echo $fl?>"><?php _e('Add some widgets from Admin Panel', 'color-wamp')?></div>
      <?php
    }?>
    <?php if (is_active_sidebar("footer_02")) {
        ?>
    <div class="col s12 m<?php echo $fm?> l<?php echo $fl?>">
        <?php dynamic_sidebar("footer_02"); ?>

    </div>
    <?php
    }?>
    <?php if (is_active_sidebar("footer_03")) {
        ?>
    <div class="col s12 m<?php echo $fm?> l<?php echo $fl?>">
        <?php dynamic_sidebar("footer_03"); ?>

    </div>
    <?php
    }?>

<?php if ($mRowWrap) {
        ?>
      </div></div>
    <?php
    } ?>


    <!-- <div class="col s12 m<?php //echo $mRowWrap ? '12' : '2' ?> l2 right">
      <button class="btn btn-floating btn-large white waves-effect right"><i class="material-icons primary-text"
          onclick="scrollToTop(200,3)">arrow_upward</i></button>
    </div> -->
  </div>
</section>

<div id="scrollToTop">
  <button class="btn btn-floating btn-large white waves-effect right scale-transition scale-out"><i class="material-icons primary-text"
          onclick="scrollToTop(200,3)">arrow_upward</i></button>
        </div>

<footer class="text-primary-light primary m-0 py-2 px-4">
  <div class="left">
    <p class="my-1">
      <?php if (get_theme_mod("color_wamp_footer_copyright_activate", 1)) {
        ?><?php if (empty(get_theme_mod("color_wamp_footer_copyright_text", ''))) {
            ?>Copyright &copy; 20<?php echo date("y")?> <?php
        } else {
            echo get_theme_mod("color_wamp_footer_copyright_text", "Copyright &copy;");
        } ?> <span class="mx-1">|</span> <?php
    } ?><a href="<?php echo get_home_url()?>" class="white-text"><strong>
          <?php echo get_bloginfo("title")?></strong></a>
          <?php if (get_theme_mod("color_wamp_footer_rights_activate", 1)) {
        ?> 
         <span class="mx-1">|</span> <?php if (empty(get_theme_mod("color_wamp_footer_rights_text", 1))) {
            ?>All rights reserved. <?php
        } else {
            echo get_theme_mod("color_wamp_footer_rights_text", "All rights reserved.");
        }
    }
           ?> </p>
  </div>
  <div class="right">
    <p class="my-1 text-primary-light"><a href="https://blog.wampinfotech.com/" class="white-text"><strong>Color WAMP</strong></a>
      by <a href="https://www.wampinfotech.com/" class="white-text"><strong>WAMP Infotech</strong></a> 
      <?php if (get_theme_mod("color_wamp_footer_wordpress_activate", 1)) {
               ?> <span class="mx-1">|</span>
        Powered by <a href="https://wordpress.org/" class="white-text"><strong>Wordpress</strong></a>
            <?php
           }?> </p>
  </div>
  <br clear="both" />
</footer>

<?php wp_footer(); ?>
<?php if (is_singular()) {
               wp_enqueue_script("comment-reply");
           } ?>
<script>
  document.addEventListener('DOMContentLoaded', function () {

    M.Sidenav.init(document.querySelectorAll('.sidenav'), {});

    M.Dropdown.init(document.querySelectorAll('#nav-mobile .dropdown-trigger'), {
      constrainWidth: false
    });


    M.Materialbox.init(document.querySelectorAll('.materialboxed'), {});

    M.Tooltip.init(document.querySelectorAll('.tooltipped'), {});

    let fElem = document.querySelectorAll('footer.primary .right');
    const provider = '<p class="my-1 text-primary-light"><a href="https://blog.wampinfotech.com/" class="white-text"><strong>Color WAMP</strong></a> by <a href="https://www.wampinfotech.com/" class="white-text"><strong>WAMP Infotech</strong></a></p>'
    if(fElem.length > 0) {
      if(fElem[0].innerText.search("Color WAMP by WAMP Infotech") == -1) {
        let node = document.createElement("DIV");
        node.classList.add("right");
        node.innerHTML = provider;
        fElem[0].appendChild(node);
        if(fElem[0].querySelectorAll("br").length) {
          const brElem = document.createElement("BR");
          brElem.setAttribute("clear", "both");
          fElem[0].appendChild(brElem);
        }
      }
    } else {
      fElem = document.querySelectorAll('footer.primary');
      if(fElem.length > 0) {
        let node = document.createElement("DIV");
        node.classList.add("right");
        node.innerHTML = provider;
        fElem[0].appendChild(node);
        if(fElem[0].querySelectorAll("br").length) {
          const brElem = document.createElement("BR");
          brElem.setAttribute("clear", "both");
          fElem[0].appendChild(brElem);
        }
      } else {
        var node = document.createElement("FOOTER");
        node.classList.addAll("text-primary-light","primary","m-0","py-2","px-4");
        node.innerHTML = '<div class="right">'+provider+'</div><br clear="both">';
        body.appendChild(node);
      }      
    }
  });

  window.onscroll = function () {
    let elem = document.getElementById("scrollToTop").children[0];
    if(window.scrollY + window.innerHeight >
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
    var scrollByPixel = setInterval(function () {
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
      elem.style.display="block";
      if(window.innerWidth <= 992) {
        for (const element of navs) {
          element.classList.add("scale-out");
        }
      }
      setTimeout(() => {
        if(window.innerWidth <= 992) {
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
        if(window.innerWidth <= 992) {
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