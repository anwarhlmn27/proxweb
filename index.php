<?php
session_start();
error_reporting(0);

if(isset($_SESSION['email'])){
  header("location:user.php");
}else{
?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Sign in || Sign up from</title>

    <!-- css stylesheet -->
    <link rel="stylesheet" href="css/style_login2.css" />
    <link
      rel="stylesheet"
      href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.14.0/css/all.min.css"
    />
    <!-- Sweetalert -->
    <link href="https://cdn.jsdelivr.net/npm/sweetalert2@11.14.5/dist/sweetalert2.min.css" rel="stylesheet">  
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11.14.5/dist/sweetalert2.all.min.js"></script>
    
  </head>
  <body>
    <div class="container" id="main">
      <div class="sign-up">
        <form action="" method="POST">
          <h1>Create Account</h1>
          <div class="social-container">
            <a href="www.facebook.com" target="_blank" class="social"
              ><i class="fab fa-facebook-f"></i
            ></a>
            <a href="mail.google.com" class="social"
              ><i class="fab fa-google-plus-g"></i
            ></a>
            <a href="www.linkedin.com" class="social"
              ><i class="fab fa-linkedin-in"></i
            ></a>
          </div>
          <p>or use your email for registration</p>
          
          <input type="email" name="emailreg" placeholder="email" required />
          <input
            type="password"
            name="passwordreg"
            placeholder="password"
            required
          />
          <input
            type="password"
            name="repasswordreg"
            placeholder="Re-type password"
            required
          />
          <button type="submit" name="register">Sign Up</button>
        </form>
      </div>
      <div class="sign-in">
        <form action="" method="POST">
          <h1>Sign in</h1>
          <div class="social-container">
            <a href="https://www.facebook.com" target="_blank" class="social"
              ><i class="fab fa-facebook-f"></i
            ></a>
            <a href="https://mail.google.com" target="_blank" class="social"
              ><i class="fab fa-google-plus-g"></i
            ></a>
            <a href="https://linkedin.com" target="_blank" class="social"
              ><i class="fab fa-linkedin-in"></i
            ></a>
          </div>
          <p>or use your account</p>
          <input type="email" name="email" placeholder="email" required />
          <input
            type="password"
            name="password"
            placeholder="password"
            required
          />
          <a href="#" class="forgot">Forgot your password?</a>
          <button type="submit" name="login">Sign In</button>
        </form>
      </div>
      <div class="overlay-container">
        <div class="overlay">
          <div class="overlay-left">
            <h1>Welcome Back!</h1>
            <p>
              To keep connected with us please login with your personal info
            </p>
            <button type="submit" name="login" id="signIn">Sign In</button>
          </div>
          <div class="overlay-right">
            <h1>Hello, Friend!</h1>
            <p>Enter your personal details and start journey with us</p>
            <button id="signUp">Sign Up</button>
          </div>
        </div>
      </div>
    </div>

    <!-- js code -->
    <script>
      const signUpButton = document.getElementById("signUp");
      const signInButton = document.getElementById("signIn");
      const main = document.getElementById("main");

      signUpButton.addEventListener("click", () => {
        main.classList.add("right-panel-active");
      });
      signInButton.addEventListener("click", () => {
        main.classList.remove("right-panel-active");
      });
    </script>
  </body>
</html>
<?php 
require "koneksi/koneksi.php";
if(isset($_POST['register'])){

    $email = $_POST['emailreg'];
    $passwordreg = $_POST['passwordreg'];
    $repasswordreg = $_POST['repasswordreg'];

    if($passwordreg == $repasswordreg){
      $query = "INSERT INTO account(id_account, email, password, akses) VALUES ('','$email',md5('$pw'),'2')";
      if (mysqli_query($conn, $query)){
        $id = mysqli_insert_id($conn);
        $data = mysqli_query($conn,"INSERT INTO tbl_user(id_user, 
        id_account) 
        VALUES ('','$id'");
      echo "<script>
        Swal.fire({
          title: 'Register',
          text: 'Register Success, Please Login ?',
          icon: 'success'
        });
      </script>";
      
    }else{
      echo "<script>
      Swal.fire({
          icon: 'error',
          title: 'Registrasi Gagal',
          text: 'Silahkan Coba lagi..!',
      }).then(() => {
          window.location.href = 'index.php';
      });
    </script>";
    }
  }else{
    echo "<script>
      Swal.fire({
          icon: 'error',
          title: 'Registrasi Gagal',
          text: 'Password tidak sama..!',
      }).then(() => {
          window.location.href = 'index.php';
      });
    </script>";
  }
}

if(isset($_POST['login'])){
    $email = $_POST['email'];
    $password = md5($_POST['password']);

    $query2 = mysqli_query($conn, "SELECT * from account WHERE email = '$email' AND password = '$password'");

    if(mysqli_num_rows($query2) != 0){
      $row = mysqli_fetch_assoc($query2);

      session_start();
      
      if($row['akses']==1){
        $_SESSION['id'] = $row['id_account'];
        $_SESSION['email'] = $row['email'];
        $_SESSION['akses'] = 1;
        echo "<script>
        Swal.fire({
            icon: 'success',
            title: 'Login Admin Berhasil',
            text: 'Selamat datang, {$row['email']}!',
            showConfirmButton: false,
            timer: 1500
        }).then(() => {
            window.location.href = 'dashboard.php';
        });
      </script>";
          
      }else if($row['akses']==2){
        $_SESSION['id'] = $row['id_account'];
        $_SESSION['email'] = $row['email'];
        $_SESSION['akses'] = 2;
        echo "<script>
        Swal.fire({
            icon: 'success',
            title: 'Login User Berhasil',
            text: 'Selamat datang, {$row['email']}!',
            showConfirmButton: false,
            timer: 1500
        }).then(() => {
            window.location.href = 'user.php';
        });
      </script>";
      
      }

    }else{
      echo "<script>
      Swal.fire({
          icon: 'error',
          title: 'Gagal Login',
          text: 'Username tidak ditemukan!',
      }).then(() => {
          window.location.href = 'index.php';
      });
    </script>";
    }
  }
?>
<?php } ?>