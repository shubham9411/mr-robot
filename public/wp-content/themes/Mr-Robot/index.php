<?php
get_header();
?>
<div class="row wrap">
	<?php
	$max_count = wp_count_posts()->publish;
	$count= 0;
	if(is_page()):the_post();
		get_template_part('templates/page','content' );
	endif;
	if (have_posts()):
	while(have_posts()): the_post();
	?>
	<div class="col-xs-12 col-sm-11">
		<h1><a href="<?php the_permalink(); ?>" title="Permalink to - <?php the_title(); ?>"><?php the_title();?></a></h1>
		<div class="post-meta">
			<p>
				<span><?php the_time('F j, Y'); ?></span>
				<span><?php comments_popup_link(__('Leave a Reply'), __('1 comment'), __(' % Comments'));?></span>
				<?php
				if(current_user_can('manage_options')):?>
				<span><?php edit_post_link(__('Edit')); ?></span>
				<?php
				endif;?>
			</p>
		</div>
		<div class="post-excerpt">
			<?php the_excerpt(); ?>
		</div>
		<div class="post-meta">
			<p>
				<span><?php the_category(', ');?></span>
				<!-- <span><?php comments_popup_link(__('Leave a Reply'), __('1 comment'), __(' % Comments'));?></span> -->
				<?php
				if(get_the_tags()):?>
				<span><?php the_tags( 'Tag: ', ', ' ); ?></span>
				<?php
				endif;?>
				<?php
				if(current_user_can('manage_options')):?>
				<span><?php edit_post_link(__('Edit')); ?></span>
				<?php
				endif;?>
			</p>
		</div>
	</div>
	<div class="col-xs-12 col-sm-11"><hr/></div>
	<?php
	endwhile;
	else:?>
		<p><?php _e('Sorry, no posts matched your criteria.'); ?></p>
	<?php
	endif;
	?>
</div>
<?php
get_footer();