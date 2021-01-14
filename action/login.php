<?php
// mengaktifkan session php
session_start();
 
// menghubungkan dengan koneksi
include '../config/mainconfig.php';
 
// menangkap data yang dikirim dari form
$nim = $db->real_escape_string(stripslashes(strip_tags(htmlspecialchars($_POST['nim'], ENT_QUOTES))));
$password = $db->real_escape_string(stripslashes(strip_tags(htmlspecialchars($_POST['password'], ENT_QUOTES))));
 
// menyeleksi data admin dengan nim dan password yang sesuai
$get_data = mysqli_query($db,"select * from users where nim='$nim' and password='$password'");
$data = mysqli_fetch_assoc($get_data);
// menghitung jumlah data yang ditemukan
$cek = mysqli_num_rows($get_data);
 
if($cek > 0){
	$_SESSION['nim'] = $nim;
    $_SESSION['status'] = "login";
    $_SESSION['nama'] = $data['nama'];
	header("location:../after-login.php");
}else{
	header("location:../index.php?pesan=gagal");
}
?>