<?php

/**
 * The advantages section
 */
?>

<section class="advantages">
    <div class="advantages__container container">
        <div class="advantages__images">
            <div class="advantages__main-image">
                <img src="<?php echo get_template_directory_uri(); ?>/images/monitor_hp.webp" alt="HP Monitor" />
            </div>
            <div class="advantages__logos">
                <div class="logo">
                    <img src="<?php echo get_template_directory_uri(); ?>/images/hp-2.webp" alt="HP logo" />
                </div>
                <div class="logo">
                    <img src="<?php echo get_template_directory_uri(); ?>/images/cross.webp" alt="cross logo" />
                </div>
                <div class="logo">
                    <img src="<?php echo get_template_directory_uri(); ?>/images/Cyberpunk_2077_logo.webp" alt="cross logo" />
                </div>
            </div>
        </div>
        <div class="advantages__content">
            <h2 class="title"><?php echo esc_html(get_theme_mod('advantages_title', 'Полное погружение вместе с HP')); ?></h2>
            <p><?php echo esc_html(get_theme_mod('advantages_text', 'Погрузись в современные экшен-игры с реалистичным изображением с
						помощью монитора с диагональю 23,8 дюйма, созданном для отображения
						максимально насыщенных цветов. Успевай реагировать на любые события
						с временем отклика 1 мс и частотой в 144 Гц!')); ?></p>
            <div class="advantages__list">
                <div class="icon-block">

                    <img src="<?php echo get_template_directory_uri(); ?>/img/color_lens.svg" alt="Image" class="icon" />
                    <div class="text">Яркие насыщенные цвета</div>
                </div>
                <div class="icon-block">

                    <img src="<?php echo get_template_directory_uri(); ?>/img/stars.svg" alt="Image" class="icon" />
                    <div class="text">Кристальная четкость изображения</div>
                </div>
                <div class="icon-block">

                    <img src="<?php echo get_template_directory_uri(); ?>/img/motion.svg" alt="Image" class="icon" />
                    <div class="text">Быстрые движения и плавный геймплей</div>
                </div>
            </div>
            <div class="btn">
                <a href="<?php echo esc_url(get_theme_mod('advantages_button_url', '#')); ?>" class="button">
                    <?php echo esc_html(get_theme_mod('advantages_button_text', 'Подробнее')); ?>
                </a>
            </div>
        </div>
    </div>
</section>