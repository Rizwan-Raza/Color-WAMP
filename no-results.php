<div class="card-panel my-4">
		<?php if (is_home() && current_user_can('publish_posts')) : ?>

			<p><?php printf('Ready to publish your first post? <a href="%1$s">'.__('Get started here', 'color-wamp').'</a>.', esc_url(admin_url('post-new.php'))); ?></p>

		<?php elseif (is_search()) : ?>

			<p><?php _e("Sorry, but nothing matched your search terms. Please try again with some different keywords.", "color-wamp")?></p>
			<?php get_search_form(); ?>

		<?php else : ?>

			<p><?php _e("It seems we can&rsquo;t find what you&rsquo;re looking for. Perhaps searching can help.", "color-wamp")?></p>
			<?php get_search_form(); ?>

		<?php endif; ?>
	</div>