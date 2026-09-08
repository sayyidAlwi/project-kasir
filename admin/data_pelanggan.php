<!DOCTYPE html>
<html>

<?php
include "header.php";
?>

<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <section class="content-header">
    <h1>
      Data Pelanggan
      <small>Version 2.0</small>
    </h1>
    <ol class="breadcrumb">
      <li><a href="#"><i class="fa fa-dashboard"></i> Dasboard</a></li>
      <li class="active">Data Pelanggan</li>
    </ol>
  </section>

  <!-- Main content -->
  <section class="content">
    <!-- Info boxes -->
    <div class="row-center">
      <div class="box">
        <div class="box-header">
          <button class="btn btn-primary" data-target="#tambah-pelanggan" data-toggle="modal">
            <i class="glyphicon glyphicon-plus"></i> Tambah
          </button>
        </div>
        <!-- /.box-header -->
        <div class="box-body no-padding">
          <table class="table table-striped">
            <tr>

            </tr>
            <?php
            $pelanggan_data = mysqli_query($conn, "SELECT * FROM tb_pelanggan");
            $datas_pelanggan = mysqli_fetch_all($pelanggan_data, MYSQLI_ASSOC);
            ?>
            <thead>
              <th style="width: 10px">ID</th>
              <th>NAMA PELANGGAN</th>
              <th>ALAMAT</th>
              <th>Nomor Telepon</th>
              <th>OPSI</th>
            </thead>
            <tbody>
              <tr>
                <?php foreach ($datas_pelanggan as $dt_pelanggan): ?>
                  <th><?= $dt_pelanggan['PelangganID'] ?></th>
                  <th><?= $dt_pelanggan['NamaPelanggan'] ?></th>
                  <th><?= $dt_pelanggan['Alamat'] ?></th>
                  <th><?= $dt_pelanggan['NomorTelepon'] ?></th>
                  <th>
                    <button type="button" class="btn btn-warning" title="Edit" data-toggle="modal"
                      data-target="#edit-pelanggan<?php echo $dt_pelanggan['PelangganID']; ?>">
                      <i class="glyphicon glyphicon-edit"></i>
                      <!-- Modal edit -->
                      
                    </button>
                    <div class="modal fade" id="edit-pelanggan<?php echo $dt_pelanggan['PelangganID']; ?>">
                      <div class="modal-dialog">
                        <div class="modal-content">
                          <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                              <span aria-hidden="true">&times;</span></button>
                            <h4 class="modal-title">Edit Data Pelanggan</h4>
                          </div>
                          <form action="update_pelanggan.php" method="post">
                            <div class="modal-body">
                              <div class="form-group">
                                <input type="hidden" class="form-control" name="id-pelanggan" value="<?php echo $dt_pelanggan['PelangganID']; ?>">
                              </div>
                              <div class="form-group">
                                <label>Nama Pelanggan</label>
                                <input type="text" class="form-control" name="nama-pelanggan" value="<?php echo $dt_pelanggan['NamaPelanggan']; ?>">
                              </div>
                              <div class="form-group">
                                <label>Alamat</label>
                                <input type="text" class="form-control" name="alamat" value="<?php echo $dt_pelanggan['Alamat']; ?>">
                              </div>
                              <div class="form-group">
                                <label>Nomor Telepon</label>
                                <input type="number" class="form-control" name="no-telpon" value="<?php echo $dt_pelanggan['NomorTelepon']; ?>">
                              </div>
                            </div>
                            <div class="modal-footer">
                              <button type="button" class="btn btn-default pull-left"
                                data-dismiss="modal">Close</button>
                              <button type="submit" class="btn btn-primary">Update</button>
                            </div>
                          </form>
                        </div>
                        <!-- /.modal-content -->
                      </div>
                      <!-- /.modal-dialog -->
                    </div>
                    <a href="delete_pelanggan.php?PelangganID=<?php echo $dt_pelanggan['PelangganID']; ?>" class="btn btn-danger" title="Delete" role="button" >
                      <i class="glyphicon glyphicon-trash"></i>
                </a>
                    </td>
                </tr>
              <?php endforeach; ?>
            </tbody>
          </table>
        </div>
        <!-- /.box-body -->
      </div>
    </div>
    <!-- /.row -->
  </section>
  <!-- /.content -->
</div>

<div class="modal fade" id="tambah-pelanggan">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title">Default Modal</h4>
      </div>
      <form action="proses_pelanggan.php" method="post">
        <div class="modal-body">
          <div class="form-group">
            <label>Nama Pelanggan</label>
            <input type="text" class="form-control" name="nama-pelanggan">
          </div>
          <div class="form-group">
            <label>Alamat</label>
            <input type="text" class="form-control" name="alamat">
          </div>
          <div class="form-group">
            <label>Nomor Telepon</label>
            <input type="number" class="form-control" name="no-telpon">
          </div>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Close</button>
          <button type="submit" class="btn btn-primary">Simpan</button>
        </div>
      </form>
    </div>
    <!-- /.modal-content -->
  </div>
  <!-- /.modal-dialog -->
</div>
<!-- /.modal -->

<?php
include " footer.php";
?>
</body>

</html>