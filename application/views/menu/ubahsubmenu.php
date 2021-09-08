
  <!-- Begin Page Content -->
  <div class="container-fluid">

      <!-- Page Heading -->
      <h1 class="h3 mb-4 text-gray-800"><?= $title; ?></h1>

      <div class="row">
        <div class="col-lg-8">

          <form action="" method="POST">
            <input type="hidden" name="id" value="<?= $submenu['id']; ?>">
            <div class="form-group row">
              <label for="title" class="col-sm-2 col-form-label">Title</label>
              <div class="col-sm-10">
                <input type="text" class="form-control" id="title" name="title" value="<?= $submenu['title']; ?>">
                <?= form_error('submenu', '<small class="text-danger pl-3">', '</small>'); ?>
              </div>
            </div>
            <div class="form-group row">
              <label for="menu_id" class="col-sm-2 col-form-label">Menu</label>
              <div class="col-sm-10">
                <select name="menu_id" id="menu_id" class="form-control ">
                    <?php foreach( $menu as $m ) :?>
                    <?php if ( $m['id'] == $submenu['menu_id'] ) : ?>
                      <option value="<?= $m['id']; ?>" selected><?= $m['menu']; ?></option>
                    <?php else : ?>
                      <option value="<?= $m['id']; ?>"><?= $m['menu']; ?></option>
                    <?php endif; ?> 
                  <?php endforeach; ?>
                </select>
              </div>
            </div>
            <div class="form-group row">
              <label for="url" class="col-sm-2 col-form-label">Url</label>
              <div class="col-sm-10">
                <input type="text" class="form-control" id="url" name="url" value="<?= $submenu['url']; ?>">
              </div>
            </div>
            <div class="form-group row">
              <label for="icon" class="col-sm-2 col-form-label">Icon</label>
              <div class="col-sm-10">
                <input type="text" class="form-control" id="icon" name="icon" value="<?= $submenu['icon']; ?>">
              </div>
            </div>
            <div class="form-group row">
              <div class="col-sm-2"></div>
              <div class="col-sm-10">
                <div class="form-check">
                  <input class="form-check-input" type="checkbox" value="1" name="is_active" id="is_active" checked>
                  <label class="form-check-label" for="is_active">
                    Active?
                  </label>
                </div>
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

           