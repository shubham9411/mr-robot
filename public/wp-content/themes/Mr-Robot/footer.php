	</div>
	<div class="col-xs-3">
		<?php get_sidebar(); ?>
	</div>
</div>
<!-- <?php echo get_num_queries(); ?> queries in <?php timer_stop(3); ?> seconds -->
<div class="bar" role="bar"></div>
<script type="text/javascript">
	NProgress.start();
	setTimeout(function () {
		NProgress.done();
		jQuery('.fade').removeClass('out');
	}, 1000);
	jQuery("#b-0").click(function () {
		NProgress.start();
	});
	jQuery("#b-40").click(function () {
		NProgress.set(0.4);
	});
	jQuery("#b-inc").click(function () {
		NProgress.inc();
	});
	jQuery("#b-100").click(function () {
		NProgress.done();
	});
</script>
<?php wp_footer(); ?>
</body>
</html>