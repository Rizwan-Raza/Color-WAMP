<?php
if (post_password_required()) {
    return;
}
?>

<div id="comments" class="comments-area">

	<?php // You can start editing here -- including this comment!?>

	<?php if (have_comments()) : ?>
		<br />
		<hr class="thin grey lighten-1 my-2" />
		<h3 class="comments-title"><i class="material-icons mr-2">comment</i><?php esc_html_e('Comments', 'color-wamp')?>	</h3>

		<?php if (get_comment_pages_count() > 1 && get_option('page_comments')) : // are there comments to navigate through?>
		<nav id="comment-nav-above" class="comment-navigation clearfix" role="navigation">
			<h3 class="screen-reader-text"><?php esc_html_e('Comment navigation', 'color-wamp')?></h3>
			<div class="nav-previous"><?php previous_comments_link('<i class="material-icons>arrow_back</i> Older Comments'); ?></div>
			<div class="nav-next"><?php next_comments_link('Newer Comments <i class="material-icons>arrow_forward</i>'); ?></div>
		</nav><!-- #comment-nav-above -->
		<?php endif; // check for comment navigation?>

		<ul <?php comment_class(); ?>>
			<?php
                wp_list_comments(array(
                    'short_ping'  => true,
                    'avatar_size' => 48,
                    'callback' => 'simple_callback'
                ));
            ?>
		</ul><!-- .comment-list -->

		<?php if (get_comment_pages_count() > 1 && get_option('page_comments')) : // are there comments to navigate through?>
		<nav id="comment-nav-below" class="comment-navigation clearfix" role="navigation">
			<h3 class="screen-reader-text"><?php esc_html_e('Comment navigation', 'color-wamp')?></h3>
			<div class="nav-previous"><?php previous_comments_link('<i class="material-icons>arrow_back</i> Older Comments'); ?></div>
			<div class="nav-next"><?php next_comments_link('Newer Comments <i class="material-icons>arrow_forward</i>'); ?></div>
		</nav><!-- #comment-nav-below -->
		<?php endif; // check for comment navigation?>

	<?php endif; // have_comments()?>

	<?php
        // If comments are closed and there are comments, let's leave a little note, shall we?
        if (! comments_open() && '0' != get_comments_number() && post_type_supports(get_post_type(), 'comments')) :
    ?>
		<p class="no-comments"><?php esc_html_e('Comments are closed.', 'color-wamp')?></p>
	<?php endif; ?>
	<?php comment_form(); ?>

</div><!-- #comments -->