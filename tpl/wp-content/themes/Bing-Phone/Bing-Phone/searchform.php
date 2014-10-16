<?php
$search_page = is_search() && get_search_query();
if( $search_page ) $value = get_search_query();
else $value = __( '点击搜索' ) . '...';
?>
<div class="searchform-box">
	<form method="get" class="search-form" action="/" >
		<input class="search-text" name="s" type="text" value="<?php echo $value; ?>" <?php if( !$search_page ): ?>onfocus="if (this.value == '<?php echo $value; ?>') {this.value = '';}" <?php endif; ?>onblur="if (this.value == '') {this.value = '<?php echo $value; ?>';}" x-webkit-speech="">
		<i class="icon-search"></i>
		<input class="search-submit" alt="search" type="submit" value="<?php _e( '搜索' ); ?>">
	</form>
</div>