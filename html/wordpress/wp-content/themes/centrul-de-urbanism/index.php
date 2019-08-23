<?php get_header();?>


<main>
    <div class="flex-wrapper">
        <div class="flex-categories">
            <?php
            $args = array(
                'orderby' => 'name',
                'number' => 6
            );
            $categories = get_categories($args);
            foreach($categories as $category) {
            echo '<div class="cat-elem"><a href="' . get_category_link($category->term_id) . '">' . $category->name . '</a></div>';
            } ?>
        </div>
    </div>

<div class="flex-container">

   <?php 
	while(have_posts()) {
		the_post(); ?>
		 <div class="post-item">
             <div class="photo-filter">
                 <div class="color-filter">
                 </div>
                 <div class="thumbnail"><?php the_post_thumbnail('norm-thumbnail'); ?>

                 </div>


             </div>
             <div class="post-info">
                 <div id="category-info">
                     <p><?php
                             foreach((get_the_category()) as $category){
                                 echo $category->name."<br>";
                                 echo category_description($category);
                             }
                             ?></p>
                             </div>
                             <h3 class="headline"><a href="<?php the_permalink() ?>"><?php the_title(); ?></a></h3>
                             <div class="generic-content">
                                <?php the_excerpt() ?>
                             </div>
             </div>
         </div>
   <?php } ?>
</div>
    <div class="paginate-flex ">
    <?php
    global $wp_query;

    $big = 999999999; // need an unlikely integer

    echo paginate_links( array(
        'base' => str_replace( $big, '%#%', esc_url( get_pagenum_link( $big ) ) ),
        'format' => '?paged=%#%',
        'current' => max( 1, get_query_var('paged') ),
        'total' => $wp_query->max_num_pages
    ) );
    ?>
    </div>

</main>



<?php 
get_footer() ?>
