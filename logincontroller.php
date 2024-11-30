<?php 
// mengaktifkan session php
session_start();
 
// menghubungkan dengan koneksi
include 'koneksi.php';
 
// menangkap data yang dikirim dari form
$username = $_POST['username'];
$password = $_POST['password'];
 
// menyeleksi data user dengan username dan password yang sesuai
$result = mysqli_query($connect,"SELECT * FROM users where username='$username' and password='$password'");

$cek = mysqli_num_rows($result);
 
if($cek > 0) {
	$data = mysqli_fetch_assoc($result);
	//menyimpan session user, namalengkap, status dan email
	$_SESSION['username'] = $username;
	$_SESSION['namalengkap'] = $data['namalengkap'];
	$_SESSION['status'] = "sudah_login";
	$_SESSION['email'] = $data['email'];
	header("location:home.html");
} else {
	header("location:index.html?pesan=gagal login data tidak ditemukan.");
}
?>