<?php get_header();?>

    <div class="echipa-background"></div>

    <main>

        <div class="flex-team-container">

            <?php
            while(have_posts()) {
                the_post(); ?>
                <div class="membru-item">
                    <a href="<?php the_permalink(); ?>">
                        <div class="thumbnail">
                            <div><div class="color-layer"></div></div>
                        <?php the_post_thumbnail('small-thumbnail'); ?>
                        </div>
                    </a>
                    <div class="post-info">
                        <h3 class="headline"><a href="<?php the_permalink() ?>"><?php the_title(); ?></a></h3>
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
