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
      }, 400, function () {
        window.location.hash = hash
      })

    })
  });
</script>
<script>
  $(document).ready(function(){
    $('#filter').keyup(function(){

      // Retrieve the input field text and reset the count to zero
      var filter = $(this).val(), count = 0;

      // Loop through the comment list
      $('#pgicons li').each(function(){

        // If the list item does not contain the text phrase fade it out
        if ($(this).text().search(new RegExp(filter, "i")) < 0) {
          $(this).hide();

          // Show the list item if the phrase matches and increase the count by 1
        } else {
          $(this).show();
          count++;
        }
      });

      // Update the count
      var numberItems = count;
      if (filter == '')  {
        $("#filter-count").text('');
      } else {
        $("#filter-count").text("Počet vyhledaných ikon : " + count);
      }
    });
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
  .nav ul.sub-menu,
  .nav ul.sub-menu ul.sub-menu-child{
    display: none;
  }

  /* show active submenu */
  .nav > .active > ul.sub-menu,
  .nav > .active > ul.sub-menu > .active > ul.sub-menu-child {
    display: block;
  }

  /*  */
  .secondary-sidebar .sub-menu-child {
    margin-left: 23px;
  }

  .secondary-sidebar .sub-menu li.active  .sub-menu-child li a {
    color: rgba(120, 129, 149, 0.5) !important;
  }

  .secondary-sidebar .sub-menu li.active  .sub-menu-child li.active a {
    color: #FFF !important;
  }

  .secondary-sidebar .sub-menu li.active  .sub-menu-child li a:hover {
    color: #48B0F7 !important;
    background-color: transparent;
  }

  /*  */
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

  /* SHOW ICONS LIST */
  ul.show-icon {
    list-style: none;
    position: relative;
  }

  ul.show-icon li {
    width: 150px;
    height: 60px;
    border: 1px solid #ccc;
    text-align: center;
    vertical-align: middle;
    display: inline-block;
    padding: 5px 0 0 0;
    position: relative;
    margin: 5px;
  }

  ul.show-icon i {
    font-size: 2em;
  }

  ul.show-icon span {
    font-size: 12px;
    display: block;
    position: absolute;
    bottom: 0;
    right: 0;
    width: 150px;
    line-height: 20px;
    background: rgba(0, 0, 0, 0.1);
  }

  /* LIVE SEARCH */
  .live-search {
    padding: 10px;
    background: #DFDFDF;
  }

  .live-search input.text-input {
    background: none;
    border: 1px solid #999;
    background: #FFF;
    padding: 5px;
    width: 246px;
    font-size: 16px;
    line-height: 1em;
    margin: 0 20px;
  }

  .live-search p {
    float: left;
    margin: 0;
    line-height: 2em;
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
