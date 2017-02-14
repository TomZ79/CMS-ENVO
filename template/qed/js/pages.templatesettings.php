<script type="text/javascript">
  $(document).ready(function () {
    $('input[name="onefooterblock"]').change(function(){
      if($(this).val()=="1"){
        $('#footerblock1-2').toggleClass('hidden');
      }
      if($(this).val()=="0"){
        $('#footerblock1-2').toggleClass('hidden');
      }
    });
  });
</script>
