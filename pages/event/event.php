<?php
  include('../../connection.php');
  $upload_dir = '../../img/even/';

  if(isset($_GET['delete'])){
		$id = $_GET['delete'];
		$sql = "select * from tabel_event where id = ".$id;
		$result = mysqli_query($kon, $sql);
		if(mysqli_num_rows($result) > 0){
			$row = mysqli_fetch_assoc($result);
			$image = $row['image'];
			unlink($upload_dir.$image);
			$sql = "delete from tabel_event where id=".$id;
			if(mysqli_query($kon, $sql)){
				header('location:event.php');
			}
		}
	}
?>
<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title>Event List</title>
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.0.13/css/all.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/1.10.16/css/dataTables.bootstrap4.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.0.0/css/bootstrap.css">
    <script src="https://code.jquery.com/jquery-3.3.1.min.js" charset="utf-8"></script>
  </head>
  <body>

      <nav class="navbar navbar-expand-md navbar navbar-light"  style="background-color: #bec922">
        <div class="container">
          <a class="navbar-brand" href="event.php">Event</a>
          <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
            <span class="navbar-toggler-icon"></span>
          </button>
          <div class="collapse navbar-collapse" id="navbarSupportedContent">
              <ul class="navbar-nav mr-auto"></ul>
              <ul class="navbar-nav ml-auto">
                <li class="nav-item"><a class="btn btn-primary" href="create.php"><i class="fa fa-plus"></i></a></li>
                <li class="nav-item"><a class="btn btn-outline-danger" href="../dashboard.php" style="margin-left: 8px;"><i class="fa fa-sign-out-alt" ></i></a></li>
              </ul>
          </div>
        </div>
      </nav>

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
                    				if(mysqli_num_rows($result)){
                    					while($row = mysqli_fetch_assoc($result)){
                          ?>
                          <tr>
                            <td><?php echo $row['id'] ?></td>
                            <td><img src="<?php echo $upload_dir.$row['image'] ?>" height="40"></td>
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
      } );
    </script>
  </body>
</html>
