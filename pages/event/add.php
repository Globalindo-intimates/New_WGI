<?php
    include('../../connection.php');
	$upload_dir = '../../img/even/';

  if (isset($_POST['Submit'])) {
	$name = $_POST['name'];
	$decs = $_POST['decs'];
    $date = $_POST['date'];

    	$imgName = $_FILES['image']['name'];
		$imgTmp = $_FILES['image']['tmp_name'];
		$imgSize = $_FILES['image']['size'];

    if(empty($name)){
			$errorMsg = 'Please input event name';
		}elseif(empty($date)){
			$errorMsg = 'Please input date of event';
		}elseif(empty($decs)){
				$errorMsg = 'Please input decription of event';
		}else{

			$imgExt = strtolower(pathinfo($imgName, PATHINFO_EXTENSION));

			$allowExt  = array('jpg');

			$userPic = time().'_'.rand(1000,9999).'.'.$imgExt;

			if(in_array($imgExt, $allowExt)){

				if($imgSize < 50000){
					move_uploaded_file($imgTmp ,$upload_dir.$userPic);
				}else{
					$errorMsg = 'Ukuran foto terlalu besar, maks 5Mb';
				}
			}else{
				$errorMsg = 'tipe file salah, masukkan type file ".JPG"';
			}
		}



		if(!isset($errorMsg)){
			$sql = "insert into tabel_event(name, date, decs, image)
					values('".$name."', '".$date."', '".$decs."', '".$userPic."')";
			$result = mysqli_query($kon, $sql);
			if($result){
				$successMsg = 'event berhasil ditambahkan';
				header('Location:event.php');
			}else{
				$errorMsg = 'Error '.mysqli_error($kon);
			}
		}
  }
?>
