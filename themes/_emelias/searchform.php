
<form role="search" method="get" class="bcdm-search-form" action="<?php echo esc_url( home_url( '/' ) ); ?>">
	<label>
		<input type="search" class="search-field"  value="<?php echo esc_attr( get_search_query() ); ?>" name="s">
	</label>
	<button type="submit" class="search-submit" value="Search"><i class="far fa-search"></i></button>
</form>