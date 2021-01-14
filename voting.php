<?php
session_start();
if($_SESSION['status']!="login"){
    header("location:index.php?pesan=belum_login");
}

$nama = $_SESSION['nama'];
$nim = $_SESSION['nim'];

include 'inc/header.php';

$get_data = mysqli_query($db, "SELECT * FROM kandidat ORDER BY no_urut ASC");
$jumlah_kandidat = mysqli_num_rows($get_data);

$get_data_user = mysqli_query($db, "SELECT * FROM users WHERE nim='$nim'");
$data_user = mysqli_fetch_assoc($get_data_user);

if ($jumlah_kandidat == 2) {
    $kolom = "col-md-6";
} else if ($jumlah_kandidat == 3) {
    $kolom = "col-md-4";
} else if ($jumlah_kandidat == 4) {
    $kolom = "col-md-3";
}

$msg_type = null;

if (isset($_POST['submit'])) {

    if ($data_user['nim'] != $data_user['password']) {
        $pilihan = $_POST['submit'];

        if ($data_user['memilih'] == null) {
            $masukan_kotaksuara = mysqli_query($db, "INSERT INTO kotak_suara VALUES ('', '$nim', '$pilihan', '$date $time')");
            if ($masukan_kotaksuara == TRUE) {
                $update_user = mysqli_query($db, "UPDATE users SET memilih = '$pilihan' WHERE nim = '$nim'");
                header("location:terimakasih.php");
            } else {
                $msg = "System Error";
                $msg_type = "ada";
            }
        } else {
            $msg = "Mohon maaf anda sudah memilih";
            $msg_type = "ada";
        }
    } else {
        $msg_type= "ada";
        $msg = "Silahkan ganti password terlebih dahulu ya >.<";
    }
}

?>

    <div class="container-fluid container-count">
        <div class="row">
            <div class="col-md-12">
                <div class="row">
                    <div class="col-6">
                        <div class="nama-user">
                            Hai, <?= $nama ?>
                        </div>
                    </div>
                    <div class="col-6 d-flex justify-content-end">
                        <a href="after-login.php" class="btn btn-kembali-voting">Kembali</a>
                    </div>
                </div>
            </div>
        </div>
        <div class="header-title text-center">
            SILAHKAN PILIH CALON KETUA ANGKATAN DENGAN BIJAK :D
        </div>
        <?php
        if ($msg_type == "ada") {
            echo '
                <div class="alert-login mx-auto">
                    <div class="text-alert-login text-center">
                        ' . $msg . '
                    </div>
                </div>
            ';
        }
        ?>
        <div class="row">
            <div class="col-md-12 count-grup">
                <div class="row">
                    <?php 

                    while ($data = mysqli_fetch_assoc($get_data)) {
                        echo '
                        <div class="'. $kolom .' mb-4">
                            <div class="card-pilih text-center">
                                <div class="nama-calon">' . $data['nama'] . '</div>
                                <img src="assets/image/'. $data['foto'] .'" class="rounded mx-auto d-block foto-calon" alt="pamungkas">
                                <form method="POST" id="sw-confirm">
                                <button type="submit" name="submit" class="btn btn-pilih" value="' . $data['no_urut'] . '">Pilih</button>
                                </form>
                            </div>
                        </div>
                        ';
                    }
                    ?>
                </div>
            </div>
        </div>
        <div class="quote">
            <i>"Gunakan Suaramu sebaik mungkin"</i><br>-Dzakwan Mufid
        </div>
        <footer class="font-small blue footer-cr">
            <div class="text-center py-3 mt-5">Crafted with ☕ and ❤️️️ by Mail dan Ali</div>
        </footer>
    </div>

    <script src="assets/js/sw.js"></script>
<?php

include 'inc/footer.php';

?>