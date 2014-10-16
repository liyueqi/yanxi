<?php get_header(); ?>
<?php while( have_posts() ):the_post();?>
<article class="article">
	<h2 class="title"><?php the_title(); ?></h2>
	<p class="postmeta"><span class="auth"><?php the_author_posts_link(); ?></span> / <span class="time"><?php the_time('Y-n-j') ?></span> / <span class="eye"><?php Bing_post_views('', ''); ?>&nbsp;次</span></p>
	<div class="context"><?php the_content(); ?></div>
</article>
<?php if( comments_open() ) comments_template( '', true ); ?>
<?php endwhile; ?>
<?php get_footer(); ?>