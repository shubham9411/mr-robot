<!doctype html>
<html lang="en">
	<head>
		<meta charset="utf-8">
		<meta name="viewport" content="initial-scale=1">
		<title><?php the_title(); ?></title>
		<?php do_action('wp_head'); ?>
		<link href="https://fonts.googleapis.com/css?family=Open+Sans" rel="stylesheet">
	</head>
	<body>
		<header class="row">
			<div class="col-xs-11 col-xs-offset-1 logo">
				<div class="heading">
					<b><a href="<?php echo get_home_url(); ?>"><?php echo get_option('blogname' );?></a></b>
				</div>
				<div class="sub-heading">
					<p><a href="<?php echo get_home_url(); ?>"><?php echo get_option('blogdescription' );?></a></p>
				</div>
			</div>
		</header>