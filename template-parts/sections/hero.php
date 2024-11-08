<?php

/**
 * The hero section
 */
?>

<section class="hero swiper">
    <div class="hero__container swiper-wrapper">

        <?php
        $slides = new WP_Query(array('post_type' => 'slide'));
        if ($slides->have_posts()) :
            while ($slides->have_posts()) : $slides->the_post();

                $thumbnail_url = wp_get_attachment_image_src(get_post_thumbnail_id(), 'full')[0];
        ?>
                <div class="hero__slide swiper-slide">
                    <?php if ($thumbnail_url) : ?>
                        <img src="<?php echo esc_url($thumbnail_url); ?>" alt="<?php the_title_attribute(); ?>" class="hero__image" />
                    <?php else : ?>
                        <img src="<?php echo get_template_directory_uri(); ?>/images/default-image.webp" alt="Слайд по умолчанию" class="hero__image" />
                    <?php endif; ?>
                </div>
        <?php
            endwhile;
            wp_reset_postdata();
        endif;
        ?>

    </div>
    <div class="hero__wrapper container">
        <div class="hero__content">
            <h2 class="title"><?php echo esc_html(get_theme_mod('hero_title', 'Узнать больше')); ?></h2>
            <div class="btn">
                <a href="#about" class="button"><?php echo esc_html(get_theme_mod('hero_button_text', 'Подробнее')); ?></a>
            </div>
        </div>
    </div>
</section>