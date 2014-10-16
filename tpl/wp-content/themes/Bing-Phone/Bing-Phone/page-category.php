<?php
//Template Name:分类集合
get_header();
?>
<?php while( have_posts() ):the_post();?>
<article class="page categorypagebox">
	<ul class="categorypage">
		<?php
		global $wpdb;
		$request = "SELECT $wpdb->terms.term_id, name FROM $wpdb->terms ";
		$request .= " LEFT JOIN $wpdb->term_taxonomy ON $wpdb->term_taxonomy.term_id = $wpdb->terms.term_id ";
		$request .= " WHERE $wpdb->term_taxonomy.taxonomy = 'category' ";
		$request .= " ORDER BY term_id asc";
		$categorys = $wpdb->get_results($request);
		$categoryID = array();
		foreach ($categorys as $category) array_push($categoryID, $category->term_id);
		foreach ($categoryID as $value) {
			$cat = get_category( $value );
			if( $cat->count ){
				$posts = get_posts( "category=".$value."&numberposts=1" );
				foreach( $posts as $post ):
					setup_postdata( $post );
					echo '<li>';
						echo '<a href="'.get_category_link( $value ).'" rel="bookmark" title="'.$cat->name.'">';
							Bing_thumbnail(120);
							echo '<h3 class="title">'.$cat->name.'</h3>';
							echo '<i class="summary">';
								if( category_description( $value ) ) echo category_description( $value );
								else echo '<p>分类' . $cat->name . '的文章</p>';
							echo '</i>';
						echo '</a>';
						echo '<div class="clear"></div>';
					echo '</li>';
				endforeach;
			}
		}
		?>
	</ul>
</article>
<?php endwhile; ?>
<?php get_footer(); ?>