<?php
include_once("../../config/database.php");

session_start();

if ($_SESSION['username'] == "") {
  header('location:../index.php');
}

$queryId = $_GET["id"];

if (isset($_POST['submit'])) {
  $kat_name = $_POST['kategori'];

  if (empty($kat_name)) {
    echo "<script> alert (nama kategori tidak boleh kosong)</script>";
    # code...
  }
  else
  {
  $insert = $pdo->prepare("INSERT INTO tb_category (nm_cat) value (:cat)");
    $insert->bindParam(':cat',$kat_name);
    
    if ($insert->execute()) {
      echo "<script> alert ('data berhasil ditambah')</script>";

      # code...
    }




  }
}

include_once("../inc/header.php");

if (isset($_POST["update"])) {
    $categoty = $_POST["kategori"];
    # code...
}
$sql = "UPDATE tb_category SET name = '$category'
WHERE id='$queryId'";
$result = $pdo->query($sql);

if ($result) 
{
    echo "<script> alert('Data berhasil diperbarui')</script>";
}else {
    echo  "<script> alert('Data tidak dapat diperbarui')</script>";
    # code...
}
    # code...


?>

<?php
include_once("../inc/admin_sidebar.php");
?>

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>AdminLTE 3 | Validation Form</title>

  <!-- Google Font: Source Sans Pro -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="../../plugins/fontawesome-free/css/all.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="../../dist/css/adminlte.min.css">
</head>
 

<!-- Main content -->
<div class="content-wrapper">
 <?php 
 $sql = "SELECT * FROM tb_category WHERE id='$queryId'";
 $stmt = $pdo->query($sql);
 while($rows = $stmt ->fetch()){
    $data_nama = $rows ["nm_cat"];
 }
    ?>
  <section class="content">
    <div class="container-fluid">
      <div class="row">
        
        <div class="col-md-6 mx-auto">
          <!-- Form Element sizes -->
          <div class="card card-primary">
            <div class="card-header">
              <h3 class="card-title">Tambah Kategori</h3>
            </div>
            <form method="POST" action="">
            <div class="card-body">
              <label for="katInput">Nama Kategori</label>
              <input class="form-control form-control-sm-2" type="text"
              id="katInput" name="kategori" value="<?= $data_nama?>">
            </div>

            <div class="card-footer">
              <button type="submit" name="submit" class="btn btn-primary">pembarui</button>
              <a href="index.php" class="btn btn-info">kembali</a>
            </div>
            <!-- /.card-body -->
          </div>
          <!-- /.card -->
        </div>

  </section>
</div>




  <!-- /.content-wrapper -->
  <!-- Control Sidebar -->
  <aside class="control-sidebar control-sidebar-dark">
    <!-- Control sidebar content goes here -->
  </aside>
  <!-- /.control-sidebar -->
</div>
<!-- ./wrapper -->

<!-- jQuery -->
<script src="../../plugins/jquery/jquery.min.js"></script>
<!-- Bootstrap 4 -->
<script src="../../plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- bs-custom-file-input -->
<script src="../../plugins/bs-custom-file-input/bs-custom-file-input.min.js"></script>
<!-- AdminLTE App -->
<script src="../../dist/js/adminlte.min.js"></script>
<!-- AdminLTE for demo purposes -->
<script src="../../dist/js/demo.js"></script>
<!-- Page specific script -->
<script>
  $(function() {
    bsCustomFileInput.init();
  });
</script>
</body>

</html>



<?php
include_once("../inc/footer.php");
?>