<script>
  $(document).ready(function () {
    //Scrollspy offset
    $('body').scrollspy({
      target: '#myScrollspy',
      offset: 70
    });

    // Spy and scroll menu boogey - animate
    $("#myScrollspy ul li a[href^='#']").on('click', function (e) {
      // prevent default anchor click behavior
      e.preventDefault()
      // store hash
      var hash = this.hash
      // animate
      $('html, body').animate({
        scrollTop: $(this.hash).offset().top
      }, 500, function () {
        window.location.hash = hash
      })

    })
  });
</script>
<style>
  /*  */
  .secondary-sidebar {
    height: calc(100% - 60px) !important;
    overflow-y: scroll;
    width: 330px !important;
  }

  .secondary-sidebar .main-menu > li a {
    padding: 0;
    font-size: 13px;
  }

  .secondary-sidebar .main-menu > li a:hover {
    color: #48B0F7;
    background-color: transparent;
  }

  .secondary-sidebar .main-menu > li a:focus {
    background-color: transparent;
  }

  .secondary-sidebar .main-menu > li.active > a > .title::after {
    top: 4.5px;
  }

  /* hide inactive submenu */
  .nav ul.sub-menu {
    display: none;
  }

  /* show active submenu */
  .nav > .active > ul.sub-menu {
    display: block;
  }

  .inner-content {
    margin-left: 330px;
  }

  /*  */
  .scrollspyoffset {
    padding-top: 56px;
    margin-top: -56px;
    margin-bottom: 80px;
  }

  /* TABLE */
  table {
    background-color: #FFF;
  }

  .table tbody tr td.text-success {
    color: #10cfbd !important;
  }

  .table tbody tr td.text-danger {
    color: #f55753 !important;
  }

  .table tbody tr td.text-muted {
    color: #777;
  }

  .parameters {
    width: 100%;
    background: transparent;
    margin-bottom: 20px;
    clear: both;
  }

  .parameters th,
  .parameters td {
    padding: 5px;
  }

  /* CODE EXAMPLE */
  .example {
    margin: 0;
    padding: 10px;
    border: 1px solid;
    border-color: #E0E0E0;
    border-bottom: 0;
    background-color: #FFF;
  }

  pre[class*="language-"] {
    border-radius: 0;
  }

  /*  */
  .bs-ref {
    border-radius: 0;
  }

  .bs-ref span {
    opacity: 0.7;
    font-size: 13px;
    margin-top: 8px;
  }

</style>
