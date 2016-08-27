<?php

$jakdb->query("CREATE TABLE " . DB_PREFIX . "backup_content (
`id` INT( 11 ) NOT NULL AUTO_INCREMENT PRIMARY KEY ,
`pageid` INT( 11 ) NOT NULL DEFAULT  '0',
`content` mediumtext NULL,
`time` DATETIME NOT NULL DEFAULT  '0000-00-00 00:00:00'
) ENGINE = MyISAM DEFAULT CHARSET=utf8 AUTO_INCREMENT=1");

$jakdb->query("CREATE TABLE " . DB_PREFIX . "categories (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) DEFAULT NULL,
  `varname` varchar(255) DEFAULT NULL,
  `exturl` varchar(255) DEFAULT NULL,
  `catimg` varchar(255) DEFAULT NULL,
  `content` text,
  `showmenu` smallint(1) unsigned NOT NULL DEFAULT 0,
  `showfooter` smallint(1) unsigned NOT NULL DEFAULT 0,
  `catorder` int(11) unsigned NOT NULL,
  `catparent` int(11) unsigned NOT NULL DEFAULT 0,
  `pageid` int(11) unsigned NOT NULL DEFAULT 0,
  `permission` varchar(100) NOT NULL DEFAULT 0,
  `activeplugin` smallint(1) unsigned NOT NULL DEFAULT 1,
  `pluginid` int(11) unsigned NOT NULL DEFAULT 0,
  PRIMARY KEY (`id`),
  KEY `showmenu` (`showmenu`, `showfooter`, `catorder`, `catparent`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 AUTO_INCREMENT=5");

$jakdb->query("INSERT INTO " . DB_PREFIX . "categories VALUES
(1, 'Home', 'home', NULL, NULL, NULL, 1, 0, 1, 0, 1, 0, 1, 0),
(2, 'Sitemap', 'sitemap', NULL, NULL, NULL, 0, 1, 3, 0, 0, 0, 1, 2),
(3, 'Tags', 'tag', NULL, NULL, NULL, 0, 0, 4, 0, 0, 0, 1, 3),
(4, 'News', 'news', NULL, NULL, NULL, 1, 0, 2, 0, 0, 0, 1, 1)");

$jakdb->query("CREATE TABLE " . DB_PREFIX . "clickstat (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `xaxis` smallint(4) unsigned NOT NULL DEFAULT 0,
  `yaxis` smallint(4) unsigned NOT NULL DEFAULT 0,
  `location` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1");

$jakdb->query("CREATE TABLE " . DB_PREFIX . "contactform (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(255) DEFAULT NULL,
  `content` text,
  `email` varchar(255) DEFAULT NULL,
  `showtitle` smallint(1) unsigned NOT NULL DEFAULT 1,
  `active` smallint(1) unsigned NOT NULL DEFAULT 1,
  `time` datetime NOT NULL DEFAULT '0000-00-00 00:00:00',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=2");

$jakdb->query("INSERT INTO " . DB_PREFIX . "contactform VALUES
(1, 'Standard Contact Form', '<p>Thank you very much, you enquiry has been sent. We will return to you as soon as possible.</p>', NULL, 1, 1, NOW())");

$jakdb->query("CREATE TABLE " . DB_PREFIX . "contactoptions (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `formid` int(11) unsigned NOT NULL DEFAULT 0,
  `name` varchar(255) DEFAULT NULL,
  `typeid` smallint(2) unsigned NOT NULL DEFAULT 1,
  `options` mediumtext,
  `mandatory` smallint(1) NOT NULL DEFAULT 0,
  `forder` int(11) unsigned NOT NULL DEFAULT 1,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=5");

$jakdb->query("INSERT INTO " . DB_PREFIX . "contactoptions VALUES
(1, 1, 'Name', 1, '', 1, 1),
(2, 1, 'Email', 1, '', 3, 2),
(3, 1, 'Phone', 1, '', 2, 3),
(4, 1, 'Message', 2, '', 1, 4)");

$jakdb->query("CREATE TABLE " . DB_PREFIX . "loginlog (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) DEFAULT NULL,
  `fromwhere` varchar(255) DEFAULT NULL,
  `ip` char(15) NOT NULL,
  `usragent` varchar(255) DEFAULT NULL,
  `time` datetime NOT NULL DEFAULT '0000-00-00 00:00:00',
  `access` smallint(1) unsigned NOT NULL DEFAULT 0,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 AUTO_INCREMENT=1");

$jakdb->query("CREATE TABLE " . DB_PREFIX . "news (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(255) DEFAULT NULL,
  `content` mediumtext,
  `news_css` text,
  `news_javascript` text,
  `sidebar` smallint(1) unsigned NOT NULL DEFAULT 1,
  `previmg` varchar(255) DEFAULT NULL,
  `newsorder` int(11) unsigned NOT NULL,
  `showtitle` smallint(1) unsigned NOT NULL DEFAULT 0,
  `active` smallint(1) unsigned NOT NULL DEFAULT 0,
  `showcontact` int(11) unsigned NOT NULL DEFAULT 0,
  `showdate` smallint(1) unsigned NOT NULL DEFAULT 0,
  `showhits` smallint(1) unsigned NOT NULL DEFAULT 0,
  `shownews` smallint(1) unsigned NOT NULL DEFAULT 0,
  `socialbutton` smallint(1) unsigned NOT NULL DEFAULT 0,
  `showvote` smallint(1) unsigned NOT NULL DEFAULT 0,
  `time` datetime NOT NULL DEFAULT '0000-00-00 00:00:00',
  `startdate` INT(10) UNSIGNED NOT NULL DEFAULT 0,
  `enddate` INT(10) UNSIGNED NOT NULL DEFAULT 0,
  `permission` varchar(100) NOT NULL DEFAULT 0,
  `hits` int(11) unsigned NOT NULL DEFAULT 0,
  PRIMARY KEY (`id`),
  KEY `newsorder` (`newsorder`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=1");

$jakdb->query("CREATE TABLE " . DB_PREFIX . "pages (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `catid` int(11) unsigned NOT NULL DEFAULT 0,
  `title` varchar(255) DEFAULT NULL,
  `content` mediumtext,
  `page_css` text,
  `page_javascript` text,
  `sidebar` smallint(1) unsigned NOT NULL DEFAULT 1,
  `showtitle` smallint(1) unsigned NOT NULL DEFAULT 1,
  `active` tinyint(1) unsigned NOT NULL DEFAULT 1,
  `shownav` tinyint(1) unsigned NOT NULL DEFAULT 1,
  `showfooter` tinyint(1) unsigned NOT NULL DEFAULT 1,
  `showcontact` int(11) unsigned NOT NULL DEFAULT 0,
  `shownews` varchar(100) DEFAULT NULL,
  `showdate` tinyint(1) unsigned NOT NULL DEFAULT 0,
  `showtags` tinyint(1) unsigned NOT NULL DEFAULT 1,
  `showlogin` tinyint(1) unsigned NOT NULL DEFAULT 1,
  `socialbutton` tinyint(1) unsigned NOT NULL DEFAULT 0,
  `showvote` tinyint(1) unsigned NOT NULL DEFAULT 0,
  `password` char(64) DEFAULT NULL,
  `hits` int(11) unsigned NOT NULL DEFAULT 0,
  `time` datetime NOT NULL DEFAULT '0000-00-00 00:00:00',
  PRIMARY KEY (`id`),
  KEY `catid` (`catid`,`active`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=2");

$jakdb->query("INSERT INTO " . DB_PREFIX . "pages VALUES(1, 1, 'CMS - BLUESAT', '<div class=\"jumbotron\"><h1>CMS - BLUESAT</h1>\r\n<p>Welcome to your very own CMS installation.</p>\r\n</div>', '', '', 1, 1, 1, 1, 1, 0, 0, 1, 0, 0, 0, 0, NULL, 1, NOW())");

$jakdb->query("CREATE TABLE " . DB_PREFIX . "pagesgrid (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `pageid` int(11) unsigned NOT NULL DEFAULT 0,
  `newsid` int(11) unsigned NOT NULL DEFAULT 0,
  `pluginid` int(11) unsigned NOT NULL DEFAULT 0,
  `hookid` int(11) unsigned NOT NULL DEFAULT 0,
  `plugin` int(11) unsigned NOT NULL DEFAULT 0,
  `whatid` int(11) unsigned NOT NULL DEFAULT 0,
  `orderid` int(11) unsigned NOT NULL DEFAULT 0,
  PRIMARY KEY (`id`),
  KEY `pageid` (`pageid`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=5");

$jakdb->query("INSERT INTO " . DB_PREFIX . "pagesgrid VALUES
(1, 1, 1, 9999, 0, 0, 0, 1),
(2, 1, 0, 9998, 0, 0, 0, 2),
(3, 1, 0, 9997, 0, 0, 0, 3),
(4, 0, 1, 9997, 0, 0, 0, 4)");

$jakdb->query("CREATE TABLE " . DB_PREFIX . "pluginhooks (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `hook_name` varchar(255) DEFAULT NULL,
  `name` varchar(255) DEFAULT NULL,
  `phpcode` text,
  `widgetcode` text,
  `product` varchar(25) DEFAULT NULL,
  `active` smallint(1) unsigned NOT NULL DEFAULT 0,
  `exorder` smallint(5) unsigned NOT NULL DEFAULT 4,
  `pluginid` int(11) unsigned NOT NULL,
  `time` datetime NOT NULL DEFAULT '0000-00-00 00:00:00',
  PRIMARY KEY (`id`),
  KEY `hook_name` (`hook_name`,`active`,`pluginid`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=5");

$jakdb->query("INSERT INTO " . DB_PREFIX . "pluginhooks VALUES
(1, 'tpl_sidebar', 'Tags', 'tagsidebar.php', '', 'cms', 1, 3, 3, NOW()),
(2, 'tpl_sidebar', 'News', 'newssidebar.php', '', 'cms', 1, 2, 1, NOW()),
(3, 'tpl_sidebar', 'Login Form', 'loginsidebar.php', '', 'cms', 1, 4, 0, NOW()),
(4, 'tpl_sidebar', 'Search Form', 'searchsidebar.php', '', 'cms', 1, 1, 0, NOW()),
(5, 'tpl_footer_widgets', 'News - Footer Widget', 'newsfooter.php', '', 'cms', 1, 1, 1, NOW()),
(6, 'tpl_footer_widgets', 'Tags - Footer Widget', 'tagsfooter.php', '', 'cms', 1, 1, 3, NOW()),
(7, 'tpl_footer_widgets', 'Footer - Search Form', 'searchfooter.php', '', 'cms', 1, 1, 0, NOW())");

$jakdb->query("CREATE TABLE " . DB_PREFIX . "plugins (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) DEFAULT NULL,
  `description` longtext,
  `active` smallint(1) unsigned NOT NULL DEFAULT 0,
  `access` mediumtext,
  `pluginorder` int(11) unsigned NOT NULL DEFAULT 1,
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
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=4");

$jakdb->query("INSERT INTO " . DB_PREFIX . "plugins VALUES
(1, 'News', 'Create and publish news', 1, '1', 1, NULL, 'require_once \"news.php\";', 'if (\$page == \"news\") {\r\nrequire_once ''news.php'';\r\n\$JAK_PROVED = true;\r\n\$checkp = 1;\r\n}', 'newsnav.php', NULL, '1', NULL, NULL, NOW()),
(2, 'Sitemap', 'Run a sitemap on your website for better SEO.', 1, '1', 2, NULL, 'require_once ''sitemap.php'';', NULL, NULL, NULL, '1', NULL, NULL, NOW()),
(3, 'Tags', 'Have tags on your website, very good for search engine optimization.', 1, '1', 3, NULL, 'require_once \"tags.php\";', 'if (\$page == \"tags\") {\r\nrequire_once ''tag.php'';\r\n\$JAK_PROVED = true;\r\n\$checkp = 1;\r\n}', 'tagnav.php', NULL, 'tags', NULL, NULL, NOW())");

$jakdb->query("CREATE TABLE " . DB_PREFIX . "searchlog (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `tag` varchar(100) DEFAULT NULL,
  `count` int(11) unsigned NOT NULL DEFAULT 1,
  `time` datetime NOT NULL DEFAULT '0000-00-00 00:00:00',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 AUTO_INCREMENT=1");

$jakdb->query("CREATE TABLE " . DB_PREFIX . "setting (
  `varname` varchar(100) NOT NULL DEFAULT '',
  `groupname` varchar(50) DEFAULT NULL,
  `value` mediumtext,
  `defaultvalue` mediumtext,
  `optioncode` mediumtext,
  `datatype` enum('free','number','boolean','bitfield','username','integer','posint') NOT NULL DEFAULT 'free',
  `product` varchar(25) DEFAULT '',
  PRIMARY KEY (`varname`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8");

$jakdb->query("INSERT INTO " . DB_PREFIX . "setting VALUES
('version', 'version', '1.1', '1.1', NULL, 'free', 'cms'),
('updatetime', 'updatetime', '" . time() . "', '" . time() . "', 'timestamp', 'integer', 'cms'),
('o_number', 'setting', '0', '0', 'input', 'free', 'cms'),
('offline', 'general', '0', '0', 'yesno', 'boolean', 'cms'),
('offline_page', 'general', '0', '0', 'select', 'boolean', 'cms'),
('notfound_page', 'general', '0', '0', 'select', 'boolean', 'cms'),
('title', 'general', 'CMS', 'CMS', 'input', 'free', 'cms'),
('copyright', 'general', 'yoursite.com &copy; 2016', 'CMS copyright 2016', 'input', 'free', 'cms'),
('metadesc', 'general', '', '', 'textarea', 'free', 'cms'),
('metakey', 'general', '', '', 'textarea', 'free', 'cms'),
('metaauthor', 'general', 'http://www.yoursite.com', 'http://www.bluesat.cz', 'input', 'free', 'cms'),
('robots', 'general', '1', '1', 'yesno', 'boolean', 'cms'),
('analytics',  'general', NULL , NULL ,  'textarea',  'free',  'cms'),
('email', 'setting', '', '', 'input', 'free', 'cms'),
('sitehttps', 'setting', '0', '0', 'yesno', 'boolean', 'cms'),
('dateformat', 'setting', 'd.m.Y', 'd.m.Y', 'input', 'free', 'cms'),
('timeformat', 'setting', ' - H:i', 'h:i A', 'input', 'free', 'cms'),
('time_ago_show', 'setting', '1', '1', 'yesno', 'boolean', 'cms'),
('searchform', 'setting', '1', '1', 'yesno', 'boolean', 'cms'),
('contactform', 'setting', '1', '1', 'yesno', 'boolean', 'cms'),
('sitestyle', 'setting', '', 'jakweb', 'select', 'free', 'cms'),
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
('smtp_or_mail', 'setting', 0, 0, 'yesno', 'boolean', 'cms'),
('smtp_port', 'setting', 25, 25, 'input', 'number', 'cms'),
('smtp_host', 'setting', '', '', 'input', 'free', 'cms'),
('smtp_auth', 'setting', 0, 0, 'yesno', 'boolean', 'cms'),
('smtp_prefix', 'setting', '', '', 'input', 'free', 'cms'),
('smtp_alive', 'setting', 0, 0, 'yesno', 'boolean', 'cms'),
('smtp_user', 'setting', '', '', 'input', 'free', 'cms'),
('smtp_password', 'setting', '', '', 'input', 'free', 'cms'),
('acetheme', 'setting', 'chrome', 'chrome', 'input', 'free', 'cms'),
('acetabSize', 'setting', '2', '2', 'input', 'free', 'cms'),
('acegutter', 'setting', '1', '1', 'yesno', 'boolean', 'cms'),
('aceinvisible', 'setting', '0', '0', 'yesno', 'boolean', 'cms'),
('acewraplimit', 'setting', '100', '100', 'input', 'free', 'cms'),
('aceactiveline', 'setting', '1', '1', 'yesno', 'boolean', 'cms'),
");


$jakdb->query("CREATE TABLE " . DB_PREFIX . "tagcloud (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `tag` varchar(100) DEFAULT NULL,
  `count` int(11) NOT NULL DEFAULT 1,
  PRIMARY KEY (`id`),
  KEY `tag` (`tag`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 AUTO_INCREMENT=1");

$jakdb->query("CREATE TABLE " . DB_PREFIX . "tags (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `tag` varchar(100) DEFAULT NULL,
  `itemid` int(11) unsigned NOT NULL DEFAULT 0,
  `pluginid` int(11) unsigned NOT NULL DEFAULT 0,
  `active` smallint(1) unsigned NOT NULL DEFAULT 1,
  PRIMARY KEY (`id`),
  KEY `module` (`pluginid`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 AUTO_INCREMENT=1");

$jakdb->query("CREATE TABLE " . DB_PREFIX . "todo_list (
 `id` INT(8) UNSIGNED NOT NULL AUTO_INCREMENT ,
 `position` INT(8) UNSIGNED NOT NULL DEFAULT 0,
 `adminid` INT(8) UNSIGNED NOT NULL DEFAULT 0,
 `text` VARCHAR(255) DEFAULT NULL,
 `work_done` SMALLINT( 1 ) UNSIGNED NOT NULL DEFAULT 0,
 `dt_added` TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP ,
PRIMARY KEY (`id`),
KEY  `position` (`position`)
) ENGINE=MYISAM DEFAULT CHARSET=utf8 AUTO_INCREMENT=1;");

$jakdb->query("CREATE TABLE " . DB_PREFIX . "user (
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
  `backtogroup` INT(11) UNSIGNED NOT NULL DEFAULT 0,
  `backtime` DATE NOT NULL DEFAULT '0000-00-00',
  `logins` int(11) unsigned NOT NULL DEFAULT 0,
  `access` smallint(1) unsigned NOT NULL DEFAULT 0,
  `activatenr` int(10) UNSIGNED NOT NULL DEFAULT 0,
  `forgot` int(11) unsigned NOT NULL DEFAULT 0,
  PRIMARY KEY (`id`),
  KEY `usergroupid` (`usergroupid`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=1");

$jakdb->query("CREATE TABLE " . DB_PREFIX . "usergroup (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(100) DEFAULT NULL,
  `description` mediumtext,
  `canrate` smallint(1) unsigned NOT NULL DEFAULT 0,
  `tags` smallint(1) unsigned NOT NULL DEFAULT 0,
  `advsearch` smallint(1) unsigned NOT NULL DEFAULT 0,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 AUTO_INCREMENT=6");

$jakdb->query("INSERT INTO " . DB_PREFIX . "usergroup VALUES
(1, 'Guest', '<p>Usergroup for all the guests.</p>', 1, 1, 1),
(2, 'Member (Standard)', '<p>Standard user group after register on your site.</p>', 0, 1, 1),
(3, 'Administrator', '<p>Administrator user group, usually full access and no approval for posts.</p>', 1, 1, 1),
(4, 'Moderator', '<p>Moderator user group, they can delete other post from blog, forum, gallery or shop.</p>', 0, 1, 1),
(5, 'Banned', '<p>Banned user can only browse thru the page.</p>', 0, 0, 0)");

$jakdb->query("CREATE TABLE " . DB_PREFIX . "like_counter (
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

$jakdb->query("CREATE TABLE " . DB_PREFIX . "like_client (
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

?>