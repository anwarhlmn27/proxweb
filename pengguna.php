<link rel="stylesheet" href="https://cdn.datatables.net/2.1.8/css/dataTables.dataTables.css">

<div class="detailTable">
          <div class="recentTable">
            <div class="titleTable">
              <h2>Responsive Table</h2>
              <a href="?page=form" class="btn">Add New</a>
            </div>
            <table id="myTable" >
              <thead>
                <tr>
                  <th style="text-align:center;">No</th> 
                  <th style="text-align:center;">Name</th>
                  <th style="text-align:center;">Telepon</th>
                  <th style="text-align:center;">Alamat</th>
                  <th style="text-align:center;">Option</th>
                </tr>
              </thead>
              <tbody>
              <?php 
                include "koneksi/koneksi.php";
                $no=1;
                $data = mysqli_query($conn,"SELECT * FROM tbl_user");
                while($show = mysqli_fetch_array($data)){ 
                  echo "<tr>
                  <td>".$no++."</td>
                  <td>".$show["nama"]."</td>
                  <td>".$show["telepon"]."</td>
                  <td>".$show["alamat"]."</td>
                  <td>
                    <a href='?page=edit_data&id=".$show['id_account']."' class='btn-edit'
                      ><ion-icon name='create-outline'></ion-icon
                    ></a>
                    |
                    <a href='hapus_data.php?id=".$show['id_account']."' 
                    onclick='return confirm(\"Are you sure you want to delete this record?\")' 
                    class='btn-delete'
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
  </div>
  <script src="jquery.js"></script>
  <script src="https://cdn.datatables.net/2.1.8/js/dataTables.js"></script>
  <script>
    $(document).ready( function () {
    $('#myTable').DataTable();
      } );
  </script>
