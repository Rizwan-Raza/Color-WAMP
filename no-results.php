<div class="card-panel my-4">
		<?php if (is_home() && current_user_can('publish_posts')) : ?>

			<p><?php printf('Ready to publish your first post? <a href="%1$s">Get started here</a>.', esc_url(admin_url('post-new.php'))); ?></p>

		<?php elseif (is_search()) : ?>

			<p><?php esc_html_e("Sorry, but nothing matched your search terms. Please try again with some different keywords.", "color-wamp")?></p>
			<?php get_search_form(); ?>

		<?php else : ?>

			<p><?php esc_html_e("It seems we can&rsquo;t find what you&rsquo;re looking for. Perhaps searching can help.", "color-wamp")?></p>
			<?php get_search_form(); ?>

		<?php endif; ?>
	</div>