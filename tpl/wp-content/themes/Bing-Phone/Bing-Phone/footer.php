			<div class="mask"></div>
		</div>
		<footer id="footer">
			<div id="footer-area">
				<nav class="nav nav-foot" role="navigation" itemscope itemtype="http://schema.org/SiteNavigationElement">
					<ul id="footmenu">
						<?php
						if( is_archive() || is_page( 'category' ) ) $current = 'category';
						elseif( is_search() || is_page( 'search' ) ) $current = 'search';
						elseif( is_page( 'info' ) ) $current = 'info';
						else $current = 'home';
						?>

					</ul>
				</nav>
			</div>
		</footer>
	</section>
<?php wp_footer(); ?>
</body>
</html>