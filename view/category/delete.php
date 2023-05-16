
<?php
include_once("../inc/header.php");


if ($_SESSION['username'] == "") {
    header('location:../index.php');
  }
  
  $queryId = $_GET["id"];
  

if (isset($_POST["hapus"])) {
    $categoty = $_POST["kategori"];
    # code...
}
$sql = "DELETE tb_category SET name = '$category'
WHERE id='$queryId'";
if ($result) {
    # code...
}
$result = $pdo->query($sql);


{else 
    echo  "<script> alert('Data gagal dihapus ')</script>";
    # code...
}
    # code...


?>
