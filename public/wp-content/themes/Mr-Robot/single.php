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
		<div class="col-xs-offset-1 col-xs-10">
			<h1><a href="<?php the_permalink(); ?>"><?php the_title();?></a></h1>
			<p><?php the_content(); ?></p>
		</div>
		<div class="col-xs-offset-1 col-xs-10"><hr/></div>
		<?php
	endwhile;
	?>
	</div>
	<div class="col-xs-offset-1 col-xs-10">
	<?php comments_template();?>
	</div>
</div>
<?php get_footer(); ?>