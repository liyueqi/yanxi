<?php get_header(); ?>
<?php while( have_posts() ):the_post();?>
<article class="page">
	<div class="context"><?php the_content(); ?></div>
</article>
<?php if( comments_open() ) comments_template( '', true ); ?>
<?php endwhile; ?>
<?php get_footer(); ?>