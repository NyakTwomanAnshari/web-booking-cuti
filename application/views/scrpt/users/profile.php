<script src="<?php echo base_url().'resources/jquery/jquery.min.js';?>"></script>
<script src="<?php echo base_url().'resources/bootstrap/js/bootstrap.bundle.min.js';?>"></script>
<script src="<?php echo base_url().'resources/dist/js/adminlte.min.js';?>"></script>
<script src="<?php echo base_url().'resources/dist/js/theme.js';?>"></script>
<script>
    // for timeout
   window.setTimeout(function() {
    $(".alert-dismissible").fadeTo(700, 0).slideUp(500, function(){
        $(this).remove(); }); 
    }, 10000);
</script>