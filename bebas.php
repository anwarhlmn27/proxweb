<div class="cardBox">
          <div class="card">
            <?php 
              include "koneksi/koneksi.php";

                $data = mysqli_query($conn, "SELECT * FROM account");
                $count = mysqli_num_rows($data);
            ?>
            <div>
              <div class="number"><?php echo $count; ?></div>
              <a href="?page=tabel"><div class="cardName">Account</div></a>
            </div>

            <div class="iconBox"><ion-icon name="eye-outline"></ion-icon></div>
          </div>

          <div class="card">
          <?php 
                $data2 = mysqli_query($conn, "SELECT * FROM tbl_user");
                $count2 = mysqli_num_rows($data2);
            ?>
            <div>
              <div class="number"><?php echo $count2; ?></div>
              <a href="?page=tabelbiasa"><div class="cardName">User</div></a>
            </div>

            <div class="iconBox"><ion-icon name="cart-outline"></ion-icon></div>
          </div>

          <div class="card">
            <div>
              <div class="number">284</div>
              <div class="cardName">Comments</div>
            </div>

            <div class="iconBox">
              <ion-icon name="chatbubble-outline"></ion-icon>
            </div>
          </div>

          <div class="card">
            <div>
              <div class="number">$3.84</div>
              <div class="cardName">Earnings</div>
            </div>

            <div class="iconBox"><ion-icon name="cash-outline"></ion-icon></div>
          </div>
        </div>

        <!-- ======== order detail ========= -->
        
        <!-- ======== order detail ========= -->
        <div class="details">
          <div class="recentOrders">
            <div class="cardHeader">
              <h2>Data Statistik</h2>
            </div>
            <canvas id="barChart"></canvas>
          </div>

          <!-- ========== detail Customer ========= -->
          <div class="recentCustomer">
            <div class="cardHeader">
              <h2>Data Statistik</h2>
            </div>
            <canvas id="doughnutChart"></canvas>
          </div>
        </div>

        <!-- end main -->
      </div>

      <!-- end container -->
    </div>

    <!-- Chart -->
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <script>
      const ctx = document.getElementById("barChart");

      new Chart(ctx, {
        type: "bar",
        data: {
          labels: ["Laki-laki","Perempuan"],
          datasets: [
            {
              label: "# of Votes",
              data: [
                <?php
                    include "koneksi/koneksi.php";
                      $query = mysqli_query($conn, "SELECT * FROM tbl_user where jk = 'L'");
                      echo mysqli_num_rows($query);
                      ?>,
                      <?php
                      $query2 = mysqli_query($conn, "SELECT * FROM tbl_user where jk = 'P'");
                      echo mysqli_num_rows($query2);
                      ?>
              ],
              borderWidth: 1,
            },
          ],
        },
        options: {
          scales: {
            y: {
              beginAtZero: true,
            },
          },
        },
      });
    </script>
    <!-- memanggil file Chart.js -->
    <!-- <script src="js/barChart.js"></script> -->
<script>
const ctx2 = document.getElementById("doughnutChart");

new Chart(ctx2, {
  type: "doughnut",
  data: {
    labels: ["Admin", "User"],
    datasets: [
      {
        label: "# of Votes",
        data: [
          <?php
                $data = mysqli_query($conn, "SELECT * FROM account where akses = '1'");
                echo mysqli_num_rows($data);
                ?>,
                <?php
                $data2 = mysqli_query($conn, "SELECT * FROM account where akses = '2'");
                echo mysqli_num_rows($data2);
                ?>
        ],
        borderWidth: 1,
      },
    ],
  },
  options: {
    scales: {
      y: {
        beginAtZero: true,
      },
    },
  },
});

</script>