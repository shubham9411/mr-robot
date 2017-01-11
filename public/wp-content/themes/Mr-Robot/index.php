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
	while(have_posts()): the_post();
	?>
	<div class="col-xs-12 col-sm-11">
		<h1><a href="<?php the_permalink(); ?>"><?php the_title();?></a></h1>
		<?php the_excerpt(); ?>
		<small class="post-meta">
			<span><?php the_category(', ');?></span>
			<span><?php comments_popup_link(__('Leave a Reply'), __('1 comment'), __(' % Comments'));?></span>
			<?php 
			if(current_user_can('manage_options')):?>
				<span><?php edit_post_link(__('Edit')); ?></span>
			<?php 
			endif;?>
		</small>
	</div>
	<div class="col-xs-12 col-sm-11"><hr/></div>
	<?php
	endwhile;
	?>
</div>
<?php
get_footer();