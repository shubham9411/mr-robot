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
		<header class="row">
			<div class="col-xs-11 col-xs-offset-1 logo">
				<div class="heading">
					<h1><b><a href="<?php echo get_home_url(); ?>"><?php echo get_option('blogname' );?></a></b></h1>
				</div>
				<div class="sub-heading">
					<h3><a href="<?php echo get_home_url(); ?>"><?php echo get_option('blogdescription' );?></a></h3>
				</div>
			</div>
		</header>
		<div class="content row">
			<div class="col-xs-9">