<!doctype html>
<html lang="en">
	<head>
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width,initial-scale=1.0">
		<!-- <title><?php the_title(); ?></title> -->
		<?php do_action('wp_head'); ?>
		<link href="https://fonts.googleapis.com/css?family=Lato" rel="stylesheet">
		<link href="https://fonts.googleapis.com/css?family=Alegreya" rel="stylesheet">
		<!--[if lt IE 9]!>
        <script src="http://html5shim.googlecode.com/svn/trunk/html5.js"></script>
        <script src="http://css3-mediaqueries-js.googlecode.com/svn/trunk/css3-mediaqueries.js"></script>
        <![end if]-->
	</head>
	<body>
		<header class="container">
			<div class="jumbotron heading">
			<center>
				<?php $logo = the_custom_logo(); ?>
				<h1><a href="<?php echo get_home_url(); ?>"><?php echo get_option('blogname' );?></a></h1>
				<p>
					<a href="<?php echo get_home_url(); ?>"><i><?php echo get_option('blogdescription' );?></i></a>
				</p>
				</center>
			</div>
		</header>
		<div class="content container">
			<div class="col-xs-12 col-sm-8 zero-padding">