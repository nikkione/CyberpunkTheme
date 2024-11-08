<?php

/**
 * The footer for our theme
 */

?>
<footer class="footer">
    <div class="footer__top container">
        <div class="footer__logo">
            <img src="<?php echo get_template_directory_uri(); ?>/images/Cyberpunk_2077_logo.webp" alt="Cyberpunk 2077" />
            <img src="<?php echo get_template_directory_uri(); ?>/images/CD_Projekt_logo.webp" alt="CD Projekt Red" />
        </div>
        <div class="footer__link">
            <a href="#">Лицензия</a>
            <a href="#">Политика конфиденциальности</a>
        </div>
    </div>
    <div class="footer__bottom">
        <?php echo esc_html(get_theme_mod('cyberpunk_footer_text', 'CD PROJEKT®, Cyberpunk®, Cyberpunk 2077®')); ?>
    </div>
</footer>
<?php wp_footer(); ?>
</body>

</html>