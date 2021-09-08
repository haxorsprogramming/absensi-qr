
  <!-- Begin Page Content -->
  <div class="container-fluid">

      <!-- Page Heading -->
      <h1 class="h3 mb-4 text-gray-800"><?= $title; ?></h1>


      <div class="row">
        <div class="col-lg-6">

        <?= form_error('menu', '<div class="alert alert-danger" role="alert">', '</div>'); ?>

        <?= $this->session->flashdata('message'); ?>
            <div class="form-group">
              <label for="exampleInputEmail1">Masukkan nama karyawan</label>
              <input type="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
            </div>
            <button class="btn btn-primary">Submit</button>
        </div>
        <div class="col-lg-6">
            <div class="form-group">
              <label for="exampleInputEmail1">Informasi QR Code akan muncul disini</label>
            </div>
        </div>
      </div>


  </div>
  <!-- /.container-fluid -->

</div>
<!-- End of Main Content -->

<link rel="stylesheet" href="<?php echo base_url() ?>assets/vendor/jQueryUI/css/jquery-ui.css">
<script  src="<?php echo base_url() ?>assets/vendor/jQueryUI/js/jquery-ui.js"></script>

<!-- <script type="text/javascript">
        function pindah() {
            $('#id').focus();
        };

        function ready() {
            var id = $('#id').val();
            $.ajax({
                type: 'POST',
                url: '<?php echo base_url('/GenBar/showw') ?>',
                data: `id=${id}`,
                beforeSend: function(msg) {
                    $('#showR').html('<h1><i class="fa fa-spin fa-refresh" /></h1>');
                },
                success: function(msg) {
                    $('#showR').html(msg);
                    $('#id_karyawan').focus();
                }
            });
        }
    </script>
    <script type="text/javascript">
        $(document).ready(function() {
            $('#id').autocomplete({
                source: "<?php echo site_url('GenBar/get_autocomplete'); ?>",
                select: function(event, ui) {
                    $('[name="qr"]').val(ui.item.label);
                }
            });
        });
    </script> -->