<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <title>Bluesat Template Documentation</title>

  <!-- ======= FONTS ======= -->
  <link href="https://fonts.googleapis.com/css?family=Roboto:400,500,700,900&subset=latin-ext" rel="stylesheet">

  <!-- ======= CSS STYLE ======= -->
  <link rel="stylesheet" href="/admin/doc/css/doc.css">
  <link rel="stylesheet" href="/admin/doc/js/syntaxhighlighter/styles/shCoreKreatura.css">
  <link rel="stylesheet" href="/admin/doc/js/syntaxhighlighter/styles/shThemeKreatura.css">
  <!--[if lt IE 9]>
  <script src="assets/js/html5.js"></script>
  <![endif]-->

</head>
<body>

<header>
  <h1>CMS - Bluesat Help</h1>
  <div class="clear"></div>
</header>

<nav id="subnav">
  <h3>Table of Contents</h3>
  <h3>Current Chapter: <span id="curnav" class="light">About CMS - Bluesat / Requirements</span></h3>
</nav>

<aside>
  <nav>
    <ul id="sidebar">
      <li class="active">
        <span>About CMS - Bluesat</span>
        <ul>
          <li data-deeplink="requirements">Requirements</li>
          <li data-deeplink="about-cms">About CMS</li>
          <li data-deeplink="installation">Installation - First Step</li>
          <li data-deeplink="htaccess">CMS and htaccess (Seo)</li>
        </ul>
      </li>
      <li>
        <span>Plugins</span>
        <ul>
          <li data-deeplink="belowheader">Below Header</li>
          <li data-deeplink="blog">Blog</li>
          <li data-deeplink="download">Download</li>
          <li data-deeplink="ecommerce">E-Commerce</li>
          <li data-deeplink="faq">FAQ</li>
        </ul>
      </li>
      <li>
        <span>Functions</span>
        <ul>
          <li data-deeplink="phpfunctions">Useful PHP Functions</li>
        </ul>
      </li>
    </ul>
  </nav>
</aside>

<div id="content">
  <div>

    <!-- About Bluesat Template -->
    <section class="active">

      <!-- Requirements -->
      <article class="active">
        <h4>Requirements</h4>
        <p>You need a web server to run CMS.</p>
        <p>The web server must have PHP and MySQL with one available database.</p>
        <p>If your web server is running on Apache you can use the build in URL optimizer and get a slightly better search engine performance.</p>
        <p>Minimum requirements for your web server:</p>
        <ul>
          <li>Minimum PHP 5.3</li>
          <li>Minimum MySQL 5.2</li>
          <li>Session in working order</li>
          <li>GD Library</li>
          <li>$_SERVER vars (standard)</li>
          <li>MySQLi Support</li>
        </ul>
        <p>Optional for better SEO:</p>
        <ul>
          <li>Apache Server</li>
        </ul>
      </article>

      <!-- About CMS -->
      <article>
        <h4>About CMS</h4>
        <p>CMS is a software to build modern websites based on <strong>HTML5 and CSS3 and Bootstrap 3</strong>.</p>
        <p>Basic code is from J&eacute;r&ocirc;me Kaegi by <a href="http://wwww.jakweb.ch" target="_blank">wwww.jakweb.ch</a></p>
        <p>CMS is build on PHP widely used on web servers. MySQL for storing all the necessary data and HTML5/CSS3.</p>
        <p>CMS is using a few third party products like:</p>
        <ul>
          <li>jQuery</li>
          <li>Bootstrap</li>
          <li>tinyMCE - Editor</li>
          <li>Shadowbox</li>
          <li>jQuery Tags - XoXco</li>
        </ul>
        <p>CMS has been tested on many different web servers including windows based server, as long you have the minimum requirements and read the installation manual carefully you should not run into any problems.</p>
        <p>Minimum Requirements:</p>
        <ul>
          <li>PHP 5.3</li>
          <li>MySQL 5.0.7</li>
        </ul>
        <p>Optional, good to have:</p>
        <ul>
          <li>Apache based web server</li>
          <li>MySQLi Support</li>
        </ul>
      </article>

      <!-- Installation - First Step -->
      <article>
        <h4>Installation - First Step</h4>
        <p>When you install CMS the first time, please <strong>read the installation manual very carefully!</strong> Installing CMS is very simple and the installation wizard will guide you thru in only two steps.</p>
        <p>Important information about the db.php file. Please open this file in any text or php editor, the file is located in the include/ directory.</p>
        <p>Database Connection:</p>
        <pre name="code" class="brush: xml;">
define('DB_HOST', 'localhost'); // Database host ## Datenbank Server
define('DB_PORT', 3306); // Enter the database port for your mysql server
define('DB_USER', ''); // Database user ## Datenbank Benutzername
define('DB_PASS', ''); // Database password ## Datenbank Passwort
define('DB_NAME', ''); // Database name ## Datenbank Name
define('DB_PREFIX', ''); // Database prefix use (a-z) and (_)
        </pre>
        <p>This should be clear, important information for PHP to connect to your MySQL database and table. Please choose a strong password when you setup your MySQL table. For example: <strong>4k2+!kSSowk9</strong></p>
        <p>Define a unique key:</p>
        <pre name="code" class="brush: xml;">
define('DB_PASS_HASH', '');
        </pre>
        <p>This unique key will be used to make the password of your members even stronger, do not change this key after setup, otherwise your members cannot login again. Use a very strong key to protect your members password. For example: <strong>%3ko**è,LwlKK</strong></p>
        <p>The rest should be clear...</p>
      </article>

      <!-- CMS and htaccess (Seo) -->
      <article>
        <h4>CMS and htaccess (Seo)</h4>
        <p>If you server is running on Apache you can use the build in optimisation for short url's. This gives you the possibilities to have shorter and cleaner URL's and a better search engine performance.</p>
        <p>To use the build in SEO in CMS you need to do two things, first open the db.php file and set following definition:</p>
        <pre name="code" class="brush: xml;">
define('JAK_USE_APACHE', 1);
        </pre>
        <p>Then upload the .htaccess file provided in the download package or create your own with following content:</p>
        <pre name="code" class="brush: xml;">
# Enable the Rewrite engine
    RewriteEngine On

# SEO Url friendly
	RewriteCond %{REQUEST_FILENAME} !-f
	RewriteCond %{REQUEST_FILENAME} !-d
	RewriteRule . index.php [L]

# URL not found
	ErrorDocument 404 /404/

# URL Canonicalization
	RewriteCond %{HTTP_HOST} !^www.yoursite.cz$ [NC]
	RewriteRule ^(.*)$ http://www.yoursite.cz/$1 [L,R=301]

# Gzip compression
# compress text, html, javascript, css, xml:
	AddOutputFilterByType DEFLATE text/plain
	AddOutputFilterByType DEFLATE text/html
	AddOutputFilterByType DEFLATE text/xml
	AddOutputFilterByType DEFLATE text/css
	AddOutputFilterByType DEFLATE application/xml
	AddOutputFilterByType DEFLATE application/xhtml+xml
	AddOutputFilterByType DEFLATE application/rss+xml
	AddOutputFilterByType DEFLATE application/javascript
	AddOutputFilterByType DEFLATE application/x-javascript

# 1 WEEK
  <FilesMatch "\.(jpg|jpeg|png|gif|swf)$">
	Header set Cache-Control "max-age=604800, public"
  </FilesMatch>
        </pre>
        <p>Upload both files into the correct location .htaccess needs to be in the root directory and enjoy the apache version of CMS.</p>
      </article>

    </section>

    <!-- Plugins -->
    <section>

      <!-- Below Header -->
      <article>
        <h4>Below Header</h4>

      </article>

      <!-- Blog -->
      <article>
        <h4>Blog</h4>

      </article>

      <!-- Download -->
      <article>
        <h4>Download</h4>

      </article>

      <!-- E-Commerce -->
      <article>
        <h4>E-Commerce</h4>

      </article>

      <!-- FAQ -->
      <article>
        <h4>FAQ</h4>

      </article>

    </section>

    <!-- Functions -->
    <section>

      <!-- Useful PHP Functions -->
      <article>
        <h4>Useful PHP Functions</h4>
        <p>PHP functions are great to reduce and simplify your code. As soon you use a code more then once, make a class for it. Very simple and very practical.</p>

        <h5>Redirect your visitor to another page.</h5>
        <pre name="code" class="brush: xml;">
function redirect($url, $code = 302) {
    header('Location: '.$url, true, $code);
    exit();
}
        </pre>
        <p>To use this function and redirect your visitor to another page you will only need to use:</p>
        <pre name="code" class="brush: xml;">
redirect("new_page.php");
        </pre>
        <p>How simple is that? Plus you can use it as many times you want for all your redirection calls, but hang on why no second parameter? You can but because we set a default parameter you don't have to if you use 302 anyway.</p>

        <h5>Filter User Input</h5>
        <pre name="code" class="brush: xml;">
function input_filter($value) {
	$value = filter_var($value, FILTER_SANITIZE_STRING);
	return preg_replace("/[^0-9 _,.@-p{L}]/u", '', $value);
}
        </pre>
        <p>This small function will filter the content from input fields for example:</p>
        <pre name="code" class="brush: xml;">
$filtered = $input_filter($_POST["title"];
        </pre>

        <h5>Escape for MySQL</h5>
        <pre name="code" class="brush: xml;">
function smartsql($value) {

    // To your database
	global $jakdb;
	// Check Magic Quotes
	if (get_magic_quotes_gpc()) {
		$value = stripslashes($value);
	}
	// Not integer
    if (!is_int($value)) {
        $value = $jakdb->real_escape_string($value);
    }

    return $value;
}
        </pre>
        <p>This function does a few things, it will check if magic_quotes are enabled, if so it will strip off backslashes. The next step is to check if the value is not integer, if not it will escape the string and make it secure for your database. Again to use the function in your database updates or inserts only use:</p>
        <pre name="code" class="brush: xml;">
smartsql($filtered);
        </pre>

        <h5>Cut some long text</h5>
        <pre name="code" class="brush: xml;">
function cut_text($text,$limit,$ending) {

	// empty limit
	if (empty($limit)) $limit = 160;
    $text = trim($text);
    $text = strip_tags($text);
    $text = str_replace(array("r","n",'"'), "", $text);
    $txtl = strlen($text);
    if($txtl > $limit) {
        for($i=1;$text[$limit-$i]!=" ";$i++) {
            if($i == $limit) {
                return substr($text,0,$limit).$ending;
            }
        }
        $jakdata = substr($text,0,$limit-$i+1).$ending;
    } else {
    	$jakdata = $text;
    }
    return $jakdata;
}
        </pre>
        <p>Let's say you code a blog and you want to preview the article instead of showing the whole content, easily use the cut_text function. The function will cut to the length you set and does not cut off words, so your preview text always looks nice. You know how to use it now, don't you?!</p>

        <h5>Create a random password</h5>
        <pre name="code" class="brush: xml;">
// Password generator
function password_creator($length = 8) {
	return substr(md5(rand().rand()), 0, $length);
}
        </pre>
        <p>That should be self explained, the function will return a password with the length of your choice (8 characters are standard).</p>

        <h5>Encode email address</h5>
        <pre name="code" class="brush: xml;">
// encrypt email address (prevent spam)
function encode_email($e) {
	for ($i = 0; $i < strlen($e); $i++) { $output .= '&#'.ord($e[$i]).';'; }
	return $output;
}
        </pre>
        <p>Very useful function to prevent spam on your displayed email addresses. Simply encode your email address with this function before you display the email address.</p>

        <h5>Get IP Address</h5>
        <pre name="code" class="brush: xml;">
function get_ip_address() {
    foreach (array('HTTP_CLIENT_IP', 'HTTP_X_FORWARDED_FOR', 'HTTP_X_FORWARDED', 'HTTP_X_CLUSTER_CLIENT_IP', 'HTTP_FORWARDED_FOR', 'HTTP_FORWARDED', 'REMOTE_ADDR') as $key) {
        if (array_key_exists($key, $_SERVER) === true) {
            foreach (explode(',', $_SERVER[$key]) as $ip) {
                if (filter_var($ip, FILTER_VALIDATE_IP) !== false) {
                    return $ip;
                }
            }
        }
    }

    return 0;
}
        </pre>

      </article>

    </section>

  </div>
</div>

<!-- ======= JQUERY SCRIPT ======= -->
<script src="/js/jquery.js"></script>
<script src="/admin/doc/js/syntaxhighlighter/scripts/shCore.js" type="text/javascript"></script>
<script src="/admin/doc/js/syntaxhighlighter/scripts/shBrushJScript.js" type="text/javascript"></script>
<script src="/admin/doc/js/syntaxhighlighter/scripts/shBrushXml.js" type="text/javascript"></script>
<script src="/admin/doc/js/syntaxhighlighter/scripts/shBrushCss.js" type="text/javascript"></script>
<script src="/admin/doc/js/gallery.js"></script>
<script src="/admin/doc/js/doc.js"></script>

</body>
</html>