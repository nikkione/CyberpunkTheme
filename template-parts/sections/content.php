<?php

/**
 * The content section
 */
?>

<section class="about" id="about">
    <div class="about__content container">
        <div class="about__text">
            <h2 class="title"><?php the_title(); ?></h2>
            <div class="description"><?php the_content(); ?></div>
        </div>
    </div>
</section>