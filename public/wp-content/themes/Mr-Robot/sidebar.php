<div class="sidebar row zero-margin">
	<div class="widget-wrap">
		<!-- <div class="widget">
			<form class="form-inline" role="form" method="get" action="<?php echo get_home_url(); ?>">
				<div class="form-group">
					<label for="search" class="sr-only">Search</label>
					<input type="text" id="search" name="s" class="form-control">
				</div>
				<button type="submit" class="btn btn-default"><?php _e('Search'); ?></button>
			</form>
		</div> -->
		<div class="widget about-me">
			<div class="social-icons">
				<a href="<?php echo get_home_url().'/feed';?>" target="_blank" >
					<span class="sr-only">Rss Feeds Link</span>
					<i class="fa fa-btn fa-lg fa-rss"></i>
				</a>
				<a href="https://github.com/shubham9411/" target="_blank">
					<span class="sr-only">Github Link</span>
					<i class="fa fa-btn fa-lg fa-github"></i>
				</a>
				<a href="http://facebook.com/shubhampandeyjnv" target="_blank">
					<span class="sr-only">Facebook Link</span>
					<i class="fa fa-btn fa-lg fa-facebook"></i>
				</a>
				<a href="https://linkedin.com/shubham9411" target="_blank">
					<span class="sr-only">Linkedin Link</span>
					<i class="fa fa-btn fa-lg fa-linkedin"></i>
				</a>
				<a href="http://plus.google.com/+shubham9411" target="_blank">
					<span class="sr-only">Google Plus Link</span>
					<i class="fa fa-btn fa-lg fa-google-plus"></i>
				</a>
				<a href="https://twitter.com/shubham9411" target="_blank">
					<span class="sr-only">Twitter Link</span>
					<i class="fa fa-btn fa-lg fa-twitter"></i>
				</a>
				<a href="mailto:shubham9411@gmail.com" target="_blank">
					<span class="sr-only">Mail to link</span>
					<i class="fa fa-btn fa-lg fa-envelope"></i>
				</a>
			</div>
		</div>
		<?php
		$posts = get_page_by_title('Settings');
		foreach($posts as $post):
			setup_postdata( $post );
			if(function_exists('get_field') && get_field('coming_soon')):
				$ids = get_field('coming_soon');
		?>
		<div class="widget coming-soon">
			<h1>Upcoming Articles!</h1>
			<div class="posts">
				<?php foreach($ids as $id): ?>
				<p><?php echo get_the_title($id); ?></p>
				<?php endforeach;?>
			</div>
			<br/>
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