<?php
  include('../../connection.php');

  if (isset($_GET['id'])) {
    $id = $_GET['id'];
    $sql = "select * from tabel_chat where id=".$id;
    $result = mysqli_query($kon, $sql);
    if (mysqli_num_rows($result) > 0) {
      $row = mysqli_fetch_assoc($result);
    }else {
      $errorMsg = 'tidak ada pesan';
    }
  }
?>

<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title>lihat Pesan</title>
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.0.13/css/all.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/1.10.16/css/dataTables.bootstrap4.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.0.0/css/bootstrap.css">
    <script src="https://code.jquery.com/jquery-3.3.1.min.js" charset="utf-8"></script>
  </head>
  <body>

  <nav class="navbar navbar-expand-md navbar-light" style="background-color: #d669a5;">
        <div class="container">
          <a class="navbar-brand" href="message.php">Massage</a>
          <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
            <span class="navbar-toggler-icon"></span>
          </button>
          <div class="collapse navbar-collapse" id="navbarSupportedContent">
              <ul class="navbar-nav mr-auto"></ul>

          </div>
        </div>
      </nav>

      <div class="container">
        <div class="row justify-content-center">
          <div class="card">
            <div class="card-header">
              Pesan dari <?php echo $row['name'] ?>
            </div>
            <div class="card-body">
              <div class="row">
                    <div class="col-md">
                    <h5 class="form-control"><i class="fa fa-mobile-alt">
                      <span><?php echo $row['contact'] ?></span>
                    </i></h5>
                    <h5 class="form-control"><i class="fa fa-envelope">
                      <span><?php echo $row['email'] ?></span>
                    </i></h5>
                    <h5 class="form-control"><i class="fas fa-comment-dots">
                      <span><?php echo $row['chat'] ?></span>
                    </i></h5>
                    <h5 class="form-control"><i class="far fa-comment-dots">
                      <span><?php echo $row['reply'] ?></span>
                    </i></h5>

                      <a class="btn btn-outline-danger" href="message.php"><i class="fa fa-sign-out-alt"></i><span>Back</span></a>

                </div>
              </div>
            </div>
          </div>
        </div>

      </div>


      <script src="js/bootstrap.min.js" charset="utf-8"></script>
      <script src="https://code.jquery.com/jquery-3.3.1.min.js" charset="utf-8"></script>
      <script type="text/javascript">
      $(document).ready(function() {
          $('#example').DataTable();
        } );
      </script>
    </body>
  </html>
