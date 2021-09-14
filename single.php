<?php get_header(); ?>
<div id="content">
	<?php if (have_posts()) : while (have_posts()) : the_post(); ?>
		<div id="post-<?php the_ID(); ?>" class="post<?php if(is_sticky()) echo ' sticky';?> box">
			<header class="post-header">
				<h2 class="post-title"><?php the_title(); ?></h2>
				<div class="post-meta">
					<?php if(is_sticky())echo '<span class="sticky">推荐</span>'; ?>
					<span><?php the_time(__('Y-m-d')) ?></span>
					<span><?php the_category(','); ?></span>
					<span><?php lmsim_theme_views(); ?> 浏览</span> 
					<span><?php comments_popup_link('0 评论', '1 评论', '% 评论', '', '评论已关闭'); ?></span>
					<?php edit_post_link(__('Edit This')); ?>
			</header>
			<div class="entry hentry">
				<?php the_content();?>
				<?php wp_link_pages(array('before' => '<p><strong>' . __('Pages:') . '</strong> ', 'after' => '</p>', 'next_or_number' => 'number')); ?>
			</div>
		</div>
		<?php comments_template(); ?>
		<?php the_post_navigation(); ?>
	<?php endwhile; else: ?>
		<p><?php _e('Sorry, no posts matched your criteria.'); ?></p>
	<?php endif; ?>
</div>
<?php get_sidebar(); ?>
<?php get_footer(); ?>