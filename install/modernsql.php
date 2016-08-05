<?php

/*===============================================*\
|| ############################################# ||
|| # JAKWEB.CH                                 # ||
|| # ----------------------------------------- # ||
|| # Copyright 2016 JAKWEB All Rights Reserved # ||
|| ############################################# ||
\*===============================================*/

$jakdb->query("CREATE TABLE ".DB_PREFIX."backup_content (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `pageid` int(11) NOT NULL DEFAULT '0',
  `content` mediumtext,
  `time` datetime NOT NULL DEFAULT '0000-00-00 00:00:00',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8");

$jakdb->query("CREATE TABLE ".DB_PREFIX."belowheader (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `pageid` varchar(100) DEFAULT NULL,
  `newsid` varchar(100) DEFAULT NULL,
  `newsmain` smallint(1) unsigned NOT NULL DEFAULT '0',
  `tags` smallint(1) unsigned NOT NULL DEFAULT '0',
  `search` smallint(1) unsigned NOT NULL DEFAULT '0',
  `sitemap` smallint(1) unsigned NOT NULL DEFAULT '0',
  `title` varchar(255) DEFAULT NULL,
  `content` mediumtext,
  `content_below` mediumtext,
  `permission` varchar(100) DEFAULT NULL,
  `active` smallint(1) unsigned NOT NULL DEFAULT '1',
  `time` datetime NOT NULL DEFAULT '0000-00-00 00:00:00',
  PRIMARY KEY (`id`),
  KEY `pageid` (`pageid`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 ROW_FORMAT=DYNAMIC");

$jakdb->query("INSERT INTO ".DB_PREFIX."belowheader (`id`, `pageid`, `newsid`, `newsmain`, `tags`, `search`, `sitemap`, `title`, `content`, `content_below`, `permission`, `active`, `time`) VALUES
(1, '1', '0', 0, 0, 0, 0, 'Slider', '<!-- Homepage Slider -->\r\n        <div class=\"homepage-slider\">\r\n        	<div id=\"sequence\">\r\n				<ul class=\"sequence-canvas\">\r\n					<!-- Slide 1 -->\r\n					<li class=\"bg4\">\r\n						<!-- Slide Title -->\r\n						<h2 class=\"title\">Responsive</h2>\r\n						<!-- Slide Text -->\r\n						<h3 class=\"subtitle\">It looks great on desktops, laptops, tablets and smartphones</h3>\r\n						<!-- Slide Image -->\r\n						<img class=\"slide-img\" src=\"_files/modern/homepage-slider/slide1.png\" alt=\"Slide 1\" />\r\n					</li>\r\n					<!-- End Slide 1 -->\r\n					<!-- Slide 2 -->\r\n					<li class=\"bg3\">\r\n						<!-- Slide Title -->\r\n						<h2 class=\"title\">Color Schemes</h2>\r\n						<!-- Slide Text -->\r\n						<h3 class=\"subtitle\">Comes with 5 color schemes and it\'s easy to make your own!</h3>\r\n						<!-- Slide Image -->\r\n						<img class=\"slide-img\" src=\"_files/modern/homepage-slider/slide2.png\" alt=\"Slide 2\" />\r\n					</li>\r\n					<!-- End Slide 2 -->\r\n					<!-- Slide 3 -->\r\n					<li class=\"bg1\">\r\n						<!-- Slide Title -->\r\n						<h2 class=\"title\">Feature Rich</h2>\r\n						<!-- Slide Text -->\r\n						<h3 class=\"subtitle\">Huge amount of components and over 30 sample pages!</h3>\r\n						<!-- Slide Image -->\r\n						<img class=\"slide-img\" src=\"_files/modern/homepage-slider/slide3.png\" alt=\"Slide 3\" />\r\n					</li>\r\n					<!-- End Slide 3 -->\r\n				</ul>\r\n				<div class=\"sequence-pagination-wrapper\">\r\n					<ul class=\"sequence-pagination\">\r\n						<li>1</li>\r\n						<li>2</li>\r\n						<li>3</li>\r\n					</ul>\r\n				</div>\r\n			</div>\r\n        </div>\r\n        <!-- End Homepage Slider -->', '', '0', 1, NOW()),
(2, '2', '0', 0, 0, 0, 0, 'Features', '<!-- Page Title -->\r\n<div class=\"section section-breadcrumbs\">\r\n	<div class=\"container\">\r\n		<div class=\"row\">\r\n			<div class=\"col-md-12\">\r\n				<h1>Theme Features</h1>\r\n			</div>\r\n		</div>\r\n	</div>\r\n</div>', '', '0', 1, NOW()),
(3, '3', '0', 0, 0, 0, 0, 'Pricing', '<!-- Page Title -->\r\n<div class=\"section section-breadcrumbs\">\r\n	<div class=\"container\">\r\n		<div class=\"row\">\r\n			<div class=\"col-md-12\">\r\n				<h1>Pricing Table</h1>\r\n			</div>\r\n		</div>\r\n		</div>\r\n</div>', '', '0', 1, NOW()),
(4, '4', '0', 0, 0, 0, 0, 'Our Team', '<!-- Page Title -->\r\n<div class=\"section section-breadcrumbs\">\r\n	<div class=\"container\">\r\n		<div class=\"row\">\r\n			<div class=\"col-md-12\">\r\n				<h1>Our Team</h1>\r\n			</div>\r\n		</div>\r\n	</div>\r\n</div>', '', '0', 1, NOW()),
(5, '5', '0', 0, 0, 0, 0, 'Portfolio', '<!-- Page Title -->\r\n<div class=\"section section-breadcrumbs\">\r\n	<div class=\"container\">\r\n		<div class=\"row\">\r\n			<div class=\"col-md-12\">\r\n				<h1>Portfolio - 3 Columns</h1>\r\n			</div>\r\n		</div>\r\n	</div>\r\n</div>', '', '0', 1, NOW()),
(6, '6', '0', 0, 0, 0, 0, 'Portfolio 2', '<!-- Page Title -->\r\n<div class=\"section section-breadcrumbs\">\r\n	<div class=\"container\">\r\n		<div class=\"row\">\r\n			<div class=\"col-md-12\">\r\n				<h1>Portfolio - 2 Columns</h1>\r\n			</div>\r\n		</div>\r\n	</div>\r\n</div>', '', '0', 1, NOW()),
(7, '7', '0', 0, 0, 0, 0, 'Portfolio Item', '<!-- Page Title -->\r\n<div class=\"section section-breadcrumbs\">\r\n	<div class=\"container\">\r\n		<div class=\"row\">\r\n			<div class=\"col-sm-12\">\r\n				<h1>Portfolio Item Description</h1>\r\n			</div>\r\n		</div>\r\n	</div>\r\n</div>', '', '0', 1, NOW()),
(8, '9', '0', 0, 0, 0, 0, 'Service 3 Column', '<!-- Page Title -->\r\n<div class=\"section section-breadcrumbs\">\r\n	<div class=\"container\">\r\n		<div class=\"row\">\r\n			<div class=\"col-md-12\">\r\n				<h1>Services (3 Clolumns)</h1>\r\n			</div>\r\n		</div>\r\n	</div>\r\n</div>', '', '0', 1, NOW()),
(9, '10', '0', 0, 0, 0, 0, 'Contact Us', '<!-- Page Title -->\r\n<div class=\"section section-breadcrumbs\">\r\n	<div class=\"container\">\r\n		<div class=\"row\">\r\n			<div class=\"col-md-12\">\r\n				<h1>Contact Us</h1>\r\n			</div>\r\n		</div>\r\n	</div>\r\n</div>', '', '0', 1, NOW());");

$jakdb->query("CREATE TABLE ".DB_PREFIX."categories (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) DEFAULT NULL,
  `varname` varchar(255) DEFAULT NULL,
  `exturl` varchar(255) DEFAULT NULL,
  `catimg` varchar(255) DEFAULT NULL,
  `content` text,
  `showmenu` smallint(1) unsigned NOT NULL DEFAULT '0',
  `showfooter` smallint(1) unsigned NOT NULL DEFAULT '0',
  `catorder` int(11) unsigned NOT NULL,
  `catparent` int(11) unsigned NOT NULL DEFAULT '0',
  `pageid` int(11) unsigned NOT NULL DEFAULT '0',
  `permission` varchar(100) NOT NULL DEFAULT '0',
  `activeplugin` smallint(1) unsigned NOT NULL DEFAULT '1',
  `pluginid` int(11) unsigned NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`),
  KEY `showmenu` (`showmenu`,`showfooter`,`catorder`,`catparent`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8");

$jakdb->query("INSERT INTO ".DB_PREFIX."categories (`id`, `name`, `varname`, `exturl`, `catimg`, `content`, `showmenu`, `showfooter`, `catorder`, `catparent`, `pageid`, `permission`, `activeplugin`, `pluginid`) VALUES
(1, 'Home', 'home', NULL, NULL, NULL, 1, 0, 1, 0, 1, '0', 1, 0),
(2, 'Sitemap', 'sitemap', NULL, NULL, NULL, 0, 1, 3, 0, 0, '0', 1, 2),
(3, 'Tags', 'tag', NULL, NULL, NULL, 0, 0, 4, 0, 0, '0', 1, 3),
(4, 'News', 'news', NULL, NULL, NULL, 1, 0, 11, 0, 0, '0', 1, 1),
(5, 'Features', 'features', '', NULL, '<p>Some SEO for the feature page.</p>', 1, 0, 2, 0, 2, '0', 1, 0),
(6, 'Pricing', 'pricing', '', NULL, '<p>Seo for pricing page.</p>', 1, 0, 10, 0, 3, '0', 1, 0),
(7, 'Team', 'team', '', NULL, '<p>Some Seo for our Team page.</p>', 1, 0, 6, 0, 4, '0', 1, 0),
(8, 'Portfolio', 'portfolio', '', NULL, '<p>Some Seo for Portfolio page.</p>', 1, 0, 7, 0, 5, '0', 1, 0),
(9, 'Portfolio 2', 'portfolio-2', '', NULL, '', 1, 0, 8, 8, 6, '0', 1, 0),
(10, 'Item', 'item', '', NULL, '<p>You know the drill, SEO goes here.</p>', 1, 0, 9, 8, 7, '0', 1, 0),
(11, 'Service', 'service', '', NULL, '<p>Seo, Seo and more SEO.</p>', 1, 0, 3, 0, 8, '0', 1, 0),
(12, 'Service 3 Column', 'service-3-column', '', NULL, '', 1, 0, 4, 11, 9, '0', 1, 0),
(13, 'Contact', 'contact', '', NULL, '<p>Contact SEO</p>', 1, 0, 12, 0, 10, '0', 1, 0),
(14, 'Coming Soon', 'coming-soon', '', NULL, '', 1, 0, 5, 11, 11, '0', 1, 0),
(15, 'One Page', 'one-page', '', NULL, '<p>That is a one page site build with CMS.</p>', 1, 0, 2, 0, 12, '0', 1, 0);");

$jakdb->query("CREATE TABLE ".DB_PREFIX."clickstat (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `xaxis` smallint(4) unsigned NOT NULL DEFAULT '0',
  `yaxis` smallint(4) unsigned NOT NULL DEFAULT '0',
  `location` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8");

$jakdb->query("CREATE TABLE ".DB_PREFIX."contactform (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(255) DEFAULT NULL,
  `content` text,
  `email` varchar(255) DEFAULT NULL,
  `showtitle` smallint(1) unsigned NOT NULL DEFAULT '1',
  `active` smallint(1) unsigned NOT NULL DEFAULT '1',
  `time` datetime NOT NULL DEFAULT '0000-00-00 00:00:00',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8");

$jakdb->query("INSERT INTO ".DB_PREFIX."contactform (`id`, `title`, `content`, `email`, `showtitle`, `active`, `time`) VALUES
(1, 'Standard Contact Form', '<p>Thank you very much, you enquiry has been sent. We will return to you as soon as possible.</p>', NULL, 1, 1, NOW());");

$jakdb->query("CREATE TABLE ".DB_PREFIX."contactoptions (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `formid` int(11) unsigned NOT NULL DEFAULT '0',
  `name` varchar(255) DEFAULT NULL,
  `typeid` smallint(2) unsigned NOT NULL DEFAULT '1',
  `options` mediumtext,
  `mandatory` smallint(1) NOT NULL DEFAULT '0',
  `forder` int(11) unsigned NOT NULL DEFAULT '1',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8");

$jakdb->query("INSERT INTO ".DB_PREFIX."contactoptions (`id`, `formid`, `name`, `typeid`, `options`, `mandatory`, `forder`) VALUES
(1, 1, 'Name', 1, '', 1, 1),
(2, 1, 'Email', 1, '', 3, 2),
(3, 1, 'Phone', 1, '', 2, 3),
(4, 1, 'Message', 2, '', 1, 4);");

$jakdb->query("CREATE TABLE ".DB_PREFIX."like_client (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `btnid` int(11) unsigned NOT NULL DEFAULT '0',
  `locid` int(11) unsigned NOT NULL DEFAULT '0',
  `userid` int(11) unsigned NOT NULL DEFAULT '0',
  `username` varchar(255) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  `sessionid` varchar(64) DEFAULT NULL,
  `ip` char(15) DEFAULT NULL,
  `status` tinyint(1) unsigned NOT NULL DEFAULT '0',
  `time` datetime NOT NULL DEFAULT '0000-00-00 00:00:00',
  PRIMARY KEY (`id`),
  KEY `btnid` (`btnid`,`userid`,`sessionid`,`ip`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8");

$jakdb->query("INSERT INTO ".DB_PREFIX."like_client (`id`, `btnid`, `locid`, `userid`, `username`, `email`, `sessionid`, `ip`, `status`, `time`) VALUES
(1, 1, 1, 1, 'Jerome', 'jk@jakweb.ch', 'bde7eda7dd594e6f248aef951022abd1', '::1', 2, NOW());");

$jakdb->query("CREATE TABLE ".DB_PREFIX."like_counter (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `btnid` int(11) unsigned NOT NULL DEFAULT '0',
  `locid` int(11) unsigned NOT NULL DEFAULT '0',
  `blike` int(11) unsigned NOT NULL DEFAULT '0',
  `blove` int(11) unsigned NOT NULL DEFAULT '0',
  `brofl` int(11) unsigned NOT NULL DEFAULT '0',
  `bsmile` int(11) unsigned NOT NULL DEFAULT '0',
  `bwow` int(11) unsigned NOT NULL DEFAULT '0',
  `bsad` int(11) unsigned NOT NULL DEFAULT '0',
  `bangry` int(11) unsigned NOT NULL DEFAULT '0',
  `firstcreated` datetime NOT NULL DEFAULT '0000-00-00 00:00:00',
  `lastentered` datetime NOT NULL DEFAULT '0000-00-00 00:00:00',
  PRIMARY KEY (`id`),
  KEY `btnid` (`btnid`,`locid`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8");

$jakdb->query("INSERT INTO ".DB_PREFIX."like_counter (`id`, `btnid`, `locid`, `blike`, `blove`, `brofl`, `bsmile`, `bwow`, `bsad`, `bangry`, `firstcreated`, `lastentered`) VALUES
(1, 1, 1, 0, 1, 0, 0, 0, 0, 0, NOW(), NOW());");

$jakdb->query("CREATE TABLE ".DB_PREFIX."loginlog (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) DEFAULT NULL,
  `fromwhere` varchar(255) DEFAULT NULL,
  `ip` char(15) NOT NULL,
  `usragent` varchar(255) DEFAULT NULL,
  `time` datetime NOT NULL DEFAULT '0000-00-00 00:00:00',
  `access` smallint(1) unsigned NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8");

$jakdb->query("CREATE TABLE ".DB_PREFIX."news (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(255) DEFAULT NULL,
  `content` mediumtext,
  `news_css` text,
  `news_javascript` text,
  `sidebar` smallint(1) unsigned NOT NULL DEFAULT '1',
  `previmg` varchar(255) DEFAULT NULL,
  `newsorder` int(11) unsigned NOT NULL,
  `showtitle` smallint(1) unsigned NOT NULL DEFAULT '0',
  `active` smallint(1) unsigned NOT NULL DEFAULT '0',
  `showcontact` int(11) unsigned NOT NULL DEFAULT '0',
  `showdate` smallint(1) unsigned NOT NULL DEFAULT '0',
  `showhits` smallint(1) unsigned NOT NULL DEFAULT '0',
  `shownews` smallint(1) unsigned NOT NULL DEFAULT '0',
  `socialbutton` smallint(1) unsigned NOT NULL DEFAULT '0',
  `showvote` smallint(1) unsigned NOT NULL DEFAULT '0',
  `time` datetime NOT NULL DEFAULT '0000-00-00 00:00:00',
  `startdate` int(10) unsigned NOT NULL DEFAULT '0',
  `enddate` int(10) unsigned NOT NULL DEFAULT '0',
  `permission` varchar(100) NOT NULL DEFAULT '0',
  `hits` int(11) unsigned NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`),
  KEY `newsorder` (`newsorder`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8");

$jakdb->query("INSERT INTO ".DB_PREFIX."news (`id`, `title`, `content`, `news_css`, `news_javascript`, `sidebar`, `previmg`, `newsorder`, `showtitle`, `active`, `showcontact`, `showdate`, `showhits`, `shownews`, `socialbutton`, `showvote`, `time`, `startdate`, `enddate`, `permission`, `hits`) VALUES
(1, 'Brand New CMS', '<p> It looks great on desktops, laptops, tablets and smartphones - CMS template was built to shine on all devices. You can be sure that all the components are responsive. </p>\r\n<p> Template comes with five color themes (Blue, Orange, Green, Red and Grey). All you need to do is to change the colour via StlyeChanger. There is no color scheme that matches your branding? No problem. You can easily compile your own by changing one variable - thanks to LESS! </p>\r\n<p> It looks great on desktops, laptops, tablets and smartphones - CMS template was built to shine on all devices. You can be sure that all the components are responsive.</p>','','',0,'/_files/modern/blog1.jpg',1,1,1,0,0,0,0,1,1,NOW(),0,0,'0',1);");

$jakdb->query("CREATE TABLE ".DB_PREFIX."pages (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `catid` int(11) unsigned NOT NULL DEFAULT '0',
  `title` varchar(255) DEFAULT NULL,
  `content` mediumtext,
  `page_css` text,
  `page_javascript` text,
  `sidebar` smallint(1) unsigned NOT NULL DEFAULT '1',
  `showtitle` smallint(1) unsigned NOT NULL DEFAULT '1',
  `active` smallint(1) unsigned NOT NULL DEFAULT '1',
  `shownav` tinyint(1) unsigned NOT NULL DEFAULT '1',
  `showfooter` tinyint(1) unsigned NOT NULL DEFAULT '1',
  `showcontact` int(11) unsigned NOT NULL DEFAULT '0',
  `shownews` varchar(100) DEFAULT NULL,
  `showdate` smallint(1) unsigned NOT NULL DEFAULT '0',
  `showtags` smallint(1) unsigned NOT NULL DEFAULT '1',
  `showlogin` smallint(1) unsigned NOT NULL DEFAULT '1',
  `socialbutton` smallint(1) unsigned NOT NULL DEFAULT '0',
  `showvote` smallint(1) unsigned NOT NULL DEFAULT '0',
  `password` char(64) DEFAULT NULL,
  `hits` int(11) unsigned NOT NULL DEFAULT '0',
  `time` datetime NOT NULL DEFAULT '0000-00-00 00:00:00',
  PRIMARY KEY (`id`),
  KEY `catid` (`catid`,`active`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8");

$jakdb->query("INSERT INTO ".DB_PREFIX."pages (`id`, `catid`, `title`, `content`, `page_css`, `page_javascript`, `sidebar`, `showtitle`, `active`, `shownav`, `showfooter`, `showcontact`, `shownews`, `showdate`, `showtags`, `showlogin`, `socialbutton`, `showvote`, `password`, `hits`, `time`) VALUES
(1, 1, 'Home', '<!-- Press Coverage -->\r\n<div class=\"row\">\r\n	<div class=\"col-md-4 col-sm-6\">\r\n		<div class=\"in-press press-wired\">\r\n			<a href=\"#\">Morbi eleifend congue elit nec sagittis. Praesent aliquam lobortis tellus, nec consequat vitae</a>\r\n		</div>\r\n	</div>\r\n	<div class=\"col-md-4 col-sm-6\">\r\n		<div class=\"in-press press-mashable\">\r\n			<a href=\"#\">Morbi eleifend congue elit nec sagittis. Praesent aliquam lobortis tellus, nec consequat vitae</a>\r\n		</div>\r\n	</div>\r\n	<div class=\"col-md-4 col-sm-6\">\r\n		<div class=\"in-press press-techcrunch\">\r\n			<a href=\"#\">Morbi eleifend congue elit nec sagittis. Praesent aliquam lobortis tellus, nec consequat vitae</a>\r\n		</div>\r\n	</div>\r\n</div>\r\n<!-- Press Coverage -->\r\n\r\n<!-- Services -->\r\n<div class=\"row\">\r\n	<div class=\"col-md-4 col-sm-6\">\r\n		<div class=\"service-wrapper\">\r\n			<img src=\"/_files/modern/service-icon/diamond.png\" alt=\"Service 1\">\r\n			<h3>Aliquam in adipiscing</h3>\r\n			<p>Praesent rhoncus mauris ac sollicitudin vehicula. Nam fringilla turpis turpis, at posuere turpis aliquet sit amet condimentum</p>\r\n			<a href=\"#\" class=\"btn\">Read more</a>\r\n		</div>\r\n	</div>\r\n	<div class=\"col-md-4 col-sm-6\">\r\n		<div class=\"service-wrapper\">\r\n			<img src=\"/_files/modern/service-icon/ruler.png\" alt=\"Service 2\">\r\n			<h3>Curabitur mollis</h3>\r\n			<p>Suspendisse eget libero mi. Fusce ligula orci, vulputate nec elit ultrices, ornare faucibus orci. Aenean lectus sapien, vehicula</p>\r\n			<a href=\"#\" class=\"btn\">Read more</a>\r\n		</div>\r\n	</div>\r\n	<div class=\"col-md-4 col-sm-6\">\r\n		<div class=\"service-wrapper\">\r\n			<img src=\"/_files/modern/service-icon/box.png\" alt=\"Service 3\">\r\n			<h3>Vivamus mattis</h3>\r\n			<p>Phasellus posuere et nisl ac commodo. Nulla facilisi. Sed tincidunt bibendum cursus. Aenean vulputate aliquam risus rutrum scelerisque</p>\r\n			<a href=\"#\" class=\"btn\">Read more</a>\r\n		</div>\r\n	</div>\r\n</div>\r\n<!-- End Services -->\r\n\r\n<!-- Testimonials -->\r\n<h2>Testimonials</h2>\r\n<div class=\"row\">\r\n	<!-- Testimonial -->\r\n	<div class=\"about col-md-4 col-sm-6\">\r\n		<!-- Author Photo -->\r\n		<div class=\"author-photo\">\r\n			<img src=\"/_files/modern/user1.jpg\" alt=\"Author 1\">\r\n		</div>\r\n		<div class=\"about-bubble\">\r\n			<blockquote>\r\n				<!-- Quote -->\r\n				<p class=\"quote\">\r\n                    \"Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut.\"\r\n        		</p>\r\n        		<!-- Author Info -->\r\n        		<cite class=\"author-info\">\r\n        			- Name Surname,<br>Managing Director at <a href=\"#\">Some Company</a>\r\n        		</cite>\r\n        	</blockquote>\r\n        	<div class=\"sprite arrow-speech-bubble\"></div>\r\n        </div>\r\n    </div>\r\n    <!-- End Testimonial -->\r\n    <div class=\"about col-md-4 col-sm-6\">\r\n		<div class=\"author-photo\">\r\n			<img src=\"/_files/modern/user5.jpg\" alt=\"Author 2\">\r\n		</div>\r\n		<div class=\"about-bubble\">\r\n			<blockquote>\r\n				<p class=\"quote\">\r\n                    \"Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo.\"\r\n        		</p>\r\n        		<cite class=\"author-info\">\r\n        			- Name Surname,<br>Managing Director at <a href=\"#\">Some Company</a>\r\n        		</cite>\r\n        	</blockquote>\r\n        	<div class=\"sprite arrow-speech-bubble\"></div>\r\n        </div>\r\n    </div>\r\n	<div class=\"about col-md-4 col-sm-6\">\r\n		<div class=\"author-photo\">\r\n			<img src=\"/_files/modern/user2.jpg\" alt=\"Author 3\">\r\n		</div>\r\n		<div class=\"about-bubble\">\r\n			<blockquote>\r\n				<p class=\"quote\">\r\n                    \"Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur.\"\r\n        		</p>\r\n        		<cite class=\"author-info\">\r\n        			- Name Surname,<br>Managing Director at <a href=\"#\">Some Company</a>\r\n        		</cite>\r\n        	</blockquote>\r\n        	<div class=\"sprite arrow-speech-bubble\"></div>\r\n        </div>\r\n    </div>\r\n</div>\r\n<!-- End Testimonials -->\r\n\r\n<!-- Pricing Table -->\r\n<h2>Pricing</h2>\r\n<div class=\"row\">\r\n	<!-- Pricing Plans Wrapper -->\r\n	<div class=\"pricing-wrapper col-md-12\">\r\n		<!-- Pricing Plan -->\r\n		<div class=\"pricing-plan\">\r\n			<!-- Pricing Plan Ribbon -->\r\n			<div class=\"ribbon-wrapper\">\r\n				<div class=\"price-ribbon ribbon-red\">Popular</div>\r\n			</div>\r\n			<h2 class=\"pricing-plan-title\">Starter</h2>\r\n			<p class=\"pricing-plan-price\">FREE</p>\r\n			<!-- Pricing Plan Features -->\r\n			<ul class=\"pricing-plan-features\">\r\n				<li><strong>1</strong> user</li>\r\n				<li><strong>Unlimited</strong> projects</li>\r\n				<li><strong>2GB</strong> storage</li>\r\n			</ul>\r\n			<a href=\"#\" class=\"btn\">Order Now</a>\r\n		</div>\r\n		<!-- End Pricing Plan -->\r\n	    <div class=\"pricing-plan\">\r\n			<h2 class=\"pricing-plan-title\">Advanced</h2>\r\n			<p class=\"pricing-plan-price\">$49<span>/mo</span></p>\r\n				<ul class=\"pricing-plan-features\">\r\n					<li><strong>10</strong> users</li>\r\n					<li><strong>Unlimited</strong> projects</li>\r\n					<li><strong>20GB</strong> storage</li>\r\n				</ul>\r\n			<a href=\"#\" class=\"btn\">Order Now</a>\r\n	    </div>\r\n	    <!-- Promoted Pricing Plan -->\r\n	    <div class=\"pricing-plan pricing-plan-promote\">\r\n				<h2 class=\"pricing-plan-title\">Premium</h2>\r\n				<p class=\"pricing-plan-price\">$99<span>/mo</span></p>\r\n				<ul class=\"pricing-plan-features\">\r\n					<li><strong>Unlimited</strong> users</li>\r\n					<li><strong>Unlimited</strong> projects</li>\r\n					<li><strong>100GB</strong> storage</li>\r\n				</ul>\r\n			<a href=\"#\" class=\"btn\">Order Now</a>\r\n	    </div>\r\n	    <div class=\"pricing-plan\">\r\n	    	<!-- Pricing Plan Ribbon -->\r\n			<div class=\"ribbon-wrapper\">\r\n				<div class=\"price-ribbon ribbon-green\">New</div>\r\n			</div>\r\n			<h2 class=\"pricing-plan-title\">Mega</h2>\r\n			<p class=\"pricing-plan-price\">$199<span>/mo</span></p>\r\n				<ul class=\"pricing-plan-features\">\r\n					<li><strong>Unlimited</strong> users</li>\r\n					<li><strong>Unlimited</strong> projects</li>\r\n					<li><strong>100GB</strong> storage</li>\r\n				</ul>\r\n			<a href=\"#\" class=\"btn\">Order Now</a>\r\n	    </div>\r\n	</div>\r\n	<!-- End Pricing Plans Wrapper -->\r\n</div>\r\n<!-- End Pricing Table -->\r\n\r\n<!-- Our Clients -->\r\n<h2>Our Clients</h2>\r\n<div class=\"clients-logo-wrapper text-center row\">\r\n	<div class=\"col-lg-1 col-md-1 col-sm-3 col-xs-6\"><a href=\"#\"><img src=\"/_files/modern/logos/canon.png\" alt=\"Client Name\"></a></div>\r\n	<div class=\"col-lg-1 col-md-1 col-sm-3 col-xs-6\"><a href=\"#\"><img src=\"/_files/modern/logos/cisco.png\" alt=\"Client Name\"></a></div>\r\n	<div class=\"col-lg-1 col-md-1 col-sm-3 col-xs-6\"><a href=\"#\"><img src=\"/_files/modern/logos/dell.png\" alt=\"Client Name\"></a></div>\r\n	<div class=\"col-lg-1 col-md-1 col-sm-3 col-xs-6\"><a href=\"#\"><img src=\"/_files/modern/logos/ea.png\" alt=\"Client Name\"></a></div>\r\n	<div class=\"col-lg-1 col-md-1 col-sm-3 col-xs-6\"><a href=\"#\"><img src=\"/_files/modern/logos/ebay.png\" alt=\"Client Name\"></a></div>\r\n	<div class=\"col-lg-1 col-md-1 col-sm-3 col-xs-6\"><a href=\"#\"><img src=\"/_files/modern/logos/facebook.png\" alt=\"Client Name\"></a></div>\r\n	<div class=\"col-lg-1 col-md-1 col-sm-3 col-xs-6\"><a href=\"#\"><img src=\"/_files/modern/logos/google.png\" alt=\"Client Name\"></a></div>\r\n	<div class=\"col-lg-1 col-md-1 col-sm-3 col-xs-6\"><a href=\"#\"><img src=\"/_files/modern/logos/hp.png\" alt=\"Client Name\"></a></div>\r\n	<div class=\"col-lg-1 col-md-1 col-sm-3 col-xs-6\"><a href=\"#\"><img src=\"/_files/modern/logos/microsoft.png\" alt=\"Client Name\"></a></div>\r\n	<div class=\"col-lg-1 col-md-1 col-sm-3 col-xs-6\"><a href=\"#\"><img src=\"/_files/modern/logos/mysql.png\" alt=\"Client Name\"></a></div>\r\n	<div class=\"col-lg-1 col-md-1 col-sm-3 col-xs-6\"><a href=\"#\"><img src=\"/_files/modern/logos/sony.png\" alt=\"Client Name\"></a></div>\r\n	<div class=\"col-lg-1 col-md-1 col-sm-3 col-xs-6\"><a href=\"#\"><img src=\"/_files/modern/logos/yahoo.png\" alt=\"Client Name\"></a></div>\r\n</div>\r\n<!-- End Our Clients -->', '<link rel=\"stylesheet\" href=\"/_files/modern/slider.css\" type=\"text/css\" />', '<script type=\"text/javascript\" src=\"/_files/modern/jquery.sequence.js\"></script>\r\n<script type=\"text/javascript\">\r\n$(document).ready(function(){\r\n//Homepage Slider\r\n	    var options = {\r\n	        nextButton: false,\r\n	        prevButton: false,\r\n	        pagination: true,\r\n	        animateStartingFrameIn: true,\r\n	        autoPlay: true,\r\n	        autoPlayDelay: 5000,\r\n	        preloader: true\r\n	    };\r\nvar mySequence = $(\"#sequence\").sequence(options).data(\"sequence\");\r\n});\r\n</script>', 1, 0, 1, 1, 1, 0, '0', 0, 0, 0, 0, 0, NULL, 2, NOW()),
(2, 5, 'Features', '<div class=\"row service-wrapper-row\">\r\n	<div class=\"col-sm-4\">\r\n		<div class=\"service-image\">\r\n			<img src=\"/_files/modern/homepage-slider/slide2.png\" alt=\"Color Schemes\">\r\n		</div>\r\n	</div>\r\n	<div class=\"col-sm-8\">\r\n		<h3>Color Scheme matching your branding</h3>\r\n		<p>\r\n			Template comes with five color themes (Blue, Orange, Green, Red and Grey). All you need to do is to use relevant CSS file.\r\n		</p>\r\n		<p>\r\n			There is no color scheme that matches your branding? No problem.  You can easily compile your own by changing one variable - thanks to LESS!\r\n		</p>\r\n	</div>\r\n</div>\r\n<div class=\"row service-wrapper-row\">\r\n	<div class=\"col-sm-4\">\r\n		<div class=\"service-image\">\r\n			<img src=\"/_files/modern/less-logo.png\" alt=\"LESS CSS\">\r\n		</div>\r\n	</div>\r\n	<div class=\"col-sm-8\">\r\n		<h3>LESS CSS</h3>\r\n		<p>\r\n			This template is build taking the advantage of LESS. It makes easier to build your own color schemes.\r\n		</p>\r\n		<p>\r\n			We are also using lesshat mixins which makes development even more easier. Please check <a href=\"http://lesshat.com\" target=\"_blank\">http://lesshat.com</a> for more information\r\n		</p>\r\n	</div>\r\n</div>\r\n<div class=\"row service-wrapper-row\">\r\n	<div class=\"col-sm-4\">\r\n		<div class=\"service-image\">\r\n			<img src=\"/_files/modern/homepage-slider/slide1.png\" alt=\"Responsive\">\r\n		</div>\r\n	</div>\r\n	<div class=\"col-sm-8\">\r\n		<h3>Fully Responsive</h3>\r\n		<p>\r\n			It looks great on desktops, laptops, tablets and smartphones - CMS template was built to shine on all devices :) \r\n		</p>\r\n		<p>\r\n			You can be sure that all the components are responsive.\r\n		</p>\r\n	</div>\r\n</div>\r\n\r\n<h2>Over 605 Icons</h2>\r\n<div class=\"row\">\r\n		<div class=\"col-sm-2\"><i class=\"fa fa-google-plus\"></i> fa fa-google-plus</div>\r\n		<div class=\"col-sm-2\"><i class=\"fa fa-facebook\"></i> fa fa-facebook</div>\r\n		<div class=\"col-sm-2\"><i class=\"fa fa-twitter\"></i> fa fa-twitter</div>\r\n		<div class=\"col-sm-2\"><i class=\"fa fa-vimeo\"></i> fa fa-vimeo</div>\r\n		<div class=\"col-sm-2\"><i class=\"fa fa-flickr\"></i> fa fa-flickr</div>\r\n		<div class=\"col-sm-2\"><i class=\"fa fa-digg\"></i> fa fa-digg</div>\r\n		<div class=\"col-sm-2\"><i class=\"fa fa-dribbble\"></i> fa fa-dribbble</div>\r\n		<div class=\"col-sm-2\"><i class=\"fa fa-github\"></i> fa fa-github</div>\r\n		<div class=\"col-sm-2\"><i class=\"fa fa-wordpress\"></i> fa fa-wordpress</div>\r\n		<div class=\"col-sm-2\"><i class=\"fa fa-youtube\"></i> fa fa-youtube</div>\r\n		<div class=\"col-sm-2\"><i class=\"fa fa-tumblr\"></i> fa fa-tumblr</div>\r\n		<div class=\"col-sm-2\"><i class=\"fa fa-soundcloud\"></i> fa fa-soundcloud</div>\r\n		<div class=\"col-sm-2\"><i class=\"fa fa-linkedin\"></i> fa fa-linkedin</div>\r\n		<div class=\"col-sm-2\"><i class=\"fa fa-lastfm\"></i> fa fa-lastfm</div>\r\n		<div class=\"col-sm-2\"><i class=\"fa fa-stumbleupon\"></i> fa fa-stumbleupon</div>\r\n		<div class=\"col-sm-2\"><i class=\"fa fa-pinterest\"></i> fa fa-pinterest</div>\r\n</div>\r\n\r\n<h2>Custom Buttons</h2>\r\n<div class=\"row\">\r\n	<div class=\"col-md-6\">\r\n		<p>\r\n			It\'s worth mentioning that theme comes with some custom buttons - feel free to use them:\r\n		</p>\r\n		<p>\r\n			Note that standard Twitter Bootstrap button (CSS class <code>.btn</code>) will look a bit different - they will match the color scheme\r\n		</p>\r\n	</div>\r\n	<div class=\"col-md-6\">\r\n		<table class=\"table\">\r\n			<tr>\r\n				<th>Button</th>\r\n				<th>CSS Class</th>\r\n			</tr>\r\n			<tr>\r\n				<td><a href=\"#\" class=\"btn btn-default\">Grey Button</a></td>\r\n				<td><code>.btn-default</code></td>\r\n			</tr>\r\n			<tr>\r\n				<td><a href=\"#\" class=\"btn btn-primary\">Blue Button</a></td>\r\n				<td><code>.btn-primary</code></td>\r\n			</tr>\r\n			<tr>\r\n				<td><a href=\"#\" class=\"btn btn-warning\">Orange Button</a></td>\r\n				<td><code>.btn-warning</code></td>\r\n			</tr>\r\n			<tr>\r\n				<td><a href=\"#\" class=\"btn btn-green\">Green Button</a></td>\r\n				<td><code>.btn-green</code></td>\r\n			</tr>\r\n			<tr>\r\n				<td><a href=\"#\" class=\"btn btn-danger\">Red Button</a></td>\r\n				<td><code>.btn-danger</code></td>\r\n			</tr>\r\n		</table>\r\n	</div>\r\n</div>\r\n\r\n<h2>Ribbons for Pricing Table</h2>\r\n<div class=\"row\">\r\n	<div class=\"col-md-6\">\r\n		<p>\r\n			mPurpose template comes with one more nice feature - pricing table ribbons!\r\n		</p>\r\n		<p>\r\n			Place the following code before pricing plan title with relevant CSS class to use them:\r\n		</p>\r\n		<pre><code>\r\n			&lt;div class=\"ribbon-wrapper\"&gt;\r\n			&lt;div class=\"price-ribbon ribbon-green\"&gt; ... &lt;/div&gt;\r\n			&lt;/div&gt;\r\n		</code></pre>\r\n	</div>\r\n	<div class=\"col-md-6\">\r\n		<table class=\"table\">\r\n			<tr>\r\n				<th>Example</th>\r\n				<th>CSS Class</th>\r\n			</tr>\r\n			<tr>\r\n				<td>\r\n					<div style=\"width: 100px; height: 100px; background: #FFF; position: relative;\" >\r\n						<div class=\"ribbon-wrapper\">\r\n							<div class=\"price-ribbon ribbon-green\">New</div>\r\n						</div>\r\n					</div>\r\n				</td>\r\n				<td>\r\n					<code>.ribbon-green</code>\r\n				</td>\r\n			</tr>\r\n			<tr>\r\n				<td>\r\n					<div style=\"width: 100px; height: 100px; background: #FFF; position: relative;\" >\r\n						<div class=\"ribbon-wrapper\">\r\n							<div class=\"price-ribbon ribbon-blue\">New</div>\r\n						</div>\r\n					</div>\r\n				</td>\r\n				<td>\r\n					<code>.ribbon-blue</code>\r\n				</td>\r\n			</tr>\r\n			<tr>\r\n				<td>\r\n					<div style=\"width: 100px; height: 100px; background: #FFF; position: relative;\" >\r\n						<div class=\"ribbon-wrapper\">\r\n							<div class=\"price-ribbon ribbon-orange\">New</div>\r\n						</div>\r\n					</div>\r\n				</td>\r\n				<td>\r\n					<code>.ribbon-orange</code>\r\n				</td>\r\n			</tr>\r\n			<tr>\r\n				<td>\r\n					<div style=\"width: 100px; height: 100px; background: #FFF; position: relative;\" >\r\n						<div class=\"ribbon-wrapper\">\r\n							<div class=\"price-ribbon ribbon-red\">New</div>\r\n						</div>\r\n					</div>\r\n				</td>\r\n				<td>\r\n					<code>.ribbon-red</code>\r\n				</td>\r\n			</tr>\r\n		</table>\r\n	</div>\r\n</div>\r\n\r\n<div class=\"section section-white\">\r\n    <div class=\"container\">\r\n    	<div class=\"row\">\r\n    		<div class=\"span12 text-center\">\r\n				<h4>Other components are easy to discover - please check other samples.</h4>\r\n    		</div>\r\n    	</div>\r\n    </div>\r\n</div>', '', '', 0, 0, 1, 1, 1, 0, '0', 0, 0, 0, 0, 0, NULL, 0, NOW()),
(3, 6, 'Pricing', '<div class=\"row\">\r\n	<div class=\"col-md-12\">\r\n		<!-- Pricing Plans Wrapper -->\r\n		<div class=\"pricing-wrapper\">\r\n			<!-- Pricing Plan -->\r\n			<div class=\"pricing-plan\">\r\n				<h2 class=\"pricing-plan-title\">Starter</h2>\r\n				<div class=\"pricing-plan-price\">FREE</div>\r\n				<!-- Pricing Plan Features -->\r\n				<ul class=\"pricing-plan-features\">\r\n					<li><strong>1</strong> user</li>\r\n					<li><strong>Unlimited</strong> projects</li>\r\n					<li><strong>2GB</strong> storage</li>\r\n				</ul>\r\n				<a href=\"#\" class=\"btn\">Order Now</a>\r\n			</div>\r\n			<!-- End Pricing Plan -->\r\n		    <div class=\"pricing-plan\">\r\n				<h2 class=\"pricing-plan-title\">Advanced</h2>\r\n				<div class=\"pricing-plan-price\">$49<span>/mo</span></div>\r\n				<ul class=\"pricing-plan-features\">\r\n					<li><strong>10</strong> users</li>\r\n					<li><strong>Unlimited</strong> projects</li>\r\n					<li><strong>20GB</strong> storage</li>\r\n				</ul>\r\n				<a href=\"#\" class=\"btn\">Order Now</a>\r\n		    </div>\r\n		    <!-- Promoted Pricing Plan (White Background) -->\r\n		    <div class=\"pricing-plan pricing-plan-promote\">\r\n					<h2 class=\"pricing-plan-title\">Premium</h2>\r\n					<div class=\"pricing-plan-price\">$99<span>/mo</span></div>\r\n					<ul class=\"pricing-plan-features\">\r\n						<li><strong>Unlimited</strong> users</li>\r\n						<li><strong>Unlimited</strong> projects</li>\r\n						<li><strong>100GB</strong> storage</li>\r\n					</ul>\r\n				<a href=\"#\" class=\"btn\">Order Now</a>\r\n		    </div>\r\n		    <div class=\"pricing-plan\">\r\n		    	<!-- Pricing Plan Ribbon -->\r\n				<div class=\"ribbon-wrapper\">\r\n					<div class=\"price-ribbon ribbon-green\">New</div>\r\n				</div>\r\n				<h2 class=\"pricing-plan-title\">Mega</h2>\r\n				<div class=\"pricing-plan-price\">$199<span>/mo</span></div>\r\n				<ul class=\"pricing-plan-features\">\r\n					<li><strong>Unlimited</strong> users</li>\r\n					<li><strong>Unlimited</strong> projects</li>\r\n					<li><strong>100GB</strong> storage</li>\r\n				</ul>\r\n				<a href=\"#\" class=\"btn\">Order Now</a>\r\n		    </div>\r\n		</div>\r\n		<!-- End Pricing Plans Wrapper -->\r\n	</div>\r\n</div>\r\n\r\n<hr>\r\n\r\n<div class=\"row\">\r\n	<div class=\"col-md-12 text-center\">\r\n		<div class=\"pricing-wrapper\">\r\n			<div class=\"pricing-plan\">\r\n				<h2 class=\"pricing-plan-title\">Starter</h2>\r\n				<div class=\"pricing-plan-price\">FREE</div>\r\n				<ul class=\"pricing-plan-features\">\r\n					<li><strong>1</strong> user</li>\r\n					<li><strong>Unlimited</strong> projects</li>\r\n					<li><strong>2GB</strong> storage</li>\r\n				</ul>\r\n				<a href=\"#\" class=\"btn\">Order Now</a>\r\n			</div>\r\n		    <div class=\"pricing-plan\">\r\n				<h2 class=\"pricing-plan-title\">Advanced</h2>\r\n				<div class=\"pricing-plan-price\">$49<span>/mo</span></div>\r\n				<ul class=\"pricing-plan-features\">\r\n					<li><strong>10</strong> users</li>\r\n					<li><strong>Unlimited</strong> projects</li>\r\n					<li><strong>20GB</strong> storage</li>\r\n				</ul>\r\n				<a href=\"#\" class=\"btn\">Order Now</a>\r\n		    </div>\r\n		    <div class=\"pricing-plan pricing-plan-promote\">\r\n		    		<div class=\"ribbon-wrapper\">\r\n						<div class=\"price-ribbon ribbon-red\">Sale</div>\r\n					</div>\r\n					<h2 class=\"pricing-plan-title\">Premium</h2>\r\n					<div class=\"pricing-plan-price\">$99<span>/mo</span></div>\r\n					<ul class=\"pricing-plan-features\">\r\n						<li><strong>Unlimited</strong> users</li>\r\n						<li><strong>Unlimited</strong> projects</li>\r\n						<li><strong>100GB</strong> storage</li>\r\n					</ul>\r\n				<a href=\"#\" class=\"btn\">Order Now</a>\r\n		    </div>\r\n		</div>\r\n	</div>\r\n</div>', '', '', 0, 0, 1, 1, 1, 0, '0', 0, 0, 0, 0, 0, NULL, 0, NOW()),
(8, 11, 'Service', '<div class=\"row service-wrapper-row\">\r\n	<div class=\"col-sm-4\">\r\n		<div class=\"service-image\">\r\n			<img src=\"/_files/modern/services1.jpg\" alt=\"Service Name\">\r\n		</div>\r\n	</div>\r\n	<div class=\"col-sm-8\">\r\n		<h3>Vestibulum ante ipsum</h3>\r\n		<p>\r\n			Lorem ipsum dolor sit amet, consectetur adipiscing elit. Ut porta lectus ut ante accumsan, sit amet consectetur nisi tempus. Vestibulum ante ipsum primis in faucibus orci luctus et ultrices posuere cubilia Curae; Nam non justo dignissim, blandit urna a, hendrerit elit. Maecenas hendrerit rhoncus libero. Sed at eleifend velit. \r\n		</p>\r\n	</div>\r\n</div>\r\n<div class=\"row service-wrapper-row\">\r\n	<div class=\"col-sm-4\">\r\n		<div class=\"service-image\">\r\n			<img src=\"/_files/modern/services2.jpg\" alt=\"Service Name\">\r\n		</div>\r\n	</div>\r\n	<div class=\"col-sm-8\">\r\n		<h3>Vestibulum ante ipsum</h3>\r\n		<p>\r\n			Lorem ipsum dolor sit amet, consectetur adipiscing elit. Ut porta lectus ut ante accumsan, sit amet consectetur nisi tempus. Vestibulum ante ipsum primis in faucibus orci luctus et ultrices posuere cubilia Curae; Nam non justo dignissim, blandit urna a, hendrerit elit. Maecenas hendrerit rhoncus libero. Sed at eleifend velit. \r\n		</p>\r\n	</div>\r\n</div>\r\n<div class=\"row service-wrapper-row\">\r\n	<div class=\"col-sm-4\">\r\n		<div class=\"service-image\">\r\n			<img src=\"/_files/modern/services3.jpg\" alt=\"Service Name\">\r\n		</div>\r\n	</div>\r\n	<div class=\"col-sm-8\">\r\n		<h3>Vestibulum ante ipsum</h3>\r\n		<p>\r\n			Lorem ipsum dolor sit amet, consectetur adipiscing elit. Ut porta lectus ut ante accumsan, sit amet consectetur nisi tempus. Vestibulum ante ipsum primis in faucibus orci luctus et ultrices posuere cubilia Curae; Nam non justo dignissim, blandit urna a, hendrerit elit. Maecenas hendrerit rhoncus libero. Sed at eleifend velit. \r\n		</p>\r\n	</div>\r\n</div>\r\n\r\n<!-- Testimonials -->\r\n<h2>Testimonials</h2>\r\n<div class=\"row\">\r\n	<!-- Testimonial -->\r\n	<div class=\"about col-md-4 col-sm-6\">\r\n		<!-- Author Photo -->\r\n		<div class=\"author-photo\">\r\n			<img src=\"/_files/modern/user1.jpg\" alt=\"Author 1\">\r\n		</div>\r\n		<div class=\"about-bubble\">\r\n			<blockquote>\r\n				<!-- Quote -->\r\n				<p class=\"quote\">\r\n                    \"Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut.\"\r\n        		</p>\r\n        		<!-- Author Info -->\r\n        		<cite class=\"author-info\">\r\n        			- Name Surname,<br>Managing Director at <a href=\"#\">Some Company</a>\r\n        		</cite>\r\n        	</blockquote>\r\n        	<div class=\"sprite arrow-speech-bubble\"></div>\r\n        </div>\r\n    </div>\r\n    <!-- End Testimonial -->\r\n    <div class=\"about col-md-4 col-sm-6\">\r\n		<div class=\"author-photo\">\r\n			<img src=\"/_files/modern/user5.jpg\" alt=\"Author 2\">\r\n		</div>\r\n		<div class=\"about-bubble\">\r\n			<blockquote>\r\n				<p class=\"quote\">\r\n                    \"Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo.\"\r\n        		</p>\r\n        		<cite class=\"author-info\">\r\n        			- Name Surname,<br>Managing Director at <a href=\"#\">Some Company</a>\r\n        		</cite>\r\n        	</blockquote>\r\n        	<div class=\"sprite arrow-speech-bubble\"></div>\r\n        </div>\r\n    </div>\r\n	<div class=\"about col-md-4 col-sm-6\">\r\n		<div class=\"author-photo\">\r\n			<img src=\"/_files/modern/user2.jpg\" alt=\"Author 3\">\r\n		</div>\r\n		<div class=\"about-bubble\">\r\n			<blockquote>\r\n				<p class=\"quote\">\r\n                    \"Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur.\"\r\n        		</p>\r\n        		<cite class=\"author-info\">\r\n        			- Name Surname,<br>Managing Director at <a href=\"#\">Some Company</a>\r\n        		</cite>\r\n        	</blockquote>\r\n        	<div class=\"sprite arrow-speech-bubble\"></div>\r\n        </div>\r\n    </div>\r\n</div>\r\n<!-- End Testimonials -->\r\n\r\n<!-- Our Clients -->\r\n<h2>Our Clients</h2>\r\n<div class=\"clients-logo-wrapper text-center row\">\r\n	<div class=\"col-lg-1 col-md-1 col-sm-3 col-xs-6\"><a href=\"#\"><img src=\"/_files/modern/logos/canon.png\" alt=\"Client Name\"></a></div>\r\n	<div class=\"col-lg-1 col-md-1 col-sm-3 col-xs-6\"><a href=\"#\"><img src=\"/_files/modern/logos/cisco.png\" alt=\"Client Name\"></a></div>\r\n	<div class=\"col-lg-1 col-md-1 col-sm-3 col-xs-6\"><a href=\"#\"><img src=\"/_files/modern/logos/dell.png\" alt=\"Client Name\"></a></div>\r\n	<div class=\"col-lg-1 col-md-1 col-sm-3 col-xs-6\"><a href=\"#\"><img src=\"/_files/modern/logos/ea.png\" alt=\"Client Name\"></a></div>\r\n	<div class=\"col-lg-1 col-md-1 col-sm-3 col-xs-6\"><a href=\"#\"><img src=\"/_files/modern/logos/ebay.png\" alt=\"Client Name\"></a></div>\r\n	<div class=\"col-lg-1 col-md-1 col-sm-3 col-xs-6\"><a href=\"#\"><img src=\"/_files/modern/logos/facebook.png\" alt=\"Client Name\"></a></div>\r\n	<div class=\"col-lg-1 col-md-1 col-sm-3 col-xs-6\"><a href=\"#\"><img src=\"/_files/modern/logos/google.png\" alt=\"Client Name\"></a></div>\r\n	<div class=\"col-lg-1 col-md-1 col-sm-3 col-xs-6\"><a href=\"#\"><img src=\"/_files/modern/logos/hp.png\" alt=\"Client Name\"></a></div>\r\n	<div class=\"col-lg-1 col-md-1 col-sm-3 col-xs-6\"><a href=\"#\"><img src=\"/_files/modern/logos/microsoft.png\" alt=\"Client Name\"></a></div>\r\n	<div class=\"col-lg-1 col-md-1 col-sm-3 col-xs-6\"><a href=\"#\"><img src=\"/_files/modern/logos/mysql.png\" alt=\"Client Name\"></a></div>\r\n	<div class=\"col-lg-1 col-md-1 col-sm-3 col-xs-6\"><a href=\"#\"><img src=\"/_files/modern/logos/sony.png\" alt=\"Client Name\"></a></div>\r\n	<div class=\"col-lg-1 col-md-1 col-sm-3 col-xs-6\"><a href=\"#\"><img src=\"/_files/modern/logos/yahoo.png\" alt=\"Client Name\"></a></div>\r\n</div>\r\n<!-- End Our Clients -->', '', '', 0, 1, 1, 1, 1, 0, '0', 0, 0, 0, 0, 0, NULL, 1, NOW()),
(4, 7, 'Our Team', '<div class=\"row\">\r\n	<!-- Team Member -->\r\n	<div class=\"col-md-4 col-sm-6\">\r\n		<div class=\"team-member\">\r\n			<!-- Team Member Photo -->\r\n			<div class=\"team-member-image\"><img src=\"/_files/modern/team1.jpg\" alt=\"Name Surname\"></div>\r\n			<div class=\"team-member-info\">\r\n				<ul>\r\n					<!-- Team Member Info & Social Links -->\r\n					<li class=\"team-member-name\">\r\n						Name Surname\r\n						<!-- Team Member Social Links -->\r\n						<span class=\"team-member-social\">\r\n							<a href=\"#\"><i class=\"fa fa-facebook\"></i></a>\r\n							<a href=\"#\"><i class=\"fa fa-github\"></i></a>\r\n							<a href=\"#\"><i class=\"fa fa-tumblr\"></i></a>\r\n						</span>\r\n					</li>\r\n					<li>Web Developer</li>\r\n				</ul>\r\n			</div>\r\n		</div>\r\n	</div>\r\n	<!-- End Team Member -->\r\n	<div class=\"col-md-4 col-sm-6\">\r\n		<div class=\"team-member\">\r\n			<div class=\"team-member-image\"><img src=\"/_files/modern/team2.jpg\" alt=\"Name Surname\"></div>\r\n			<div class=\"team-member-info\">\r\n				<ul>\r\n					<li class=\"team-member-name\">\r\n						Name Surname\r\n						<span class=\"team-member-social\">\r\n							<a href=\"#\"><i class=\"fa fa-facebook\"></i></a>\r\n							<a href=\"#\"><i class=\"fa fa-dribbble\"></i></a>\r\n							<a href=\"#\"><i class=\"fa fa-tumblr\"></i></a>\r\n						</span>\r\n					</li>\r\n					<li>Web Designer</li>\r\n				</ul>\r\n			</div>\r\n		</div>\r\n	</div>\r\n	<div class=\"col-md-4 col-sm-6\">\r\n		<div class=\"team-member\">\r\n			<div class=\"team-member-image\"><img src=\"/_files/modern/team3.jpg\" alt=\"Name Surname\"></div>\r\n			<div class=\"team-member-info\">\r\n				<ul>\r\n					<li class=\"team-member-name\">\r\n						Name Surname\r\n						<span class=\"team-member-social\">\r\n							<a href=\"#\"><i class=\"fa fa-facebook\"></i></a>\r\n							<a href=\"#\"><i class=\"fa fa-dribbble\"></i></a>\r\n							<a href=\"#\"><i class=\"fa fa-tumblr\"></i></a>\r\n						</span>\r\n					</li>\r\n					<li>Project Manager</li>\r\n				</ul>\r\n			</div>\r\n		</div>\r\n	</div>\r\n	<div class=\"col-md-4 col-sm-6\">\r\n		<div class=\"team-member\">\r\n			<div class=\"team-member-image\"><img src=\"/_files/modern/team4.jpg\" alt=\"Name Surname\"></div>\r\n			<div class=\"team-member-info\">\r\n				<ul>\r\n					<li class=\"team-member-name\">\r\n						Name Surname\r\n						<span class=\"team-member-social\">\r\n							<a href=\"#\"><i class=\"fa fa-facebook\"></i></a>\r\n							<a href=\"#\"><i class=\"fa fa-dribbble\"></i></a>\r\n							<a href=\"#\"><i class=\"fa fa-tumblr\"></i></a>\r\n						</span>\r\n					</li>\r\n					<li>Project Manager</li>\r\n				</ul>\r\n			</div>\r\n		</div>\r\n	</div>\r\n	<div class=\"col-md-4 col-sm-6\">\r\n		<div class=\"team-member\">\r\n			<div class=\"team-member-image\"><img src=\"/_files/modern/team5.jpg\" alt=\"Name Surname\"></div>\r\n			<div class=\"team-member-info\">\r\n				<ul>\r\n					<li class=\"team-member-name\">\r\n						Name Surname\r\n						<span class=\"team-member-social\">\r\n							<a href=\"#\"><i class=\"fa fa-facebook\"></i></a>\r\n							<a href=\"#\"><i class=\"fa fa-dribbble\"></i></a>\r\n							<a href=\"#\"><i class=\"fa fa-tumblr\"></i></a>\r\n						</span>\r\n					</li>\r\n					<li>UX Designer</li>\r\n				</ul>\r\n			</div>\r\n		</div>\r\n	</div>\r\n	<div class=\"col-md-4 col-sm-6\">\r\n		<div class=\"team-member\">\r\n			<div class=\"team-member-image\"><img src=\"/_files/modern/team6.jpg\" alt=\"Name Surname\"></div>\r\n			<div class=\"team-member-info\">\r\n				<ul>\r\n					<li class=\"team-member-name\">\r\n						Name Surname\r\n						<span class=\"team-member-social\">\r\n							<a href=\"#\"><i class=\"fa fa-facebook\"></i></a>\r\n							<a href=\"#\"><i class=\"fa fa-dribbble\"></i></a>\r\n							<a href=\"#\"><i class=\"fa fa-tumblr\"></i></a>\r\n						</span>\r\n					</li>\r\n					<li>Systems Analyst</li>\r\n				</ul>\r\n			</div>\r\n		</div>\r\n	</div>\r\n</div>\r\n\r\n<h2>Join Us!</h2>\r\n		<div class=\"row\">\r\n	    	<!-- Open Vacancies List -->\r\n	    	<div class=\"col-md-8\">\r\n	    		<table class=\"jobs-list\">\r\n	    			<tr>\r\n	    				<th>Position</th>\r\n	    				<th>Location</th>\r\n	    				<th>Type</th>\r\n	    			</tr>\r\n	    			<tr>\r\n	    				<!-- Position -->\r\n	    				<td class=\"job-position\">\r\n	    					<a href=\"page-job-details.html\">Front End Developer</a> <span class=\"label label-danger\">New</span>\r\n	    				</td>\r\n	    				<!-- Location -->\r\n	    				<td class=\"job-location\">\r\n	    					<div class=\"job-country\">United Kingdom</div>\r\n	    					<div class=\"job-city\">London</div>\r\n	    				</td>\r\n	    				<!-- Job Type -->\r\n	    				<td class=\"job-type hidden-phone\">FULL-TIME</td>\r\n	    			</tr>\r\n	    			<tr>\r\n	    				<td class=\"job-position\">\r\n	    					<a href=\"page-job-details.html\">Back-end Developer</a> <span class=\"label label-danger\">New</span>\r\n	    				</td>\r\n	    				<td class=\"job-location\">\r\n	    					<div class=\"job-country\">United Kingdom</div>\r\n	    					<div class=\"job-city\">Manchester</div>\r\n	    				</td>\r\n	    				<td class=\"job-type hidden-phone\">PART-TIME</td>\r\n	    			</tr>\r\n	    			<tr>\r\n	    				<td class=\"job-position\">\r\n	    					<a href=\"page-job-details.html\">Creative Director</a>\r\n	    				</td>\r\n	    				<td class=\"job-location\">\r\n	    					<div class=\"job-country\">United Kingdom</div>\r\n	    					<div class=\"job-city\">Manchester</div>\r\n	    				</td>\r\n	    				<td class=\"job-type hidden-phone\">PART-TIME</td>\r\n	    			</tr>\r\n	    			<tr>\r\n	    				<td class=\"job-position\">\r\n	    					<a href=\"page-job-details.html\">Interactive Developer</a> <span class=\"label label-danger\">New</span>\r\n	    				</td>\r\n	    				<td class=\"job-location\">\r\n	    					<div class=\"job-country\">United Kingdom</div>\r\n	    					<div class=\"job-city\">Manchester</div>\r\n	    				</td>\r\n	    				<td class=\"job-type hidden-phone\">PART-TIME</td>\r\n	    			</tr>\r\n	    			<tr>\r\n	    				<td class=\"job-position\">\r\n	    					<a href=\"page-job-details.html\">Lead Designer</a>\r\n	    				</td>\r\n	    				<td class=\"job-location\">\r\n	    					<div class=\"job-country\">United Kingdom</div>\r\n	    					<div class=\"job-city\">Manchester</div>\r\n	    				</td>\r\n	    				<td class=\"job-type hidden-phone\">PART-TIME</td>\r\n	    			</tr>\r\n	    			<tr>\r\n	    				<td class=\"job-position\">\r\n	    					<a href=\"page-job-details.html\">Ruby on Rails Developer</a>\r\n	    				</td>\r\n	    				<td class=\"job-location\">\r\n	    					<div class=\"job-country\">United Kingdom</div>\r\n	    					<div class=\"job-city\">Manchester</div>\r\n	    				</td>\r\n	    				<td class=\"job-type hidden-phone\">PART-TIME</td>\r\n	    			</tr>\r\n	    		</table>\r\n	    </div>\r\n	    <!-- End Open Vacancies List -->\r\n\r\n	    <!-- Sidebar -->\r\n	    <div class=\"col-md-4 col-sm-6\">\r\n	    	<div class=\"join-us-promo\">\r\n	    		<!-- Quote -->\r\n	    		<div class=\"join-us-bubble\">\r\n	    			<blockquote>\r\n	    				<p class=\"quote\">\r\n	                        \"You are very welcome in our team! Ut enim ad minim veniam, quis nostrud exercitation.\"\r\n	            		</p>\r\n	            		<cite class=\"author-info\">\r\n	            			- Name Surname,<br>Managing Director\r\n	            		</cite>\r\n	            	</blockquote>\r\n	            	<div class=\"sprite arrow-speech-bubble\"></div>\r\n	            </div>\r\n	            <!-- Team Member Photo -->\r\n	            <div class=\"author-photo\">\r\n	    			<img src=\"/_files/modern/user2.jpg\" alt=\"Name Surname\">\r\n	    		</div>\r\n	    	</div>\r\n	    </div>\r\n	    <!-- End Sidebar -->\r\n</div>', '', '', 0, 0, 1, 1, 1, 0, '0', 0, 0, 0, 0, 0, NULL, 1, NOW()),
(5, 8, 'Portfolio', '<div class=\"row\">\r\n	<div class=\"col-md-4 col-sm-6\">\r\n		<div class=\"zoom-item\">\r\n			<div class=\"zoom-image\">\r\n				<a href=\"#\"><img src=\"/_files/modern/portfolio1.jpg\" alt=\"Project Name\"></a>\r\n			</div>\r\n			<div class=\"zoom-info\">\r\n				<ul>\r\n					<li class=\"zoom-project-name\">Project Name</li>\r\n					<li>Website design & Development</li>\r\n					<li>Client: Some Client LTD</li>\r\n					<li class=\"read-more\"><a href=\"#\" class=\"btn\">Read more</a></li>\r\n				</ul>\r\n			</div>\r\n		</div>\r\n	</div>\r\n	<div class=\"col-md-4 col-sm-6\">\r\n		<div class=\"zoom-item\">\r\n			<div class=\"zoom-image\">\r\n				<a href=\"#\"><img src=\"/_files/modern/portfolio2.jpg\" alt=\"Project Name\"></a>\r\n			</div>\r\n			<div class=\"zoom-info\">\r\n				<ul>\r\n					<li class=\"zoom-project-name\">Project Name</li>\r\n					<li>Website design & Development</li>\r\n					<li>Client: Some Client LTD</li>\r\n					<li class=\"read-more\"><a href=\"#\" class=\"btn\">Read more</a></li>\r\n				</ul>\r\n			</div>\r\n		</div>\r\n	</div>\r\n	<div class=\"col-md-4 col-sm-6\">\r\n		<div class=\"zoom-item\">\r\n			<div class=\"zoom-image\">\r\n				<a href=\"#\"><img src=\"/_files/modern/portfolio3.jpg\" alt=\"Project Name\"></a>\r\n			</div>\r\n			<div class=\"zoom-info\">\r\n				<ul>\r\n					<li class=\"zoom-project-name\">Project Name</li>\r\n					<li>Website design & Development</li>\r\n					<li>Client: Some Client LTD</li>\r\n					<li class=\"read-more\"><a href=\"#\" class=\"btn\">Read more</a></li>\r\n				</ul>\r\n			</div>\r\n		</div>\r\n	</div>\r\n	<div class=\"col-md-4 col-sm-6\">\r\n		<div class=\"zoom-item\">\r\n			<div class=\"zoom-image\">\r\n				<a href=\"#\"><img src=\"/_files/modern/portfolio4.jpg\" alt=\"Project Name\"></a>\r\n			</div>\r\n			<div class=\"zoom-info\">\r\n				<ul>\r\n					<li class=\"zoom-project-name\">Project Name</li>\r\n					<li>Website design & Development</li>\r\n					<li>Client: Some Client LTD</li>\r\n					<li class=\"read-more\"><a href=\"#\" class=\"btn\">Read more</a></li>\r\n				</ul>\r\n			</div>\r\n		</div>\r\n	</div>\r\n	<div class=\"col-md-4 col-sm-6\">\r\n		<div class=\"zoom-item\">\r\n			<div class=\"zoom-image\">\r\n				<a href=\"#\"><img src=\"/_files/modern/portfolio5.jpg\" alt=\"Project Name\"></a>\r\n			</div>\r\n			<div class=\"zoom-info\">\r\n				<ul>\r\n					<li class=\"zoom-project-name\">Project Name</li>\r\n					<li>Website design & Development</li>\r\n					<li>Client: Some Client LTD</li>\r\n					<li class=\"read-more\"><a href=\"#\" class=\"btn\">Read more</a></li>\r\n				</ul>\r\n			</div>\r\n		</div>\r\n	</div>\r\n	<div class=\"col-md-4 col-sm-6\">\r\n		<div class=\"zoom-item\">\r\n			<div class=\"zoom-image\">\r\n				<a href=\"#\"><img src=\"/_files/modern/portfolio6.jpg\" alt=\"Project Name\"></a>\r\n			</div>\r\n			<div class=\"zoom-info\">\r\n				<ul>\r\n					<li class=\"zoom-project-name\">Project Name</li>\r\n					<li>Website design & Development</li>\r\n					<li>Client: Some Client LTD</li>\r\n					<li class=\"read-more\"><a href=\"#\" class=\"btn\">Read more</a></li>\r\n				</ul>\r\n			</div>\r\n		</div>\r\n	</div>\r\n</div>', '', '', 0, 0, 1, 1, 1, 0, '0', 0, 0, 0, 0, 0, NULL, 1, NOW()),
(6, 9, 'Portfolio 2', '<div class=\"row\">\r\n	<div class=\"col-sm-6\">\r\n		<div class=\"zoom-item\">\r\n			<div class=\"zoom-image\">\r\n				<a href=\"#\"><img src=\"/_files/modern/portfolio1.jpg\" alt=\"Project Name\"></a>\r\n			</div>\r\n			<div class=\"zoom-info-fade\">\r\n				<ul>\r\n					<li class=\"zoom-project-name\">Project Name</li>\r\n					<li>Website design & Development</li>\r\n					<li>Client: Some Client LTD</li>\r\n					<li class=\"read-more\"><a href=\"#\" class=\"btn\">Read more</a></li>\r\n				</ul>\r\n			</div>\r\n		</div>\r\n	</div>\r\n	<div class=\"col-sm-6\">\r\n		<div class=\"zoom-item\">\r\n			<div class=\"zoom-image\">\r\n				<a href=\"#\"><img src=\"/_files/modern/portfolio2.jpg\" alt=\"Project Name\"></a>\r\n			</div>\r\n			<div class=\"zoom-info-fade\">\r\n				<ul>\r\n					<li class=\"zoom-project-name\">Project Name</li>\r\n					<li>Website design & Development</li>\r\n					<li>Client: Some Client LTD</li>\r\n					<li class=\"read-more\"><a href=\"#\" class=\"btn\">Read more</a></li>\r\n				</ul>\r\n			</div>\r\n		</div>\r\n	</div>\r\n	<div class=\"col-sm-6\">\r\n		<div class=\"zoom-item\">\r\n			<div class=\"zoom-image\">\r\n				<a href=\"#\"><img src=\"/_files/modern/portfolio3.jpg\" alt=\"Project Name\"></a>\r\n			</div>\r\n			<div class=\"zoom-info-fade\">\r\n				<ul>\r\n					<li class=\"zoom-project-name\">Project Name</li>\r\n					<li>Website design & Development</li>\r\n					<li>Client: Some Client LTD</li>\r\n					<li class=\"read-more\"><a href=\"#\" class=\"btn\">Read more</a></li>\r\n				</ul>\r\n			</div>\r\n		</div>\r\n	</div>\r\n	<div class=\"col-sm-6\">\r\n		<div class=\"zoom-item\">\r\n			<div class=\"zoom-image\">\r\n				<a href=\"#\"><img src=\"/_files/modern/portfolio4.jpg\" alt=\"Project Name\"></a>\r\n			</div>\r\n			<div class=\"zoom-info-fade\">\r\n				<ul>\r\n					<li class=\"zoom-project-name\">Project Name</li>\r\n					<li>Website design & Development</li>\r\n					<li>Client: Some Client LTD</li>\r\n					<li class=\"read-more\"><a href=\"#\" class=\"btn\">Read more</a></li>\r\n				</ul>\r\n			</div>\r\n		</div>\r\n	</div>\r\n	<div class=\"col-sm-6\">\r\n		<div class=\"zoom-item\">\r\n			<div class=\"zoom-image\">\r\n				<a href=\"#\"><img src=\"/_files/modern/portfolio5.jpg\" alt=\"Project Name\"></a>\r\n			</div>\r\n			<div class=\"zoom-info-fade\">\r\n				<ul>\r\n					<li class=\"zoom-project-name\">Project Name</li>\r\n					<li>Website design & Development</li>\r\n					<li>Client: Some Client LTD</li>\r\n					<li class=\"read-more\"><a href=\"#\" class=\"btn\">Read more</a></li>\r\n				</ul>\r\n			</div>\r\n		</div>\r\n	</div>\r\n	<div class=\"col-sm-6\">\r\n		<div class=\"zoom-item\">\r\n			<div class=\"zoom-image\">\r\n				<a href=\"#\"><img src=\"/_files/modern/portfolio6.jpg\" alt=\"Project Name\"></a>\r\n			</div>\r\n			<div class=\"zoom-info-fade\">\r\n				<ul>\r\n					<li class=\"zoom-project-name\">Project Name</li>\r\n					<li>Website design & Development</li>\r\n					<li>Client: Some Client LTD</li>\r\n					<li class=\"read-more\"><a href=\"#\" class=\"btn\">Read more</a></li>\r\n				</ul>\r\n			</div>\r\n		</div>\r\n	</div>\r\n</div>', '', '', 0, 0, 1, 1, 1, 0, '0', 0, 0, 0, 0, 0, NULL, 1, NOW()),
(7, 10, 'Portfolio Item', '<div class=\"row\">\r\n	<!-- Image Column -->\r\n	<div class=\"col-sm-6\">\r\n		<div class=\"zoom-item\">\r\n			<div class=\"zoom-image\">\r\n				<a href=\"#\"><img src=\"/_files/modern/portfolio2.jpg\" alt=\"Project Name\"></a>\r\n			</div>\r\n		</div>\r\n	</div>\r\n	<!-- End Image Column -->\r\n	<!-- Project Info Column -->\r\n	<div class=\"zoom-item-description col-sm-6\">\r\n		<h3>Project Description</h3>\r\n		<p>\r\n			Mauris auctor blandit neque eu cursus. Nunc vel commodo dui, sed tempus mi. Fusce eleifend, orci ut elementum porta, mauris leo porta purus.\r\n		</p>\r\n		<p>\r\n			Etiam aliquet tempor est nec pharetra. Etiam interdum tincidunt orci vitae elementum. Donec sollicitudin quis risus sit amet lobortis. Fusce sed tincidunt nisl.\r\n		</p>\r\n		<ul class=\"no-list-style\">\r\n			<li><b>Client:</b> Some Client LTD</li>\r\n			<li><b>Date:</b> 06. May 2009 - 29. February 2016</li>\r\n			<li><b>Technologies:</b> HTML5, CSS3, Javascript, PHP, MySQL</li>\r\n			<li class=\"zoom-visit-btn\"><a href=\"#\" class=\"btn\">Visit Website</a></li>\r\n		</ul>\r\n	</div>\r\n	<!-- End Project Info Column -->\r\n</div>\r\n<!-- Related Projects -->\r\n<h3>Related Projects</h3>\r\n<div class=\"row\">\r\n	<div class=\"col-md-4 col-sm-6\">\r\n		<div class=\"zoom-item\">\r\n			<div class=\"zoom-image\">\r\n				<a href=\"#\"><img src=\"/_files/modern/portfolio3.jpg\" alt=\"Project Name\"></a>\r\n			</div>\r\n			<div class=\"zoom-info-fade\">\r\n				<ul>\r\n					<li class=\"zoom-project-name\">Project Name</li>\r\n					<li>Website design & Development</li>\r\n					<li>Client: Some Client LTD</li>\r\n					<li class=\"read-more\"><a href=\"#\" class=\"btn\">Read more</a></li>\r\n				</ul>\r\n			</div>\r\n		</div>\r\n	</div>\r\n	<div class=\"col-md-4 col-sm-6\">\r\n		<div class=\"zoom-item\">\r\n			<div class=\"zoom-image\">\r\n				<a href=\"#\"><img src=\"/_files/modern/portfolio4.jpg\" alt=\"Project Name\"></a>\r\n			</div>\r\n			<div class=\"zoom-info-fade\">\r\n				<ul>\r\n					<li class=\"zoom-project-name\">Project Name</li>\r\n					<li>Website design & Development</li>\r\n					<li>Client: Some Client LTD</li>\r\n					<li class=\"read-more\"><a href=\"#\" class=\"btn\">Read more</a></li>\r\n				</ul>\r\n			</div>\r\n		</div>\r\n	</div>\r\n	<div class=\"col-md-4 col-sm-6\">\r\n		<div class=\"zoom-item\">\r\n			<div class=\"zoom-image\">\r\n				<a href=\"#\"><img src=\"/_files/modern/portfolio6.jpg\" alt=\"Project Name\"></a>\r\n			</div>\r\n			<div class=\"zoom-info-fade\">\r\n				<ul>\r\n					<li class=\"zoom-project-name\">Project Name</li>\r\n					<li>Website design & Development</li>\r\n					<li>Client: Some Client LTD</li>\r\n					<li class=\"read-more\"><a href=\"#\" class=\"btn\">Read more</a></li>\r\n				</ul>\r\n			</div>\r\n		</div>\r\n	</div>\r\n</div>\r\n<!-- End Related Projects -->', '', '', 0, 0, 1, 1, 1, 0, '0', 0, 0, 0, 0, 0, NULL, 1, NOW()),
(9, 12, 'Service 3 Column', '<div class=\"row\">\r\n	<div class=\"col-md-4 col-sm-6\">\r\n		<div class=\"service-wrapper\">\r\n			<img src=\"/_files/modern/service-icon/diamond.png\" alt=\"Service Name\">\r\n			<h3>Aliquam in adipiscing</h3>\r\n			<p>Praesent rhoncus mauris ac sollicitudin vehicula. Nam fringilla turpis turpis, at posuere turpis aliquet sit amet condimentum</p>\r\n			<a href=\"#\" class=\"btn\">Read more</a>\r\n		</div>\r\n	</div>\r\n	<div class=\"col-md-4 col-sm-6\">\r\n		<div class=\"service-wrapper\">\r\n			<img src=\"/_files/modern/service-icon/ruler.png\" alt=\"Service Name\">\r\n			<h3>Curabitur mollis</h3>\r\n			<p>Suspendisse eget libero mi. Fusce ligula orci, vulputate nec elit ultrices, ornare faucibus orci. Aenean lectus sapien, vehicula</p>\r\n			<a href=\"#\" class=\"btn\">Read more</a>\r\n		</div>\r\n	</div>\r\n	<div class=\"col-md-4 col-sm-6\">\r\n		<div class=\"service-wrapper\">\r\n			<img src=\"/_files/modern/service-icon/box.png\" alt=\"Service Name\">\r\n			<h3>Vivamus mattis</h3>\r\n			<p>Phasellus posuere et nisl ac commodo. Nulla facilisi. Sed tincidunt bibendum cursus. Aenean vulputate aliquam risus rutrum scelerisque</p>\r\n			<a href=\"#\" class=\"btn\">Read more</a>\r\n		</div>\r\n	</div>\r\n	<div class=\"col-md-4 col-sm-6\">\r\n		<div class=\"service-wrapper\">\r\n			<img src=\"/_files/modern/service-icon/diamond.png\" alt=\"Service Name\">\r\n			<h3>Aliquam in adipiscing</h3>\r\n			<p>Praesent rhoncus mauris ac sollicitudin vehicula. Nam fringilla turpis turpis, at posuere turpis aliquet sit amet condimentum</p>\r\n			<a href=\"#\" class=\"btn\">Read more</a>\r\n		</div>\r\n	</div>\r\n	<div class=\"col-md-4 col-sm-6\">\r\n		<div class=\"service-wrapper\">\r\n			<img src=\"/_files/modern/service-icon/ruler.png\" alt=\"Service Name\">\r\n			<h3>Curabitur mollis</h3>\r\n			<p>Suspendisse eget libero mi. Fusce ligula orci, vulputate nec elit ultrices, ornare faucibus orci. Aenean lectus sapien, vehicula</p>\r\n			<a href=\"#\" class=\"btn\">Read more</a>\r\n		</div>\r\n	</div>\r\n	<div class=\"col-md-4 col-sm-6\">\r\n		<div class=\"service-wrapper\">\r\n			<img src=\"/_files/modern/service-icon/box.png\" alt=\"Service Name\">\r\n			<h3>Vivamus mattis</h3>\r\n			<p>Phasellus posuere et nisl ac commodo. Nulla facilisi. Sed tincidunt bibendum cursus. Aenean vulputate aliquam risus rutrum scelerisque</p>\r\n			<a href=\"#\" class=\"btn\">Read more</a>\r\n		</div>\r\n	</div>\r\n</div>', '', '', 0, 0, 1, 1, 1, 0, '0', 0, 0, 0, 0, 0, NULL, 1, NOW()),
(10, 13, 'Contact Us', '<h3>Get In Touch</h3>\r\n<p>Feel free to contact us by the contact form at any time, we usually respond in less then 24 hours.</p>\r\n<div class=\"row\">\r\n<div class=\"col-md-3\"><address><strong>JAKWEB / Switzerland</strong><br /> Hch.Bosshardstrasse 26 / 8352 Elsau<br /> <abbr title=\"Phone\">Phone:</abbr> +41 123 123 123<br /> <abbr title=\"Email\">Email:</abbr> email@domain.com</address>\r\n</div>\r\n<div class=\"col-md-3\"><address><strong>JAKWEB / Spain</strong><br /> Carrer Obila 3 / 03720 Benissa / Espa&ntilde;a<br /> <abbr title=\"Phone\">Phone:</abbr> +34 123 123 123<br /> <abbr title=\"Email\">Email:</abbr> email@domain.com</address>\r\n</div>\r\n<div class=\"col-md-6\"><a href=\"#\" class=\"jakMap\"><img src=\"/_files/modern/map.jpg\" alt=\"map\" height=\"150\" width=\"420\" /><span class=\"small-plus\"></span></a></div>\r\n</div>\r\n<hr />', '', '', 0, 0, 1, 1, 1, 1, '0', 0, 0, 0, 0, 0, NULL, 1, NOW()),
(11, 14, 'Coming soon', '<img alt=\"full screen background image\" src=\"/_files/modern/launch-bg.jpg\" class=\"full-screen-background\" />\r\n<div class=\"coming-soon-top\">\r\n	<div class=\"container\">\r\n		<div class=\"row\">\r\n    		<div class=\"col-md-12\">\r\n    			<div class=\"logo-wrapper\">\r\n    				<a href=\"/\"><img src=\"/_files/logo_small.png\" alt=\"JAKWEB CMS\"></a>\r\n    			</div>\r\n    		</div>\r\n    	</div>\r\n	</div>\r\n</div>\r\n<div class=\"coming-soon-content\">\r\n	<h3>We are working on a new awesome website.<br/><b>It\'s coming soon!</b></h3>\r\n	\r\n	<div class=\"coming-soon-subscribe container\">\r\n        <div class=\"row\">\r\n            <div class=\"col-lg-4 col-lg-offset-4 col-sm-6 col-sm-offset-3\">\r\n				<p>Navbar and Footer can be hidden for each individual page. Click on the logo to start fresh.</p>\r\n            </div>\r\n            <div class=\"col-lg-4 col-lg-offset-4 col-sm-6 col-sm-offset-3\">\r\n				<div class=\"coming-soon-social\">\r\n					<a href=\"#\" data-toggle=\"tooltip\" data-original-title=\"Join Us!\" data-placement=\"top\" class=\"show-tooltip\"><i class=\"fa fa-facebook fa-3x\"></i></a>\r\n					<a href=\"#\" data-toggle=\"tooltip\" data-original-title=\"Join Us!\" data-placement=\"top\" class=\"show-tooltip\"><i class=\"fa fa-github fa-3x\"></i></a>\r\n					<a href=\"#\" data-toggle=\"tooltip\" data-original-title=\"Join Us!\" data-placement=\"top\" class=\"show-tooltip\"><i class=\"fa fa-tumblr fa-3x\"></i></a>\r\n				</div>\r\n            </div>\r\n        </div>\r\n	</div>\r\n</div>', '<link rel=\"stylesheet\" href=\"/template/jakweb/css/screen.css\" type=\"text/css\" />', '', 0, 0, 1, 0, 0, 0, '0', 0, 0, 0, 0, 0, NULL, 1, NOW()),
(12, 15, 'One Page', '<div id=\"page-top\"></div>\r\n<nav id=\"mainNav\" class=\"navbar navbar-default navbar-fixed-top\">\r\n	<div class=\"container-fluid\">\r\n            <!-- Brand and toggle get grouped for better mobile display -->\r\n            <div class=\"navbar-header\">\r\n                <button type=\"button\" class=\"navbar-toggle collapsed\" data-toggle=\"collapse\" data-target=\"#bs-example-navbar-collapse-1\">\r\n                    <span class=\"sr-only\">Toggle navigation</span>\r\n                    <span class=\"icon-bar\"></span>\r\n                    <span class=\"icon-bar\"></span>\r\n                    <span class=\"icon-bar\"></span>\r\n                </button>\r\n                <a class=\"navbar-brand page-scroll\" href=\"/\">CMS</a>\r\n            </div>\r\n\r\n            <!-- Collect the nav links, forms, and other content for toggling -->\r\n            <div class=\"collapse navbar-collapse\" id=\"bs-example-navbar-collapse-1\">\r\n                <ul class=\"nav navbar-nav navbar-right\">\r\n                    <li>\r\n                        <a class=\"page-scroll\" href=\"#page-top\">Top</a>\r\n                    </li>\r\n                    <li>\r\n                        <a class=\"page-scroll\" href=\"#about\">About</a>\r\n                    </li>\r\n                    <li>\r\n                        <a class=\"page-scroll\" href=\"#services\">Services</a>\r\n                    </li>\r\n                    <li>\r\n                        <a class=\"page-scroll\" href=\"#portfolio\">Portfolio</a>\r\n                    </li>\r\n                    <li>\r\n                        <a class=\"page-scroll\" href=\"#contact\">Contact</a>\r\n                    </li>\r\n                </ul>\r\n            </div>\r\n            <!-- /.navbar-collapse -->\r\n    </div>\r\n	<!-- /.container-fluid -->\r\n</nav>\r\n\r\n<header>\r\n    <div class=\"header-content\">\r\n        <div class=\"header-content-inner\">\r\n            <h1>Your favourite CMS without any limitations!</h1>\r\n            <hr>\r\n            <p>CMS will help you build better websites using the Bootstrap CSS framework! Just get your license and start going, no strings attached!</p>\r\n            <a href=\"#about\" class=\"btn btn-primary btn-xl page-scroll\">Find Out More</a>\r\n        </div>\r\n    </div>\r\n</header>\r\n\r\n<section class=\"bg-primary\" id=\"about\">\r\n    <div class=\"container\">\r\n        <div class=\"row\">\r\n            <div class=\"col-lg-8 col-lg-offset-2 text-center\">\r\n                <h2 class=\"section-heading\">We\'ve got what you need!</h2>\r\n                <hr class=\"light\">\r\n                <p class=\"text-faded\">CMS has everything you need to get your new website up and running in no time! All the plugins, templates and themes are ready and waiting for you, get your license and start building websites like a PRO with unlimited options and most important it is super easy to use. No strings attached!</p>\r\n                <a href=\"#\" class=\"btn btn-default btn-xl\">Get Started!</a>\r\n            </div>\r\n        </div>\r\n    </div>\r\n</section>\r\n\r\n<section id=\"services\">\r\n    <div class=\"container\">\r\n        <div class=\"row\">\r\n            <div class=\"col-lg-12 text-center\">\r\n                <h2 class=\"section-heading\">At Your Service</h2>\r\n                <hr class=\"primary\">\r\n            </div>\r\n        </div>\r\n    </div>\r\n    <div class=\"container\">\r\n        <div class=\"row\">\r\n            <div class=\"col-lg-3 col-md-6 text-center\">\r\n                <div class=\"service-box\">\r\n                    <i class=\"fa fa-4x fa-diamond wow bounceIn text-primary\"></i>\r\n                    <h3>Sturdy Templates</h3>\r\n                    <p class=\"text-muted\">Our CMS is updated regularly so it does not break.</p>\r\n                </div>\r\n            </div>\r\n            <div class=\"col-lg-3 col-md-6 text-center\">\r\n                <div class=\"service-box\">\r\n                    <i class=\"fa fa-4x fa-paper-plane wow bounceIn text-primary\" data-wow-delay=\".1s\"></i>\r\n                    <h3>Ready to Ship</h3>\r\n                    <p class=\"text-muted\">You can use this theme as it is or you can make changes!</p>\r\n                </div>\r\n            </div>\r\n            <div class=\"col-lg-3 col-md-6 text-center\">\r\n                <div class=\"service-box\">\r\n                    <i class=\"fa fa-4x fa-newspaper-o wow bounceIn text-primary\" data-wow-delay=\".2s\"></i>\r\n                    <h3>Up to Date</h3>\r\n                    <p class=\"text-muted\">We update dependencies to keep things fresh.</p>\r\n                </div>\r\n            </div>\r\n            <div class=\"col-lg-3 col-md-6 text-center\">\r\n                <div class=\"service-box\">\r\n                    <i class=\"fa fa-4x fa-heart wow bounceIn text-primary\" data-wow-delay=\".3s\"></i>\r\n                    <h3>Made with Love</h3>\r\n                    <p class=\"text-muted\">You have to make your websites with love these days!</p>\r\n                </div>\r\n            </div>\r\n        </div>\r\n    </div>\r\n</section>\r\n\r\n<section class=\"no-padding\" id=\"portfolio\">\r\n    <div class=\"container-fluid\">\r\n        <div class=\"row no-gutter\">\r\n            <div class=\"col-lg-4 col-sm-6\">\r\n                <a href=\"#\" class=\"portfolio-box\">\r\n                    <img src=\"/_files/onepage/img/portfolio/1.jpg\" class=\"img-responsive\" alt=\"\">\r\n                    <div class=\"portfolio-box-caption\">\r\n                        <div class=\"portfolio-box-caption-content\">\r\n                            <div class=\"project-category text-faded\">\r\n                                Category\r\n                            </div>\r\n                            <div class=\"project-name\">\r\n                                Project Name\r\n                            </div>\r\n                        </div>\r\n                    </div>\r\n                </a>\r\n            </div>\r\n            <div class=\"col-lg-4 col-sm-6\">\r\n                <a href=\"#\" class=\"portfolio-box\">\r\n                    <img src=\"/_files/onepage/img/portfolio/2.jpg\" class=\"img-responsive\" alt=\"\">\r\n                    <div class=\"portfolio-box-caption\">\r\n                        <div class=\"portfolio-box-caption-content\">\r\n                            <div class=\"project-category text-faded\">\r\n                                Category\r\n                            </div>\r\n                            <div class=\"project-name\">\r\n                                Project Name\r\n                            </div>\r\n                        </div>\r\n                    </div>\r\n                </a>\r\n            </div>\r\n            <div class=\"col-lg-4 col-sm-6\">\r\n                <a href=\"#\" class=\"portfolio-box\">\r\n                    <img src=\"/_files/onepage/img/portfolio/3.jpg\" class=\"img-responsive\" alt=\"\">\r\n                    <div class=\"portfolio-box-caption\">\r\n                        <div class=\"portfolio-box-caption-content\">\r\n                            <div class=\"project-category text-faded\">\r\n                                Category\r\n                            </div>\r\n                            <div class=\"project-name\">\r\n                                Project Name\r\n                            </div>\r\n                        </div>\r\n                    </div>\r\n                </a>\r\n            </div>\r\n            <div class=\"col-lg-4 col-sm-6\">\r\n                <a href=\"#\" class=\"portfolio-box\">\r\n                    <img src=\"/_files/onepage/img/portfolio/4.jpg\" class=\"img-responsive\" alt=\"\">\r\n                    <div class=\"portfolio-box-caption\">\r\n                        <div class=\"portfolio-box-caption-content\">\r\n                            <div class=\"project-category text-faded\">\r\n                                Category\r\n                            </div>\r\n                            <div class=\"project-name\">\r\n                                Project Name\r\n                            </div>\r\n                        </div>\r\n                    </div>\r\n                </a>\r\n            </div>\r\n            <div class=\"col-lg-4 col-sm-6\">\r\n                <a href=\"#\" class=\"portfolio-box\">\r\n                    <img src=\"/_files/onepage/img/portfolio/5.jpg\" class=\"img-responsive\" alt=\"\">\r\n                    <div class=\"portfolio-box-caption\">\r\n                        <div class=\"portfolio-box-caption-content\">\r\n                            <div class=\"project-category text-faded\">\r\n                                Category\r\n                            </div>\r\n                            <div class=\"project-name\">\r\n                                Project Name\r\n                            </div>\r\n                        </div>\r\n                    </div>\r\n                </a>\r\n            </div>\r\n            <div class=\"col-lg-4 col-sm-6\">\r\n                <a href=\"#\" class=\"portfolio-box\">\r\n                    <img src=\"/_files/onepage/img/portfolio/6.jpg\" class=\"img-responsive\" alt=\"\">\r\n                    <div class=\"portfolio-box-caption\">\r\n                        <div class=\"portfolio-box-caption-content\">\r\n                            <div class=\"project-category text-faded\">\r\n                                Category\r\n                            </div>\r\n                            <div class=\"project-name\">\r\n                                Project Name\r\n                            </div>\r\n                        </div>\r\n                    </div>\r\n                </a>\r\n            </div>\r\n        </div>\r\n    </div>\r\n</section>\r\n\r\n<aside class=\"bg-dark\">\r\n    <div class=\"container text-center\">\r\n        <div class=\"call-to-action\">\r\n            <h2>Easy to use with CMS!</h2>\r\n            <a href=\"#\" class=\"btn btn-default btn-xl wow tada\">Download Now!</a>\r\n        </div>\r\n    </div>\r\n</aside>\r\n\r\n<section id=\"contact\">\r\n    <div class=\"container\">\r\n        <div class=\"row\">\r\n            <div class=\"col-lg-8 col-lg-offset-2 text-center\">\r\n                <h2 class=\"section-heading\">Let\'s Get In Touch!</h2>\r\n                <hr class=\"primary\">\r\n                <p>Ready to start your next project with us? That\'s great! Give us a call or send us an email and we will get back to you as soon as possible!</p>\r\n            </div>\r\n            <div class=\"col-lg-4 col-lg-offset-2 text-center\">\r\n                <i class=\"fa fa-phone fa-3x wow bounceIn\"></i>\r\n                <p>123-456-6789</p>\r\n            </div>\r\n            <div class=\"col-lg-4 text-center\">\r\n                <i class=\"fa fa-envelope-o fa-3x wow bounceIn\" data-wow-delay=\".1s\"></i>\r\n                <p><a href=\"mailto:email@domain.com\">email@domain.com</a></p>\r\n            </div>\r\n        </div>\r\n    </div>\r\n</section>', '<link rel=\"stylesheet\" href=\"/_files/onepage/animate.min.css\" type=\"text/css\" />\r\n<link rel=\"stylesheet\" href=\"/_files/onepage/creative.css\" type=\"text/css\" />', '<script src=\"/_files/onepage/jquery.easing.min.js\"></script>\r\n<script src=\"/_files/onepage/jquery.fittext.js\"></script>\r\n<script src=\"/_files/onepage/wow.min.js\"></script>\r\n<script src=\"/_files/onepage/creative.js\"></script>', 0, 0, 1, 0, 0, 0, '0', 0, 0, 0, 0, 0, NULL, 1, NOW());");

$jakdb->query("CREATE TABLE ".DB_PREFIX."pagesgrid (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `pageid` int(11) unsigned NOT NULL DEFAULT '0',
  `newsid` int(11) unsigned NOT NULL DEFAULT '0',
  `pluginid` int(11) unsigned NOT NULL DEFAULT '0',
  `hookid` int(11) unsigned NOT NULL DEFAULT '0',
  `plugin` int(11) unsigned NOT NULL DEFAULT '0',
  `whatid` int(11) unsigned NOT NULL DEFAULT '0',
  `orderid` int(11) unsigned NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`),
  KEY `pageid` (`pageid`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8");

$jakdb->query("INSERT INTO ".DB_PREFIX."pagesgrid (`id`, `pageid`, `newsid`, `pluginid`, `hookid`, `plugin`, `whatid`, `orderid`) VALUES
(1, 1, 1, 9999, 0, 0, 0, 1),
(2, 1, 0, 9998, 0, 0, 0, 2),
(3, 1, 0, 9997, 0, 0, 0, 3),
(4, 0, 1, 9997, 0, 0, 0, 4),
(5, 2, 0, 9999, 0, 0, 0, 1),
(6, 2, 0, 9997, 0, 0, 0, 2),
(7, 2, 0, 9998, 0, 0, 0, 3),
(8, 3, 0, 9999, 0, 0, 0, 1),
(9, 3, 0, 9997, 0, 0, 0, 2),
(10, 3, 0, 9998, 0, 0, 0, 3),
(11, 4, 0, 9999, 0, 0, 0, 1),
(12, 4, 0, 9997, 0, 0, 0, 2),
(13, 4, 0, 9998, 0, 0, 0, 3),
(14, 5, 0, 9999, 0, 0, 0, 1),
(15, 5, 0, 9997, 0, 0, 0, 2),
(16, 5, 0, 9998, 0, 0, 0, 3),
(17, 6, 0, 9999, 0, 0, 0, 1),
(18, 6, 0, 9997, 0, 0, 0, 2),
(19, 6, 0, 9998, 0, 0, 0, 3),
(20, 7, 0, 9999, 0, 0, 0, 1),
(21, 7, 0, 9997, 0, 0, 0, 2),
(22, 7, 0, 9998, 0, 0, 0, 3),
(23, 8, 0, 9999, 0, 0, 0, 1),
(24, 8, 0, 9997, 0, 0, 0, 2),
(25, 8, 0, 9998, 0, 0, 0, 3),
(26, 9, 0, 9999, 0, 0, 0, 1),
(27, 9, 0, 9997, 0, 0, 0, 2),
(28, 9, 0, 9998, 0, 0, 0, 3),
(29, 0, 1, 9997, 0, 0, 0, 1),
(30, 10, 0, 9999, 0, 0, 0, 1),
(31, 10, 0, 9997, 0, 0, 0, 2),
(32, 10, 0, 9998, 0, 0, 0, 3),
(33, 11, 0, 9999, 0, 0, 0, 1),
(34, 11, 0, 9997, 0, 0, 0, 2),
(35, 11, 0, 9998, 0, 0, 0, 3),
(36, 12, 0, 9999, 0, 0, 0, 1),
(37, 12, 0, 9997, 0, 0, 0, 2),
(38, 12, 0, 9998, 0, 0, 0, 3);");

$jakdb->query("CREATE TABLE ".DB_PREFIX."pluginhooks (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `hook_name` varchar(255) DEFAULT NULL,
  `name` varchar(255) DEFAULT NULL,
  `phpcode` text,
  `widgetcode` text,
  `product` varchar(25) DEFAULT NULL,
  `active` smallint(1) unsigned NOT NULL DEFAULT '0',
  `exorder` smallint(5) unsigned NOT NULL DEFAULT '4',
  `pluginid` int(11) unsigned NOT NULL,
  `time` datetime NOT NULL DEFAULT '0000-00-00 00:00:00',
  PRIMARY KEY (`id`),
  KEY `hook_name` (`hook_name`,`active`,`pluginid`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8");

$jakdb->query("INSERT INTO ".DB_PREFIX."pluginhooks (`id`, `hook_name`, `name`, `phpcode`, `widgetcode`, `product`, `active`, `exorder`, `pluginid`, `time`) VALUES
(1, 'tpl_sidebar', 'Tags', 'tagsidebar.php', '', 'cms', 1, 3, 3, NOW()),
(2, 'tpl_sidebar', 'News', 'newssidebar.php', '', 'cms', 1, 2, 1, NOW()),
(3, 'tpl_sidebar', 'Login Form', 'loginsidebar.php', '', 'cms', 1, 4, 0, NOW()),
(4, 'tpl_sidebar', 'Search Form', 'searchsidebar.php', '', 'cms', 1, 1, 0, NOW()),
(5, 'tpl_footer_widgets', 'News - Footer Widget', 'newsfooter.php', '', 'cms', 1, 1, 1, NOW()),
(6, 'tpl_footer_widgets', 'Tags - Footer Widget', 'tagsfooter.php', '', 'cms', 1, 1, 3, NOW()),
(7, 'tpl_footer_widgets', 'Footer - Search Form', 'searchfooter.php', '', 'cms', 1, 1, 0, NOW()),
(8, 'php_admin_lang', 'BelowHeader Admin Language', 'if (file_exists(APP_PATH.\'plugins/belowheader/admin/lang/\'.\$site_language.\'.ini\')) {\n    \$tlbh = parse_ini_file(APP_PATH.\'plugins/belowheader/admin/lang/\'.\$site_language.\'.ini\', true);\n} else {\n    \$tlbh = parse_ini_file(APP_PATH.\'plugins/belowheader/admin/lang/en.ini\', true);\n}', NULL, 'belowheader', 1, 4, 4, NOW()),
(9, 'tpl_below_header', 'BelowHeader Input', 'plugins/belowheader/bhinput.php', NULL, 'belowheader', 1, 1, 4, NOW()),
(10, 'tpl_below_content', 'BelowHeader / Content', 'plugins/belowheader/bhinputb.php', NULL, 'belowheader', 1, 1, 4, NOW());");

$jakdb->query("CREATE TABLE ".DB_PREFIX."plugins (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) DEFAULT NULL,
  `description` longtext,
  `active` smallint(1) unsigned NOT NULL DEFAULT '0',
  `access` mediumtext,
  `pluginorder` int(11) unsigned NOT NULL DEFAULT '1',
  `pluginpath` varchar(255) DEFAULT NULL,
  `phpcode` text,
  `phpcodeadmin` text,
  `sidenavhtml` varchar(255) DEFAULT NULL,
  `managenavhtml` varchar(255) DEFAULT NULL,
  `usergroup` varchar(100) DEFAULT NULL,
  `uninstallfile` varchar(255) DEFAULT NULL,
  `pluginversion` varchar(5) DEFAULT NULL,
  `time` datetime NOT NULL DEFAULT '0000-00-00 00:00:00',
  PRIMARY KEY (`id`),
  UNIQUE KEY `name` (`name`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8");

$jakdb->query("INSERT INTO ".DB_PREFIX."plugins (`id`, `name`, `description`, `active`, `access`, `pluginorder`, `pluginpath`, `phpcode`, `phpcodeadmin`, `sidenavhtml`, `managenavhtml`, `usergroup`, `uninstallfile`, `pluginversion`, `time`) VALUES
(1, 'News', 'Create and publish news', 1, '1', 1, NULL, 'require_once \"news.php\";', 'if (\$page == \"news\") {\r\nrequire_once \'news.php\';\r\n\$JAK_PROVED = true;\r\n\$checkp = 1;\r\n}', 'newsnav.php', NULL, '1', NULL, NULL, NOW()),
(2, 'Sitemap', 'Run a sitemap on your website for better SEO.', 1, '1', 3, NULL, 'require_once \'sitemap.php\';', NULL, NULL, NULL, '1', NULL, NULL, NOW()),
(3, 'Tags', 'Have tags on your website, very good for search engine optimization.', 1, '1', 4, NULL, 'require_once \"tags.php\";', 'if (\$page == \"tags\") {\r\nrequire_once \'tag.php\';\r\n\$JAK_PROVED = true;\r\n\$checkp = 1;\r\n}', 'tagnav.php', NULL, 'tags', NULL, NULL, NOW()),
(4, 'BelowHeader', 'Run your own Layer Slider.', 1, '1', 2, 'belowheader', '', 'if (\$page == \'belowheader\') {\n        require_once APP_PATH.\'plugins/belowheader/admin/belowheader.php\';\n        \$JAK_PROVED = 1;\n        \$checkp = 1;\n     }', NULL, '../plugins/belowheader/admin/template/bhnav.php', '1', 'uninstall.php', '1.0', NOW());");

$jakdb->query("CREATE TABLE ".DB_PREFIX."searchlog (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `tag` varchar(100) DEFAULT NULL,
  `count` int(11) unsigned NOT NULL DEFAULT '1',
  `time` datetime NOT NULL DEFAULT '0000-00-00 00:00:00',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8");

$jakdb->query("CREATE TABLE ".DB_PREFIX."setting (
  `varname` varchar(100) NOT NULL DEFAULT '',
  `groupname` varchar(50) DEFAULT NULL,
  `value` mediumtext,
  `defaultvalue` mediumtext,
  `optioncode` mediumtext,
  `datatype` enum('free','number','boolean','bitfield','username','integer','posint') NOT NULL DEFAULT 'free',
  `product` varchar(25) DEFAULT '',
  PRIMARY KEY (`varname`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8");

$jakdb->query("INSERT INTO ".DB_PREFIX."setting (`varname`, `groupname`, `value`, `defaultvalue`, `optioncode`, `datatype`, `product`) VALUES
('version', 'version', '2.1', '2.1', NULL, 'free', 'cms'),
('updatetime', 'updatetime', '".time()."', '".time()."', 'timestamp', 'integer', 'cms'),
('o_number', 'setting', 'o-test', '0', 'input', 'free', 'cms'),
('offline', 'general', '0', '0', 'yesno', 'boolean', 'cms'),
('offline_page', 'general', '14', '14', 'select', 'boolean', 'cms'),
('notfound_page', 'general', '0', '0', 'select', 'boolean', 'cms'),
('title', 'general', 'Modern CMS', 'Modern CMS', 'input', 'free', 'cms'),
('copyright', 'general', 'yoursite.com &copy; 2016', 'CMS copyright 2016', 'input', 'free', 'cms'),
('metadesc', 'general', '', '', 'textarea', 'free', 'cms'),
('metakey', 'general', '', '', 'textarea', 'free', 'cms'),
('metaauthor', 'general', 'http://www.yoursite.com', 'http://www.jakweb.ch', 'input', 'free', 'cms'),
('robots', 'general', '1', '1', 'yesno', 'boolean', 'cms'),
('analytics', 'general', '', NULL, 'textarea', 'free', 'cms'),
('email', 'setting', 'jk@jakweb.ch', '', 'input', 'free', 'cms'),
('sitehttps', 'setting', '0', '0', 'yesno', 'boolean', 'cms'),
('dateformat', 'setting', 'd.m.Y', 'd.m.Y', 'input', 'free', 'cms'),
('timeformat', 'setting', ' - H:i', 'h:i A', 'input', 'free', 'cms'),
('time_ago_show', 'setting', '1', '1', 'yesno', 'boolean', 'cms'),
('searchform', 'setting', '1', '1', 'yesno', 'boolean', 'cms'),
('contactform', 'setting', '1', '1', 'yesno', 'boolean', 'cms'),
('sitestyle', 'setting', 'jakweb', 'jakweb', 'select', 'free', 'cms'),
('adminpagemid', 'setting', '5', '5', 'input', 'number', 'cms'),
('adminpageitem', 'setting', '15', '10', 'input', 'number', 'cms'),
('timezoneserver', 'setting', 'Europe/Zurich', 'Europe/Zurich', 'select', 'free', 'cms'),
('rss', 'setting', '0', '1', 'yesno', 'boolean', 'cms'),
('usr_smilies', 'setting', '0', '0', 'yesno', 'boolean', 'cms'),
('adv_editor', 'setting', '0', '0', 'yesno', 'boolean', 'cms'),
('rssitem', 'setting', '10', '10', 'input', 'number', 'cms'),
('lang', 'setting', 'en', 'en', 'input', 'free', 'cms'),
('langdirection', 'setting', '1', '1', 'yesno', 'boolean', 'cms'),
('heatmap', 'setting', '0', '0', 'yesno', 'boolean', 'cms'),
('hvm', 'hvm', '1', '1', 'select', 'boolean', 'cms'),
('useravatwidth', 'setting', '150', '150', 'input', 'free', 'cms'),
('useravatheight', 'setting', '113', '113', 'input', 'free', 'cms'),
('printme', 'setting', '0', '0', 'yesno', 'boolean', 'cms'),
('shortmsg', 'setting', '140', '140', 'input', 'free', 'cms'),
('shownews', 'setting', '5', '5', 'select', 'boolean', 'cms'),
('fulltextsearch', 'setting', '0', '0', 'yesno', 'boolean', 'cms'),
('ajaxsearch', 'setting', '1', '1', 'yesno', 'boolean', 'cms'),
('showloginside', 'setting', '1', '0', 'yesno', 'boolean', 'cms'),
('ip_block', 'setting', '', '', 'textarea', 'free', 'cms'),
('email_block', 'setting', '', '', 'textarea', 'free', 'cms'),
('username_block', 'setting', '', '', 'textarea', 'free', 'cms'),
('accessgeneral', 'module', '1', '1', 'input', 'free', 'cms'),
('accessmanage', 'module', '1', '1', 'input', 'free', 'cms'),
('taglimit', 'tags', '30', '20', 'input', 'number', 'cms'),
('tagminfont', 'tags', '12', '12', 'input', 'number', 'cms'),
('tagmaxfont', 'tags', '24', '24', 'input', 'number', 'cms'),
('tagtitle', 'tags', 'Tags', 'Tags', 'input', 'free', 'cms'),
('tagdesc', 'tags', '<p>Write something about your tags.</p>', '<p>Write something about your tags.</p>', 'textarea', 'free', 'cms'),
('sitemaptitle', 'sitemap', 'Sitemap', 'Sitemap', 'input', 'free', 'cms'),
('sitemapdesc', 'sitemap', '', '', 'textarea', 'free', 'cms'),
('searchtitle', 'search', 'Search', 'Search', 'input', 'free', 'cms'),
('searchdesc', 'search', '', '', 'textarea', 'free', 'cms'),
('newstitle', 'news', 'News', 'News', 'input', 'free', 'cms'),
('newsdesc', 'news', '<p>Write something about your news.</p>', '<p>Write something about your news.</p>', 'textarea', 'free', 'cms'),
('newsdateformat', 'news', 'd.m.Y', 'd.m.Y', 'input', 'free', 'cms'),
('newstimeformat', 'news', '', 'h:i A', 'input', 'free', 'cms'),
('newspagemid', 'news', '5', '5', 'input', 'number', 'cms'),
('newspageitem', 'news', '5', '5', 'input', 'number', 'cms'),
('news_css', 'news', '', '', 'textarea', 'free', 'cms'),
('news_javascript', 'news', '', '', 'textarea', 'free', 'cms'),
('navbarstyle_jakweb_tpl', 'jakweb', '1', '0', 'yesno', 'boolean', 'tpl_jakweb'),
('navbarcolor_jakweb_tpl', 'jakweb', '', NULL, 'input', 'free', 'tpl_jakweb'),
('navbarlinkcolor_jakweb_tpl', 'jakweb', '', NULL, 'input', 'free', 'tpl_jakweb'),
('navbarcolorlinkbg_jakweb_tpl', 'jakweb', '', NULL, 'input', 'free', 'tpl_jakweb'),
('navbarcolorsubmenu_jakweb_tpl', 'jakweb', '', NULL, 'input', 'free', 'tpl_jakweb'),
('logo_jakweb_tpl', 'jakweb', '/_files/logo_small.png', NULL, 'input', 'free', 'tpl_jakweb'),
('style_jakweb_tpl', 'jakweb', '', NULL, 'input', 'free', 'tpl_jakweb'),
('boxpattern_jakweb_tpl', 'jakweb', 'random', NULL, 'input', 'free', 'tpl_jakweb'),
('boxbg_jakweb_tpl', 'jakweb', '', NULL, 'input', 'free', 'tpl_jakweb'),
('color_jakweb_tpl', 'jakweb', '', NULL, 'input', 'free', 'tpl_jakweb'),
('sidebar_location_tpl', 'jakweb', 'left', NULL, 'input', 'free', 'tpl_jakweb'),
('font_jakweb_tpl', 'jakweb', 'Verdana, Geneva, \"DejaVu Sans\", sans-serif', 'Arial, Helvetica, sans-serif', 'input', 'free', 'tpl_jakweb'),
('fontg_jakweb_tpl', 'jakweb', 'NonGoogle', 'NonGoogle', 'input', 'free', 'tpl_jakweb'),
('theme_jakweb_tpl', 'jakweb', 'red', NULL, 'input', 'free', 'tpl_jakweb'),
('pattern_jakweb_tpl', 'jakweb', 'concrete_wall', 'pattern', 'input', 'free', 'tpl_jakweb'),
('mainbg_jakweb_tpl', 'jakweb', '', NULL, 'input', 'free', 'tpl_jakweb'),
('bcontent1_jakweb_tpl', 'jakweb', '', NULL, 'textarea', 'free', 'tpl_jakweb'),
('bcontent2_jakweb_tpl', 'jakweb', '', NULL, 'textarea', 'free', 'tpl_jakweb'),
('bcontent3_jakweb_tpl', 'jakweb', '', NULL, 'textarea', 'free', 'tpl_jakweb'),
('sectionbg_jakweb_tpl', 'jakweb', '', NULL, 'input', 'free', 'tpl_jakweb'),
('sectiontc_jakweb_tpl', 'jakweb', '', NULL, 'input', 'free', 'tpl_jakweb'),
('sectionshow_jakweb_tpl', 'jakweb', '0', '0', 'yesno', 'boolean', 'tpl_jakweb'),
('footer_jakweb_tpl', 'jakweb', '1', 'big', 'input', 'free', 'tpl_jakweb'),
('fcont_jakweb_tpl', 'jakweb', '<h3>Contacts</h3>\r\n<p class=\"contact-us-details\">\r\n	<b>Address:</b> your Address<br/>\r\n	<b>Phone:</b> your Phone<br/>\r\n	<b>Email:</b> your Email\r\n</p>', NULL, 'input', 'free', 'tpl_jakweb'),
('fcont2_jakweb_tpl', 'jakweb', '<h3>Stay Connected</h3><a class=\"btn btn-default\" href=\"http://www.spotillo.com\"><i class=\"fa fa-map-marker\"></i></a>\r\n<a class=\"btn btn-default\" href=\"https://twitter.com/jakweb\"><i class=\"fa fa-twitter\"></i></a>\r\n<a class=\"btn btn-default\" href=\"https://www.facebook.com/Jakweb\"><i class=\"fa fa-facebook\"></i></a>', NULL, 'input', 'free', 'tpl_jakweb'),
('fcont3_jakweb_tpl', 'jakweb', '<h3>Navigation</h3>', NULL, 'input', 'free', 'tpl_jakweb'),
('footerc_jakweb_tpl', 'jakweb', '', NULL, 'input', 'free', 'tpl_jakweb'),
('footerct_jakweb_tpl', 'jakweb', '', NULL, 'input', 'free', 'tpl_jakweb'),
('footercte_jakweb_tpl', 'jakweb', '', NULL, 'input', 'free', 'tpl_jakweb'),
('styleswitcher_tpl', 'jakweb', '0', '1', 'yesno', 'boolean', 'tpl_jakweb'),
('cms_tpl', 'jakweb', '1', '1', 'yesno', 'boolean', 'tpl_jakweb'),
('sitestyle_widget_jakweb', 'jakweb', '1', '1', 'yesno', 'boolean', 'tpl_jakweb'), ('smtp_or_mail', 'setting', 0, 0, 'yesno', 'boolean', 'cms'), ('smtp_port', 'setting', 25, 25, 'input', 'number', 'cms'), ('smtp_host', 'setting', '', '', 'input', 'free', 'cms'), ('smtp_auth', 'setting', 0, 0, 'yesno', 'boolean', 'cms'), ('smtp_prefix', 'setting', '', '', 'input', 'free', 'cms'), ('smtp_alive', 'setting', 0, 0, 'yesno', 'boolean', 'cms'), ('smtp_user', 'setting', '', '', 'input', 'free', 'cms'), ('smtp_password', 'setting', '', '', 'input', 'free', 'cms')");

$jakdb->query("CREATE TABLE ".DB_PREFIX."tagcloud (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `tag` varchar(100) DEFAULT NULL,
  `count` int(11) NOT NULL DEFAULT '1',
  PRIMARY KEY (`id`),
  KEY `tag` (`tag`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8");

$jakdb->query("CREATE TABLE ".DB_PREFIX."tags (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `tag` varchar(100) DEFAULT NULL,
  `itemid` int(11) unsigned NOT NULL DEFAULT '0',
  `pluginid` int(11) unsigned NOT NULL DEFAULT '0',
  `active` smallint(1) unsigned NOT NULL DEFAULT '1',
  PRIMARY KEY (`id`),
  KEY `module` (`pluginid`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8");

$jakdb->query("CREATE TABLE ".DB_PREFIX."todo_list (
  `id` int(8) unsigned NOT NULL AUTO_INCREMENT,
  `position` int(8) unsigned NOT NULL DEFAULT '0',
  `adminid` int(8) unsigned NOT NULL DEFAULT '0',
  `text` varchar(255) DEFAULT NULL,
  `work_done` smallint(1) unsigned NOT NULL DEFAULT '0',
  `dt_added` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`),
  KEY `position` (`position`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8");


$jakdb->query("CREATE TABLE ".DB_PREFIX."user (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `usergroupid` int(11) unsigned NOT NULL DEFAULT '2',
  `username` varchar(100) DEFAULT NULL,
  `password` char(64) NOT NULL,
  `idhash` varchar(32) DEFAULT NULL,
  `session` varchar(32) DEFAULT NULL,
  `email` varchar(100) DEFAULT NULL,
  `name` varchar(255) DEFAULT NULL,
  `picture` varchar(255) NOT NULL DEFAULT '/standard.png',
  `ulang` varchar(2) DEFAULT NULL,
  `time` datetime NOT NULL DEFAULT '0000-00-00 00:00:00',
  `lastactivity` datetime NOT NULL DEFAULT '0000-00-00 00:00:00',
  `backtogroup` int(11) unsigned NOT NULL DEFAULT '0',
  `backtime` date NOT NULL DEFAULT '0000-00-00',
  `logins` int(11) unsigned NOT NULL DEFAULT '0',
  `access` smallint(1) unsigned NOT NULL DEFAULT '0',
  `activatenr` int(10) unsigned NOT NULL DEFAULT '0',
  `forgot` int(11) unsigned NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`),
  KEY `usergroupid` (`usergroupid`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8");

$jakdb->query("CREATE TABLE ".DB_PREFIX."usergroup (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(100) DEFAULT NULL,
  `description` mediumtext,
  `canrate` smallint(1) unsigned NOT NULL DEFAULT '0',
  `tags` smallint(1) unsigned NOT NULL DEFAULT '0',
  `advsearch` smallint(1) unsigned NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8");

$jakdb->query("INSERT INTO ".DB_PREFIX."usergroup (`id`, `name`, `description`, `canrate`, `tags`, `advsearch`) VALUES
(1, 'Guest', '<p>Usergroup for all the guests.</p>', 1, 1, 1),
(2, 'Member (Standard)', '<p>Standard user group after register on your site.</p>', 0, 1, 1),
(3, 'Administrator', '<p>Administrator user group, usually full access and no approval for posts.</p>', 1, 1, 1),
(4, 'Moderator', '<p>Moderator user group, they can delete other post from blog, forum, gallery or shop.</p>', 0, 1, 1),
(5, 'Banned', '<p>Banned user can only browse thru the page.</p>', 0, 0, 0);");

?>