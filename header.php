<?php

/**
 * The header for our theme
 */

?>
<!DOCTYPE html>
<html <?php language_attributes(); ?>>

<head>
    <meta charset="<?php bloginfo('charset'); ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php wp_title('|', true, 'right');
            bloginfo('name'); ?></title>
    <link rel="profile" href="https://gmpg.org/xfn/11">
    <?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
    <?php wp_body_open(); ?>

    <header class="header">
        <div class="header__container container">
            <?php
            if (function_exists('the_custom_logo')) {
                the_custom_logo();
            } else {
            ?>
                <img
                    src="<?php echo get_template_directory_uri(); ?>/images/Cyberpunk_2077_logo.webp"
                    alt="Cyberpunk 2077 Logo"
                    class="logo" />
            <?php
            }
            ?>
            <div class="header__social-icons">
                <?php
                $social_links = array(
                    'youtube' => array(
                        'label' => 'YouTube',
                        'icon' => get_template_directory_uri() . '/images/youtube.svg',
                        'url' => get_theme_mod('youtube_link', '#'),
                    ),
                    'vk' => array(
                        'label' => 'VK',
                        'icon' => get_template_directory_uri() . '/images/vk.svg',
                        'url' => get_theme_mod('vk_link', '#'),
                    ),
                    'facebook' => array(
                        'label' => 'Facebook',
                        'icon' => get_template_directory_uri() . '/images/fb.svg',
                        'url' => get_theme_mod('facebook_link', '#'),
                    ),
                    'twitter' => array(
                        'label' => 'Twitter',
                        'icon' => get_template_directory_uri() . '/images/twit.svg',
                        'url' => get_theme_mod('twitter_link', '#'),
                    ),
                    'twitch' => array(
                        'label' => 'Twitch',
                        'icon' => get_template_directory_uri() . '/images/twitch.svg',
                        'url' => get_theme_mod('twitch_link', '#'),
                    ),
                    'instagram' => array(
                        'label' => 'Instagram',
                        'icon' => get_template_directory_uri() . '/images/inst.svg',
                        'url' => get_theme_mod('instagram_link', '#'),
                    ),
                );

                foreach ($social_links as $social => $data) : ?>
                    <a href="<?php echo esc_url($data['url']); ?>" class="icon <?php echo esc_attr($social); ?>" aria-label="<?php echo esc_attr($data['label']); ?>" target="_blank">
                        <img src="<?php echo esc_url($data['icon']); ?>" alt="<?php echo esc_attr($data['label']); ?> Icon" width="30" height="30" />
                    </a>
                <?php endforeach; ?>
            </div>
        </div>
    </header>