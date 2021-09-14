<?php
/*
Template Name: Archives
*/
?>
<?php get_header(); ?>
<div id="content">
	<?php if (have_posts()) : while (have_posts()) : the_post(); ?>
		<div id="post-<?php the_ID(); ?>" class="post box">
			<header class="post-header">
				<h2 class="post-title"><?php the_title(); ?></h2>
				<div class="post-meta">
					<span><?php the_time(__('Y-m-d')) ?></span>
					<span><?php lmsim_theme_views(); ?> 浏览</span> 
					<span><?php comments_popup_link('0 评论', '1 评论', '% 评论', '', '评论已关闭'); ?></span>
					<?php edit_post_link(__('Edit This')); ?>
			</header>
			<div class="entry hentry">
				<?php the_content();?>
				<h2><?php _e('Archives by Month:'); ?></h2>
				<ul class="two-list">
					<?php wp_get_archives('type=monthly'); ?>
				</ul>

				<h2><?php _e('Archives by Subject:'); ?></h2>
				<ul class="links-entry">
					<?php wp_list_categories(); ?>
				</ul>

				<h2><?php _e('Tag Clouds:'); ?></h2>
				<ul>
					<?php wp_tag_cloud('smallest=8&largest=16'); ?>
				</ul>
			</div>
		</div>
		<?php comments_template(); ?>
	<?php endwhile; else: ?>
		<p><?php _e('Sorry, no posts matched your criteria.'); ?></p>
	<?php endif; ?>
</div>
<?php get_sidebar(); ?>
<?php get_footer(); ?>