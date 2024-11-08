<?php

/**
 * The about section
 */
?>

<section class="about" id="about">
    <div class="about__content container">
        <div class="about__text">
            <h2 class="title"><?php the_title(); ?></h2>
            <div class="description"><?php the_content(); ?></div>
        </div>

        <div class="about__image-grid">
            <div class="column-small">
                <div class="image">
                    <img src="<?php echo esc_url(get_theme_mod('about_image_1', get_template_directory_uri() . '/images/city1.webp')); ?>" alt="Image 1" />
                </div>
                <div class="image">
                    <img src="<?php echo esc_url(get_theme_mod('about_image_2', get_template_directory_uri() . '/images/city2.webp')); ?>" alt="Image 2" />
                </div>
            </div>
            <div class="column-large">
                <img src="<?php echo esc_url(get_theme_mod('about_image_3', get_template_directory_uri() . '/images/city3.webp')); ?>" alt="Image 3" />
            </div>
        </div>
    </div>
</section>