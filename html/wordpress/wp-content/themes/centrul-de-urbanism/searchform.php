<form id="searchform" method="get" action="<?php echo home_url('/'); ?>">
    <input type="text" class="search-field" name="s" placeholder="Caută..." value="<?php the_search_query(); ?>">
</form>