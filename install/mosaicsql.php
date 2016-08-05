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
(1, '1', '0', 0, 0, 0, 0, 'Home Slider', '<!-- Jumbotron -->\r\n<div class=\"main-slideshow\">\r\n  <div id=\"main-slideshow\" class=\"carousel slide\" data-ride=\"carousel\">\r\n<div class=\"carousel-inner\">\r\n<!-- Slide No 1 -->\r\n<div class=\"item active\">\r\n<div class=\"jumbotron first\">\r\n<div class=\"container\">\r\n  <div class=\"row\">\r\n<div class=\"col-sm-6\">\r\n<h1 class=\"animated slideInLeft\">Beautiful Theme<br />You Can Tune Yourself</h1>\r\n<p class=\"lead animated slideInLeft delay-1\">An accurate and clean template for business projects.</p>\r\n<a class=\"btn btn-color animated slideInLeft delay-2\">Main Action</a>\r\n</div>\r\n<div class=\"col-sm-6 hidden-xs\">\r\n<img class=\"img-responsive\" src=\"_files/mosaic/imac.png\" alt=\"...\">\r\n</div>\r\n  </div>\r\n</div>\r\n</div>\r\n</div> \r\n<!-- Slide No 2 -->\r\n<div class=\"item\">\r\n<div class=\"jumbotron second\">\r\n<div class=\"container\">\r\n  <div class=\"row\">\r\n<div class=\"col-sm-12\">\r\n<h1 class=\"text-center animated fadeInDown\">Easily Customize For Your Needs</h1>\r\n<p class=\"lead text-center animated fadeInDown delay-1\">Choose a color scheme for Navbar, Footer and Body.</p>\r\n<div class=\"text-center animated fadeInDown delay-2\"><a class=\"btn btn-color pull-center\">Main Action</a></div>\r\n<img class=\"img-responsive hidden-xs\" src=\"_files/mosaic/browser.png\" alt=\"...\">\r\n</div>\r\n  </div>\r\n</div>\r\n</div>\r\n</div>\r\n<!-- Slide No 3 -->\r\n<div class=\"item\">\r\n<div class=\"jumbotron third\">\r\n<div class=\"container\">\r\n  <div class=\"row\">\r\n<div class=\"col-sm-6\">\r\n<h1 class=\"animated slideInLeft\">Responsive Video<br />And Stunning Support</h1>\r\n<p class=\"lead animated slideInLeft delay-1\">We are always open for your questions<br /> and feature requests.</p>\r\n<a class=\"btn btn-color animated slideInLeft delay-2\">Main Action</a>\r\n</div>\r\n<div class=\"col-sm-6\">\r\n<div class=\"video hidden-xs\">\r\n  <div class=\"embed-responsive embed-responsive-16by9\">\r\n<iframe src=\"https://www.youtube.com/embed/PZPxWIcCOdM?rel=0\"></iframe>\r\n  </div>\r\n</div>\r\n</div>\r\n  </div>\r\n</div>\r\n</div>\r\n</div> <!-- / Slide No 3 -->\r\n</div>\r\n<!-- Controls -->\r\n<a class=\"slideshow-arrow slideshow-arrow-prev bg-hover-color\" href=\"#main-slideshow\" data-slide=\"prev\">\r\n<i class=\"fa fa-angle-left\"></i>\r\n</a>\r\n<a class=\"slideshow-arrow slideshow-arrow-next bg-hover-color\" href=\"#main-slideshow\" data-slide=\"next\">\r\n<i class=\"fa fa-angle-right\"></i>\r\n</a>\r\n  </div>\r\n</div> <!-- / Slideshow -->', '', '0', 1, NOW()),
(2, '2', '0', 0, 0, 0, 0, 'About Us', '<!-- Topic Header -->\r\n<div class=\"wrapper\">\r\n  <div class=\"topic\">\r\n<div class=\"container\">\r\n<div class=\"row\">\r\n<div class=\"col-sm-4\">\r\n<h3 class=\"primary-font\">About Us</h3>\r\n</div>\r\n<div class=\"col-sm-8\">\r\n<ol class=\"breadcrumb pull-right hidden-xs\">\r\n  <li><a href=\"/\">Home</a></li>\r\n  <li class=\"active\">About Us</li>\r\n</ol>\r\n</div>\r\n</div>\r\n</div>\r\n  </div>\r\n</div>', '', '0', 1, NOW()),
(3, '4', '0', 0, 0, 0, 0, 'Pricing', '<!-- Topic Header -->\r\n<div class=\"wrapper\">\r\n  <div class=\"topic\">\r\n<div class=\"container\">\r\n<div class=\"row\">\r\n<div class=\"col-sm-4\">\r\n<h3 class=\"primary-font\">Pricing</h3>\r\n</div>\r\n<div class=\"col-sm-8\">\r\n<ol class=\"breadcrumb pull-right hidden-xs\">\r\n  <li><a href=\"/\">Home</a></li>\r\n  <li class=\"active\">Pricing</li>\r\n</ol>\r\n</div>\r\n</div>\r\n</div>\r\n  </div>\r\n</div>', '', '0', 1, NOW()),
(4, '5', '0', 0, 0, 0, 0, 'Services', '<!-- Topic Header -->\r\n<div class=\"wrapper\">\r\n  <div class=\"topic\">\r\n<div class=\"container\">\r\n<div class=\"row\">\r\n<div class=\"col-sm-4\">\r\n<h3 class=\"primary-font\">Services</h3>\r\n</div>\r\n<div class=\"col-sm-8\">\r\n<ol class=\"breadcrumb pull-right hidden-xs\">\r\n  <li><a href=\"/\">Home</a></li>\r\n  <li class=\"active\">Services</li>\r\n</ol>\r\n</div>\r\n</div>\r\n</div>\r\n  </div>\r\n</div>', '', '0', 1, NOW()),
(5, '6', '0', 0, 0, 0, 0, 'UI Elements', '<!-- Topic Header -->\r\n<div class=\"wrapper\">\r\n  <div class=\"topic\">\r\n<div class=\"container\">\r\n<div class=\"row\">\r\n<div class=\"col-sm-4\">\r\n<h3 class=\"primary-font\">UI Elements</h3>\r\n</div>\r\n<div class=\"col-sm-8\">\r\n<ol class=\"breadcrumb pull-right hidden-xs\">\r\n  <li><a href=\"/\">Home</a></li>\r\n  <li class=\"active\">UI Elements</li>\r\n</ol>\r\n</div>\r\n</div>\r\n</div>\r\n  </div>\r\n</div>', '', '0', 1, NOW()),
(6, '7', '0', 0, 0, 0, 0, 'Example', '<!-- Topic Header -->\r\n<div class=\"wrapper\">\r\n  <div class=\"topic\">\r\n<div class=\"container\">\r\n<div class=\"row\">\r\n<div class=\"col-sm-4\">\r\n<h3 class=\"primary-font\">Example</h3>\r\n</div>\r\n<div class=\"col-sm-8\">\r\n<ol class=\"breadcrumb pull-right hidden-xs\">\r\n  <li><a href=\"/\">Home</a></li>\r\n  <li class=\"active\">Example</li>\r\n</ol>\r\n</div>\r\n</div>\r\n</div>\r\n  </div>\r\n</div>', '', '0', 1, NOW()),
(7, '8', '0', 0, 0, 0, 0, '3 Column', '<!-- Topic Header -->\r\n<div class=\"color-jumbotron\">\r\n  <div class=\"container\">\r\n<div class=\"row\">\r\n<div class=\"col-sm-12\">\r\n<div class=\"text-center\"><h1>3 Column with special Header</h1></div>\r\n</div>\r\n</div> <!-- / .row -->\r\n  </div> <!-- / .container -->\r\n</div> <!-- / .color-jumbotron -->', '', '0', 1, NOW()),
(8, '9', '0', 0, 0, 0, 0, 'Contact Us', '<!-- Topic Header -->\r\n<div class=\"color-jumbotron\">\r\n  <div class=\"container\">\r\n<div class=\"row\">\r\n<div class=\"col-sm-12\">\r\n<div class=\"text-center\"><h1>Contact Us</h1></div>\r\n</div>\r\n</div> <!-- / .row -->\r\n  </div> <!-- / .container -->\r\n</div> <!-- / .color-jumbotron -->', '', '0', 1, NOW());");

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
(4, 'News', 'news', NULL, NULL, NULL, 1, 0, 9, 0, 0, '0', 1, 1),
(5, 'About Us', 'about-us', '', NULL, '', 1, 0, 2, 0, 2, '0', 1, 0),
(6, 'Coming Soon', 'coming-soon', '', NULL, '', 1, 0, 3, 5, 3, '0', 1, 0),
(7, 'Pricing', 'pricing', '', NULL, '', 1, 0, 8, 0, 4, '0', 1, 0),
(8, 'Services', 'services', '', NULL, '', 1, 0, 7, 0, 5, '0', 1, 0),
(9, 'UI Elements', 'ui-elements', '', NULL, '', 1, 0, 6, 5, 6, '0', 1, 0),
(10, 'Example', 'example', '', NULL, 'Some SEO for the example page.', 1, 0, 4, 5, 7, '0', 1, 0),
(11, '3 Column', '3-column', '', NULL, '', 1, 0, 5, 5, 8, '0', 1, 0),
(12, 'Contact Us', 'contact-us', '', NULL, '', 1, 0, 10, 0, 9, '0', 1, 0),
(13, '404', '404', '', NULL, '', 0, 0, 2, 0, 10, '0', 1, 0);");

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
(1, 'Standard Contact Form', '<p>Thank you very much, you enquiry has been sent. We will return to you as soon as possible.</p>', NULL, 1, 1, NOW())");

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
(4, 1, 'Message', 2, '', 1, 4)");

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
(1, 1, 1, 1, 'Jerome', 'jk@jakweb.ch', 'd5dd5e97272a19d09216d2f3a8fc9f2e', '::1', 2, NOW())");

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
(1, 1, 1, 0, 1, 0, 0, 0, 0, 0, NOW(), NOW())");

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
(1, 'Brand New CMS', '<p>It looks great on desktops, laptops, tablets and smartphones - CMS template was built to shine on all devices. You can be sure that all the components are responsive.</p>\r\n<p>Template comes with five color themes (Blue, Orange, Green, Red, Yellow and Grey). All you need to do is to change the colour via StlyeChanger. There is no color scheme that matches your branding? No problem. You can easily compile your own by changing one variable - thanks to LESS!</p>\r\n<p>It looks great on desktops, laptops, tablets and smartphones - CMS template was built to shine on all devices. You can be sure that all the components are responsive.</p>', '', '', 0, '/_files/mosaic/general-2.jpg', 1, 1, 1, 0, 0, 0, 0, 0, 1, NOW(), 0, 0, '0', 1)");

$jakdb->query("CREATE TABLE ".DB_PREFIX."pages (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `catid` int(11) unsigned NOT NULL DEFAULT '0',
  `title` varchar(255) DEFAULT NULL,
  `content` mediumtext,
  `page_css` text,
  `page_javascript` text,
  `sidebar` smallint(1) unsigned NOT NULL DEFAULT '1',
  `showtitle` smallint(1) unsigned NOT NULL DEFAULT '1',
  `active` tinyint(1) unsigned NOT NULL DEFAULT '1',
  `shownav` tinyint(1) unsigned NOT NULL DEFAULT '1',
  `showfooter` tinyint(1) unsigned NOT NULL DEFAULT '1',
  `showcontact` int(11) unsigned NOT NULL DEFAULT '0',
  `shownews` varchar(100) DEFAULT NULL,
  `showdate` tinyint(1) unsigned NOT NULL DEFAULT '0',
  `showtags` tinyint(1) unsigned NOT NULL DEFAULT '1',
  `showlogin` tinyint(1) unsigned NOT NULL DEFAULT '1',
  `socialbutton` tinyint(1) unsigned NOT NULL DEFAULT '0',
  `showvote` tinyint(1) unsigned NOT NULL DEFAULT '0',
  `password` char(64) DEFAULT NULL,
  `hits` int(11) unsigned NOT NULL DEFAULT '0',
  `time` datetime NOT NULL DEFAULT '0000-00-00 00:00:00',
  PRIMARY KEY (`id`),
  KEY `catid` (`catid`,`active`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8");

$jakdb->query("INSERT INTO ".DB_PREFIX."pages (`id`, `catid`, `title`, `content`, `page_css`, `page_javascript`, `sidebar`, `showtitle`, `active`, `shownav`, `showfooter`, `showcontact`, `shownews`, `showdate`, `showtags`, `showlogin`, `socialbutton`, `showvote`, `password`, `hits`, `time`) VALUES
(1, 1, 'Home', '<div class=\"row\">\r\n	<div class=\"col-sm-10\">\r\n  	<h2 class=\"text-color\">Multiple colors, responsive video, stunning support and many more!</h2>\r\n<p class=\"text-muted\">Buying this template now you become eligible to free download all of its future updates, including new pages and neat options. We hope you will enjoy using our template!</p>\r\n  </div>\r\n  <div class=\"col-sm-2\">\r\n  	<a href=\"#\" class=\"btn btn-color btn-lg\">Buy Now!</a>\r\n  </div>\r\n</div> <!-- / .row -->\r\n\r\n<hr>\r\n\r\n <!-- Our Services -->\r\n <div class=\"row services\">\r\n <div class=\"col-sm-4\">\r\n   <!-- Service Item #1 -->\r\n   <div class=\"services-item\">\r\n <i class=\"fa fa-gear fa-2x text-color\"></i>\r\n <div class=\"services-item-desc\">\r\n <h3 class=\"primary-font\">Built With Bootstrap 3</h3>\r\n <p class=\"text-muted\">\r\n Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nullam id ipsum varius, tincidunt odio nec, placerat enim.\r\n </p>\r\n </div>\r\n   </div>\r\n </div>\r\n <div class=\"col-sm-4\">\r\n   <!-- Service Item #1 -->\r\n   <div class=\"services-item\">\r\n <i class=\"fa fa-arrows-alt fa-2x text-color\"></i>\r\n <div class=\"services-item-desc\">\r\n <h3 class=\"primary-font\">Responsive Design</h3>\r\n <p class=\"text-muted\">\r\n Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nullam id ipsum varius, tincidunt odio nec, placerat enim.\r\n </p>\r\n </div>\r\n   </div>\r\n </div>\r\n <div class=\"col-sm-4\">\r\n   <!-- Service Item #1 -->\r\n   <div class=\"services-item\">\r\n <i class=\"fa fa-refresh fa-2x text-color\"></i>\r\n <div class=\"services-item-desc\">\r\n <h3 class=\"primary-font\">Easy to Customize</h3>\r\n <p class=\"text-muted\">\r\n Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nullam id ipsum varius, tincidunt odio nec, placerat enim.\r\n </p>\r\n </div>\r\n   </div>\r\n </div>\r\n </div> <!-- / .row -->\r\n\r\n <!-- Portfolio -->\r\n <h2 class=\"headline text-color\">\r\n <span class=\"border-color\">Portfolio</span>\r\n </h2>\r\n <div class=\"row portfolio\">\r\n <div class=\"col-sm-4\">\r\n   <!-- Portfolio Item #1 -->\r\n   <div class=\"portfolio-item\">\r\n <a href=\"#\">\r\n <img src=\"_files/mosaic/general-1.jpg\" class=\"img-responsive\" alt=\"...\">\r\n <div class=\"mask\">\r\n by John Doe <span class=\"pull-right\"><i class=\"fa fa-heart\"></i> 12 <i class=\"fa fa-comments-o\"></i> 24</span>\r\n </div>\r\n </a>\r\n <div class=\"portfolio-desc\">\r\n <h3 class=\"primary-font\">Yet Another Meeting</h3>\r\n <p class=\"text-muted\">\r\n Sed lacinia suscipit lacus non sodales. Pellentesque lacinia ornare justo eu tincidunt. Morbi ullamcorper sed ligula.\r\n </p>\r\n </div>\r\n   </div>\r\n </div>\r\n <div class=\"col-sm-4\">\r\n   <!-- Portfolio Item #2 -->\r\n   <div class=\"portfolio-item\">\r\n <a href=\"#\">\r\n <img src=\"_files/mosaic/general-2.jpg\" class=\"img-responsive\" alt=\"...\">\r\n <div class=\"mask\">\r\n by John Doe <span class=\"pull-right\"><i class=\"fa fa-heart\"></i> 12 <i class=\"fa fa-comments-o\"></i> 24</span>\r\n </div>\r\n </a>\r\n <div class=\"portfolio-desc\">\r\n <h3 class=\"primary-font\">My Working Table</h3>\r\n <p class=\"text-muted\">\r\n Sed lacinia suscipit lacus non sodales. Pellentesque lacinia ornare justo eu tincidunt. Morbi ullamcorper sed ligula.\r\n </p>\r\n </div>\r\n   </div>\r\n </div>\r\n <div class=\"col-sm-4\">\r\n   <!-- Portfolio Item #3 -->\r\n   <div class=\"portfolio-item\">\r\n <a href=\"#\">\r\n <img src=\"_files/mosaic/general-3.jpg\" class=\"img-responsive\" alt=\"...\">\r\n <div class=\"mask\">\r\n by John Doe <span class=\"pull-right\"><i class=\"fa fa-heart\"></i> 12 <i class=\"fa fa-comments-o\"></i> 24</span>\r\n </div>\r\n </a>\r\n <div class=\"portfolio-desc\">\r\n <h3 class=\"primary-font\">Having Lunch</h3>\r\n <p class=\"text-muted\">\r\n Sed lacinia suscipit lacus non sodales. Pellentesque lacinia ornare justo eu tincidunt. Morbi ullamcorper sed ligula.\r\n </p>\r\n </div>\r\n   </div>\r\n </div>\r\n </div> <!-- / .row -->\r\n\r\n <!-- Features -->\r\n <h2 class=\"headline text-color\">\r\n <span class=\"border-color\">Main Features</span>\r\n </h2>\r\n <div class=\"row features\">\r\n <div class=\"col-sm-6\">\r\n   <h3 class=\"primary-font first-child\">Easy to adjust for your needs with multiple color combinations.</h3>\r\n   <p class=\"text-muted\">\r\n Nulla pretium libero interdum, tempus lorem non, rutrum diam. Quisque pellentesque diam sed pulvinar lobortis. Vestibulum ante ipsum primis in faucibus orci luctus et ultrices posuere cubilia Curae.\r\n   </p>\r\n </div>\r\n <div class=\"col-sm-6\">\r\n   <img src=\"_files/mosaic/imac.png\" class=\"img-responsive\" alt=\"...\">            \r\n </div>\r\n </div> <!-- / .row -->\r\n <div class=\"divider\"></div>\r\n <div class=\"row features last\">\r\n <div class=\"col-sm-6\">\r\n   <div class=\"border-bottom\"><img src=\"_files/mosaic/browser-cut.png\" class=\"img-responsive\" alt=\"...\"></div>\r\n </div>\r\n <div class=\"col-sm-6\">\r\n   <h3 class=\"primary-font\">Fifteen unique templates to take your site up and running in no time.</h3>\r\n   <p class=\"text-muted\">\r\n Nulla pretium libero interdum, tempus lorem non, rutrum diam. Quisque pellentesque diam sed pulvinar lobortis. Vestibulum ante ipsum primis in faucibus orci luctus et ultrices posuere cubilia Curae.\r\n   </p>\r\n </div>\r\n </div> <!-- / .row -->\r\n\r\n <!-- Blog Posts -->\r\n <h2 class=\"headline text-color\">\r\n <span class=\"border-color\">Read Our Blog</span>\r\n </h2>\r\n <div class=\"row recent-blogs\">\r\n <div class=\"col-sm-6\">\r\n   <div class=\"recent-blog\">\r\n <img src=\"_files/mosaic/photo-1.jpg\" alt=\"...\">\r\n <div class=\"recent-blog-desc\">\r\n <h3 class=\"primary-font\">\r\n <a href=\"#\">Sed lacinia suscipit lacus non sodales. Pellentesque lacinia ornare justo eu tincidunt. </a>\r\n </h3>\r\n <hr>\r\n <p class=\"text-muted\">by John Doe</p>\r\n <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nunc nisi lorem, elementum sed feugiat ac, pharetra lacinia mi. Integer iaculis risus sed quam vehicula, sit amet lacinia sem rutrum. Integer ligula orci.</p>\r\n <a class=\"btn btn-lg btn-color\" href=\"#\">Read More...</a>\r\n </div>\r\n   </div>\r\n </div>\r\n <div class=\"col-sm-6\">\r\n   <div class=\"recent-blog\">\r\n <img src=\"_files/mosaic/photo-2.jpg\" alt=\"...\">\r\n <div class=\"recent-blog-desc\">\r\n <h3 class=\"primary-font\">\r\n <a href=\"#\">Nulla pretium libero interdum, tempus lorem non, rutrum diam. Lorem ipsum dolor sit amet.</a>\r\n </h3>\r\n <hr>\r\n <p class=\"text-muted\">by John Doe</p>\r\n <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nunc nisi lorem, elementum sed feugiat ac, pharetra lacinia mi. Integer iaculis risus sed quam vehicula, sit amet lacinia sem rutrum. Integer ligula orci.</p>\r\n <a class=\"btn btn-lg btn-color\" href=\"#\">Read More...</a>\r\n </div>\r\n   </div>\r\n </div>\r\n </div> <!-- / .row -->', '', '', 1, 0, 1, 1, 1, 0, '0', 0, 0, 0, 0, 0, NULL, 7, NOW()),
(2, 5, 'About Us', '<div class=\"row about-us-p\">\r\n<div class=\"col-sm-7\">\r\n  <h2 class=\"headline first-child text-color\">\r\n<span class=\"border-color\">Welcome Message</span>\r\n  </h2>\r\n  <p>\r\nSed at porta tellus. Sed sit amet ipsum non dolor tincidunt vestibulum eget et urna. In et placerat eros. Curabitur tristique lacinia tortor ut ornare. Proin vehicula rhoncus fermentum. Integer scelerisque aliquam turpis. Quisque pellentesque, sem vel molestie posuere, orci sapien interdum mauris, eget condimentum purus arcu ut augue. \r\n<br /><br />\r\nNunc in neque nec arcu vulputate ullamcorper. Ut id orci ac arcu consectetur fringilla. Class aptent taciti sociosqu ad litora torquent per conubia nostra, per inceptos himenaeos. Duis hendrerit enim id arcu lacinia, id commodo ante semper. Sed vel ante nec nisi vestibulum congue. Pellentesque non lacus in tortor rutrum tristique.\r\n  </p>\r\n  <hr>\r\n  <a href=\"#\" class=\"btn btn-lg btn-color\">Contact Us</a>\r\n  <br /><br />\r\n</div>\r\n<div class=\"col-sm-5\">\r\n  <h2 class=\"headline first-child text-color\">\r\n<span class=\"border-color\">Video Intro</span>\r\n  </h2>\r\n  <div class=\"embed-responsive embed-responsive-16by9\">\r\n<iframe src=\"https://www.youtube.com/embed/PZPxWIcCOdM?rel=0\"></iframe>\r\n  </div>\r\n</div>\r\n</div> <!-- / .row -->\r\n<div class=\"row our-team-p\">\r\n<div class=\"col-sm-12\">\r\n  <h2 class=\"headline text-color\">\r\n<span class=\"border-color\">Our Team</span>\r\n  </h2>\r\n  <div class=\"row\">\r\n<div class=\"col-sm-2\">\r\n<div class=\"team-member text-center\">\r\n<img class=\"img-responsive center-block\" src=\"/_files/mosaic/photo-1.jpg\" alt=\"...\">\r\nJohn Doe\r\n<p class=\"text-muted\">Founder</p>\r\n</div>\r\n</div>\r\n<div class=\"col-sm-2\">\r\n<div class=\"team-member text-center\">\r\n<img class=\"img-responsive center-block\" src=\"/_files/mosaic/photo-2.jpg\" alt=\"...\">\r\nJohn Doe\r\n<p class=\"text-muted\">Engineer</p>\r\n</div>\r\n</div>\r\n<div class=\"col-sm-2\">\r\n<div class=\"team-member text-center\">\r\n<img class=\"img-responsive center-block\" src=\"/_files/mosaic/photo-3.jpg\" alt=\"...\">\r\nJohn Doe\r\n<p class=\"text-muted\">Engineer</p>\r\n</div>\r\n</div>\r\n<div class=\"col-sm-2\">\r\n<div class=\"team-member text-center\">\r\n<img class=\"img-responsive center-block\" src=\"/_files/mosaic/photo-1.jpg\" alt=\"...\">\r\nJohn Doe\r\n<p class=\"text-muted\">Engineer</p>\r\n</div>\r\n</div>\r\n<div class=\"col-sm-2\">\r\n<div class=\"team-member text-center\">\r\n<img class=\"img-responsive center-block\" src=\"/_files/mosaic/photo-2.jpg\" alt=\"...\">\r\nJohn Doe\r\n<p class=\"text-muted\">Sales</p>\r\n</div>\r\n</div>\r\n<div class=\"col-sm-2\">\r\n<div class=\"team-member text-center\">\r\n<img class=\"img-responsive center-block\" src=\"/_files/mosaic/photo-3.jpg\" alt=\"...\">\r\nJohn Doe\r\n<p class=\"text-muted\">Admin Team</p>\r\n</div>\r\n</div>\r\n  </div> <!-- / .row -->\r\n</div>\r\n</div> <!-- / .row -->', '', '', 0, 0, 1, 1, 1, 0, '0', 0, 0, 0, 0, 0, NULL, 2, NOW()),
(3, 6, 'Coming soon', '<div class=\"coming-soon-p\">\r\n  <div class=\"container\">\r\n<div class=\"row\">\r\n<div class=\"col-xs-12\">\r\n<!-- Main Content -->\r\n<h1 class=\"text-center\">Coming Soon...</h1>\r\n<p class=\"lead text-center\">We are currently working on a new version of our website.</p>\r\n<p class=\"lead text-center\"><a class=\"btn btn-primary\" href=\"/\">Home</a></p>\r\n</div>\r\n</div>\r\n<div class=\"row\">\r\n<div class=\"col-sm-6 col-sm-offset-3\">\r\n<div id=\"countdown\"></div>\r\n</div>\r\n</div>  <!-- / .row -->\r\n  </div> <!-- / .container -->\r\n</div>', '<link rel=\"stylesheet\" href=\"/template/mosaic/css/screen.css\" type=\"text/css\" />', '<script src=\"/_files/mosaic/jquery.countdown.min.js\"></script>\r\n<script>\r\n$(function () {\r\n  var austDay = new Date();\r\n  austDay = new Date(austDay.getFullYear() + 1, 1 - 1, 26);\r\n  $(\'#countdown\').countdown({until: austDay});\r\n  $(\'#year\').text(austDay.getFullYear());\r\n});\r\n</script>', 0, 0, 1, 0, 0, 0, '0', 0, 0, 0, 0, 0, NULL, 1, NOW()),
(4, 7, 'Pricing', '<div class=\"row\">\r\n<div class=\"col-xs-12\">\r\n  <h2 class=\"headline first-child text-color\">\r\n<span class=\"border-color\">Pricing Options</span>\r\n  </h2>\r\n</div>\r\n</div> <!-- / .row -->\r\n<div class=\"row pricing-p\">\r\n<div class=\"col-sm-3\">\r\n  <div class=\"item\">\r\n<div class=\"head bg-color\">\r\n<h4>Basic</h4>\r\n<div class=\"arrow border-color\"></div>\r\n</div>\r\n<div class=\"sceleton\">\r\n<h5>$25<span>/month</span></h5>\r\n<ul>\r\n<li>Lorem ipsum dolor sit amet</li>\r\n<li>Lorem ipsum dolor sit amet</li>\r\n<li>Lorem ipsum dolor sit amet</li>\r\n<li>Lorem ipsum dolor sit amet</li>\r\n</ul>\r\n<a class=\"btn btn-default btn-block\" href=\"#\">Subscribe</a>\r\n</div>\r\n  </div>\r\n</div>\r\n<div class=\"col-sm-3\">\r\n  <div class=\"item\">\r\n<div class=\"head bg-color\">\r\n<h4>Pro</h4>\r\n<div class=\"arrow border-color\"></div>\r\n</div>\r\n<div class=\"sceleton\">\r\n<h5>$35<span>/month</span></h5>\r\n<ul>\r\n<li>Lorem ipsum dolor sit amet</li>\r\n<li>Lorem ipsum dolor sit amet</li>\r\n<li>Lorem ipsum dolor sit amet</li>\r\n<li>Lorem ipsum dolor sit amet</li>\r\n</ul>\r\n<a class=\"btn btn-default btn-block\" href=\"#\">Subscribe</a>\r\n</div>\r\n  </div>\r\n</div>\r\n<div class=\"col-sm-3\">\r\n  <div class=\"item\">\r\n<div class=\"head bg-color\">\r\n<h4>Business</h4>\r\n<div class=\"arrow border-color\"></div>\r\n</div>\r\n<div class=\"sceleton\">\r\n<h5>$45<span>/month</span></h5>\r\n<ul>\r\n<li>Lorem ipsum dolor sit amet</li>\r\n<li>Lorem ipsum dolor sit amet</li>\r\n<li>Lorem ipsum dolor sit amet</li>\r\n<li>Lorem ipsum dolor sit amet</li>\r\n</ul>\r\n<a class=\"btn btn-default btn-block\" href=\"#\">Subscribe</a>\r\n</div>\r\n  </div>\r\n</div>\r\n<div class=\"col-sm-3\">\r\n  <div class=\"item\">\r\n<div class=\"head bg-color\">\r\n<h4>Exclusive</h4>\r\n<div class=\"arrow border-color\"></div>\r\n</div>\r\n<div class=\"sceleton\">\r\n<h5>$55<span>/month</span></h5>\r\n<ul>\r\n<li>Lorem ipsum dolor sit amet</li>\r\n<li>Lorem ipsum dolor sit amet</li>\r\n<li>Lorem ipsum dolor sit amet</li>\r\n<li>Lorem ipsum dolor sit amet</li>\r\n</ul>\r\n<a class=\"btn btn-default btn-block\" href=\"#\">Subscribe</a>\r\n</div>\r\n  </div>\r\n</div>\r\n</div> <!-- / .row -->', '', '', 0, 0, 1, 1, 1, 0, '0', 0, 0, 0, 0, 0, NULL, 2, NOW()),
(5, 8, 'Services', '<div class=\"row\">\r\n<div class=\"col-xs-12\">\r\n  <h2 class=\"headline first-child text-color\">\r\n<span class=\"border-color\">Our Services</span>\r\n  </h2>\r\n  <p class=\"text-muted\">\r\nLorem ipsum dolor sit amet, consectetur adipiscing elit. Praesent imperdiet pretium elit non lacinia. Integer in consequat metus. Curabitur dapibus velit sed scelerisque fermentum. Proin interdum purus nec pharetra semper. \r\n  </p>\r\n</div>\r\n</div> <!-- / .row -->\r\n<!-- Our Services -->\r\n<div class=\"row services-p\">\r\n<div class=\"col-sm-4\">\r\n  <!-- Service Item #1 -->\r\n  <div class=\"services-item\">\r\n<i class=\"fa fa-gear fa-2x text-color\"></i>\r\n<div class=\"services-item-desc\">\r\n<h3 class=\"primary-font\">Built With Bootstrap 3</h3>\r\n<p class=\"text-muted\">\r\nLorem ipsum dolor sit amet, consectetur adipiscing elit. Nullam id ipsum varius, tincidunt odio nec, placerat enim.\r\n</p>\r\n</div>\r\n  </div>\r\n</div>\r\n<div class=\"col-sm-4\">\r\n  <!-- Service Item #1 -->\r\n  <div class=\"services-item\">\r\n<i class=\"fa fa-arrows-alt fa-2x text-color\"></i>\r\n<div class=\"services-item-desc\">\r\n<h3 class=\"primary-font\">Responsive Design</h3>\r\n<p class=\"text-muted\">\r\nLorem ipsum dolor sit amet, consectetur adipiscing elit. Nullam id ipsum varius, tincidunt odio nec, placerat enim.\r\n</p>\r\n</div>\r\n  </div>\r\n</div>\r\n<div class=\"col-sm-4\">\r\n  <!-- Service Item #1 -->\r\n  <div class=\"services-item\">\r\n<i class=\"fa fa-refresh fa-2x text-color\"></i>\r\n<div class=\"services-item-desc\">\r\n<h3 class=\"primary-font\">Easy to Customize</h3>\r\n<p class=\"text-muted\">\r\nLorem ipsum dolor sit amet, consectetur adipiscing elit. Nullam id ipsum varius, tincidunt odio nec, placerat enim.\r\n</p>\r\n</div>\r\n  </div>\r\n</div>\r\n</div> <!-- / .row -->\r\n<div class=\"row services-p\">\r\n<div class=\"col-sm-4\">\r\n  <!-- Service Item #1 -->\r\n  <div class=\"services-item\">\r\n<i class=\"fa fa-plus-square fa-2x text-color\"></i>\r\n<div class=\"services-item-desc\">\r\n<h3 class=\"primary-font\">Works Out Of the Box</h3>\r\n<p class=\"text-muted\">\r\nLorem ipsum dolor sit amet, consectetur adipiscing elit. Nullam id ipsum varius, tincidunt odio nec, placerat enim.\r\n</p>\r\n</div>\r\n  </div>\r\n</div>\r\n<div class=\"col-sm-4\">\r\n  <!-- Service Item #1 -->\r\n  <div class=\"services-item\">\r\n<i class=\"fa fa-puzzle-piece fa-2x text-color\"></i>\r\n<div class=\"services-item-desc\">\r\n<h3 class=\"primary-font\">24 Layout Options</h3>\r\n<p class=\"text-muted\">\r\nLorem ipsum dolor sit amet, consectetur adipiscing elit. Nullam id ipsum varius, tincidunt odio nec, placerat enim.\r\n</p>\r\n</div>\r\n  </div>\r\n</div>\r\n<div class=\"col-sm-4\">\r\n  <!-- Service Item #1 -->\r\n  <div class=\"services-item\">\r\n<i class=\"fa fa-envelope-o fa-2x text-color\"></i>\r\n<div class=\"services-item-desc\">\r\n<h3 class=\"primary-font\">Stunning Support</h3>\r\n<p class=\"text-muted\">\r\nLorem ipsum dolor sit amet, consectetur adipiscing elit. Nullam id ipsum varius, tincidunt odio nec, placerat enim.\r\n</p>\r\n</div>\r\n  </div>\r\n</div>\r\n</div> <!-- / .row -->\r\n<!-- Main Features -->\r\n<div class=\"row\">\r\n<div class=\"col-xs-12\">\r\n  <h2 class=\"headline first-child text-color\">\r\n<span class=\"border-color\">Main Features</span>\r\n  </h2>\r\n</div>\r\n</div> <!-- / .row -->\r\n<div class=\"row features\">\r\n<div class=\"col-sm-6\">\r\n  <h3 class=\"primary-font first-child\">Easy to adjust for your needs with multiple color combinations.</h3>\r\n  <p class=\"text-muted\">\r\nNulla pretium libero interdum, tempus lorem non, rutrum diam. Quisque pellentesque diam sed pulvinar lobortis. Vestibulum ante ipsum primis in faucibus orci luctus et ultrices posuere cubilia Curae.\r\n  </p>\r\n</div>\r\n<div class=\"col-sm-6\">\r\n  <img src=\"/_files/mosaic/imac.png\" class=\"img-responsive\" alt=\"...\">\r\n</div>\r\n</div> <!-- / .row -->\r\n<div class=\"divider\"></div>\r\n<div class=\"row features last\">\r\n<div class=\"col-sm-6\">\r\n  <div class=\"border-bottom\"><img src=\"/_files/mosaic/browser-cut.png\" class=\"img-responsive\" alt=\"...\"></div>\r\n</div>\r\n<div class=\"col-sm-6\">\r\n  <h3 class=\"primary-font\">Fifteen unique templates to take your site up and running in no time.</h3>\r\n  <p class=\"text-muted\">\r\nNulla pretium libero interdum, tempus lorem non, rutrum diam. Quisque pellentesque diam sed pulvinar lobortis. Vestibulum ante ipsum primis in faucibus orci luctus et ultrices posuere cubilia Curae.\r\n  </p>\r\n</div>\r\n</div> <!-- / .row -->', '', '', 0, 0, 1, 1, 1, 0, '0', 0, 0, 0, 0, 0, NULL, 2, NOW()),
(6, 9, 'UI Elements', '<div class=\"row\">\r\n<!-- Vertical Navigation -->\r\n<div class=\"col-md-3\">\r\n  <ul class=\"nav nav-pills nav-stacked\">\r\n<li class=\"active\"><a href=\"#buttons\" data-toggle=\"tab\">Buttons</a></li>\r\n<li><a href=\"#panels\" data-toggle=\"tab\">Panels</a></li>\r\n<li><a href=\"#info-boards\" data-toggle=\"tab\">Info boards</a></li>\r\n<li><a href=\"#navs\" data-toggle=\"tab\">Navs</a></li>\r\n<li><a href=\"#headlines\" data-toggle=\"tab\">Headlines</a></li>\r\n  </ul>            \r\n</div>\r\n<div class=\"col-md-9\">\r\n	<!-- Buttons -->\r\n  <h2 class=\"headline first-child text-color\" id=\"buttons\">\r\n<span class=\"border-color\">Buttons</span>\r\n  </h2>\r\n  <h3 class=\"primary-font\">Classes</h3>\r\n  <p>The Mosaic theme offers you new button classes that can be used along with the default Bootstrap 3 buttons:</p>\r\n  <div class=\"panel panel-default\">\r\n<div class=\"panel-heading\">Example</div>\r\n<div class=\"panel-body\">\r\n<a class=\"btn btn-green\">Green</a> \r\n<a class=\"btn btn-blue\">Blue</a> \r\n<a class=\"btn btn-orange\">Orange</a> \r\n<a class=\"btn btn-red\">Red</a>\r\n</div>\r\n<div class=\"panel-footer\">\r\n&lt;button type=<code>\"button\"</code> class=<code>\"btn btn-green\"</code>&gt;Green&lt;/button&gt;<br>\r\n&lt;button type=<code>\"button\"</code> class=<code>\"btn btn-blue\"</code>&gt;Blue&lt;/button&gt;<br>\r\n&lt;button type=<code>\"button\"</code> class=<code>\"btn btn-orange\"</code>&gt;Orange&lt;/button&gt;<br>\r\n&lt;button type=<code>\"button\"</code> class=<code>\"btn btn-red\"</code>&gt;Red&lt;/button&gt;<br>\r\n</div>\r\n  </div>\r\n  <h3 class=\"primary-font\">Sizes</h3>\r\n  <p>Fancy larger or smaller buttons? Add <code>.btn-lg</code>, <code>.btn-sm</code>, or <code>.btn-xs</code> for additional sizes.</p>\r\n  <div class=\"panel panel-default\">\r\n<div class=\"panel-heading\">Example</div>\r\n<div class=\"panel-body\">\r\n<p><a class=\"btn btn-lg btn-default\">Large Button</a> <a class=\"btn btn-lg btn-green\">Large Button</a> </p>\r\n<p><a class=\"btn btn-default\">Default Button</a> <a class=\"btn btn-green\">Default Button</a> </p>\r\n<p><a class=\"btn btn-sm btn-default\">Small Button</a> <a class=\"btn btn-sm btn-green\">Small Button</a> </p>\r\n<p><a class=\"btn btn-xs btn-default\">Extra Small</a> <a class=\"btn btn-xs btn-green\">Extra Small</a> </p>\r\n</div>\r\n<div class=\"panel-footer\">\r\n<p>\r\n&lt;button type=<code>\"button\"</code> class=<code>\"btn btn-default btn-lg\"</code>&gt;Large button&lt;/button&gt;<br>\r\n&lt;button type=<code>\"button\"</code> class=<code>\"btn btn-green btn-lg\"</code>&gt;Large button&lt;/button&gt;<br>\r\n</p>\r\n<p>\r\n&lt;button type=<code>\"button\"</code> class=<code>\"btn btn-default\"</code>&gt;Default button&lt;/button&gt;<br>\r\n&lt;button type=<code>\"button\"</code> class=<code>\"btn btn-green\"</code>&gt;Default button&lt;/button&gt;<br>\r\n</p>\r\n<p>\r\n&lt;button type=<code>\"button\"</code> class=<code>\"btn btn-default btn-sm\"</code>&gt;Small button&lt;/button&gt;<br>\r\n&lt;button type=<code>\"button\"</code> class=<code>\"btn btn-green btn-sm\"</code>&gt;Small button&lt;/button&gt;<br>\r\n </p>\r\n<p>\r\n&lt;button type=<code>\"button\"</code> class=<code>\"btn btn-default btn-xs\"</code>&gt;Extra small button&lt;/button&gt;<br>\r\n &lt;button type=<code>\"button\"</code> class=<code>\"btn btn-green btn-xs\"</code>&gt;Extra small button&lt;/button&gt;<br>\r\n</p>\r\n</div>\r\n  </div>\r\n	<!-- Panels -->\r\n	<h2 class=\"headline text-color\" id=\"panels\">\r\n	  <span class=\"border-color\">Panels</span>\r\n	</h2>\r\n	<p>\r\n	  While not always necessary, sometimes you need to put your DOM in a box. For those situations, try the panel component.\r\n	  <br />\r\n	  In the Mosaic template we have added several new classes to the panel element. For full documentation on panels, please refer to the official <a href=\"http://getbootstrap.com/components/#panels\">Bootstrap page</a>.\r\n	<div class=\"panel panel-default\">\r\n	  <div class=\"panel-heading\">Example</div>\r\n	  <div class=\"panel-body\">\r\n	    <div class=\"row\">\r\n	      <div class=\"col-sm-6\">\r\n	        <div class=\"panel panel-green\">\r\n	          <div class=\"panel-heading\">Panel Title</div>\r\n	          <div class=\"panel-body\">\r\n	            Panel Content\r\n	          </div>\r\n	        </div>\r\n	      </div>\r\n	      <div class=\"col-sm-6\">\r\n	        <div class=\"panel panel-blue\">\r\n	          <div class=\"panel-heading\">Panel Title</div>\r\n	          <div class=\"panel-body\">\r\n	            Panel Content\r\n	          </div>\r\n	        </div>\r\n	      </div>\r\n	      <div class=\"col-sm-6\">\r\n	        <div class=\"panel panel-orange\">\r\n	          <div class=\"panel-heading\">Panel Title</div>\r\n	          <div class=\"panel-body\">\r\n	            Panel Content\r\n	          </div>\r\n	        </div>\r\n	      </div>\r\n	      <div class=\"col-sm-6\">\r\n	        <div class=\"panel panel-red\">\r\n	          <div class=\"panel-heading\">Panel Title</div>\r\n	          <div class=\"panel-body\">\r\n	            Panel Content\r\n	          </div>\r\n	        </div>\r\n	      </div>\r\n	    </div>\r\n	  </div>\r\n	  <div class=\"panel-footer\">\r\n	    &lt;div class=<code>\"panel panel-green\"</code>&gt; ... &lt;/div&gt;<br>\r\n	    &lt;div class=<code>\"panel panel-blue\"</code>&gt; ... &lt;/div&gt;<br>\r\n	    &lt;div class=<code>\"panel panel-orange\"</code>&gt; ... &lt;/div&gt;<br>\r\n	    &lt;div class=<code>\"panel panel-red\"</code>&gt; ... &lt;/div&gt;<br>\r\n	  </div>\r\n	</div>\r\n  <!-- Info Boards -->\r\n  <h2 class=\"headline text-color\" id=\"info-boards\">\r\n<span class=\"border-color\">Info Boards</span>\r\n  </h2>\r\n  <p>You can emphasize some contents by wrapping it in a .info-board. Four classes are available:</p>\r\n  <div class=\"panel panel-default\">\r\n<div class=\"panel-heading\">Example</div>\r\n<div class=\"panel-body\">\r\n<div class=\"row\">\r\n<div class=\"col-sm-6\">\r\n<div class=\"info-board info-board-green\">\r\n  <h4>Info board title</h4>\r\n  <p>Info board content</p>\r\n</div>\r\n</div>\r\n<div class=\"col-sm-6\">\r\n<div class=\"info-board info-board-blue\">\r\n  <h4>Info board title</h4>\r\n  <p>Info board content</p>\r\n</div>\r\n</div>\r\n<div class=\"col-sm-6\">\r\n<div class=\"info-board info-board-orange\">\r\n  <h4>Info board title</h4>\r\n  <p>Info board content</p>\r\n</div>\r\n</div>\r\n<div class=\"col-sm-6\">\r\n<div class=\"info-board info-board-red\">\r\n  <h4>Info board title</h4>\r\n  <p>Info board content</p>\r\n</div>\r\n</div>\r\n</div>\r\n</div>\r\n<div class=\"panel-footer\">\r\n&lt;div class=<code>\"info-board info-board-green\"</code>&gt; ... &lt;/div&gt;<br>\r\n&lt;div class=<code>\"info-board info-board-blue\"</code>&gt; ... &lt;/div&gt;<br>\r\n&lt;div class=<code>\"info-board info-board-orange\"</code>&gt; ... &lt;/div&gt;<br>\r\n&lt;div class=<code>\"info-board info-board-red\"</code>&gt; ... &lt;/div&gt;<br>\r\n</div>\r\n  </div>\r\n	<!-- Navs -->\r\n	<h2 class=\"headline text-color\" id=\"navs\">\r\n	  <span class=\"border-color\">Navs</span>\r\n	</h2>            \r\n	<p>Navs available in Bootstrap have shared markup, starting with the base <code>.nav</code> class, as well as shared states. Swap modifier classes to switch between each style.</p>\r\n	<h3 class=\"primary-font\">Tabs</h3>\r\n	<p>Note the <code>.nav-tabs</code> class requires the <code>.nav</code> base class.</p>\r\n	<div class=\"panel panel-default\">\r\n	  <div class=\"panel-heading\">Example</div>\r\n	  <div class=\"panel-body\">\r\n	    <ul class=\"nav nav-tabs\">\r\n	      <li class=\"active\"><a href=\"#home\" data-toggle=\"tab\">Home</a></li>\r\n	      <li><a href=\"#profile\" data-toggle=\"tab\">Profile</a></li>\r\n	      <li><a href=\"#messages\" data-toggle=\"tab\">Messages</a></li>\r\n	      <li><a href=\"#settings\" data-toggle=\"tab\">Settings</a></li>\r\n	    </ul>\r\n	    <div class=\"tab-content\">\r\n	      <div class=\"tab-pane active\" id=\"home\">Home tab content</div>\r\n	      <div class=\"tab-pane\" id=\"profile\">Profile tab content</div>\r\n	      <div class=\"tab-pane\" id=\"messages\">Message tab content</div>\r\n	      <div class=\"tab-pane\" id=\"settings\">Settings tab content</div>\r\n	    </div>\r\n	  </div>\r\n	  <div class=\"panel-footer\">\r\n	    &lt;ul class=<code>\"nav nav-tabs\"</code>&gt;<br>\r\n	    <span class=\"tab-1\"></span>&lt;li class=<code>\"active\"</code>&gt;&lt;a href=<code>\"#home\"</code> data-toggle=<code>\"tab\"</code>&gt;Home&lt;/a&gt;&lt;/li&gt;<br>\r\n	    <span class=\"tab-1\"></span>&lt;li&gt;&lt;a href=<code>\"#profile\"</code> data-toggle=<code>\"tab\"</code>&gt;Profile&lt;/a&gt;&lt;/li&gt;<br>\r\n	    <span class=\"tab-1\"></span>&lt;li&gt;&lt;a href=<code>\"#messages\"</code> data-toggle=<code>\"tab\"</code>&gt;Messages&lt;/a&gt;&lt;/li&gt;<br>\r\n	    <span class=\"tab-1\"></span>&lt;li&gt;&lt;a href=<code>\"#settings\"</code> data-toggle=<code>\"tab\"</code>&gt;Settings&lt;/a&gt;&lt;/li&gt;<br>\r\n	    &lt;/ul&gt;<br><br>\r\n	    &lt;div class=<code>\"tab-content\"</code>&gt;<br>\r\n	    <span class=\"tab-1\"></span>&lt;div class=<code>\"tab-pane active\"</code> id=<code>\"home\"</code>&gt;Home tab content&lt;/div&gt;<br>\r\n	    <span class=\"tab-1\"></span>&lt;div class=<code>\"tab-pane\"</code> id=<code>\"profile\"</code>&gt;Profile tab content&lt;/div&gt;<br>\r\n	    <span class=\"tab-1\"></span>&lt;div class=<code>\"tab-pane\"</code> id=<code>\"messages\"</code>&gt;Message tab content&lt;/div&gt;<br>\r\n	    <span class=\"tab-1\"></span>&lt;div class=<code>\"tab-pane\"</code> id=<code>\"settings\"</code>&gt;Settings tab content&lt;/div&gt;<br>\r\n	    &lt;/div&gt;\r\n	  </div>\r\n	</div>\r\n	<!-- Pills -->\r\n	<h3 class=\"primary-font\">Pills</h3>\r\n	<p>Take that same HTML, but use <code>.nav-pills</code> instead.</p>\r\n	<div class=\"panel panel-default\">\r\n	  <div class=\"panel-heading\">Example</div>\r\n	  <div class=\"panel-body\">\r\n	    <ul class=\"nav nav-pills\">\r\n	      <li class=\"active\"><a href=\"#home\" data-toggle=\"tab\">Home</a></li>\r\n	      <li class=\"\"><a href=\"#profile\" data-toggle=\"tab\">Profile</a></li>\r\n	      <li><a href=\"#messages\" data-toggle=\"tab\">Messages</a></li>\r\n	      <li><a href=\"#settings\" data-toggle=\"tab\">Settings</a></li>\r\n	    </ul>\r\n	    <div class=\"tab-content\">\r\n	      <div class=\"tab-pane active\" id=\"home2\">Home tab content</div>\r\n	      <div class=\"tab-pane\" id=\"profile2\">Profile tab content</div>\r\n	      <div class=\"tab-pane\" id=\"messages2\">Message tab content</div>\r\n	      <div class=\"tab-pane\" id=\"settings2\">Settings tab content</div>\r\n	    </div>\r\n	  </div>\r\n	  <div class=\"panel-footer\">\r\n	    &lt;ul class=<code>\"nav nav-pills\"</code>&gt;<br>\r\n	    <span class=\"tab-1\"></span>&lt;li class=<code>\"active\"</code>&gt;&lt;a href=<code>\"#home\"</code> data-toggle=<code>\"tab\"</code>&gt;Home&lt;/a&gt;&lt;/li&gt;<br>\r\n	    <span class=\"tab-1\"></span>&lt;li&gt;&lt;a href=<code>\"#profile\"</code> data-toggle=<code>\"tab\"</code>&gt;Profile&lt;/a&gt;&lt;/li&gt;<br>\r\n	    <span class=\"tab-1\"></span>&lt;li&gt;&lt;a href=<code>\"#messages\"</code> data-toggle=<code>\"tab\"</code>&gt;Messages&lt;/a&gt;&lt;/li&gt;<br>\r\n	    <span class=\"tab-1\"></span>&lt;li&gt;&lt;a href=<code>\"#settings\"</code> data-toggle=<code>\"tab\"</code>&gt;Settings&lt;/a&gt;&lt;/li&gt;<br>\r\n	    &lt;/ul&gt;<br><br>\r\n	    &lt;div class=<code>\"tab-content\"</code>&gt;<br>\r\n	    <span class=\"tab-1\"></span>&lt;div class=<code>\"tab-pane active\"</code> id=<code>\"home\"</code>&gt;Home tab content&lt;/div&gt;<br>\r\n	    <span class=\"tab-1\"></span>&lt;div class=<code>\"tab-pane\"</code> id=<code>\"profile\"</code>&gt;Profile tab content&lt;/div&gt;<br>\r\n	    <span class=\"tab-1\"></span>&lt;div class=<code>\"tab-pane\"</code> id=<code>\"messages\"</code>&gt;Message tab content&lt;/div&gt;<br>\r\n	    <span class=\"tab-1\"></span>&lt;div class=<code>\"tab-pane\"</code> id=<code>\"settings\"</code>&gt;Settings tab content&lt;/div&gt;<br>\r\n	    &lt;/div&gt;\r\n	  </div>\r\n	</div>\r\n	<p>Choose one of the four colors by adding an exta class:</p>\r\n	<div class=\"panel panel-default\">\r\n	  <div class=\"panel-heading\"> Example</div>\r\n	  <div class=\"panel-body\">\r\n	    <div class=\"row\">\r\n	      <div class=\"col-md-6 col-sm-12\">\r\n	        <ul class=\"nav nav-pills nav-pills-green\">\r\n	          <li class=\"active\"><a href=\"#home\" data-toggle=\"tab\">Home</a></li>\r\n	          <li><a href=\"#profile\" data-toggle=\"tab\">Profile</a></li>\r\n	          <li><a href=\"#messages\" data-toggle=\"tab\">Messages</a></li>\r\n	          <li><a href=\"#settings\" data-toggle=\"tab\">Settings</a></li>\r\n	        </ul>\r\n	      </div>\r\n	      <div class=\"col-md-6 col-sm-12\">\r\n	        <ul class=\"nav nav-pills nav-pills-blue\">\r\n	          <li class=\"active\"><a href=\"#home\" data-toggle=\"tab\">Home</a></li>\r\n	          <li><a href=\"#profile\" data-toggle=\"tab\">Profile</a></li>\r\n	          <li><a href=\"#messages\" data-toggle=\"tab\">Messages</a></li>\r\n	          <li><a href=\"#settings\" data-toggle=\"tab\">Settings</a></li>\r\n	        </ul>\r\n	      </div>\r\n	    </div>\r\n	    <div class=\"row\">\r\n	      <div class=\"col-md-6 col-sm-12\">\r\n	        <ul class=\"nav nav-pills nav-pills-orange\">\r\n	          <li class=\"active\"><a href=\"#home\" data-toggle=\"tab\">Home</a></li>\r\n	          <li class=\"\"><a href=\"#profile\" data-toggle=\"tab\">Profile</a></li>\r\n	          <li class=\"\"><a href=\"#messages\" data-toggle=\"tab\">Messages</a></li>\r\n	          <li class=\"\"><a href=\"#settings\" data-toggle=\"tab\">Settings</a></li>\r\n	        </ul>\r\n	      </div>\r\n	      <div class=\"col-md-6 col-sm-12\">\r\n	        <ul class=\"nav nav-pills nav-pills-red\">\r\n	          <li class=\"active\"><a href=\"#home\" data-toggle=\"tab\">Home</a></li>\r\n	          <li class=\"\"><a href=\"#profile\" data-toggle=\"tab\">Profile</a></li>\r\n	          <li class=\"\"><a href=\"#messages\" data-toggle=\"tab\">Messages</a></li>\r\n	          <li class=\"\"><a href=\"#settings\" data-toggle=\"tab\">Settings</a></li>\r\n	        </ul>\r\n	      </div>\r\n	    </div>\r\n	  </div>\r\n	  <div class=\"panel-footer\">\r\n	    &lt;ul class=<code>\"nav nav-pills nav-pills-green\"</code>&gt; ... &lt;/ul&gt;<br>\r\n	    &lt;ul class=<code>\"nav nav-pills nav-pills-blue\"</code>&gt; ... &lt;/ul&gt;<br>\r\n	    &lt;ul class=<code>\"nav nav-pills nav-pills-orange\"</code>&gt; ... &lt;/ul&gt;<br>\r\n	    &lt;ul class=<code>\"nav nav-pills nav-pills-red\"</code>&gt; ... &lt;/ul&gt;<br>\r\n	  </div>\r\n	</div>\r\n	<!-- Headlines -->\r\n	<h2 class=\"headline text-color\" id=\"headlines\">\r\n	<span class=\"border-color\">Headlines</span>\r\n	</h2>            \r\n	<p>Use the code below to add a headline on your page:</p>\r\n	<div class=\"panel panel-default\">\r\n	  <div class=\"panel-heading\">Example</div>\r\n	  <div class=\"panel-body\">\r\n	    <h2 class=\"headline text-color\">\r\n	      <span class=\"border-color\">Headline</span>\r\n	    </h2>\r\n	  </div>\r\n	  <div class=\"panel-footer\">\r\n	    &lt;h2 class=\"<code>headline text-color</code>\"&gt;<br />\r\n	    <span class=\"tab-1\"></span>&lt;span class=\"<code>border-color</code>\"&gt;Headlines&lt;/span&gt;<br />\r\n	    &lt;/h2&gt;\r\n	  </div>\r\n	</div>\r\n</div>\r\n</div> <!-- / .row -->', '', '<script type=\"text/javascript\">\r\njQuery(document).ready(function(){\r\njQuery(\'a[href*=\"#buttons\"],a[href*=\"#panels\"], a[href*=\"#info-boards\"], a[href*=\"#navs\"], a[href*=\"#headlines\"]\').on(\"click\", function(e){\r\n  var anchor = jQuery(this);\r\n  jQuery(\'html, body\').stop().animate({\r\n  scrollTop: jQuery(anchor.attr(\'href\')).offset().top\r\n  }, 1000);\r\n  e.preventDefault();\r\n});\r\n});\r\n</script>', 0, 0, 1, 1, 1, 0, '0', 0, 0, 0, 0, 0, NULL, 2, NOW()),
(7, 10, 'Example', '<div class=\"row\">\r\n  <div class=\"col-sm-8\">\r\n<h2 class=\"headline first-child text-color\">\r\n<span class=\"border-color\">Headline #1</span>\r\n</h2>\r\n<h3 class=\"first-child primary-font\">Block Title</h3>\r\n<p>Use this dummy page to create a new page for your website.</p>\r\n<h3 class=\"primary-font\">Block Title</h3>\r\n<p>Vivamus at tincidunt risus. Etiam nisl velit, commodo et dolor id, volutpat gravida mi. Quisque ligula velit, convallis ac vehicula non, malesuada vel orci. Integer egestas ac eros ut aliquam. Nullam lobortis diam quis ante fringilla, ut consectetur elit mollis. Nullam laoreet magna sit amet orci semper ultrices. Nam a porta nisl. Ut imperdiet a magna sit amet congue. Curabitur quis egestas dui, sit amet consequat lorem. Aenean id accumsan lacus. Aenean vehicula, est vitae suscipit suscipit, lectus elit eleifend ligula, et rutrum odio odio id augue. Phasellus nec eros sodales, congue risus convallis, auctor enim. Donec mollis nibh vitae purus luctus, in scelerisque libero faucibus.</p>\r\n<a class=\"btn btn-lg btn-color\" href=\"#\">Button Large</a>\r\n  </div>\r\n  <div class=\"col-sm-4\">\r\n<h2 class=\"headline first-child first-child-m text-color\">\r\n<span class=\"border-color\">Headline #2</span>\r\n</h2>\r\n<div class=\"embed-responsive embed-responsive-16by9\">\r\n<iframe src=\"https://www.youtube.com/embed/PZPxWIcCOdM?rel=0\"></iframe>\r\n</div>\r\n  </div>\r\n</div>  <!-- / .row -->', '', '', 0, 0, 1, 1, 1, 0, '0', 0, 0, 0, 0, 0, NULL, 0, NOW()),
(8, 11, '3 Column', '<div class=\"row\">\r\n<div class=\"col-sm-3\">\r\n  <h4 class=\"primary-font\">Categories</h4>\r\n  <hr>\r\n  <ul class=\"help-cats-p\">\r\n<li><a href=\"#\">Morbi nec sem</a></li>\r\n<li><a href=\"#\">Integer faucibus</a></li>\r\n<li><a href=\"#\">Sed lobortis diam</a></li>\r\n<li><a href=\"#\">Cras pellentesque arcu</a></li>\r\n<li><a href=\"#\">Donec tincidunt</a></li>\r\n<li><a href=\"#\">Aliquam at mauris</a></li>\r\n<li><a href=\"#\">Morbi nec sem</a></li>\r\n<li><a href=\"#\">Integer faucibus</a></li>\r\n  </ul>\r\n</div>\r\n<div class=\"col-sm-6\">\r\n  <h4 class=\"primary-font\">Do you provide support for this item?</h4>\r\n  <hr>\r\n  <p>\r\nYes, do not hesitate to contact us if you have any questions or requests regarding this item. \r\n<br /><br />\r\nSed rutrum quis eros sit amet feugiat. Phasellus vestibulum libero et leo porta, eu scelerisque lacus aliquet. Vivamus euismod tincidunt velit sed malesuada. Pellentesque lacinia est ac lorem placerat tempus. In quis mauris at arcu bibendum fermentum eu quis velit. Pellentesque consequat molestie tortor, eget consectetur leo tristique ac. Quisque egestas arcu sed lectus vulputate, at faucibus quam malesuada. Donec fringilla turpis eros, id accumsan nibh egestas vel. Fusce a magna ut nisl pellentesque tincidunt.\r\n<br /><br />\r\nSed imperdiet varius elit, ut congue arcu lobortis id. Aliquam ultrices ligula eu neque rutrum tincidunt. Pellentesque non metus neque. Donec blandit metus eu venenatis fringilla. Nam ut dui lorem. Nulla euismod a neque eget pulvinar. Proin cursus tristique lectus at iaculis. Phasellus elementum, mi in feugiat pulvinar, dui justo fermentum justo, a dapibus mi ligula nec nunc. Etiam a purus porta, mollis nulla ut, tempus elit. Quisque consectetur bibendum neque, vel tincidunt urna ultricies at. Mauris purus mauris, laoreet dapibus convallis non, tincidunt in elit. Nullam vel ligula nibh. Praesent egestas ullamcorper malesuada. Class aptent taciti sociosqu ad litora torquent per conubia nostra, per inceptos himenaeos. Quisque rhoncus venenatis nunc non posuere.\r\n  </p>\r\n  <!-- Pagination -->\r\n  <ul class=\"pager pull-right\">\r\n<li><a href=\"#\">Previous</a></li>\r\n<li><a href=\"#\">Next</a></li>\r\n  </ul>\r\n  <div class=\"clearfix\"></div>\r\n</div>\r\n<div class=\"col-sm-3\">\r\n  <h4 class=\"primary-font\">Contact Us</h4>\r\n  <hr>\r\n  <p>\r\nSan Francisco, CA 94101<br />\r\n1987 Lincoln Street<br />\r\nPhone: +0 000 000 00 00<br />\r\nFax: +0 000 000 00 00<br />\r\nEmail: <a href=\"#\">admin@mysite.com</a>\r\n  </p>\r\n  <p>\r\n<a href=\"#\" class=\"btn btn-color\"><i class=\"fa fa-envelope\"></i> Contact Us</a>\r\n  </p>\r\n</div>\r\n</div> <!-- / .row -->', '', '', 0, 0, 1, 1, 1, 0, '0', 0, 0, 0, 0, 0, NULL, 1, NOW()),
(9, 12, 'Contact Us', '<h3>Get In Touch</h3>\r\n<p>Feel free to contact us by the contact form at any time, we usually respond in less then 24 hours.</p>\r\n<div class=\"row\">\r\n<div class=\"col-md-3\"><address><strong>JAKWEB / Switzerland</strong><br /> Hch.Bosshardstrasse 26 / 8352 Elsau<br /> <abbr title=\"Phone\">Phone:</abbr> +41 123 123 123<br /> <abbr title=\"Email\">Email:</abbr> email@domain.com</address></div>\r\n<div class=\"col-md-3\"><address><strong>JAKWEB / Spain</strong><br /> Carrer Obila 3 / 03720 Benissa / Espa&ntilde;a<br /> <abbr title=\"Phone\">Phone:</abbr> +34 123 123 123<br /> <abbr title=\"Email\">Email:</abbr> email@domain.com</address></div>\r\n<div class=\"col-md-6\"><a href=\"#\" class=\"jakMap\"><img src=\"/_files/modern/map.jpg\" alt=\"map\" height=\"150\" width=\"420\" /><span class=\"small-plus\"></span></a></div>\r\n</div>\r\n<hr />', '', '', 0, 0, 1, 1, 1, 1, '0', 0, 0, 0, 0, 0, NULL, 1, NOW()),
(10, 13, '404 - Page not found', '<div class=\"not-found-p\">\r\n    <div class=\"text\">\r\n        <h1><i class=\"fa fa-th-large\"></i> 404</h1>\r\n        <h2 class=\"primary-font\">Page not found</h2>\r\n        <p>The best option you have is to go <a href=\"/\">back to home</a> and start fresh.</p>\r\n    </div>\r\n</div>', '<link rel=\"stylesheet\" href=\"template/mosaic/css/themes/color-styles.css\" type=\"text/css\" />\r\n<link rel=\"stylesheet\" href=\"template/mosaic/css/screen.css\" type=\"text/css\" />', '', 0, 0, 1, 0, 0, 0, '0', 0, 0, 0, 0, 0, NULL, 2, NOW());");

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
(23, 0, 1, 9997, 0, 0, 0, 1),
(24, 8, 0, 9999, 0, 0, 0, 1),
(25, 8, 0, 9997, 0, 0, 0, 2),
(26, 8, 0, 9998, 0, 0, 0, 3),
(27, 9, 0, 9999, 0, 0, 0, 1),
(28, 9, 0, 9997, 0, 0, 0, 2),
(29, 9, 0, 9998, 0, 0, 0, 3),
(30, 10, 0, 9999, 0, 0, 0, 1),
(31, 10, 0, 9997, 0, 0, 0, 2),
(32, 10, 0, 9998, 0, 0, 0, 3);");

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
(10, 'tpl_below_content', 'BelowHeader / Content', 'plugins/belowheader/bhinputb.php', NULL, 'belowheader', 1, 1, 4, NOW())");

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
(1, 'News', 'Create and publish news', 1, '1', 2, NULL, 'require_once \"news.php\";', 'if (\$page == \"news\") {\r\nrequire_once \'news.php\';\r\n\$JAK_PROVED = true;\r\n\$checkp = 1;\r\n}', 'newsnav.php', NULL, '1', NULL, NULL, NOW()),
(2, 'Sitemap', 'Run a sitemap on your website for better SEO.', 1, '1', 3, NULL, 'require_once \'sitemap.php\';', NULL, NULL, NULL, '1', NULL, NULL, NOW()),
(3, 'Tags', 'Have tags on your website, very good for search engine optimization.', 1, '1', 4, NULL, 'require_once \"tags.php\";', 'if (\$page == \"tags\") {\r\nrequire_once \'tag.php\';\r\n\$JAK_PROVED = true;\r\n\$checkp = 1;\r\n}', 'tagnav.php', NULL, 'tags', NULL, NULL, NOW()),
(4, 'BelowHeader', 'Run your own Layer Slider.', 1, '1', 1, 'belowheader', '', 'if (\$page == \'belowheader\') {\n        require_once APP_PATH.\'plugins/belowheader/admin/belowheader.php\';\n        \$JAK_PROVED = 1;\n        \$checkp = 1;\n     }', NULL, '../plugins/belowheader/admin/template/bhnav.php', '1', 'uninstall.php', '1.0', NOW())");

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
('o_number', 'setting', 'O-test', '0', 'input', 'free', 'cms'),
('offline', 'general', '0', '0', 'yesno', 'boolean', 'cms'),
('offline_page', 'general', '0', '0', 'select', 'boolean', 'cms'),
('notfound_page', 'general', '13', '13', 'select', 'boolean', 'cms'),
('title', 'general', 'Mosaic CMS', 'Mosaic CMS', 'input', 'free', 'cms'),
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
('sitestyle', 'setting', 'mosaic', 'jakweb', 'select', 'free', 'cms'),
('adminpagemid', 'setting', '5', '5', 'input', 'number', 'cms'),
('adminpageitem', 'setting', '15', '10', 'input', 'number', 'cms'),
('timezoneserver', 'setting', 'Europe/Zurich', 'Europe/Zurich', 'select', 'free', 'cms'),
('rss', 'setting', '0', '1', 'yesno', 'boolean', 'cms'),
('usr_smilies', 'setting', '0', '0', 'yesno', 'boolean', 'cms'),
('adv_editor', 'setting', '1', '0', 'yesno', 'boolean', 'cms'),
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
('cms_tpl', 'mosaic', '1', '1', 'yesno', 'boolean', 'tpl_mosaic'),
('sitestyle_widget_mosaic', 'mosaic', '1', '1', 'yesno', 'boolean', 'tpl_mosaic'),
('styleswitcher_tpl', 'mosaic', '1', '1', 'yesno', 'boolean', 'tpl_mosaic'),
('footercte_mosaic_tpl', 'mosaic', '', NULL, 'input', 'free', 'tpl_mosaic'),
('footerct_mosaic_tpl', 'mosaic', '', NULL, 'input', 'free', 'tpl_mosaic'),
('footerc_mosaic_tpl', 'mosaic', '', NULL, 'input', 'free', 'tpl_mosaic'),
('fcont3_mosaic_tpl', 'mosaic', '<h3 class=\"text-color\"><span>Navigation</span></h3>', NULL, 'input', 'free', 'tpl_mosaic'),
('fcont2_mosaic_tpl', 'mosaic', '<h3 class=\"text-color\"><span>Contacts</span></h3>\r\n<p class=\"contact-us-details\">\r\n	<b>Address:</b> your Address<br/>\r\n	<b>Phone:</b> your Phone<br/>\r\n	<b>Email:</b> your Email\r\n</p>', NULL, 'input', 'free', 'tpl_mosaic'),
('footer_mosaic_tpl', 'mosaic', 'dark', 'dark', 'select', 'free', 'tpl_mosaic'),
('fcont_mosaic_tpl', 'mosaic', '<h3 class=\"text-color\"><span>Go Social</span></h3><div class=\"content social\">\r\n<p>Stay in touch with us:</p>\r\n<ul class=\"list-inline\">\r\n<li><a href=\"#\" class=\"twitter\"><i class=\"fa fa-twitter\"></i></a></li>\r\n  <li><a href=\"#\" class=\"facebook\"><i class=\"fa fa-facebook\"></i></a></li>\r\n  <li><a href=\"#\" class=\"pinterest\"><i class=\"fa fa-pinterest\"></i></a></li>\r\n  <li><a href=\"#\" class=\"github\"><i class=\"fa fa-github\"></i></a></li>\r\n  <li><a href=\"#\" class=\"linkedin\"><i class=\"fa fa-linkedin\"></i></a></li>\r\n  <li><a href=\"#\" class=\"vk\"><i class=\"fa fa-vk\"></i></a></li>\r\n  <li><a href=\"#\" class=\"plus\"><i class=\"fa fa-google-plus\"></i></a></li>\r\n</ul>\r\n<div class=\"clearfix\"></div>\r\n</div>', NULL, 'input', 'free', 'tpl_mosaic'),
('sectionshow_mosaic_tpl', 'mosaic', '0', '0', 'yesno', 'boolean', 'tpl_mosaic'),
('sectiontc_mosaic_tpl', 'mosaic', '', NULL, 'input', 'free', 'tpl_mosaic'),
('sectionbg_mosaic_tpl', 'mosaic', '', NULL, 'input', 'free', 'tpl_mosaic'),
('bcontent3_mosaic_tpl', 'mosaic', '', NULL, 'textarea', 'free', 'tpl_mosaic'),
('bcontent2_mosaic_tpl', 'mosaic', '', NULL, 'textarea', 'free', 'tpl_mosaic'),
('bcontent1_mosaic_tpl', 'mosaic', '', NULL, 'textarea', 'free', 'tpl_mosaic'),
('mainbg_mosaic_tpl', 'mosaic', '', NULL, 'input', 'free', 'tpl_mosaic'),
('navbarstyle_mosaic_tpl', 'mosaic', '0', '0', 'yesno', 'boolean', 'tpl_mosaic'),
('navbarbw_mosaic_tpl', 'mosaic', 'dark', 'dark', 'select', 'free', 'tpl_mosaic'),
('navbarcolor_mosaic_tpl', 'mosaic', '', NULL, 'input', 'free', 'tpl_mosaic'),
('navbarlinkcolor_mosaic_tpl', 'mosaic', '', NULL, 'input', 'free', 'tpl_mosaic'),
('navbarcolorlinkbg_mosaic_tpl', 'mosaic', '', NULL, 'input', 'free', 'tpl_mosaic'),
('navbarcolorsubmenu_mosaic_tpl', 'mosaic', '', NULL, 'input', 'free', 'tpl_mosaic'),
('logo_mosaic_tpl', 'mosaic', '/_files/logo_small.png', NULL, 'input', 'free', 'tpl_mosaic'),
('mininavbarshow_mosaic_tpl', 'mosaic', '1', '0', 'yesno', 'boolean', 'tpl_mosaic'),
('mininavbarcolour_mosaic_tpl', 'mosaic', 'dark', 'dark', 'select', 'free', 'tpl_mosaic'),
('mininavbartxt_mosaic_tpl', 'mosaic', '<div class=\"col-sm-12\">\r\n<a href=\"#\" class=\"first-child\"><i class=\"fa fa-envelope\"></i> Email<span class=\"hidden-sm\">: contact@example.com</span></a>\r\n<span class=\"phone\">\r\n  <i class=\"fa fa-phone-square\"></i> Tel.: +0 (000) 000-00-00\r\n</span>\r\n<a href=\"#\" class=\"pull-right\"><i class=\"fa fa-arrow-circle-down\"></i> Sign Up</a>\r\n<a href=\"#\" class=\"pull-right\"><i class=\"fa fa-sign-in\"></i> Sign In</a>\r\n<a href=\"#\" class=\"pull-right\"><i class=\"fa fa-search\"></i> Search</a>\r\n</div>', NULL, 'input', 'free', 'tpl_mosaic'),
('style_mosaic_tpl', 'mosaic', '', NULL, 'input', 'free', 'tpl_mosaic'),
('design_mosaic_tpl', 'mosaic', '', 'white', 'white', 'free', 'tpl_mosaic'),
('boxpattern_mosaic_tpl', 'mosaic', '', NULL, 'input', 'free', 'tpl_mosaic'),
('boxbg_mosaic_tpl', 'mosaic', '', NULL, 'input', 'free', 'tpl_mosaic'),
('sidebar_location_tpl', 'mosaic', 'left', NULL, 'input', 'free', 'tpl_mosaic'),
('font_mosaic_tpl', 'mosaic', 'Roboto', 'Arial, Helvetica, sans-serif', 'input', 'free', 'tpl_mosaic'),
('fontg_mosaic_tpl', 'mosaic', 'Oswald', 'NonGoogle', 'input', 'free', 'tpl_mosaic'),
('hcolour_mosaic_tpl', 'mosaic', '', NULL, 'input', 'free', 'tpl_mosaic'),
('txtcolour_mosaic_tpl', 'mosaic', '', NULL, 'input', 'free', 'tpl_mosaic'),
('theme_mosaic_tpl', 'mosaic', 'body-blue', 'body-green', 'input', 'free', 'tpl_mosaic'),
('pattern_mosaic_tpl', 'mosaic', NULL, NULL, 'input', 'free', 'tpl_mosaic'), ('smtp_or_mail', 'setting', 0, 0, 'yesno', 'boolean', 'cms'), ('smtp_port', 'setting', 25, 25, 'input', 'number', 'cms'), ('smtp_host', 'setting', '', '', 'input', 'free', 'cms'), ('smtp_auth', 'setting', 0, 0, 'yesno', 'boolean', 'cms'), ('smtp_prefix', 'setting', '', '', 'input', 'free', 'cms'), ('smtp_alive', 'setting', 0, 0, 'yesno', 'boolean', 'cms'), ('smtp_user', 'setting', '', '', 'input', 'free', 'cms'), ('smtp_password', 'setting', '', '', 'input', 'free', 'cms')");

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
(5, 'Banned', '<p>Banned user can only browse thru the page.</p>', 0, 0, 0)");

?>