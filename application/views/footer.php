<script src="<?php echo base_url('assets/') ?>vendor/jquery/jquery.min.js"></script>
<script src="<?php echo base_url('assets/') ?>vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
<script src="<?php echo base_url('assets/') ?>vendor/jquery-easing/jquery.easing.min.js"></script>
<script src="<?php echo base_url('assets/') ?>js/sb-admin-2.min.js"></script>
<script src="<?php echo base_url('assets/') ?>vendor/datatables/jquery.dataTables.min.js"></script>
<script src="<?php echo base_url('assets/') ?>vendor/datatables/dataTables.bootstrap4.min.js"></script>
<script src="<?php echo base_url('assets/') ?>js/demo/datatables-demo.js"></script>
<script src="<?php echo base_url('assets/') ?>js/select2.min.js"></script>
<script type="text/javascript">
$('.select2pasien').select2({
    minimumInputLength: 2,
    allowClear: true,
    theme: 'bootstrap',
    placeholder: 'Ketik nama pasien',
    ajax: {
       dataType: 'json',
       closeOnSelect: true,
       url: '<?php echo base_url('data/nama_pasien'); ?>',
       delay: 250,
       data: function(params) {
         return {
           nama: params.term
         };
       },
       processResults: function(data) {
         var results = [];
         $.each(data, function(index, item){
           results.push({
             id: item.no_pasien,
             text: item.nama
           });
         });
         return {
           results: results
         }
     }
   }
});
</script>
</body>
</html>
