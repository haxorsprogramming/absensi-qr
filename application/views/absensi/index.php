
<!-- Begin Page Content -->
  <div class="container-fluid">

      <!-- Page Heading -->
      <h1 class="h3 mb-4 text-gray-800"><?= $title; ?></h1>

      <?php if(validation_errors()) : ?>
          <div class="alert alert-danger" role="alert">
            <?= validation_errors(); ?>
          </div>
      <?php endif; ?>
      <?= $this->session->flashdata('message'); ?>

          <div class="table-responsive">
            <table class="table table-hover" id="dataTable" width="100%" cellspacing="0">
              <thead>
                <tr>
                  <th scope="col">#</th>
                  <th scope="col">Nama Gedung</th>
                  <th scope="col">Action</th>
                </tr>
              </thead>
              <tbody>
                <?php $i = 1 ?>
                <?php foreach ($gedung as $g ) : ?>
                <tr>
                  <th scope="row"><?= $i; ?></th>
                  <td><?= $g['nama_gedung']; ?></td>
                  <td>
                  <a href="<?= base_url(); ?>absensi/dataabsensi" class="badge badge-warning">Lihat</a>
                </td>
                </tr>
                <?php $i++ ?>
                <?php endforeach; ?>
              </tbody>
            </table>
          </div>
                      

  </div>
  <!-- /.container-fluid -->

</div>
<!-- End of Main Content -->

<!-- Modal -->
<div class="modal fade" id="newKaryawanModal" tabindex="-1" aria-labelledby="newKaryawanModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="newKaryawanModalLabel">Tambah Data Karyawan</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <form action="<?= base_url('data'); ?>" method="POST">
        <div class="modal-body">
          <div class="form-group">
            <input type="text" class="form-control" id="id_karyawan" name="id_karyawan" placeholder="Kode">
          </div>
          <div class="form-group">
            <input type="text" class="form-control" id="nama_karyawan" name="nama_karyawan" placeholder="Nama">
          </div>
          <div class="form-group">
              <select name="jabatan" id="jabatan" class="form-control">
                  <option value="">Pilih Jabatan</option>
                    <option value="Manajer">Manajer</option>
                    <option value="Staf">Staf</option>
                    <option value="Karyawan">Karyawan</option>
              </select>
          </div>
          <div class="form-group">
              <select name="shift" id="shift" class="form-control">
                  <option value="">Pilih Shift</option>
                    <option value="Shift 1">Shift 1</option>
                    <option value="Shift 2">Shift 2</option>
                    <option value="Shift 3">Shift 3</option>
              </select>
          </div>
          <div class="form-group">
            <select name="id_gedung" id="id_gedung" class="form-control">
                <option value="">Pilih Gedung</option>
                <?php foreach($gedung as $g) : ?>
                  <option value="<?= $g['id']; ?>"><?= $g['nama_gedung']; ?></option>
                <?php endforeach; ?>
            </select>
          </div>
        </div>
        
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
          <button type="submit" class="btn btn-primary">Tambah </button>
        </div>
    </form>
    </div>
  </div>
</div>
