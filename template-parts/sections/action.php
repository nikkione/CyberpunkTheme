<?php

/**
 * The action section
 */
?>

<section class="action">
	<div class="action__content container">
		<div class="grid">
			<div class="action__promo">
				<div class="action__promotion">
					<div class="promo">
						<img src="<?php echo get_template_directory_uri(); ?>/images/star.svg" alt="Акция">
					</div>
					<h2 class="title"><?php echo esc_html(get_theme_mod('action_title', 'Играй и выигрывай!')); ?></h2>
				</div>

				<p>
					<?php
					echo wp_kses_post(get_theme_mod('action_description', 'Играй в <a href="#">Cyberpunk 2077</a> и получи возможность
								выиграть консоль <a href="#">Xbox Series X</a> или
								<a href="#">Sony PlayStation 5</a>! Заполни форму ниже и приложи
								скриншот о покупке игры. Итоги розыгрыша будут подведены 1
								февраля. Удачи! ;)'));
					?>
				</p>
			</div>

			<div class="action__form">
				<?php echo do_shortcode(get_theme_mod('action_form_shortcode', '[contact-form-7 id="4166388" title="Contact form 1"]')); ?>
				<div class="consent">
					<input type="checkbox" id="consent" required />
					<label for="consent">
						<span class="checkbox-icon"></span>
						Согласен на обработку персональных данных
					</label>
				</div>
			</div>


			<div class="images-section">
				<div class="image-group">
					<img src="<?php echo get_template_directory_uri(); ?>/images/Group.webp" alt="Xbox Series X" />
				</div>
				<div class="image xbox">
					<div class="promo-mob">
						<img src="<?php echo get_template_directory_uri(); ?>/images/star_mob.svg" alt="Акция" />
					</div>
					<img src="<?php echo get_template_directory_uri(); ?>/images/xbox.webp" alt="Xbox Series X" />
				</div>
				<div class="image playstation">
					<img src="<?php echo get_template_directory_uri(); ?>/images/playst.webp" alt="Sony PlayStation 5" />
				</div>
			</div>
		</div>
	</div>
</section>