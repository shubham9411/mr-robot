<?php
/**
* Template for displaying all single posts
*
* @package Mr Robot
*/
get_header(); ?>
<div class="row wrap zero-margin">
	<div class="col-xs-12 zero-padding">
		<?php
		$max_count = wp_count_posts()->publish;
		$count= 0;
		while(have_posts()): the_post();
		?>
		<div class="col-xs-12 col-sm-11">
			<h1><?php the_title();?></h1>
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
			<div class="post-content">
				<p><?php the_content(); ?></p>
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
				</p>
			</div>
		</div>
		<div class="col-xs-11"><hr/></div>
		<?php
		endwhile;
		?>
		<div class="pagination-single col-xs-11">
			<?php if(get_previous_post()):?>
			<span class="previous"><a href="<?php echo get_the_permalink(get_previous_post()->ID); ?>" title="<?php echo get_previous_post()->post_title; previous_posts("" ); ?>">← Previous</a></span>
			<?php endif ;
			if(get_next_post()):?>
			<span class="next"><a href="<?php echo get_the_permalink(get_next_post()->ID); ?>" title="<?php echo get_next_post()->post_title; ?>">Next →</a></span>
			<?php endif ;?>
		</div>
	</div>
	<div class="col-xs-12 col-sm-11">
		<?php comments_template();?>
	</div>
</div>
<?php get_footer(); ?>