<div class="container">
    <h2 align="center">Dewan Card Dinamis dari Database PHP</h2>
    <div class="row" id="load_data">
        <?php
        include 'koneksi.php';
        $query = "SELECT * FROM tbl_artikel ORDER BY id ASC";
        $dewan1 = $db1->prepare($query);
        $dewan1->execute();
        $res1 = $dewan1->get_result();
        while ($row = $res1->fetch_assoc()) {
            // $id = $row["id"];
            // $foto = $row["foto"];
            // $tgl_input = $row["tgl_input"];
            // $judul = $row["judul"];
            // if (strlen($judul) > 60) {
            //     $judul = substr($judul, 0, 60) . "...";
            // }
            // $deskripsi = $row["deskripsi"];
            // if (strlen($deskripsi) > 100) {
            //     $deskripsi = substr($deskripsi, 0, 100) . "...";
            // }
        ?>
            <!-- <div class="col-sm-3 mb-3">
                <div class="card">
                    <img src="<?php echo $foto; ?>" class="card-img-top" alt="gambar">
                    <div class="card-body">
                        <h5 class="card-title"><?php echo $judul; ?></h5>
                        <p class="card-text"><?php echo $deskripsi; ?></p>
                    </div>
                    <div class="card-footer">
                        <small class="text-muted">Post on <?php echo $tgl_input; ?></small>
                    </div>
                </div>
            </div> -->
        <?php } ?>

    </div>
</div>