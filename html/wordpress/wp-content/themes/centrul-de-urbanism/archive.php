<?php get_header();?>


<main>
    <h1 id="blog-header">
        <?php the_archive_title(); ?>
    </h1>
    <p class="archive-description"> <?php the_archive_description(); ?></p>


    <div class="flex-container">

        <?php
        while(have_posts()) {
            the_post(); ?>
            <div class="post-item">
                <div class="color-filter">
                </div>
                <div class="thumbnail"><?php the_post_thumbnail('small-thumbnail'); ?>
                </div>
                <div class="post-info">
                    <h3 class="headline"><a href="<?php the_permalink() ?>"><?php the_title(); ?></a></h3>
                    <div class="metabox">
                        <p>Posted By <?php the_author_posts_link() ?> on <?php the_time('n.j.y') ?> in <?php echo get_the_category_list(', ') ?></p>
                    </div>

                    <div class="generic-content">
                        <?php the_excerpt() ?>
                        <p><a class="cont-btn" href="<?php the_permalink();?>">Continue reading &raquo;</a></p>
                    </div>
                </div>
            </div>
        <?php }
        echo paginate_links();
        ?>
    </div>
</main>

<?php ?>



<?php
get_footer() ?>
