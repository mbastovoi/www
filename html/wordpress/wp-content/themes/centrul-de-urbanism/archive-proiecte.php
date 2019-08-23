
<?php get_header();?>

    <div class="echipa-background"></div>

    <main>

        <div class="grid-proiecte-container">

            <?php
            while(have_posts()) {
                the_post(); ?>
                <div class="proiect-item">
                    <a href="<?php the_permalink(); ?>">
                        <?php the_title(); ?>
                    </a>
                </div>
            <?php }
            echo paginate_links();
            ?>
        </div>
    </main>

<?php ?>

<?php
get_footer() ?>
