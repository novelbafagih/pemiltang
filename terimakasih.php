<?php

session_start();
if($_SESSION['status']!="login"){
    header("location:index.php?pesan=belum_login");
}

$nama = $_SESSION['nama'];
$nim = $_SESSION['nim'];

include 'inc/header.php';

$get_data = mysqli_query($db, "SELECT * FROM users WHERE nim = '$nim'");
$data = mysqli_fetch_assoc($get_data);
$pilihan = $data['memilih'];
$get_nama = mysqli_query($db, "SELECT * FROM kandidat WHERE no_urut = '$pilihan'");
$nama_pilihan = mysqli_fetch_assoc($get_nama);

?>

    <div class="terimakasih">TERIMAKASIH SUDAH MEMILIH</div>
    <div class="pilihan"><?= $nama_pilihan['nama'] ?></div>
    <div class="saran-text">UNTUK MELIHAT LIVE COUNT CEK BUTTON DIBAWAH</div>
    <div class="btn-visimisi">
        <a href="count.php" class="btn button-footer text-center">Lihat Live Count</a>
    </div>

<?php

include 'inc/footer.php';

?>