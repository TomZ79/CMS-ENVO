<?php include "header.php"; ?>

	<form method="post" class="jak_form" action="<?php echo $_SERVER['REQUEST_URI']; ?>">

		<!-- Form Content -->
		<div class="row tab-content-singel">
			<div class="col-md-12">
				<div class="box box-success">
					<div class="box-header with-border">
						<h3 class="box-title"><?php echo $tl["fb_box_title"]["fbbt"]; ?></h3>
					</div>
					<div class="box-body">
						<div class="col-md-5" style="padding-top: 15px;padding-bottom: 15px;">
							<img src="<?php echo $JAK_FORM_DATA["pathoriginal"] . $JAK_FORM_DATA["title"]; ?>" alt="" class="img-responsive" style="border: 8px solid #fff;outline: 8px solid #f9f9f9;max-height: 270px;margin: 0 auto;">
						</div>
						<div class="col-md-7">
							<div class="block">
								<div class="block-content">
									<div class="row-form">
										<div class="col-md-5">

											<?php
											// Add Html Element -> startTag (Arguments: tag, optional assoc. array)
											// Add Html Element -> endTag (Arguments: tag)
											echo $htmlE->startTag('strong') . $tl["fb_box_content"]["fbbc"] . $htmlE->endTag('strong');
											?>

										</div>
										<div class="col-md-7"><?php echo $JAK_FORM_DATA["title"]; ?></div>
									</div>
									<div class="row-form">
										<div class="col-md-5">

											<?php
											// Add Html Element -> startTag (Arguments: tag, optional assoc. array)
											// Add Html Element -> endTag (Arguments: tag)
											echo $htmlE->startTag('strong') . $tl["fb_box_content"]["fbbc1"] . $htmlE->endTag('strong');
											?>

										</div>
										<div class="col-md-7"><?php echo $JAK_FORM_DATA["pathoriginal"]; ?></div>
									</div>
									<div class="row-form">
										<div class="col-md-5">

											<?php
											// Add Html Element -> startTag (Arguments: tag, optional assoc. array)
											// Add Html Element -> endTag (Arguments: tag)
											echo $htmlE->startTag('strong') . $tl["fb_box_content"]["fbbc2"] . $htmlE->endTag('strong');
											?>

										</div>
										<div class="col-md-7"><?php echo $JAK_FORM_DATA["paththumb"]; ?></div>
									</div>
									<div class="row-form">
										<div class="col-md-5">

											<?php
											// Add Html Element -> startTag (Arguments: tag, optional assoc. array)
											// Add Html Element -> endTag (Arguments: tag)
											echo $htmlE->startTag('strong') . $tl["fb_box_content"]["fbbc3"] . $htmlE->endTag('strong');
											?>

										</div>
										<div class="col-md-7"><?php echo formatSizeUnits ($JAK_FORM_DATA["size"]); ?></div>
									</div>
									<div class="row-form">
										<div class="col-md-5">

											<?php
											// Add Html Element -> startTag (Arguments: tag, optional assoc. array)
											// Add Html Element -> endTag (Arguments: tag)
											echo $htmlE->startTag('strong') . $tl["fb_box_content"]["fbbc4"] . $htmlE->endTag('strong');
											?>

										</div>
										<div class="col-md-7"><?php echo $JAK_FORM_DATA["width"] . ' x ' . $JAK_FORM_DATA["height"]; ?></div>
									</div>
									<div class="row-form">
										<div class="col-md-5">

											<?php
											// Add Html Element -> startTag (Arguments: tag, optional assoc. array)
											// Add Html Element -> endTag (Arguments: tag)
											echo $htmlE->startTag('strong') . $tl["fb_box_content"]["fbbc5"] . $htmlE->endTag('strong');
											?>

										</div>
										<div class="col-md-7"><?php echo date ("d.m.Y - H:i", strtotime ($JAK_FORM_DATA["time"])); ?></div>
									</div>
								</div>
							</div>
						</div>
					</div>
					<div class="box-footer">
						<a href="index.php?p=facebookgallery&amp;sp=delete&amp;ssp=<?php echo $JAK_FORM_DATA["id"]; ?>" class="btn btn-danger pull-right" data-confirm="<?php echo sprintf ($tl["fb_notification"]["del"], $JAK_FORM_DATA["title"]); ?>">Delete</a>
					</div>
				</div>
			</div>
		</div>
	</form>

<?php include "footer.php"; ?>