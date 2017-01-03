<?php
get_header();
?>
<div class="row wrap">
	<div class="col-xs-12">
	<?php
	$max_count = wp_count_posts()->publish;
	$count= 0;
	if(is_page()):the_post();
		get_template_part('templates/page','content' );
	endif;
	while(have_posts()): the_post();
		if($count%3==0):
			echo '<div class="row">';
		endif;
		$count++;
		?>
		<div class="col-xs-12 col-sm-6 col-md-4">
			<h1><a href="<?php the_permalink(); ?>"><?php the_title();?></a></h1>
			<p><?php the_excerpt(); ?>
		</div>
		<?php
		if($count%3==0 || $count == $max_count):
			echo '</div>';
		endif;
	endwhile;
	?>
	</div>
</div>
<?php
get_footer();