<?php
/**
* Template for displaying all single pages
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
			<div class="post-content">
				<p><?php the_content(); ?></p>
			</div>
		</div>
		<div class="col-xs-11"><hr/></div>
		<?php
		endwhile;
		?>
		<ul id="pagination">
			<li class="previous"><?php posts_nav_link('','','&laquo; Previous Entries') ?></li>
			<li class="future"><?php posts_nav_link('','Next Entries &raquo;','') ?></li>
		</ul>
	</div>
	<div class="col-xs-12 col-sm-11">
		<?php comments_template();?>
	</div>
</div>
<?php get_footer(); ?>