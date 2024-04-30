<?php switch(get_locale()) {
		case 'de_DE':
			$text = "Bitte akzeptieren Sie die Nutzungsbedingungen über den Empfang von Newsletter über die BLACKMORE'S – Berlins Musikzimmer";
			$requiredField = 'E-Mail ist erforderlich';
			$success = "Sie haben sich erfolgreich für den BLACKMORE'S – Berlins Musikzimmer Newsletter angemeldet";
			$already = 'Sie haben den Newsletter bereits abonniert';
			$email_format = 'Ungültige E-Mai';
			break;
		case 'en_GB':
			$text = "Please accept to receiving newsletters about the BLACKMORE'S – Berlins Musikzimmer";
			$requiredField = 'E-Mail is required';
			$success = "You successfully signed up to BLACKMORE'S – Berlins Musikzimmer Newsletter";
			$already = 'You are already subscribed to the newsletter';
			$email_format = 'Invalid E-mail';
			break;
	}
	?>
<?php $ajax_nonce = wp_create_nonce("subscribe_sendinblue");?>


<section class="newsletter container">

	<div class="newsletter-form-wrapper">

		<h2 class="newsletter-title">
			<?php pll_e('Subscribe to our newsletter') ?>
		</h2>

		<div class="newsletter-form-container">
			<form action="#" class="newsletter-form">

				<div class="newsletter-form-inputs">
					<input type="text" name="name" placeholder="Name" class="newsletter-name">
					<input type="email" name="email" placeholder="<?php pll_e('E-mail address') ?>" class="newsletter-email">
					<input type="submit" value="<?php pll_e('Subscribe') ?>">

					<span style="display: none" class="newsletter-nonce"><?=$ajax_nonce?></span>

					<span style="display: none" class="newsletter-notification-format"><?=$email_format?></span>
					<span style="display: none" class="newsletter-notification-required"><?=$requiredField?></span>
					<span style="display: none;" class="newsletter-notification-rules"><?=$text?></span>
					<span style="display: none;" class="newsletter-notification-exists"><?=$already?></span>
				</div>
				

				<div class="newsletter-form-agree">
					<input type="checkbox" name="agree" id="agree" class="newsletter-checkbox">
					<label for="agree"><?php pll_e("I agree to receive emails about upcoming concerts at BLACKMORE'S – Berlins Musikzimmer") ?></label>
				</div>
			</form>
		</div>

	</div>


	<div class="newsletter-description">
		<p>
			<?php pll_e('newsletter_desc_1') ?>
		</p>

		<p><?php pll_e('newsletter_desc_2') ?> <?=date_i18n('F', strtotime('+1 month'))?> <?=date('Y')?></p>
	</div>


<div class="popup newsletter-loading">
<svg xmlns:svg="http://www.w3.org/2000/svg" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" version="1.0" width="40px" height="40px" viewBox="0 0 128 128" xml:space="preserve"><g><path d="M75.4 126.63a11.43 11.43 0 0 1-2.1-22.65 40.9 40.9 0 0 0 30.5-30.6 11.4 11.4 0 1 1 22.27 4.87h.02a63.77 63.77 0 0 1-47.8 48.05v-.02a11.38 11.38 0 0 1-2.93.37z" fill="#AA0025"/><animateTransform attributeName="transform" type="rotate" from="0 64 64" to="360 64 64" dur="1800ms" repeatCount="indefinite"></animateTransform></g></svg>
</div>

<div class="popup newsletter-error">
</div>
		
<div class="popup newsletter-success">
		<?=$success?>
</div> 

</section>