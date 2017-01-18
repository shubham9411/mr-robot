<div class="sidebar row">
	<div class="widget-wrap">
<!-- 		<div class="widget">
			<form class="form-inline" role="form" method="get" action="<?php echo get_home_url(); ?>">
				<div class="form-group">
					<label for="search" class="sr-only">Search</label>
					<input type="text" id="search" name="s" class="form-control">
				</div>
				<button type="submit" class="btn btn-default"><?php _e('Search'); ?></button>
			</form>
		</div> -->
		<?php
		$posts = get_page_by_title('Settings');
		foreach($posts as $post):
			setup_postdata( $post );
			if(get_field('coming_soon')):
				$ids = get_field('coming_soon');
		?>
		<div class="widget coming-soon">
			<h1>Upcoming Articles!</h1>
			<div class="posts">
			<?php foreach($ids as $id): ?>
				<p><?php echo get_the_title($id); ?></p>
			<?php endforeach;?>
			</div>
		</div>
		<?php
			endif;
		endforeach;
		?>
		<?php
		if ( ! function_exists( 'dynamic_sidebar' ) || ! dynamic_sidebar( 'primary-sidebar' ) ) :
		endif;
		?>
	</div>
</div>