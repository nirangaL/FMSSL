<!-- /.content-wrapper -->
<footer class="main-footer hidden-print">
    <div class="pull-right hidden-xs">
      <b>Version</b> 1.0
    </div>
    <strong>Copyright &copy; 2019-2020 <a href="#">N-IT Solution</a>.</strong> All rights
    reserved.
  </footer>

</div>
<script>

  ////addinig loader ////
  $("body").prepend('<div class="loading"></div>');
  
  $(document).ready(function(){
    $(".loading").remove();

    //// Hide error for all pages /////
    $('input,select').change(function () {
        $(this).next('#error').fadeOut();
    });

    //// fade out CI Flash alert ////
    setInterval(function(){ $('.ci-flash-alert').fadeOut(); }, 3000);

  });

 //// input validaton is number ///
 function isNumber(evt){
      var e = evt || window.event;
      var key = e.keyCode || e.which;

      if (!e.shiftKey && !e.altKey && !e.ctrlKey &&
          // numbers
          key >= 48 && key <= 57 ||
          // Numeric keypad
          key >= 96 && key <= 105 ||
          // Backspace and Tab and Enter
          key == 8 || key == 9 || key == 13 ||
          // Home and End
          key == 35 || key == 36 ||
          // left and right arrows
          key == 37 || key == 39 ||
          // Del and Ins
          key == 46 || key == 45 || key == 190) {
          // input is VALID
      }
      else {
          // input is INVALID
          e.returnValue = false;
          if (e.preventDefault) e.preventDefault();
      }
    }

 


</script>

</body>
</html>