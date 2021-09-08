
  <!-- Begin Page Content -->
  <div class="container-fluid">

      <!-- Page Heading -->
      <h1 class="h3 mb-4 text-gray-800"><?= $title; ?></h1>

      <div class="row">
        <div class="col-lg-8">

          <form action="" method="POST">
            <input type="hidden" name="id" value="<?= $karyawan['id']; ?>">
            <div class="form-group row">
              <label for="id_karyawan" class="col-sm-2 col-form-label">Kode</label>
              <div class="col-sm-10">
                <input type="text" class="form-control" id="id_karyawan" name="id_karyawan" value="<?= $karyawan['id_karyawan']; ?>">
                <?= form_error('id_karyawan', '<small class="text-danger pl-3">', '</small>'); ?>
              </div>
            </div>
            <div class="form-group row">
              <label for="nama_karyawan" class="col-sm-2 col-form-label">Nama</label>
              <div class="col-sm-10">
                <input type="text" class="form-control" id="nama_karyawan" name="nama_karyawan" value="<?= $karyawan['nama_karyawan']; ?>">
                <?= form_error('nama_karyawan', '<small class="text-danger pl-3">', '</small>'); ?>
              </div>
            </div>
            <div class="form-group row">
              <label for="jabatan" class="col-sm-2 col-form-label">Jabatan</label>
              <div class="col-sm-10">
                <select name="jabatan" id="jabatan" class="form-control">
                   <?php foreach( $jabatan as $j ) :?>
                    <?php if ( $j == $karyawan['jabatan'] ) : ?>
                      <option value="<?= $j; ?>" selected><?= $j; ?></option>
                    <?php else : ?>
                      <option value="<?= $j; ?>"><?= $j; ?></option>
                    <?php endif; ?> 
                  <?php endforeach; ?>
                </select>
              </div>
            </div>
            <div class="form-group row">
              <label for="jabatan" class="col-sm-2 col-form-label">Shift</label>
              <div class="col-sm-10">
                <select name="shift" id="shift" class="form-control">
                   <?php foreach( $shift as $s ) :?>
                    <?php if ( $s == $karyawan['shift'] ) : ?>
                      <option value="<?= $s; ?>" selected><?= $s; ?></option>
                    <?php else : ?>
                      <option value="<?= $s; ?>"><?= $s; ?></option>
                    <?php endif; ?> 
                  <?php endforeach; ?>
                </select>
              </div>
            </div>
             <div class="form-group row">
              <label for="id_gedung" class="col-sm-2 col-form-label">Gedung</label>
              <div class="col-sm-10">
                <select name="id_gedung" id="id_gedung" class="form-control">
                   <?php foreach( $gedung as $g ) :?>
                    <?php if ( $g['id'] == $karyawan['id_gedung'] ) : ?>
                      <option value="<?= $g['id']; ?>" selected><?= $g['nama_gedung']; ?></option>
                    <?php else : ?>
                      <option value="<?= $g['id']; ?>"><?= $g['nama_gedung']; ?></option>
                    <?php endif; ?> 
                  <?php endforeach; ?>
                </select>
              </div>
            </div>
            <div class="form-group row justify-content-end">
              <div class="col-sm-10">
                <button type="submit" class="btn btn-primary">
                  Edit
                </button>
              </div>
            </div>
  


          </form>

        </div>
      </div>


  </div>
  <!-- /.container-fluid -->

</div>
<!-- End of Main Content -->

           