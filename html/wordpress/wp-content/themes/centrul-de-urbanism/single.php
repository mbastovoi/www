<?php get_header();?>


<main>

    <div class="flex-container-post">
        <?php
        while(have_posts()) {
            the_post(); ?>

                    <div class="article-info">
                        <h1 class="headline"><?php the_title(); ?></h1>
                        <div class="category"><?php
                            foreach((get_the_category()) as $category){
                                echo $category->name."<br>";
                                echo category_description($category);
                            }
                            ?></div>
                    </div>
                    <div class="thumbnail"><?php the_post_thumbnail('banner-image'); ?></div>
                    <div class="flex-author-and-content">

                    <div class="generic-content">
                        <p><?php the_content(); ?></p>
                    </div>
                        <div class="author-info">
                            <?php $autor = get_field('autor');

                            foreach($autor as $auto){
                                ?>
                                <div><a href="<?php the_permalink($auto); ?>"><?php echo get_the_post_thumbnail($auto, 'thumbnail'); ?></a></div>
                                <div><p><?php echo get_the_title($auto);?></p></div>
                                <?php the_time('j F Y'); ?>
                                <?php
                            }
                            ?>
                        </div>
                    </div>
    </div>
    <?php }
    echo paginate_links();
    ?>
</main>

<?php ?>



<?php
get_footer() ?>
