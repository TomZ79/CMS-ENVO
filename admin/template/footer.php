<?php if ($JAK_PROVED) { ?>
	<!-- END PLACE PAGE CONTENT HERE -->
	</div><!-- END CONTAINER FLUID -->
	</div><!-- END PAGE CONTENT -->
	<!-- START FOOTER -->
	<div class="container-fluid container-fixed-lg footer">
		<div class="copyright sm-text-center">
			<p class="small no-margin pull-left sm-pull-reset">
				<span class="hint-text"><?php echo $tl["hf_text"]["hftxt1"]; ?> - <?php echo date ('Y'); ?> by </span>
				<span><strong><a href="http://www.bluesat.cz" target="_blank">BLUESAT</a></strong></span>.
				<span class="hint-text">All rights reserved.</span>
			</p>
			<p class="small no-margin pull-right sm-pull-reset">
				<?php echo sprintf ($tl["hf_text"]["hftxt"], $jkv["version"]); ?>
				<span class="hint-text">&amp; Made with Love</span>
			</p>
			<div class="clearfix"></div>
		</div>
	</div><!-- END FOOTER -->
	</div><!-- END PAGE CONTENT WRAPPER -->
	</div><!-- END PAGE CONTAINER -->
	<!-- START OVERLAY -->
	<div class="overlay" style="display: none" data-pages="search">
		<!-- BEGIN Overlay Content !-->
		<div class="overlay-content has-results m-t-20">
			<!-- BEGIN Overlay Header !-->
			<div class="container-fluid">
				<!-- BEGIN Overlay Logo !-->
				<img class="overlay-brand" src="assets/img/logo.png" alt="logo" data-src="assets/img/logo.png" data-src-retina="assets/img/logo_2x.png" width="78" height="22">
				<!-- END Overlay Logo !-->
				<!-- BEGIN Overlay Close !-->
				<a href="#" class="close-icon-light overlay-close text-black fs-16">
					<i class="pg-close"></i>
				</a>
				<!-- END Overlay Close !-->
			</div>
			<!-- END Overlay Header !-->
			<div class="container-fluid">
				<!-- BEGIN Overlay Controls !-->
				<input id="overlay-search" class="no-border overlay-search bg-transparent" placeholder="Search..." autocomplete="off" spellcheck="false">
				<br>
				<div class="inline-block">
					<div class="checkbox right">
						<input id="checkboxn" type="checkbox" value="1" checked="checked">
						<label for="checkboxn"><i class="fa fa-search"></i> Search within page</label>
					</div>
				</div>
				<div class="inline-block m-l-10">
					<p class="fs-13">Press enter to search</p>
				</div>
				<!-- END Overlay Controls !-->
			</div>
			<!-- BEGIN Overlay Search Results, This part is for demo purpose, you can add anything you like !-->
			<div class="container-fluid">
          <span>
                <strong>suggestions :</strong>
            </span>
				<span id="overlay-suggestions"></span>
				<br>
				<div class="search-results m-t-40">
					<p class="bold">Pages Search Results</p>
					<div class="row">
						<div class="col-md-6">
							<!-- BEGIN Search Result Item !-->
							<div class="">
								<!-- BEGIN Search Result Item Thumbnail !-->
								<div class="thumbnail-wrapper d48 circular bg-success text-white inline m-t-10">
									<div>
										<img width="50" height="50" src="assets/img/profiles/avatar.jpg" data-src="assets/img/profiles/avatar.jpg" data-src-retina="assets/img/profiles/avatar2x.jpg" alt="">
									</div>
								</div>
								<!-- END Search Result Item Thumbnail !-->
								<div class="p-l-10 inline p-t-5">
									<h5 class="m-b-5"><span class="semi-bold result-name">ice cream</span> on pages</h5>
									<p class="hint-text">via john smith</p>
								</div>
							</div>
							<!-- END Search Result Item !-->
							<!-- BEGIN Search Result Item !-->
							<div class="">
								<!-- BEGIN Search Result Item Thumbnail !-->
								<div class="thumbnail-wrapper d48 circular bg-success text-white inline m-t-10">
									<div>T</div>
								</div>
								<!-- END Search Result Item Thumbnail !-->
								<div class="p-l-10 inline p-t-5">
									<h5 class="m-b-5"><span class="semi-bold result-name">ice cream</span> related topics</h5>
									<p class="hint-text">via pages</p>
								</div>
							</div>
							<!-- END Search Result Item !-->
							<!-- BEGIN Search Result Item !-->
							<div class="">
								<!-- BEGIN Search Result Item Thumbnail !-->
								<div class="thumbnail-wrapper d48 circular bg-success text-white inline m-t-10">
									<div><i class="fa fa-headphones large-text "></i>
									</div>
								</div>
								<!-- END Search Result Item Thumbnail !-->
								<div class="p-l-10 inline p-t-5">
									<h5 class="m-b-5"><span class="semi-bold result-name">ice cream</span> music</h5>
									<p class="hint-text">via pagesmix</p>
								</div>
							</div>
							<!-- END Search Result Item !-->
						</div>
						<div class="col-md-6">
							<!-- BEGIN Search Result Item !-->
							<div class="">
								<!-- BEGIN Search Result Item Thumbnail !-->
								<div class="thumbnail-wrapper d48 circular bg-info text-white inline m-t-10">
									<div><i class="fa fa-facebook large-text "></i>
									</div>
								</div>
								<!-- END Search Result Item Thumbnail !-->
								<div class="p-l-10 inline p-t-5">
									<h5 class="m-b-5"><span class="semi-bold result-name">ice cream</span> on facebook</h5>
									<p class="hint-text">via facebook</p>
								</div>
							</div>
							<!-- END Search Result Item !-->
							<!-- BEGIN Search Result Item !-->
							<div class="">
								<!-- BEGIN Search Result Item Thumbnail !-->
								<div class="thumbnail-wrapper d48 circular bg-complete text-white inline m-t-10">
									<div><i class="fa fa-twitter large-text "></i>
									</div>
								</div>
								<!-- END Search Result Item Thumbnail !-->
								<div class="p-l-10 inline p-t-5">
									<h5 class="m-b-5">Tweats on<span class="semi-bold result-name"> ice cream</span></h5>
									<p class="hint-text">via twitter</p>
								</div>
							</div>
							<!-- END Search Result Item !-->
							<!-- BEGIN Search Result Item !-->
							<div class="">
								<!-- BEGIN Search Result Item Thumbnail !-->
								<div class="thumbnail-wrapper d48 circular text-white bg-danger inline m-t-10">
									<div><i class="fa fa-google-plus large-text "></i>
									</div>
								</div>
								<!-- END Search Result Item Thumbnail !-->
								<div class="p-l-10 inline p-t-5">
									<h5 class="m-b-5">Circles on<span class="semi-bold result-name"> ice cream</span></h5>
									<p class="hint-text">via google plus</p>
								</div>
							</div>
							<!-- END Search Result Item !-->
						</div>
					</div>
				</div>
			</div>
			<!-- END Overlay Search Results !-->
		</div>
		<!-- END Overlay Content !-->
	</div><!-- END OVERLAY -->

<?php } else { ?>

<?php } ?>

<!-- BEGIN VENDOR JS -->
<script src="assets/plugins/pace/pace.min.js" type="text/javascript"></script>
<script src="http://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js" type="text/javascript"></script>
<script src="assets/plugins/modernizr.custom.js" type="text/javascript"></script>
<script src='//cdnjs.cloudflare.com/ajax/libs/jqueryui/1.11.2/jquery-ui.min.js'></script>
<script src="assets/plugins/bootstrapv3/js/bootstrap.min.js" type="text/javascript"></script>
<script src="assets/plugins/bootstrap-notify/bootstrap-notify.js" type="text/javascript"></script>
<script src="assets/plugins/bootstrap-bootboxjs/bootbox.min.js" type="text/javascript"></script>
<script src="assets/plugins/bootstrap-select/js/bootstrap-select.min.js" type="text/javascript"></script>
<script src="assets/plugins/bootstrap-select/js/i18n/defaults-cs_CZ.min.js" type="text/javascript"></script>
<script src="assets/plugins/jquery/jquery-easy.js" type="text/javascript"></script>
<script src="assets/plugins/jquery-unveil/jquery.unveil.min.js" type="text/javascript"></script>
<script src="assets/plugins/jquery-bez/jquery.bez.min.js"></script>
<script src="assets/plugins/jquery-ios-list/jquery.ioslist.min.js" type="text/javascript"></script>
<script src="assets/plugins/imagesloaded/imagesloaded.pkgd.min.js"></script>
<script src="assets/plugins/jquery-actual/jquery.actual.min.js"></script>
<script src="assets/plugins/jquery-scrollbar/jquery.scrollbar.min.js"></script>
<!-- Prism -->
<script src="assets/plugins/prism/preCode.js"></script>
<script src="assets/plugins/prism/prism.js"></script>
<!-- Validadion -->
<script src="assets/plugins/jquery-validation/js/jquery.validate.min.js" type="text/javascript"></script>
<?php if ($site_language = 'cs') { ?>
	<script src="assets/plugins/jquery-validation/js/localization/messages_cs.js" type="text/javascript"></script>
<?php } ?>
<!-- BEGIN JS FUNCTION -->
<script src="../assets/js/functions.js?=<?php echo $jkv["updatetime"]; ?>" type="text/javascript"></script>
<script type="text/javascript">
	jakWeb.jak_url_orig = "<?php echo BASE_URL_ORIG;?>";
	jakWeb.jak_url = "<?php echo BASE_URL_ADMIN;?>";
	jakWeb.jak_path = "<?php echo BASE_PATH_ORIG;?>";
	jakWeb.jak_lang = "<?php echo $site_language;?>";
	jakWeb.jak_template = "<?php echo $jkv["sitestyle"];?>";
</script>
<!-- BEGIN CORE TEMPLATE JS -->
<script src="pages/js/pages.js" type="text/javascript"></script>
<!-- BEGIN PAGE LEVEL JS -->
<script src="assets/js/scripts.js" type="text/javascript"></script>
<!-- BEGIN JS FOR GENERAL PAGE and PLUGINS -->
<?php
$notify =
	'<script type="text/javascript">' .
	'$.notify({' .
	'  message: "Soubor <strong>%s\</strong> neexistuje.<br>Kontaktujte vývojáře CMS !!!",' .
	'}, {' .
	' type: "danger",' .
	' delay: 5000,' .
	' template: "<div data-notify=\"container\" role=\"alert\" class=\"col-xs-11 col-sm-2 col-md-5 alert alert-{0}\">\
                <button type=\"button\" class=\"close\" data-notify=\"dismiss\">\
                  <span aria-hidden=\"true\">×</span>\
                  <span class=\"sr-only\">Close</span>\
                </button>\
                <span data-notify=\"message\" style=\"padding-right:15px\">{2}</span>\
                <a href=\"{3}\" target=\"{4}\" data-notify=\"url\"></a>\
               </div>",' .
	'});' .
	'</script>';

if (!empty($page)) {
	$ap = array ("logs", "searchlog", "changelog", "site", "setting", "plugins", "template", "maintenance", "facebookgallery", "settingfacebook", "mediasharing", "user", "usergroup", "categories", "page", "contactform", "sitemap", "searchsetting", "news", "tags");
	// Init debug mode - debug to console.log
	$debug = new PHPDebug();

	if (in_array ($page, $ap)) {
		$jscodefile = 'pages/js/pages.' . $page . '.php';
		if (file_exists ($jscodefile)) {
			include_once ($jscodefile);
		} else {
			echo sprintf ($notify, $jscodefile);
		}
		$debug->debug ("JS Script path for this plugin or page: " . $jscodefile, NULL, INFO);
	} elseif (!in_array ($page, $ap) && !empty($page) && ($page != '404')) {
		$jscodefile = '../plugins/' . str_replace ('-', '_', $page) . '/admin/js/pages.' . $page . '.php';
		if (file_exists ($jscodefile)) {
			include_once ($jscodefile);
		} else {
			echo sprintf ($notify, $jscodefile);
		}
		$debug->debug ("JS Script path for this plugin or page: " . $jscodefile, NULL, INFO);
	}

} elseif (empty($page) && !JAK_USERID) {
	include_once 'pages/js/pages.login.php';
} else {
	include_once 'pages/js/pages.index.php';
}
?>
<!-- BEGIN NOTIFY CONFIG JS -->
<?php if (isset($_SESSION["loginmsg"])) { ?>
	<script type="text/javascript">
		$.notify({
			// Options
			title: 'Welcome back, <?php echo $JAK_WELCOME_NAME; ?>!',
			message: '<?php echo $_SESSION["loginmsg"];?>',
		}, {
			// Settings
			timer: 8000,
			template: '<div data-notify="container" class="col-xs-11 col-sm-3 alert" role="alert" style="background-color: #263238;color: #fff">' +
			'<button type="button" aria-hidden="true" class="close" data-notify="dismiss" style="color: #fff;opacity: 0.8;">×</button>' +
			'<div style="float: left;margin-right: 20px;"><img src="<?php echo BASE_URL_ORIG . basename (JAK_FILES_DIRECTORY) . "/userfiles/" . $jakuser->getVar ("picture"); ?>" alt="" style="width: 40px;"></div>' +
			'<span data-notify="title" style="display: block;font-weight: bold;">{1}</span> ' +
			'<span data-notify="message">{2}</span>' +
			'</div>' +
			'</div>'
		});
	</script>
<?php }
if (isset($_SESSION["infomsg"])) { ?>
	<script type="text/javascript">$.notify({
			icon: 'fa fa-info-circle',
			message: '<?php echo $_SESSION["infomsg"];?>'
		}, {type: 'info'});</script>
<?php }
if (isset($_SESSION["successmsg"])) { ?>
	<script type="text/javascript">$.notify({
			icon: 'fa fa-check-square-o',
			message: '<?php echo $_SESSION["successmsg"];?>'
		}, {type: 'success'});</script>
<?php }
if (isset($_SESSION["errormsg"])) { ?>
	<script type="text/javascript">$.notify({
			icon: 'fa fa-exclamation-triangle',
			message: '<?php echo $_SESSION["errormsg"];?>'
		}, {type: 'danger'});</script>
<?php }
if (!isset($jkv["cms_tpl"])) { ?>
	<script type="text/javascript">
		// Notification
		$.notify({
			// options
			icon: 'fa fa-exclamation-triangle fa-lg',
			message: '<?php echo $tl["general_error"]["generror6"];?>',
		}, {
			// settings
			type: 'danger',
			delay: 0,
			template:
			'<div data-notify="container" class="col-xs-11 col-sm-5 alert alert-{0}" role="alert">' +
			'<button type="button" aria-hidden="true" class="close" data-notify="dismiss">×</button>' +
			'<span data-notify="icon"></span> ' +
			'<span data-notify="message">{2}</span>' +
			'</div>'
		});</script>
<?php } ?>
<!-- BEGIN TINYMCE EDITOR -->
<?php if ($JAK_PROVED && (!$jkv["adv_editor"])) { ?>
	<script type="text/javascript" src="../assets/plugins/tinymce/tinymce.min.js?=v4.5.2"></script>
	<?php include_once ('pages/js/tiny.editor.php');
} ?>
<!-- BEGIN HOOKS - FOOTER -->
<?php if (isset($JAK_HOOK_FOOTER_ADMIN) && is_array ($JAK_HOOK_FOOTER_ADMIN)) foreach ($JAK_HOOK_FOOTER_ADMIN as $foota) {
	// Import all hooks for footer just before /body
	include_once APP_PATH . $foota["phpcode"];
} ?>

<!-- MODAL DIALOG -->
<div class="modal fade fill-in" id="JAKModal" tabindex="-1" role="dialog" aria-labelledby="JAKModalLabel" aria-hidden="true">
	<button type="button" class="close" data-dismiss="modal" aria-hidden="true">
		<i class="pg-close"></i>
	</button>
	<div class="modal-dialog">
		<div class="modal-content">
			<div class="modal-header"></div>
			<div class="modal-body">
				<div class="row">
					<div class="col-md-12">
						<div class="body-content" style="display: flex;flex-direction: column;min-height: 80vh;"></div>
					</div>
				</div>
			</div>
			<div class="modal-footer"></div>
		</div>
	</div>
</div>

</body>
</html>
