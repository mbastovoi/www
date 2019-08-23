<?php get_header();?>


    <main>


        <div class="flex-container-membru">
            <div class="interests-photo">
                <div class="thumbnail">
                    <div><div class="color-layer"></div></div>
                    <?php the_post_thumbnail('small-thumbnail'); ?>
                </div>
                <h1 id="membru-name"><?php the_title(); ?></h1>
                <p>interese</p>
                <ul>
                    <?php $interese = get_field('interes');

                    foreach($interese as $interes){
                        ?>
                        <li class="interes"><?php echo get_the_title($interes);?></li>
                    <?php  }
                    ?>
                </ul>
            </div>
            <div class="main-content">
            <?php
            while(have_posts()) {
                the_post(); ?>
                    <div class="generic-content">
                        <?php the_content() ?>
                    </div>
                    <div class="blue-line"></div>

                <div class="written-articles">
                    <h3>Articole publicate:</h3>
                    <ul>
                        <?php
                        $autorPosts = new WP_Query(array(
                            'post-type' => 'post',
                            'posts_per_page' => 10,
                            'meta_key' => 'autor',
                            'meta_query' => array(
                                'key' => 'autor',
                                'compare' => 'LIKE',
                                'value' => '"' . get_the_ID() . '"'
                            )
                        ));

                        while ($autorPosts -> have_posts()) {
                            $autorPosts -> the_post(); ?>
                            <li>
                                <a href="<?php echo get_the_permalink(); ?>"><?php the_title(); ?></a>
                            </li>
                        <?php } }
                        ?>
                    </ul>
                </div>
            </div>
        </div>
    </main>

<?php ?>

<?php
get_footer() ?>
