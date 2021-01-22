<?php
include('../../connection.php');

if (isset($_GET['id'])) {
  $id = $_GET['id'];
  $sql = "select * from tabel_about where id=" . $id;
  $result = mysqli_query($kon, $sql);
  if (mysqli_num_rows($result) > 0) {
    $row = mysqli_fetch_assoc($result);
  } else {
    $errorMsg = 'Tidak ada Pesan';
  }
}

if(isset($_POST['Submit'])){
  $visi = $_POST['visi'];
  $misi = $_POST['misi'];


  if(!isset($errorMsg)){
    $sql = "update tabel_about
                set visi = '".$visi."',
                misi = '".$misi."'
        where id=".$id;
    $result = mysqli_query($kon, $sql);
    if($result){
      $successMsg = 'Achievement berhasil diperbarui';
      header('Location:about.php');
    }else{
      $errorMsg = 'Error '.mysqli_error($conn);
    }
  }

}

?>

<!DOCTYPE html>
<html>

<head>
  <meta charset="utf-8">
  <title>Balas pesan</title>
  <link rel="stylesheet" href="css/bootstrap.min.css">
  <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.0.13/css/all.css">
  <link rel="stylesheet" href="https://cdn.datatables.net/1.10.16/css/dataTables.bootstrap4.min.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.0.0/css/bootstrap.css">
</head>

<body>

  <nav class="navbar navbar-expand-md navbar-light" style="background-color: #bab96a;">
    <div class="container">
      <a class="navbar-brand" href="message.php">Massage</a>
      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <ul class="navbar-nav mr-auto"></ul>
        <ul class="navbar-nav ml-auto">
          <li class="nav-item"><a class="btn btn-outline-danger" href="index.php"><i class="fa fa-sign-out-alt"></i></a></li>
        </ul>
      </div>
    </div>
  </nav>

  <div class="container">
    <div class="row justify-content-center">
      <div class="col-md-6">
        <div class="card">
          <div class="card-header">
            Balas Pesan
          </div>
          <div class="card-body">
            <form class="" action="" method="post" enctype="multipart/form-data">
              <div class="form-group">
                <label for="visi">Visi</label>
                <input type="text" class="form-control" name="visi" placeholder="masukkan visi"  value="<?php echo $row['visi']; ?>">
              </div>
              <div class="form-group">
                <label for="misi">Misi</label>
                <input type="text" class="form-control" name="misi" placeholder="masukkan misi"  value="<?php echo $row['misi']; ?>">
              </div>
              <div class="form-group">
                <button type="submit" name="Submit" class="btn btn-primary waves">Kirim</button>
              </div>
            </form>
          </div>
        </div>
      </div>
    </div>
  </div>
  <script src="js/bootstrap.min.js" charset="utf-8"></script>
  <script src="https://code.jquery.com/jquery-3.3.1.min.js" charset="utf-8"></script>
</body>

</html>



