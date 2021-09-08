
<!-- Begin Page Content -->
  <div class="container-fluid">

      <!-- Page Heading -->
      <h1 class="h3 mb-4 text-gray-800"><?= $title; ?></h1>

      <?= $this->session->flashdata('message'); ?>

      <a href="" class="btn btn-primary mb-3" data-toggle="modal" data-target="#newGedungModal">Tambah Data Gedung</a>

          <div class="col-lg-7">
            <table class="table table-hover" id="dataTable" width="100%" cellspacing="0">
              <thead>
                <tr>
                  <th scope="col">#</th>
                  <th scope="col">Gedung</th>
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
                  <a href="<?= base_url(); ?>data/lihatgedung/<?= $g['id']; ?>" onclick="return confirm('Yakin ?')" class="badge badge-warning">Lihat</a>
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
<div class="modal fade" id="newGedungModal" tabindex="-1" aria-labelledby="newGedungModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="newGedungModalLabel">Tambah Data Gedung</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <form action="<?= base_url('data/gedung'); ?>" method="POST">
        <div class="modal-body">
           <input type="text" class="form-control" id="nama_gedung" name="nama_gedung" placeholder="Nama gedung">
        </div>
        
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
          <button type="submit" class="btn btn-primary">Tambah </button>
        </div>
    </form>
    </div>
  </div>
</div>
