<?php get_header(); ?>
<section class="row px-4">
	<div class="col s12">
		<div class="container">
			<?php
            if (! dynamic_sidebar('404_page')) {
                ?>
				<div class="card-panel my-4">
					<header class="page-header">
						<h1 class="page-title"><?php esc_html_e('Oops! That page can&rsquo;t be found.', 'color-wamp')?></h1>
					</header>
					<p><?php esc_html_e('It looks like nothing was found at this location. Try the search below.', 'color-wamp')?></p>
					<br />
					<?php get_search_form(); ?>
				</div>
			<?php
            } else {
                dynamic_sidebar('404_page');
            }?>
		</div>
    </div>
</section>

<?php get_footer(); ?>
