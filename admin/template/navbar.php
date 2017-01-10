<ul class="menu-items">
	<?php if ($JAK_MODULES) { ?>
		<!-- START DASHBOARD SECTION-->
		<li class="m-t-30">
			<a href="<?php echo BASE_URL_ADMIN; ?>">
				<span class="title"><?php echo $tl["menu"]["mm"]; ?></span>
			</a>
			<span class="icon-thumbnail <?php if ($page == '') echo 'bg-success'; ?>"><i class="pg-laptop"></i></span>
		</li><!-- END DASHBOARD SECTION -->

				 <!-- START LOGS SECTION -->
		<li class="">
			<a href="javascript:;">
				<span class="title">Logs</span>
				<span class=" arrow"></span>
			</a>
			<span class="icon-thumbnail <?php if ($page == 'logs' || $page == 'searchlog' || $page == 'changelog') echo 'bg-success'; ?>"><i class="pg-grid"></i></span>
			<ul class="sub-menu">
				<li class="">
					<a href="index.php?p=logs"><?php echo $tl["submenu"]["sm2"]; ?></a>
					<span class="icon-thumbnail"><?php echo text_clipping_lower ($tl["submenu"]["sm2"]); ?></span>
				</li>
				<li class="">
					<a href="index.php?p=searchlog"><?php echo $tl["submenu"]["sm3"]; ?></a>
					<span class="icon-thumbnail"><?php echo text_clipping_lower ($tl["submenu"]["sm3"]); ?></span>
				</li>
				<li class="">
					<a href="index.php?p=changelog"><?php echo $tl["submenu"]["sm4"]; ?></a>
					<span class="icon-thumbnail"><?php echo text_clipping_lower ($tl["submenu"]["sm4"]); ?></span>
				</li>
			</ul>
		</li><!-- END LOGS SECTION -->

				 <!-- START BASIC CONFIG SECTION -->
		<li class="">
			<a href="javascript:;">
				<span class="title">Basic Config</span>
				<span class=" arrow"></span>
			</a>
			<span class="icon-thumbnail <?php if ($page == 'site' || $page == 'setting') echo 'bg-success'; ?>"><i class="pg-settings_small"></i></span>

			<ul class="sub-menu">
				<li class="">
					<a href="index.php?p=site"></i> <?php echo $tl["submenu"]["sm1"]; ?></a>
					<span class="icon-thumbnail"><?php echo text_clipping_lower ($tl["submenu"]["sm1"]); ?></span>
				</li>
				<li class="">
					<a href="index.php?p=setting"><?php echo $tl["submenu"]["sm10"]; ?></a>
					<span class="icon-thumbnail"><?php echo text_clipping_lower ($tl["submenu"]["sm10"]); ?></span>
				</li>
			</ul>
		</li><!-- END BASIC CONFIG SECTION -->

				 <!-- START GENERAL CONFIG SECTION -->
		<li class="">
			<a href="javascript:;">
				<span class="title"><?php echo $tl["menu"]["mm1"]; ?></span>
				<span class=" arrow"></span>
			</a>
			<span class="icon-thumbnail <?php if ($page == 'plugins' || $page == 'template' || $page == 'maintenance') echo 'bg-success'; ?>"><i class="fa fa-wrench"></i></span>

			<ul class="sub-menu">

				<?php if (JAK_SUPERADMINACCESS) { ?>
					<li class="">
						<a href="index.php?p=plugins"><?php echo $tl["submenu"]["sm11"]; ?></a>
						<span class="icon-thumbnail"><?php echo text_clipping_lower ($tl["submenu"]["sm11"]); ?></span>
					</li>
					<li class="">
						<a href="index.php?p=plugins&amp;sp=hooks"><?php echo $tl["submenu"]["sm12"]; ?></a>
						<span class="icon-thumbnail"><?php echo text_clipping_lower ($tl["submenu"]["sm12"]); ?></span>
					</li>
					<?php if ($page1 == 'sorthooks') { ?>
						<li class="">
							<a href="index.php?p=plugins&amp;sp=sorthooks&amp;ssp=<?php echo $page2; ?>"><?php echo $tl["cmenu"]["c52"]; ?></a>
							<span class="icon-thumbnail"><?php echo text_clipping_lower ($tl["cmenu"]["c52"]); ?></span>
						</li>
					<?php }
					if ($page1 == 'hooks' && $page2 == 'edit') { ?>
						<li class="">
							<a href="index.php?p=plugins&sp=hooks&ssp=edit&sssp=<?php echo $page3; ?>"><?php echo $tl["submenu"]["sm13"]; ?></a>
							<span class="icon-thumbnail"><?php echo text_clipping_lower ($tl["submenu"]["sm13"]); ?></span>
						</li>
					<?php } ?>
					<li class="">
						<a href="index.php?p=plugins&amp;sp=newhook"><?php echo $tl["submenu"]["sm14"]; ?></a>
						<span class="icon-thumbnail"><?php echo text_clipping_lower ($tl["submenu"]["sm14"]); ?></span>
					</li>
					<li class="list-divider"></li>

					<li class="">
						<a href="index.php?p=template"><?php echo $tl["submenu"]["sm20"]; ?></a>
						<span class="icon-thumbnail"><?php echo text_clipping_lower ($tl["submenu"]["sm20"]); ?></span>
					</li>
					<li class="">
						<a href="index.php?p=template&amp;sp=settings"><?php echo $tl["submenu"]["sm21"]; ?></a>
						<span class="icon-thumbnail"><?php echo text_clipping_lower ($tl["submenu"]["sm21"]); ?></span>
					</li>
					<li class="">
						<a href="index.php?p=template&amp;sp=edit-files"><?php echo $tl["submenu"]["sm22"]; ?></a>
						<span class="icon-thumbnail"><?php echo text_clipping_lower ($tl["submenu"]["sm22"]); ?></span>
					</li>
					<li class="">
						<a href="index.php?p=template&amp;sp=cssedit"><?php echo $tl["submenu"]["sm23"]; ?></a>
						<span class="icon-thumbnail"><?php echo text_clipping_lower ($tl["submenu"]["sm23"]); ?></span>
					</li>
					<li class="">
						<a href="index.php?p=template&amp;sp=langedit"><?php echo $tl["submenu"]["sm24"]; ?></a>
						<span class="icon-thumbnail"><?php echo text_clipping_lower ($tl["submenu"]["sm24"]); ?></span>
					</li>
					<li class="list-divider"></li>

					<li class="">
						<a href="index.php?p=maintenance"><?php echo $tl["submenu"]["sm30"]; ?></a>
						<span class="icon-thumbnail"><?php echo text_clipping_lower ($tl["submenu"]["sm30"]); ?></span>
					</li>

				<?php } ?>
			</ul>
		</li><!-- END GENERAL CONFIG SECTION -->

				 <!-- START SOCIAL MEDIA SECTION -->
		<li class="">
			<a href="javascript:;">
				<span class="title"><?php echo $tl["menu"]["mm2"]; ?></span>
				<span class="arrow"></span>
			</a>
			<span class="icon-thumbnail <?php if ($page == 'settingfacebook' || $page == 'facebookgallery' || $page == 'mediasharing') echo 'bg-success'; ?>"><i class="pg-social"></i></span>

			<ul class="sub-menu">
				<li class="">
					<a href="javascript:;"><?php echo $tl["submenu"]["sm40"]; ?><span class="arrow"></span></a>
					<span class="icon-thumbnail"><?php echo text_clipping_lower ($tl["submenu"]["sm40"]); ?></span>
					<ul class="sub-menu">
						<li>
							<a href="index.php?p=facebookgallery"><?php echo $tl["submenu"]["sm41"]; ?></a>
							<span class="icon-thumbnail"><?php echo text_clipping_lower ($tl["submenu"]["sm41"]); ?></span>
						</li>
						<li>
							<a href="index.php?p=facebookgallery&amp;sp=newfacebook"><?php echo $tl["submenu"]["sm42"]; ?></a>
							<span class="icon-thumbnail"><?php echo text_clipping_lower ($tl["submenu"]["sm42"]); ?></span>
						</li>
						<?php if ($page == 'facebookgallery' && $page1 == 'edit') { ?>
							<li>
							<li class="active">
								<a href="index.php?p=facebookgallery&amp;sp=edit&amp;ssp=<?php echo $page2; ?>"><?php echo $tl["submenu"]["sm43"]; ?></a>
								<span class="icon-thumbnail"><?php echo text_clipping_lower ($tl["submenu"]["sm43"]); ?></span>
							</li>
						<?php } ?>
						<li>
							<a href="index.php?p=settingfacebook"><?php echo $tl["submenu"]["sm44"]; ?></a>
							<span class="icon-thumbnail"><?php echo text_clipping_lower ($tl["submenu"]["sm44"]); ?></span>
						</li>
					</ul>
				</li>
				<li class="">
					<a href="javascript:;"><?php echo $tl["submenu"]["sm50"]; ?><span class="arrow"></span></a>
					<span class="icon-thumbnail"><?php echo text_clipping_lower ($tl["submenu"]["sm50"]); ?></span>
					<ul class="sub-menu">
						<li>
							<a href="javascript:;">SubMenu</a>
							<span class="icon-thumbnail">Sm</span>
						</li>
						<li>
							<a href="javascript:;">SubMenu</a>
							<span class="icon-thumbnail">Sm</span>
						</li>
					</ul>
				</li>
				<li class="">
					<a href="javascript:;"><?php echo $tl["submenu"]["sm60"]; ?><span class="arrow"></span></a>
					<span class="icon-thumbnail"><?php echo text_clipping_lower ($tl["submenu"]["sm60"]); ?></span>
					<ul class="sub-menu">
						<li>
							<a href="javascript:;">SubMenu</a>
							<span class="icon-thumbnail">Sm</span>
						</li>
						<li>
							<a href="javascript:;">SubMenu</a>
							<span class="icon-thumbnail">Sm</span>
						</li>
					</ul>
				</li>
				<li class="">
					<a href="javascript:;"><?php echo $tl["submenu"]["sm70"]; ?><span class="arrow"></span></a>
					<span class="icon-thumbnail"><?php echo text_clipping_lower ($tl["submenu"]["sm70"]); ?></span>
					<ul class="sub-menu">
						<li>
							<a href="javascript:;">SubMenu</a>
							<span class="icon-thumbnail">Sm</span>
						</li>
						<li>
							<a href="javascript:;">SubMenu</a>
							<span class="icon-thumbnail">Sm</span>
						</li>
					</ul>
				</li>
				<li class="">
					<a href="index.php?p=mediasharing"><?php echo $tl["submenu"]["sm80"]; ?></a>
					<span class="icon-thumbnail"><?php echo text_clipping_lower ($tl["submenu"]["sm80"]); ?></span>
				</li>
			</ul>
		</li><!-- END SOCIAL MEDIA SECTION -->

				 <!-- START MANAGE SECTION -->
		<li class="">
			<a href="javascript:;">
				<span class="title"><?php echo $tl["menu"]["mm3"]; ?></span>
				<span class="arrow"></span>
			</a>
			<span class="icon-thumbnail <?php if ($page == 'user' || $page == 'usergroup' || $page == 'categories' || $page == 'page' || $page == 'contactform' || $page == 'poll' || $page == 'contactform' || $page == 'sitemap' || $page == 'searchsetting' || $page == 'growl' || $page == 'xml_seo' || $page == 'slider' || $page == 'site-editor' || $page == 'belowheader' || $page == 'register-form' || $page == 'urlmapping') echo 'bg-success'; ?>"><i class="pg-form"></i></span>

			<ul class="sub-menu">
				<!-- USER -->
				<li class="">
					<a href="index.php?p=user">
						<?php echo $tl["submenu"]["sm90"]; ?>
					</a>
					<span class="icon-thumbnail"><?php echo text_clipping_lower ($tl["submenu"]["sm90"]); ?></span>
				</li>
				<li class="">
					<a href="index.php?p=user&amp;sp=newuser">
						<?php echo $tl["submenu"]["sm91"]; ?>
					</a>
					<span class="icon-thumbnail"><?php echo text_clipping_lower ($tl["submenu"]["sm91"]); ?></span>
				</li>
				<?php if ($page == 'user' && $page1 == 'edit') { ?>
					<li class="">
						<a href="index.php?p=user&amp;sp=edit&amp;ssp=<?php echo $page2; ?>">
							<?php echo $tl["submenu"]["sm92"]; ?>
						</a>
						<span class="icon-thumbnail"><?php echo text_clipping_lower ($tl["submenu"]["sm92"]); ?></span>
					</li>
				<?php } ?>
				<li class="list-divider"></li>
				<!-- USERGROUP -->
				<li class="">
					<a href="index.php?p=usergroup">
						<?php echo $tl["submenu"]["sm100"]; ?>
					</a>
					<span class="icon-thumbnail"><?php echo text_clipping_lower ($tl["submenu"]["sm100"]); ?></span>
				</li>
				<li class="">
					<a href="index.php?p=usergroup&amp;sp=newgroup">
						<?php echo $tl["submenu"]["sm101"]; ?>
					</a>
					<span class="icon-thumbnail"><?php echo text_clipping_lower ($tl["submenu"]["sm101"]); ?></span>
				</li>
				<?php if ($page == 'usergroup' && $page1 == 'edit') { ?>
					<li class="">
						<a href="index.php?p=usergroup&amp;sp=edit&amp;ssp=<?php echo $page2; ?>">
							<?php echo $tl["submenu"]["sm102"]; ?>
						</a>
						<span class="icon-thumbnail"><?php echo text_clipping_lower ($tl["submenu"]["sm102"]); ?></span>
					</li>
				<?php } ?>
				<li class="list-divider"></li>
				<!-- CATEGORIES -->
				<?php if ($JAK_MODULEM) { ?>
					<li class="">
						<a href="index.php?p=categories">
							<?php echo $tl["submenu"]["sm110"]; ?>
						</a>
						<span class="icon-thumbnail"><?php echo text_clipping_lower ($tl["submenu"]["sm110"]); ?></span>
					</li>
					<li class="">
						<a href="index.php?p=categories&amp;sp=newcat">
							<?php echo $tl["submenu"]["sm111"]; ?>
						</a>
						<span class="icon-thumbnail"><?php echo text_clipping_lower ($tl["submenu"]["sm111"]); ?></span>
					</li>
					<?php if ($page == 'categories' && $page1 == 'edit') { ?>
						<li class="">
							<a href="index.php?p=categories&amp;sp=edit&amp;ssp=<?php echo $page2; ?>">
								<?php echo $tl["submenu"]["sm112"]; ?>
							</a>
							<span class="icon-thumbnail"><?php echo text_clipping_lower ($tl["submenu"]["sm112"]); ?></span>
						</li>
					<?php } ?>
					<li class="list-divider"></li>
					<!-- PAGES -->
					<li class="">
						<a href="index.php?p=page" style="position: relative;">
							<?php echo $tl["submenu"]["sm120"]; ?>
						</a>
						<span class="icon-thumbnail"><?php echo text_clipping_lower ($tl["submenu"]["sm120"]); ?></span>
					</li>
					<li class="">
						<a href="index.php?p=page&amp;sp=newpage">
							<?php echo $tl["submenu"]["sm121"]; ?>
						</a>
						<span class="icon-thumbnail"><?php echo text_clipping_lower ($tl["submenu"]["sm121"]); ?></span>
					</li>
					<?php if ($page == 'page' && $page1 == 'edit') { ?>
						<li class="">
							<a href="index.php?p=page&amp;sp=edit&amp;ssp=<?php echo $page2; ?>">
								<?php echo $tl["submenu"]["sm122"]; ?>
							</a>
							<span class="icon-thumbnail"><?php echo text_clipping_lower ($tl["submenu"]["sm122"]); ?></span>
						</li>
					<?php } ?>
					<li class="list-divider"></li>
					<!-- CONTACTFORM -->
					<li class="">
						<a href="index.php?p=contactform">
							<?php echo $tl["submenu"]["sm130"]; ?>
						</a>
						<span class="icon-thumbnail"><?php echo text_clipping_lower ($tl["submenu"]["sm130"]); ?></span>
					</li>
					<li class="">
						<a href="index.php?p=contactform&amp;sp=newcontact">
							<?php echo $tl["submenu"]["sm131"]; ?>
						</a>
						<span class="icon-thumbnail"><?php echo text_clipping_lower ($tl["submenu"]["sm131"]); ?></span>
					</li>
					<?php if ($page == 'contactform' && $page1 == 'edit') { ?>
						<li class="">
							<a href="index.php?p=contactform&amp;sp=<?php echo $page1; ?>&amp;ssp=<?php echo $page2; ?>">
								<?php echo $tl["submenu"]["sm132"]; ?>
							</a>
							<span class="icon-thumbnail"><?php echo text_clipping_lower ($tl["submenu"]["sm132"]); ?></span>
						</li>
					<?php } ?>
					<li class="list-divider"></li>
					<!-- SITEMAP -->
					<li class="">
						<a href="index.php?p=sitemap">
							<?php echo $tl["submenu"]["sm140"]; ?>
						</a>
						<span class="icon-thumbnail"><?php echo text_clipping_lower ($tl["submenu"]["sm140"]); ?></span>
					</li>
					<!-- SEARCHSETTING -->
					<li class="">
						<a href="index.php?p=searchsetting">
							<?php echo $tl["submenu"]["sm150"]; ?>
						</a>
						<span class="icon-thumbnail"><?php echo text_clipping_lower ($tl["submenu"]["sm150"]); ?></span>
					</li>
				<?php }
				if (isset($JAK_PLUGINS_MANAGENAV) && is_array ($JAK_PLUGINS_MANAGENAV)) foreach ($JAK_PLUGINS_MANAGENAV as $pmn) {
					include_once $pmn;
				} ?>

			</ul>

		</li><!-- END MANAGE SECTION -->

		<?php if (isset($JAK_PLUGINS_TOPNAV) && is_array ($JAK_PLUGINS_TOPNAV)) foreach ($JAK_PLUGINS_TOPNAV as $ptn) {
			include_once $ptn;
		} ?>

	<?php } ?>
</ul>