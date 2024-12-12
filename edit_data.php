<div class="details">
          <div class="recentOrder">
            <div class="text">Form Input Data</div>
            <hr />
            <form action="" class="form" method="POST">
            <?php 
            include "koneksi/koneksi.php";

            $id = $_GET['id'];
            $data = mysqli_query($conn,"SELECT * FROM tbl_user where id_account=$id");
            $show = mysqli_fetch_assoc($data);
            ?>
              <div class="input-box">
                <label>Full Name</label>
                <input type="text" name="nama" value="<?php echo $show['nama']; ?>" placeholder="Enter full name" required />
              </div>

                <div class="input-box">
                  <label>Phone Number</label>
                  <input
                    type="number" value="<?php echo $show['telepon']; ?>" name="telepon"
                    placeholder="Enter phone number"
                    required
                  />
                </div>
              
              <div class="column">
                <div class="input-box">
                  <label>Birth Place</label>
                  <input type="text" value="<?php echo $show['tempatlahir']; ?>" name="tempat" placeholder="Enter birth date" required />
                </div>
                <div class="input-box">
                  <label>Birth Date</label>
                  <input type="date" name="tgl" value="<?php echo $show['tgl_lahir']; ?>" placeholder="Enter birth date" required />
                </div>
              </div>
              <div class="gender-box">
                <h3>Gender</h3>
                <div class="gender-option">
                  <div class="gender">
                    <input type="radio" id="check-male" <?php if($show['jk']=='L') echo 'checked'?> value="L" name="gender" checked />
                    <label for="check-male">male</label>
                  </div>
                  <div class="gender">
                    <input type="radio" id="check-female" <?php if($show['jk']=='P') echo 'checked'?> value="P" name="gender" />
                    <label for="check-female">Female</label>
                  </div>
                  
                </div>
              </div>
              <div class="input-box address">
                <label>Address</label>
                <input
                  type="text" name="alamat" value="<?php echo $show['alamat']; ?>"
                  placeholder="Enter street address"
                  required
                />
                
              
                
              </div>
              <button type="submit" name="button">Submit</button>
            </form>
          </div>
        </div>

        <?php
        include "koneksi/koneksi.php";

        if(isset($_POST['button'])){
          $nama = $_POST['nama'];
          // $email = $_POST['email'];
          // $pw = $_POST['password'];
          $telepon = $_POST['telepon'];
          $tempat = $_POST['tempat'];
          $tgl = $_POST['tgl'];
          $jk = $_POST['gender'];
          $alamat = $_POST['alamat'];

          
          $data = "UPDATE tbl_user SET nama = '$nama',
          telepon = '$telepon',
          tempatlahir = '$tempat',
          tgl_lahir = '$tgl',
          jk = '$jk',
          alamat = '$alamat' where id_account=$id" ;
          if (mysqli_query($conn, $data)){
            echo "<script>
              Swal.fire({
                title: 'Edit Data',
                text: 'Edi Data Success.',
                icon: 'success',
                }).then(() => {
                window.location.href = '?page=pengguna';
              });
            </script>";
            
          }else{
            echo "<script>
            Swal.fire({
                icon: 'error',
                title: 'Edit Data Fault',
                text: 'Try Again..!',
            }).then(() => {
                window.location.href = '?page=pengguna';
            });
          </script>";
          }
  
        }
        ?>
        