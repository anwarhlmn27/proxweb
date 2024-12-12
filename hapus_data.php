<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <!-- Sweetalert -->
    <link href="https://cdn.jsdelivr.net/npm/sweetalert2@11.14.5/dist/sweetalert2.min.css" rel="stylesheet">  
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11.14.5/dist/sweetalert2.all.min.js"></script>
</head>
<body>
<?php
include "koneksi/koneksi.php";
  $id = $_GET['id'];
  
  $query = "DELETE FROM account WHERE id_account = $id";
  
  if (mysqli_query($conn,$query)) {
        $query2 = mysqli_query($conn,"DELETE FROM tbl_user WHERE id_account = $id");
      echo "<script>
      Swal.fire({
          icon: 'success',
          title: 'Hapus File',
          text: 'Berhasil',
      }).then(() => {
          window.location.href = 'dashboard.php?page=tabel';
      });
    </script>";
  } else {
      echo "script>
      Swal.fire({
          icon: 'error',
          title: 'Hapus File',
          text: 'Gagal',
      }).then(() => {
          window.location.href = 'dashboard.php?page=tabel';
      });
    </script>";
  }

?>
</body>
</html>
