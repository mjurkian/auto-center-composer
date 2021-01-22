<form role="search" method="get" id="searchform" class="searchform" action=<?php the_field('search_icon', 'option'); ?>">
    <div>
        <label for="s" type="hidden" class="screen-reader-text"><?php _e( '', 'adelio' ); ?></label>
        <div class="search-box">
            <input type="search" id="s" name="s" value="" placeholder="Search pages" aria-label='Search Beazley'/>
            <button type="submit" id="search-button"><?php _e( '', 'adelio' ); ?></button>
        </div>
    </div>
</form>