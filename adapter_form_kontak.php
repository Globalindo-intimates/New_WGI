<?php
//Include file koneksi ke database
include "connection.php";

//menerima nilai dari kiriman form input-barang 
$name = $_POST["name"];
$email = $_POST["email"];
$contact = $_POST["contact"];
$chat = $_POST["chat"];

//Query input menginput data kedalam tabel barang
$sqlKontak = "insert into tabel_chat (name, email, contact, chat) values
		('$name','$email', '$contact', '$chat')";

//Mengeksekusi/menjalankan query diatas	
$hasil = mysqli_query($kon, $sqlKontak);


//Kondisi apakah berhasil atau tidak
if ($hasil) {
	include "index.php";
	exit;
} else {
	echo "Gagal insert data";
	exit;
}
