<?php
/**
* Template for displaying all single posts
*
* @package Mr Robot
*/
get_header(); ?>
<div class="row wrap">
	<div class="col-xs-12">
	<?php
	$max_count = wp_count_posts()->publish;
	$count= 0;
	if(is_page()):the_post();
		get_template_part('templates/page','content' );
	endif;
	while(have_posts()): the_post();
		?>
		<div class="col-xs-12 col-sm-11">
			<h1><?php the_title();?></h1>
			<p><?php the_content(); ?></p>
		</div>
		<div class="col-xs-11"><hr/></div>
		<?php
	endwhile;
	?>
	</div>
	<div class="col-xs-12 col-sm-11">
	<?php comments_template();?>
	</div>
</div>
<?php get_footer(); ?>