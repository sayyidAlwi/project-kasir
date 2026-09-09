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
      Data produk
      <small>Version 2.0</small>
    </h1>
    <ol class="breadcrumb">
      <li><a href="#"><i class="fa fa-dashboard"></i> Dasboard</a></li>
      <li class="active">Data produk</li>
    </ol>
  </section>

  <!-- Main content -->
  <section class="content">
    <!-- Info boxes -->
    <div class="row-center">
      <div class="box">
        <div class="box-header">
          <button class="btn btn-primary" data-target="#tambah-produk" data-toggle="modal">
            <i class="glyphicon glyphicon-plus"></i> Tambah
          </button>
        </div>
        <!-- /.box-header -->
        <div class="box-body no-padding">
          <table class="table table-striped">
            <tr>

            </tr>
            <?php
            $produk_data = mysqli_query($conn, "SELECT * FROM tb_produk");
            $datas_produk = mysqli_fetch_all($produk_data, MYSQLI_ASSOC);
            ?>
            <thead>
              <th style="width: 10px">ID</th>
              <th>NAMA PRODUK</th>
              <th>HARGA</th>
              <th>STOK</th>
              <th>OPSI</th>
            </thead>
            <tbody>
              <tr>
                <?php foreach ($datas_produk as $dt_produk): ?>
                  <th><?= $dt_produk['ProdukID'] ?></th>
                  <th><?= $dt_produk['NamaProduk'] ?></th>
                  <th><?= "Rp. " . number_format($dt_produk['Harga']); ?></th>
                  <th><?= $dt_produk['Stok'] ?></th>
                  <th>
                    <button type="button" class="btn btn-warning" title="Edit" data-toggle="modal"
                      data-target="#edit-produk<?php echo $dt_produk['ProdukID']; ?>">
                      <i class="glyphicon glyphicon-edit"></i>
                      <!-- Modal edit -->
                      
                    </button>
                    <div class="modal fade" id="edit-produk<?php echo $dt_produk['ProdukID']; ?>">
                      <div class="modal-dialog">
                        <div class="modal-content">
                          <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                              <span aria-hidden="true">&times;</span></button>
                            <h4 class="modal-title">Edit Data Produk</h4>
                          </div>
                          <form action="produk_update.php" method="post">
                            <div class="modal-body">
                              <div class="form-group-between">
                                <input type="hidden" class="form-control" name="id-produk" value="<?php echo $dt_produk['ProdukID']; ?>">
                              </div>
                              <div class="form-group">
                                <label>Nama Produk</label>
                                <input type="text" class="form-control" name="nama-produk" value="<?php echo $dt_produk['NamaProduk']; ?>">
                              </div>
                              <div class="form-group">
                                <label>Harga</label>
                                <input type="number" class="form-control" name="harga" value="<?php echo $dt_produk['Harga']; ?>">
                              </div>
                              <div class="form-group">
                                <label>Stok</label>
                                <input type="number" class="form-control" name="stok" value="<?php echo $dt_produk['Stok']; ?>">
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
                    <a href="produk_delete.php?ProdukID=<?php echo $dt_produk['ProdukID']; ?>" class="btn btn-danger" title="Delete" role="button" >
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

<div class="modal fade" id="tambah-produk">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title">Default Modal</h4>
      </div>
      <form action="produk_create.php" method="post">
        <div class="modal-body">
          <div class="form-group">
            <label>Nama Produk</label>
            <input type="text" class="form-control" name="nama-produk">
          </div>
          <div class="form-group">
            <label>Harga</label>
            <input type="number" class="form-control" name="harga">
          </div>
          <div class="form-group">
            <label>Stok</label>
            <input type="number" class="form-control" name="stok">
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
include "footer.php";
?>
</body>

</html>