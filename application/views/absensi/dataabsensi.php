
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

      <a href="" class="btn btn-primary mb-3" data-toggle="modal" data-target="#newKaryawanModal">Tambah Absensi</a>

          <div class="table-responsive">
            <table class="table table-hover" id="dataTable" width="100%" cellspacing="0">
              <thead>
                <tr>
                  <th scope="col">#</th>
                  <th scope="col">Nama</th>
                  <th scope="col">Tanggal</th>
                  <th scope="col">Jam Masuk</th>
                  <th scope="col">Jam Keluar</th>
                  <th scope="col">Kehadiran</th>
                  <th scope="col">Keterangan</th>
                  <th scope="col">Status</th>
                  <th scope="col">Action</th>
                </tr>
              </thead>
              <tbody>
                <?php $i = 1 ?>
                <?php foreach ($absensi as $a ) : ?>
                <tr>
                  <th scope="row"><?= $i; ?></th>
                  <td><?= $a['nama_karyawan']; ?></td>
                  <td><?= $a['nama_karyawan']; ?></td>
                  <td>
                    <a href="<?= base_url(); ?>data/ubah/<?= $k['id']; ?>" class="badge badge-success">Edit</a>
                    <a href="<?= base_url(); ?>data/hapus/<?= $k['id']; ?>"onclick="return confirm('Yakin ?')" class="badge badge-danger">Delete</a>
                  </td>
                </tr>
                <?php $i++ ?>
                <?php endforeach; ?>
              </tbody>
            </table>
          </div>
          
          <div class="container">
            <div class="row justify-content-center">

              <div class="col-lg-1">
                <a href="<?= base_url(); ?>absensi" class="btn btn-info">Kembali</a>        
              </div>
            </div>  
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
        <h5 class="modal-title" id="newKaryawanModalLabel">Tambah Data Absensi</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <form action="<?= base_url('data'); ?>" method="POST">
        <div class="modal-body">
          <div class="form-group">
            <select name="id_karyawan" id="id_karyawan" class="form-control">
                <option value="">Pilih Nama Karyawan</option>
                <?php foreach($karyawan as $k) : ?>
                  <option value="<?=$k['id_karyawan']; ?>"><?=$k['nama_karyawan']; ?></option>
                <?php endforeach; ?>
            </select>
          </div>
          <div class="form-group">
            <input type="date" class="form-control" id="tgl" name="tgl" placeholder="Tanggal">
          </div>
          <div class="form-group">
            <input type="time" class="form-control" id="jam_masuk" name="jam_masuk" placeholder="Jam Masuk">
          </div>
          <div class="form-group">
            <input type="time" class="form-control" id="jam_keluar" name="jam_keluar" placeholder="Jam Keluar">
          </div>
          <div class="form-group">
            <select name="kehadiran" id="kehadiran" class="form-control">
                <option value="">Pilih Kehadiran</option>
                <?php foreach($kehadiran as $kh) : ?>
                  <option value="<?=$kh['id']; ?>"><?=$kh['nama_kehadiran']; ?></option>
                <?php endforeach; ?>
            </select>
          </div>
          <div class="form-group">
            <input type="text" class="form-control" id="keterangan" name="keterangan" placeholder="Keterangan">
          </div>
          <div class="form-group">
            <select name="status" id="status" class="form-control">
                <option value="">Pilih Status</option>
                <?php foreach($status as $s) : ?>
                  <option value="<?=$s['id']; ?>"><?=$s['nama_status']; ?></option>
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
