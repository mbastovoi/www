<?php
 get_header() 
 ?>
<div class="background" id="first">
    <img id="logo" src="<?php echo THEME_IMG_PATH; ?>/logo-lg.png" alt="Smiley face">
    <a class="down-arrow" id="click1" href="#"><img class="down-btn" src="<?php echo THEME_IMG_PATH; ?>/btndown.png" alt="button1"></a>
</div>

<div class="background" id="proiecte" >
   <h1 class="pro-headline">Proiectele Centrului de Urbanism</h1>
    <div class="grid-proiecte-container">

            <?php
            $args = array(
                'post_type' => 'proiecte',
                'posts_per_page' => 4
            );

                 $loop = new WP_Query($args);

                 while ( $loop->have_posts() ) : $loop->the_post(); ?>
            <div class="proiect-item">
            <a href="<?php the_permalink(); ?>">
                <?php the_title(); ?>
            </a>
             </div>
<!--             --><?php
             endwhile;
             wp_reset_postdata();
//            ?>
    </div>
    <a id="click2" class="down-arrow" href="#"><img class="down-btn" src="<?php echo THEME_IMG_PATH; ?>/btndown.png" alt="button2"></a>
</div>

<div class="background" id="events-blog" >
    <div class="grid-container-events">
    <div class="blog-posts">
        <h1>Ultimele Articole</h1>
        <div>
    <div class="flex-container">
        <?php
        $args = array(
            'post_type' => 'post',
            'posts_per_page' => 2
        );
        $loop = new WP_Query($args);

        while ( $loop->have_posts() ) : $loop->the_post(); ?>
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
        <?php
        endwhile;
        wp_reset_postdata(); ?>
    </div>
        </div>
    </div>
    <div class="events-posts">
        <h1>Următoarele evenimente</h1>
    <?php
    $args = array(
        'post_type' => 'mec-events',
        'posts_per_page' => 3
    );

    $loop = new WP_Query($args);

    while ( $loop->have_posts() ) : $loop->the_post();
        $starthour = get_post_meta($post->ID, 'mec_start_time_hour', true);
        $endhour = get_post_meta($post->ID, 'mec_reg_fields', true);?>
        <div class="mec-event">
            <a href="<?php the_permalink(); ?>">
                <?php the_title(); ?>
                <p><?php echo $starthour?> - <?php echo $endhour ?></p>
                <?php echo $event ?>
            </a>
        </div>
        <!--             --><?php
    endwhile;
    wp_reset_postdata();
    //            ?>
    </div>
    </div>
    <a id="click3" class="down-arrow" href="#"><img class="down-btn" src="<?php echo THEME_IMG_PATH; ?>/btndown.png" alt="button3"></a>
</div>

<div class="background" id="viziunea">
  <h3 class="description">
    Centrul de Urbanism este o echipă multidisciplinară implicată în crearea spațiilor publice de calitate, oferă consultanță pentru autorități, mediul de afaceri și comunități promovând urbanismul durabil prin educație, dialog și cercetare.
  </h3>
    <a id="click4" class="up-arrow" href="#"><img class="down-btn" src="<?php echo THEME_IMG_PATH; ?>/btndown.png" alt="button4"></a>
</div>

<?php 
get_footer() ?>




