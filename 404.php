<?php get_header(); ?>
<?php if (!isset($content_width)) {
	$content_width = 1440;
} ?>
<div class="row px-4" style="max-width: <?php echo $content_width ?>px;">
	<div class="col s12">
		<div class="container">
			<?php
			if (!dynamic_sidebar('404_page')) {
				?>
				<div class="card-panel my-4">
					<header class="page-header">
						<h1 class="page-title"><?php esc_html_e('Oops! That page can&rsquo;t be found.', 'color-wamp') ?></h1>
					</header>
					<p><?php esc_html_e('It looks like nothing was found at this location. Try the search below.', 'color-wamp') ?></p>
					<br />
					<?php get_search_form(); ?>
				</div>
			<?php
			} else {
				dynamic_sidebar('404_page');
			} ?>
		</div>
	</div>
</div>

<?php get_footer(); ?>