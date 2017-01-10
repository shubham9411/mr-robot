<!doctype html>
<html lang="en">
	<head>
		<meta charset="utf-8">
		<meta name="viewport" content="initial-scale=1">
		<!-- <title><?php the_title(); ?></title> -->
		<?php do_action('wp_head'); ?>
		<link href="https://fonts.googleapis.com/css?family=Open+Sans" rel="stylesheet">
	</head>
	<body>
		<div class="container">
			<div class="jumbotron">
			<center>
				<h1><a href="<?php echo get_home_url(); ?>"><?php echo get_option('blogname' );?></a></h1>
				<p>
					<a href="<?php echo get_home_url(); ?>"><?php echo get_option('blogdescription' );?></a>
				</p>
				</center>
			</div>
		</div>
		<div class="content container">
			<div class="col-xs-12 col-sm-9">