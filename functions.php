<?php

// Theme setup
function cyberpunk_theme_setup()
{
  load_theme_textdomain('cyberpunk-theme', get_template_directory() . '/languages');
  add_theme_support('title-tag');
  add_theme_support('post-thumbnails');
  add_theme_support('custom-logo', array(
    'height'      => 74,
    'width'       => 296,
    'flex-height' => true,
    'flex-width'  => true,
  ));
}
add_action('after_setup_theme', 'cyberpunk_theme_setup');

// Enqueue styles and scripts
function cyberpunk_theme_scripts()
{
  // Styles
  wp_enqueue_style('swiper-css', 'https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.css', [], null);
  wp_enqueue_style('main-style', get_template_directory_uri() . '/css/main.min.css', [], null);

  // Scripts
  wp_enqueue_script('swiper-js', 'https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.js', [], null, true);
  wp_enqueue_script('main-script', get_template_directory_uri() . '/script.min.js', ['swiper-js'], null, true);
}
add_action('wp_enqueue_scripts', 'cyberpunk_theme_scripts');

// CPT for Slider
function cyberpunk_custom_post_types()
{
  register_post_type('slide', array(
    'labels' => array(
      'name' => 'Slides',
      'singular_name' => 'Slide',
    ),
    'public' => true,
    'supports' => array('title', 'thumbnail', 'editor'),
  ));
}
add_action('init', 'cyberpunk_custom_post_types');


// Function to add meta tags
function cyberpunk_add_meta_tags()
{
  echo '<meta name="format-detection" content="telephone=no" />';
  echo '<meta name="keywords" content="Cyberpunk, игры, консоли, игровой мир" />';
}
add_action('wp_head', 'cyberpunk_add_meta_tags');



// Customizer Helper Function
function cyberpunk_add_customizer_text_control($wp_customize, $section, $setting_id, $label, $default = '', $type = 'text')
{
  $wp_customize->add_setting($setting_id, array(
    'default' => $default,
    'sanitize_callback' => $type === 'textarea' ? 'sanitize_textarea_field' : 'sanitize_text_field',
  ));
  $wp_customize->add_control($setting_id, array(
    'label' => $label,
    'section' => $section,
    'type' => $type,
  ));
}

// Customizer Settings
function cyberpunk_customize_register($wp_customize)
{

  // Hero Section
  $wp_customize->add_section('hero_section', array(
    'title' => __('Слайдер на главной', 'cyberpunk-theme'),
    'priority' => 30,
  ));
  cyberpunk_add_customizer_text_control($wp_customize, 'hero_section', 'hero_title', __('Текст на плашке', 'cyberpunk-theme'), __('Доступно на всех платформах', 'cyberpunk-theme'));
  cyberpunk_add_customizer_text_control($wp_customize, 'hero_section', 'hero_button_text', __('Текст кнопки', 'cyberpunk-theme'), __('Узнать больше', 'cyberpunk-theme'));

  // About Section with Image Controls
  $wp_customize->add_section('about_section', array(
    'title' => 'Изображения Найт-Сити',
    'priority' => 31,
  ));
  for ($i = 1; $i <= 3; $i++) {
    $wp_customize->add_setting("about_image_$i", array(
      'default' => '',
      'sanitize_callback' => 'esc_url_raw',
    ));
    $wp_customize->add_control(new WP_Customize_Image_Control($wp_customize, "about_image_$i", array(
      'label' => "Изображение $i",
      'section' => 'about_section',
    )));
  }

  // Action Section
  $wp_customize->add_section('action_section', array(
    'title' => __('Акция', 'cyberpunk'),
    'priority' => 32,
  ));
  cyberpunk_add_customizer_text_control($wp_customize, 'action_section', 'action_title', __('Заголовок', 'cyberpunk'), __('Играй и выигрывай!', 'cyberpunk'));
  cyberpunk_add_customizer_text_control($wp_customize, 'action_section', 'action_description', __('Описание', 'cyberpunk'), __('Играй в <a href="#">Cyberpunk 2077</a> и получи возможность
    выиграть консоль <a href="#">Xbox Series X</a> или
    <a href="#">Sony PlayStation 5</a>! Заполни форму ниже и приложи
    скриншот о покупке игры. Итоги розыгрыша будут подведены 1
    февраля. Удачи! ;)', 'cyberpunk'), 'textarea');
  cyberpunk_add_customizer_text_control($wp_customize, 'action_section', 'action_form_shortcode', __('Contact Form Shortcode', 'cyberpunk'), '[contact-form-7 id="4166388" title="Contact form 1"]');

  // Advantages Section
  $wp_customize->add_section('advantages_section', array(
    'title' => __('Преимущества', 'cyberpunk-theme'),
    'priority' => 40,
  ));
  cyberpunk_add_customizer_text_control($wp_customize, 'advantages_section', 'advantages_title', __('Заголовок', 'cyberpunk-theme'), __('Полное погружение вместе с HP', 'cyberpunk-theme'));
  cyberpunk_add_customizer_text_control($wp_customize, 'advantages_section', 'advantages_text', __('Текст', 'cyberpunk-theme'), __('Погрузись в современные экшен-игры с реалистичным изображением с
    помощью монитора с диагональю 23,8 дюйма, созданном для отображения
    максимально насыщенных цветов. Успевай реагировать на любые события
    с временем отклика 1 мс и частотой в 144 Гц!', 'cyberpunk-theme'), 'textarea');
  cyberpunk_add_customizer_text_control($wp_customize, 'advantages_section', 'advantages_button_text', __('Button Text', 'cyberpunk-theme'), __('Подробнее', 'cyberpunk-theme'));
  $wp_customize->add_setting('advantages_button_url', array(
    'default' => '#',
    'sanitize_callback' => 'esc_url_raw',
  ));
  $wp_customize->add_control('advantages_button_url', array(
    'label' => __('Button URL', 'cyberpunk-theme'),
    'section' => 'advantages_section',
    'type' => 'url',
  ));


  // Buy Section in Customizer
  $wp_customize->add_section('buy_section', array(
    'title' => __('Покупка', 'cyberpunk-theme'),
    'priority' => 140,
  ));

  // Title Setting
  $wp_customize->add_setting('buy_title', array(
    'default' => __('Купить игру Cyberpunk 2077', 'cyberpunk-theme'),
    'sanitize_callback' => 'sanitize_text_field',
  ));
  $wp_customize->add_control('buy_title', array(
    'label' => __('Заголовок', 'cyberpunk-theme'),
    'section' => 'buy_section',
    'type' => 'text',
  ));

  // Subtitle Setting
  $wp_customize->add_setting('buy_subtitle', array(
    'default' => __('В комплект входит:', 'cyberpunk-theme'),
    'sanitize_callback' => 'sanitize_text_field',
  ));
  $wp_customize->add_control('buy_subtitle', array(
    'label' => __('Подзаголовок', 'cyberpunk-theme'),
    'section' => 'buy_section',
    'type' => 'text',
  ));

  // Buy List Items Settings
  for ($i = 1; $i <= 3; $i++) {
    $wp_customize->add_setting("buy_item_$i", array(
      'default' => '',
      'sanitize_callback' => 'sanitize_text_field',
    ));
    $wp_customize->add_control("buy_item_$i", array(
      'label' => __('Текст элемента ', 'cyberpunk-theme') . $i,
      'section' => 'buy_section',
      'type' => 'text',
    ));
  }

  // Platforms Section (Image URLs)
  for ($i = 1; $i <= 4; $i++) {
    $wp_customize->add_setting("buy_platform_$i", array(
      'default' => '',
      'sanitize_callback' => 'esc_url_raw',
    ));
    $wp_customize->add_control(new WP_Customize_Image_Control($wp_customize, "buy_platform_$i", array(
      'label' => __('Платформа ', 'cyberpunk-theme') . $i,
      'section' => 'buy_section',
      'settings' => "buy_platform_$i",
    )));
  }

  // Buy Section in Customizer
  $wp_customize->add_section('buy_section', array(
    'title' => __('Покупка', 'cyberpunk-theme'),
    'priority' => 140,
  ));

  // Title Setting
  $wp_customize->add_setting('buy_title', array(
    'default' => __('Купить игру Cyberpunk 2077', 'cyberpunk-theme'),
    'sanitize_callback' => 'sanitize_text_field',
  ));
  $wp_customize->add_control('buy_title', array(
    'label' => __('Заголовок', 'cyberpunk-theme'),
    'section' => 'buy_section',
    'type' => 'text',
  ));

  // Subtitle Setting
  $wp_customize->add_setting('buy_subtitle', array(
    'default' => __('В комплект входит:', 'cyberpunk-theme'),
    'sanitize_callback' => 'sanitize_text_field',
  ));
  $wp_customize->add_control('buy_subtitle', array(
    'label' => __('Подзаголовок', 'cyberpunk-theme'),
    'section' => 'buy_section',
    'type' => 'text',
  ));

  // Buy List Item Texts
  $wp_customize->add_setting('buy_item_1', array(
    'default' => 'Футляр с игровыми дисками',
    'sanitize_callback' => 'sanitize_text_field',
  ));
  $wp_customize->add_control('buy_item_1', array(
    'label' => __('Элемент 1', 'cyberpunk-theme'),
    'section' => 'buy_section',
    'type' => 'text',
  ));

  $wp_customize->add_setting('buy_item_2', array(
    'default' => 'Футляр с кодом для загрузки игры и дисками (pc)',
    'sanitize_callback' => 'sanitize_text_field',
  ));
  $wp_customize->add_control('buy_item_2', array(
    'label' => __('Элемент 2', 'cyberpunk-theme'),
    'section' => 'buy_section',
    'type' => 'text',
  ));

  $wp_customize->add_setting('buy_item_3', array(
    'default' => 'Справочник с информацией об игровом мире',
    'sanitize_callback' => 'sanitize_text_field',
  ));
  $wp_customize->add_control('buy_item_3', array(
    'label' => __('Элемент 3', 'cyberpunk-theme'),
    'section' => 'buy_section',
    'type' => 'text',
  ));

  // Platforms Section (Image URLs)
  for ($i = 1; $i <= 4; $i++) {
    $wp_customize->add_setting("buy_platform_$i", array(
      'default' => '',
      'sanitize_callback' => 'esc_url_raw',
    ));
    $wp_customize->add_control(new WP_Customize_Image_Control($wp_customize, "buy_platform_$i", array(
      'label' => __('Платформа ', 'cyberpunk-theme') . $i,
      'section' => 'buy_section',
      'settings' => "buy_platform_$i",
    )));
  }


  // Footer Section
  $wp_customize->add_section('cyberpunk_footer', array(
    'title' => __('Настройки Футера', 'cyberpunk-theme'),
    'priority' => 50,
  ));
  cyberpunk_add_customizer_text_control($wp_customize, 'cyberpunk_footer', 'cyberpunk_footer_text', __('Текст в футере', 'cyberpunk-theme'), __('CD PROJEKT®, Cyberpunk®, Cyberpunk 2077®', 'cyberpunk-theme'));
}
add_action('customize_register', 'cyberpunk_customize_register');


function cyberpunk_customize_social_links($wp_customize)
{
  // Social Links Section
  $wp_customize->add_section('social_links_section', array(
    'title' => __('Социальные сети', 'cyberpunk-theme'),
    'priority' => 35,
  ));

  // Define Social Networks
  $social_networks = array('youtube', 'vk', 'facebook', 'twitter', 'twitch', 'instagram');
  foreach ($social_networks as $network) {
    $wp_customize->add_setting("{$network}_link", array(
      'default' => '#',
      'sanitize_callback' => 'esc_url_raw',
    ));

    $wp_customize->add_control("{$network}_link", array(
      'label' => ucfirst($network) . ' ' . __('Ссылка', 'cyberpunk-theme'),
      'section' => 'social_links_section',
      'type' => 'url',
    ));
  }
}
add_action('customize_register', 'cyberpunk_customize_social_links');
