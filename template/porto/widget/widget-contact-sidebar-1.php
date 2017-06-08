<?php
/**
 * How to install
 * -------------------
 * Create new hook in CMS:
 *
 * Hook name: Your custom name
 * Hook Location: tpl_sidebar
 *
 * and add PHP code:
 *
 * include 'template/porto/widget/widget-contact-sidebar-1.php';
 *
 */
?>

<div class="hidden-xs">
	<h4 class="pt-xl mb-md text-color-dark">Rychlý kontakt</h4>
	<p>Kontaktujte nás nebo nám zavolejte, abychom Vám mohli pomoci.</p>

	<form id="contactFormSidebar" action="/template/porto/php/contact-form-sidebar.php" method="POST" class="mb-xlg">
		<div class="row">
			<div class="form-group">
				<div class="col-md-12">
					<label>Jméno a Příjmení <span class="text-color-secondary ml-sm">*</span></label>
					<input type="text" value="" maxlength="100" class="form-control" name="name" id="name" data-msg-required="Zadejte celé jméno" required>
				</div>
			</div>
		</div>
		<div class="row">
			<div class="form-group">
				<div class="col-md-12">
					<label>Emailová adresa <span class="text-color-secondary ml-sm">*</span></label>
					<input type="email" value="" maxlength="100" class="form-control" name="email" id="email" data-msg-required="Zadejte Váš email" data-msg-email="Zadejte validní email" required>
				</div>
			</div>
		</div>
		<div class="row">
			<div class="form-group">
				<div class="col-md-12">
					<label for="phone">Telefonní číslo <span class="text-color-secondary ml-sm">*</span></label>
					<input value="" maxlength="100" class="form-control" name="phone" id="phone" type="text" data-msg-required="Zadejte Vaše telefonní číslo" required>
				</div>
			</div>
		</div>
		<div class="row">
			<div class="form-group">
				<div class="col-md-12">
					<label>Zpráva <span class="text-color-secondary ml-sm">*</span></label>
					<textarea maxlength="5000" rows="10" class="form-control" name="message" id="message" data-msg-required="Zadejte zprávu" required></textarea>
				</div>
			</div>
		</div>
		<div class="row">
			<div class="col-md-12">
				<input type="submit" value="Odeslat zprávu" class="btn btn-primary mb-xl" data-loading-text="Odesílání...">

				<div class="alert alert-success hidden" id="contactSuccess">
					<strong>Děkujeme!</strong> Vaše zpráva nám byla úspěšně odeslána. Budeme Vás kontaktovat co nejdříve.
				</div>

				<div class="alert alert-danger hidden" id="contactError">
					<strong>Chyba!</strong> Při odesílání došlo k chybě.
				</div>
			</div>
		</div>
	</form>
</div>
