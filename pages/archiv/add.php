<?php
    include('../../connection.php');
	$upload_dir = '../../img/achievement/';

  if (isset($_POST['Submit'])) {
    $name = $_POST['name'];
    $date = $_POST['date'];

    	$imgName = $_FILES['image']['name'];
		$imgTmp = $_FILES['image']['tmp_name'];
		$imgSize = $_FILES['image']['size'];

    if(empty($name)){
			$errorMsg = 'Please input achievement name';
		}elseif(empty($date)){
			$errorMsg = 'Please input date of achievement';
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
			$sql = "insert into tabel_achi(name, date, image)
					values('".$name."', '".$date."', '".$userPic."')";
			$result = mysqli_query($kon, $sql);
			if($result){
				$successMsg = 'Achievement berhasil ditambahkan';
				header('Location:archi.php');
			}else{
				$errorMsg = 'Error '.mysqli_error($kon);
			}
		}
  }
?>
