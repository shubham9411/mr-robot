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
		<p class="post-meta">
			<span>Category: <?php the_category(', ');?></span>
			<?php 
			$categ = get_the_tags();
			if($categ):?>
				<span><?php the_tags(__('Tags: '), ', ');?></span>
			<?php 
			endif;
			?>
			<span><?php comments_popup_link(__('Write a comment'), __('% comment'), __(' % Comments'));?></span>
			<?php 
			if(current_user_can('manage_options')):?>
				<span><?php edit_post_link(__('Edit')); ?></span>
			<?php 
			endif;?>
		</p>
	</div>
	<div class="col-xs-12 col-sm-11"><hr/></div>
	<?php
	endwhile;
	?>
</div>
<?php
get_footer();