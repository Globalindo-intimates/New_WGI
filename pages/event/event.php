<?php
include('../../connection.php');
$upload_dir = '../../img/even/';

if (isset($_GET['delete'])) {
  $id = $_GET['delete'];
  $sql = "select * from tabel_event where id = " . $id;
  $result = mysqli_query($kon, $sql);
  if (mysqli_num_rows($result) > 0) {
    $row = mysqli_fetch_assoc($result);
    $image = $row['image'];
    unlink($upload_dir . $image);
    $sql = "delete from tabel_event where id=" . $id;
    if (mysqli_query($kon, $sql)) {
      header('location:event.php');
    }
  }
}
?>
<!DOCTYPE html>
<html>

<head>
  <meta charset="utf-8" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
  <title>
    Admin Panel
  </title>
  <meta content='width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0, shrink-to-fit=no' name='viewport' />
  <!--     Fonts and icons     -->
  <link href="https://fonts.googleapis.com/css?family=Montserrat:400,700,200" rel="stylesheet" />
  <link href="https://maxcdn.bootstrapcdn.com/font-awesome/latest/css/font-awesome.min.css" rel="stylesheet">
  <!-- CSS Files -->
  <link href="../assets/css/bootstrap.min.css" rel="stylesheet" />
  <link href="../assets/css/paper-dashboard.css?v=2.0.1" rel="stylesheet" />
  <!-- CSS Just for demo purpose, don't include it in your project -->
  <link href="../assets/demo/demo.css" rel="stylesheet" />
  <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.0.13/css/all.css">
</head>

<body class="">
  <div class="wrapper ">
    <div class="sidebar" data-color="grey" data-active-color="danger">
      <div class="logo">
        <a href="#" class="simple-text logo-mini">
          <div class="logo-image-small">
            <img src="../../img/logo/logo_globalindo.png">
          </div>
          <!-- <p>CT</p> -->
        </a>
        <a href="#" class="simple-text logo-normal">
          <b> Admin Panel</b>
          <!-- <div class="logo-image-big">
            <img src="../assets/img/logo-big.png">
          </div> -->
        </a>
      </div>
      <div class="sidebar-wrapper">
        <ul class="nav">
          <li>
            <a href="../produk/produk copy.php">
              <p>Product</p>
            </a>
          </li>
          <li>
            <a href="../archiv/archi.php">
              <p>Achievement</p>
            </a>
          </li>
          <li class="active ">
            <a href="../event/event.php">
              <p><b>Event</b></p>
            </a>
          </li>
          <li>
            <a href="../message/message.php">
              <p>Messanger</p>
            </a>
          </li>
          <li>
            <a href="../about/about.php">
              <p>About</p>
            </a>
          </li>
          <li>
            <a href="../../login.php">
              <p>Log Out</p>
            </a>
          </li>
        </ul>
      </div>
    </div>
    <div class="main-panel">
      <div class="container-fluid">
        <div class="navbar-wrapper">

          <nav class="navbar navbar-expand-md navbar navbar-light navbar-absolute fixed-top" style="background-color: #bec922">
            <div class="container">
              <a class="navbar-brand" href="event.php">Event</a>
              <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
                <span class="navbar-toggler-icon"></span>
              </button>
              <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav mr-auto"></ul>
                <ul class="navbar-nav ml-auto">
                  <li class="nav-item"><a class="btn btn-primary" href="create.php"><i class="fa fa-plus"></i></a></li>
                </ul>
              </div>
            </div>
          </nav>
          <br><br>
          <div class="container">
            <div class="row justify-content-center">
              <div class="col-md-12">
                <div class="card">
                  <div class="card-header">Event List</div>
                  <div class="card-body">
                    <table id="example" class="table table-striped table-bordered" style="width:100%">
                      <thead>
                        <tr>
                          <th>No</th>
                          <th>Foto Event</th>
                          <th>Nama</th>
                          <th>Tanggal Event</th>
                          <th>Deskripsi Event</th>
                          <th>Actions</th>
                        </tr>
                      </thead>
                      <tfoot>
                        <tr>
                          <th>No</th>
                          <th>Foto Event</th>
                          <th>Nama</th>
                          <th>Tanggal Event</th>
                          <th>Deskripsi Event</th>
                          <th>Actions</th>
                        </tr>
                      </tfoot>
                      <tbody>
                        <?php
                        $sql = "select * from tabel_event";
                        $result = mysqli_query($kon, $sql);
                        if (mysqli_num_rows($result)) {
                          while ($row = mysqli_fetch_assoc($result)) {
                        ?>
                            <tr>
                              <td><?php echo $row['id'] ?></td>
                              <td><img src="<?php echo $upload_dir . $row['image'] ?>" height="40"></td>
                              <td><?php echo $row['name'] ?></td>
                              <td><?php echo $row['date'] ?></td>
                              <td><?php echo $row['decs'] ?></td>
                              <td class="text-center">
                                <a href="edit.php?id=<?php echo $row['id'] ?>" class="btn btn-info"><i class="fa fa-edit"></i></a>
                                <a href="event.php?delete=<?php echo $row['id'] ?>" class="btn btn-danger" onclick="return confirm('Are you sure to delete this record?')"><i class="fa fa-trash-alt"></i></a>
                              </td>
                            </tr>
                        <?php
                          }
                        }
                        ?>
                      </tbody>
                    </table>
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
            });
          </script>
</body>

</html>