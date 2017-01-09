<div id="comments" class="comments-area">
	<?php if ( have_comments() ) : ?>
		<h2 class="comments-title">
		<?php
			printf( _n( 'One thought on &ldquo;%1$s&rdquo;', 'Thoughts on &ldquo;%1$s&rdquo;', 'comments title', 'ColoredCow' ),
				get_the_title() );
		?>
		</h2>
		<?php if ( get_comment_pages_count() > 1 && get_option( 'page_comments' ) ) : ?>
			<div class="navigation comment-navigation">
				<h2 class=""><?php echo 'Comment navigation'; ?></h2>
				<div class="nav-links">
					<?php
						if ( $prev_link = get_previous_comments_link( __( 'Older Comments', 'ColoredCow' ) ) ) :
							printf( '<div class="nav-previous">%s</div>', $prev_link );
						endif;

						if ( $next_link = get_next_comments_link( __( 'Newer Comments', 'ColoredCow' ) ) ) :
							printf( '<div class="nav-next">%s</div>', $next_link );
						endif;
					?>
				</div>
			</div>
		<?php endif; ?>
		<ul class="comment-list">
			<?php
			wp_list_comments( array(
				'style'       => 'ul',
				'short_ping'  => true,
				'avatar_size' => 56,
			));
			?>
		</ul>
		<?php if ( get_comment_pages_count() > 1 && get_option( 'page_comments' ) ) : ?>
			<div>
				<h1 class=""><?php echo 'Comment navigation'; ?></h1>
				<div class="nav-previous">
					<?php previous_comments_link('&larr; Older Comments'); ?>
				</div>
				<div class="nav-next">
					<?php next_comments_link( 'Newer Comments &rarr;'); ?>
				</div>
			</div>
		<?php 
		endif;
		if ( ! comments_open() ) : ?>
			<p class="no-comments">
				<?php echo 'Comments are closed.'; ?>
			</p>
		<?php 
		endif;
	endif; 
	?>
	<?php 
	$fields =  array(

	  'author' =>
	    '<p class="comment-form-author">' .
	    '<input id="name" name="author" placeholder="Your name" data-toggle="name" title="Please enter your name!" class="form-control" type="text" value="' . esc_attr( $commenter['comment_author'] ) .
	    '" size="30" /></p>',

	  'email' =>
	    '<p class="comment-form-email"><span data-toggle="valid-mail" title="Please enter a valid mail!">' .
	    '<input id="email" name="email" placeholder="Your email address" data-toggle="email" title="Please enter your email!" class="form-control" type="text" value="' . esc_attr(  $commenter['comment_author_email'] ) .
	    '" size="30"/></span></p>',
	    'submit-button' =>
	    '<p class="comment-form-submit">' .
	    '<button id="submit-button" type="button">Post Comment</button></p>',
	);
	comment_form(array('fields'=>$fields)); ?>
</div>