<!-- begin sidebar -->
<div id="sidebar">

	<?php if ( !function_exists('dynamic_sidebar') || !dynamic_sidebar() ) : ?>

	<div class="widget" id="search">
		<form method="get" id="searchform" action="<?php bloginfo('url'); ?>/">
			<input type="text" class="search-input" value="<?php the_search_query(); ?>" name="s" id="s" />
			<input type="submit" id="searchsubmit" value="<?php _e('Search'); ?>" />
		</form>
	</div>

<?php
	if (is_single()) {
		$posts_widget_title = '最新日志';
	} else {
		$posts_widget_title = '随机日志';
	}
?>

	<div class="widget">
		<h3><?php echo $posts_widget_title; ?></h3>
		<ul>
			<?php
				if (is_single()) {
					$posts = get_posts('numberposts=7&orderby=post_date');
				} else {
					$posts = get_posts('numberposts=7&orderby=rand');
				}
				foreach($posts as $post) {
					setup_postdata($post);
					echo '<li><a href="' . get_permalink() . '">' . get_the_title() . '</a></li>';
				}
				$post = $posts[0];
			?>
		</ul>
	</div>
	
	<div class="widget rc-comments">
		<h3><?php _e('最新评论'); ?></h3>
			<ul>
			<?php	
				$email = get_bloginfo ('admin_email');
				$comments_args = array(
					'status'=>'approve',
					'post_status'=>'publish',
					'author__not_in' => 1,
					'number' => '10',
					//'post_type' => 'post'
				);
				$new_comments = get_comments($comments_args);
				$rc_comments = '';
				foreach ($new_comments as $rc_comment) {
					$rc_comments .= '
						<li>
							<div class="rc-avatar">' . get_avatar( $rc_comment->comment_author_email, 46 ) . '</div>
							<div class="rc-body">
								<div class="rc-head"><span>'. $rc_comment->comment_author . '</span> <time><i class="fa fa-clock-o"></i> '. date('Y-m-d',strtotime($rc_comment->comment_date_gmt)) . '</time></div>
								<div class="comment-content">
									<p><a title="发表在 ' . get_post( $rc_comment->comment_post_ID )->post_title  .'" href="' . htmlspecialchars(get_comment_link( $rc_comment->comment_ID )) .'">' . do_shortcode(convert_smilies(mb_substr(strip_tags($rc_comment->comment_content),0,35))) . '...</a></p>
								</div>
							</div>
						</li>
					';
				}
				echo $rc_comments;
			?>
			</ul>
	</div>

	<div class="widget widget_archives">
		<h3><?php _e('月存档'); ?></h3>
			<ul>
				<?php wp_get_archives('type=monthly'); ?>
			</ul>
	</div>

	<div class="widget widget_meta">
		<h3><?php _e('Meta'); ?></h3>
			<ul>
				<?php wp_register(); ?>
				<li><?php wp_loginout(); ?></li>
				<li><a href="<?php bloginfo('rss2_url'); ?>" title="<?php _e('Syndicate this site using RSS'); ?>"><?php _e('<abbr title="Really Simple Syndication">RSS</abbr>'); ?></a></li>
				<li><a href="<?php bloginfo('comments_rss2_url'); ?>" title="<?php _e('The latest comments to all posts in RSS'); ?>"><?php _e('Comments <abbr title="Really Simple Syndication">RSS</abbr>'); ?></a></li>
				<?php wp_meta(); ?>
			</ul>
	</div>
	
	<?php endif; ?>

</div>