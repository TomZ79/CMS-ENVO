<!DOCTYPE html>
<html>
<head>
  <title>Help for Editor - Content</title>
  <meta charset="utf-8">
  <!-- BEGIN Vendor CSS-->
  <link href="/admin/assets/plugins/bootstrapv3/css/bootstrap.min.css?=v3.3.4" rel="stylesheet" type="text/css"/>
  <link href="/assets/plugins/font-awesome/4.7.0/css/font-awesome.css" rel="stylesheet" type="text/css"/>
  <!-- BEGIN Pages CSS-->
  <link href="/admin/pages/css/pages-icons.css?=v2.2.0" rel="stylesheet" type="text/css">
  <link class="main-stylesheet" href="/admin/pages/css/pages.css?=v2.2.0" rel="stylesheet" type="text/css"/>
  <!-- BEGIN CUSTOM MODIFICATION -->
  <style type="text/css">
    /* Fix 'jumping scrollbar' issue */
    @media screen and (min-width: 960px) {
      html {
        margin-left: calc(100vw - 100%);
        margin-right: 0;
      }
    }

    /* Main body */
    body {
      background: transparent;
    }

    /* Table */
    .table-transparent tbody tr td {
      background: transparent;
    }
  </style>
  <!-- BEGIN VENDOR JS -->
  <script src="/assets/plugins/jquery/jquery-2.1.1.min.js"></script>
  <script src="/admin/assets/plugins/bootstrapv3/js/bootstrap.min.js"></script>
  <!-- Code-prettify -->
  <link href="/admin/assets/plugins/code-prettify-master/themes/github/github.css" rel="stylesheet" type="text/css"/>
  <script src="/admin/assets/plugins/code-prettify-master/src/prettify.js"></script>
  <!-- BEGIN CORE TEMPLATE JS -->
  <script src="/admin/pages/js/pages.js?=v2.2.0"></script>
</head>
<body>

<div class="container">
  <div class="row">
    <div class="col-sm-12 m-t-20">
      <div class="jumbotron bg-master">
        <h3 class="semi-bold text-white">Help for Editor - Content</h3>
      </div>
      <hr>
      <div id="notificationcontainer"></div>
      <div class="m-b-30">
        <h4 class="semi-bold">Nápověda pro zadávání html kódu do obsahu stránky</h4>
        <p>Kromě běžného html kódu (zádávání v případě, že je ACE Editor aktivní) můžeme použít i php kód pro zobrazení a skrytí obsahu stránky pro přihlášené a nepřihlášené uživatele.</p>
      </div>
      <div class="m-b-30">
        <h5 class="semi-bold">Content for Members/Guests</h5>
        <p>With CMS you can display content for members only, with a simple if statement you can display code only for guests or members.</p>
        <pre class="prettyprint linenums lang-php">
{{if notmembers}}
  &lt;a href=&quot;#&quot; class=&quot;btn btn-primary btn-lg&quot;&gt;Start Now it is Free&lt;/a&gt;
{{endif}}

{{if members}}
  &lt;a href=&quot;#&quot; class=&quot;btn btn-primary btn-lg&quot;&gt;Download Now&lt;/a&gt;
{{endif}}
</pre>

        <p>Following line above will show content to the register page for guests and when the user is logged in it will show the link to the download area. Of course that is only an example you can place all content between the if statement.</p>
        <p>Guests only:</p>
        <pre class="prettyprint linenums lang-php">
{{if notmembers}}
  &lt;a href=&quot;#&quot; class=&quot;btn btn-primary btn-lg&quot;&gt;Start Now it is Free&lt;/a&gt;
{{endif}}
</pre>

        <p>Members only:</p>
        <pre class="prettyprint linenums lang-php">
{{if members}}
  &lt;a href=&quot;#&quot; class=&quot;btn btn-primary btn-lg&quot;&gt;Download Now&lt;/a&gt;
{{endif}}
</pre>
      </div>
      <hr>

    </div>
  </div>
</div>


<script>
  // Init Code-Prettify
  window.onload = (function () {
    prettyPrint();
  });
</script>

</body>
</html>