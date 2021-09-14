<?php get_header(); ?>
<div id="content">
	<?php if (have_posts()) : while (have_posts()) : the_post(); ?>
		<div id="post-<?php the_ID(); ?>" class="post<?php if(is_sticky()) echo ' sticky';?> box">
			<header class="post-header">
				<h2 class="post-title"><a href="<?php the_permalink() ?>" rel="bookmark"><?php the_title(); ?></a></h2>
				<div class="post-meta">
					<?php if(is_sticky())echo '<span class="sticky">推荐</span>'; ?>
					<span><?php the_time(__('Y-m-d')) ?></span>
					<span><?php the_category(','); ?></span>
					<span><?php lmsim_theme_views(); ?> 浏览</span> 
					<span><?php comments_popup_link('0 评论', '1 评论', '% 评论', '', '评论已关闭'); ?></span>
					<?php edit_post_link(__('Edit This')); ?>
			</header>
			<div class="entry">
				<?php 
					if(preg_match('/<!--more.*?-->/',$post->post_content)){
						the_content('', TRUE);
					}else{
						if( has_post_thumbnail() ){
							echo '<p class="text-center">';
								the_post_thumbnail();
							echo '</p>';
						}
						the_excerpt();
					}
				?>	
			</div>
		</div>
	<?php endwhile; the_posts_pagination(); else: ?>
		<p><?php _e('Sorry, no posts matched your criteria.'); ?></p>
	<?php endif; ?>
</div>
<?php get_sidebar(); ?>
<?php get_footer(); ?>