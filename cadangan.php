<table>
        <?php
        $kolom = 5;
        $i = 1;
        $upload_dir = 'img/product/';
        $sqlProduk = "SELECT * FROM tabel_produk ORDER BY id DESC LIMIT 8";
        $rslt = mysqli_query($kon, $sqlProduk);
        while ($data = mysqli_fetch_array($rslt)) {

          if (($i) % $kolom == 1) {
            echo '<tr>';
          }
          echo '<td><img src=' . $upload_dir . $data["image"], ' class="responsive-img materialboxed hoverable", width="200px"/><p class="center" style="font-weight: bold">' . $data['name'] . '</p></td>';
          if (($i) % $kolom == 0) {
            echo '</tr>';
          }
          $i++;
        }
        ?>
      </table>