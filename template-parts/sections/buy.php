<?php

/**
 * The buy section
 */
?>

<section class="buy">
    <div class="buy__container">
        <div class="buy__background"></div>
        <div class="buy__content container">
            <h2 class="title"><?php echo esc_html(get_theme_mod('buy_title', 'Купить игру Cyberpunk 2077')); ?></h2>
            <h3 class="subtitle"><?php echo esc_html(get_theme_mod('buy_subtitle', 'В комплект входит:')); ?></h3>
            <div class="buy__list">

                <div class="icon-block">
                    <img src="<?php echo get_template_directory_uri(); ?>/img/disk.svg" alt="Image" class="icon" />
                    <div class="text"><?php echo esc_html(get_theme_mod('buy_item_1', 'Футляр с игровыми дисками')); ?></div>
                </div>

                <div class="icon-block">
                    <img src="<?php echo get_template_directory_uri(); ?>/img/wysiwyg.svg" alt="Image" class="icon" />
                    <div class="text"><?php echo esc_html(get_theme_mod('buy_item_2', 'Футляр с кодом для загрузки игры и дисками (pc)')); ?></div>
                </div>

                <div class="icon-block">
                    <img src="<?php echo get_template_directory_uri(); ?>/img/collections.svg" alt="Image" class="icon" />
                    <div class="text"><?php echo esc_html(get_theme_mod('buy_item_3', 'Справочник с информацией об игровом мире')); ?></div>
                </div>
            </div>
            <h3 class="subtitle"><?php echo esc_html__('Выберите платформу:', 'cyberpunk-theme'); ?></h3>
            <div class="buy__platforms">
                <?php for ($i = 1; $i <= 4; $i++): ?>
                    <?php
                    $platform_img = get_theme_mod("buy_platform_$i", get_template_directory_uri() . "/images/buy{$i}.webp");
                    ?>
                    <img src="<?php echo esc_url($platform_img); ?>" alt="<?php echo esc_attr__('Platform ', 'cyberpunk-theme') . $i; ?>" />
                <?php endfor; ?>
            </div>
        </div>
    </div>
</section>