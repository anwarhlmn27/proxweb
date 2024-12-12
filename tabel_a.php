<div class="detailTable">
          <div class="recentTable">
            <div class="titleTable">
              <h2>Responsive Table</h2>
              <a href="#" class="btn">Add New</a>
            </div>
            <table>
              <thead>
                <tr>
                  <th>No</th> 
                  <th>Name</th>
                  <th>Status</th>
                  <th>Option</th>
                </tr>
              </thead>
              <tbody>
              <?php 
                include "koneksi/koneksi.php";
                $no=1;
                $data = mysqli_query($conn,"SELECT * FROM account");
                while($show = mysqli_fetch_array($data)){ 
                  echo "<tr>
                  <td>".$no++."</td>
                  <td>".$show["email"]."</td>
                  <td>".$show["akses"]."</td>
                  <td>
                    <a href='#' class='btn-edit'
                      ><ion-icon name='create-outline'></ion-icon
                    ></a>
                    |
                    <a href='#' class='btn-delete'
                      ><ion-icon name='trash-outline'></ion-icon
                    ></a>
                  </td>
                  </tr>
                  ";
                } ?>
              </tbody>           
            </table>
          </div>
        </div>