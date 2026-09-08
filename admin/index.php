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
      Dashboard
      <small>Version 2.0</small>
    </h1>
    <ol class="breadcrumb">
      <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
      <li class="active">Dashboard</li>
    </ol>
  </section>

  <!-- Main content -->
  <section class="content">
    <!-- Info boxes -->
    <div class="row-center">
      <div class="col-md-3 col-sm-6 col-xs-12">
        <div class="info-box">
          <span class="info-box-icon bg-aqua"><i class="fa fa-users"></i></span>

          <div class="info-box-content">
            <span class="info-box-text">CPU Traffic</span>
            <span class="info-box-number">
              <?php
              $pelanggan = mysqli_query($conn, "SELECT COUNT(*) AS total FROM tb_pelanggan");
              $total = mysqli_fetch_assoc($pelanggan);

              echo $total['total'];
              ?>
            </span>
          </div>
          <!-- /.info-box-content -->
        </div>
        <!-- /.info-box -->
      </div>
      <!-- /.col -->
      <div class="col-md-3 col-sm-6 col-xs-12">
        <div class="info-box">
          <span class="info-box-icon bg-red"><i class="fa fa-cart-plus"></i></span>

          <div class="info-box-content">
            <span class="info-box-text">DATA PRODUK</span>
            <span class="info-box-number">
              <?php
              $produk = mysqli_query($conn, "SELECT * FROM tb_produk");
              echo mysqli_num_rows($produk);
              ?>
            </span>
          </div>
          <!-- /.info-box-content -->
        </div>
        <!-- /.info-box -->
      </div>
      <!-- /.col -->

      <!-- fix for small devices only -->
      <div class="clearfix visible-sm-block"></div>

      <div class="col-md-3 col-sm-6 col-xs-12">
        <div class="info-box">
          <span class="info-box-icon bg-green"><i class="fa fa-bar-chart"></i></span>

          <div class="info-box-content">
            <span class="info-box-text">DATA TRANSAKSI</span>
            <span class="info-box-number">
              <?php
              $transaksi = mysqli_query($conn, "SELECT * FROM tb_penjualan");
              echo mysqli_num_rows($transaksi);
              ?>
            </span>
          </div>
          <!-- /.info-box-content -->
        </div>
        <!-- /.info-box -->
      </div>
      <!-- /.col -->
      <div class="col-md-3 col-sm-6 col-xs-12">
        <div class="info-box">
          <span class="info-box-icon bg-yellow"><i class="fa fa-money"></i></span>

          <div class="info-box-content">
            <span class="info-box-text">TOTAL TRANSAKSI</span>
            <span class="info-box-number">
              <?php
              $total_transaksi = mysqli_query($conn, "SELECT SUM(TotalHarga) AS total_penjualan FROM tb_penjualan");
              while ($t_trans = mysqli_fetch_array($total_transaksi)) { ?>
              <?php
                $total = +$t_trans['total_penjualan'];

                echo "Rp. " . number_format($total) . ",-";
              }
              ?>
            </span>
          </div>
          <!-- /.info-box-content -->
        </div>
        <!-- /.info-box -->
      </div>
      <!-- /.col -->
    </div>
    <!-- /.row -->
  </section>
  <!-- /.content -->
</div>


<?php
include "footer.php";
?>
</body>

</html>