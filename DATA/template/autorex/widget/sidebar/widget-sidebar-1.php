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
 * include_once 'template/autorex/widget/sidebar/widget-sidebar-1.php';
 *
 */


// Get URL
$url_array = explode('/', $_SERVER['REQUEST_URI']);
$url = end($url_array);

?>

<aside class="sidebar">

  <!--Blog Category Widget-->
  <div class="sidebar-widget sidebar-blog-category">
    <ul class="blog-cat">
      <li class="<?= ($url == 'cisteni-strech') ? 'active' : '' ?>"><a href="cisteni-strech">Čištění střech</a></li>
      <li class="<?= ($url == 'cisteni-okapu') ? 'active' : '' ?>"><a href="cisteni-okapu">Čištění okapů</a></li>
      <li class="<?= ($url == 'cisteni-balkonu-a-teras') ? 'active' : '' ?>"><a href="cisteni-balkonu-a-teras">Čištění
          balkonů a teras</a></li>
      <li class="<?= ($url == 'oprava-krytiny') ? 'active' : '' ?>"><a href="oprava-krytiny">Oprava krytiny</a></li>
      <li class="<?= ($url == 'instalace-hromosvodu') ? 'active' : '' ?>"><a href="instalace-hromosvodu">Instalace hromosvodů</a>
      </li>
      <li class="<?= ($url == 'instalace-tv-systemu') ? 'active' : '' ?>"><a href="instalace-tv-systemu">Instalace TV systémů</a></li>
      <li class="<?= ($url == 'oprava-hromosvodu') ? 'active' : '' ?>"><a href="oprava-hromosvodu">Oprava hromosvodů</a></li>
      <li class="<?= ($url == 'oprava-tv-systemu') ? 'active' : '' ?>"><a href="oprava-tv-systemu">Oprava TV systémů</a></li>
      <li class="<?= ($url == 'cenik') ? 'active' : '' ?>"><a href="cenik">Ceník</a></li>
    </ul>
  </div>

  <!--Contact Widget-->
  <div class="sidebar-widget contact-info-widget">
    <div class="sidebar-title style-two">
      <h2>Kontakt</h2>
    </div>
    <div class="inner-box">
      <ul>
        <li><span class="icon fas fa-phone"></span>+420 777 192 315</li>
        <li><span class="icon fas fa-paper-plane"></span>info@rdcpro.com</li>
      </ul>
    </div>
  </div>

</aside>
