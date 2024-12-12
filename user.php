<?php 
session_start();

if(!isset($_SESSION['email'])){
  header("location:index.php");
}else{ ?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatitble" content="IE=Edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Dashboard 1</title>
    <!-- Stylesheet -->
    <link rel="stylesheet" href="css/admin.css" />
    <link href="https://cdn.jsdelivr.net/npm/sweetalert2@11.14.5/dist/sweetalert2.min.css" rel="stylesheet">

    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11.14.5/dist/sweetalert2.all.min.js"></script>

    <script>
        // Fungsi untuk mengatur ulang timer
        function resetLogoutTimer() {
            // Jika ada timer lama, hapus terlebih dahulu
            clearTimeout(logoutTimer);

            // Atur timer ulang selama 5 detik (5000 ms)
            logoutTimer = setTimeout(function() {
                window.location.href = 'logout.php';
            }, 50000); // 5000 ms = 5 detik
        }

        // Set pertama kali timer logout saat halaman dimuat
        let logoutTimer = setTimeout(function() {
            window.location.href = 'logout.php';
        }, 50000); // 5000 ms = 5 detik

        // Event listener untuk aktivitas pengguna (gerakan mouse dan klik)
        window.addEventListener('mousemove', resetLogoutTimer);
        window.addEventListener('click', resetLogoutTimer);
        window.addEventListener('keypress', resetLogoutTimer);
    </script>
  </head>
  <body>
    <div class="container">
      <!-- navigation -->
      <div class="navigation">
        <ul>
          <li>
            <a href="#">
              <span class="icon"
                ><ion-icon name="business-outline"></ion-icon
              ></span>
              <span class="title">University</span>
            </a>
          </li>
          <li>
            <a href="dashboard.html">
              <span class="icon"
                ><ion-icon name="home-outline"></ion-icon
              ></span>
              <span class="title">Dashboard</span>
            </a>
          </li>
          <li>
            <a href="form_2.html">
              <span class="icon"
                ><ion-icon name="document-outline"></ion-icon
              ></span>
              <span class="title">Form</span>
            </a>
          </li>
          
          <li>
            <a href="#">
              <span class="icon"
                ><ion-icon name="lock-closed-outline"></ion-icon
              ></span>
              <span class="title">Password</span>
            </a>
          </li>
          <li>
            <a href="logout.php">
              <span class="icon"
                ><ion-icon name="airplane-outline"></ion-icon
              ></span>
              <span class="title">Sign Out</span>
            </a>
          </li>
        </ul>
      </div>

      <!-- ========= main ========= -->
      <div class="main">
        <div class="topbar">
          <div class="toggle">
            <ion-icon name="menu-outline"></ion-icon>
          </div>

          <div class="search">
            <label>
              <input type="text" placeholder="search here" />
              <ion-icon name="search-outline"></ion-icon>
            </label>
          </div>

          <div class="user">
            <img src="img/avatar1.jpg" alt="" />
          </div>
        </div>

        <!-- ======= card ===== -->
        <?php
        if(isset($_GET['page']))
          {
            $page=$_GET['page'];
            if ($page=='dashboard')
            {
              include "welcome.php";
            }else{
              include "welcome.php";
            }
          }
        ?>

        

        <!-- end main -->
      </div>

      <!-- end container -->
    </div>
    <!-- Script -->
    <script src="js/main.js"></script>
    <!-- ionicons -->
    <script
      type="module"
      src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.esm.js"
    ></script>
    <script
      nomodule
      src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.js"
    ></script>
  </body>
</html>
<?php } ?>