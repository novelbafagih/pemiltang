<?php

include 'inc/header.php';

$get_data = mysqli_query($db, "SELECT * FROM kandidat ORDER BY no_urut ASC");
$jumlah_kandidat = mysqli_num_rows($get_data);

if ($jumlah_kandidat == 2) {
    $kolom = "col-md-6";
} else if ($jumlah_kandidat == 3) {
    $kolom = "col-md-4";
} else if ($jumlah_kandidat == 4) {
    $kolom = "col-md-3";
}

?>

    <div class="container-fluid container-count">
        <div class="header-title text-center">
            VISI MISI
        </div>
        <div class="row">
            <div class="col-md-12 count-grup">
                <div class="row">
                    <?php 
                    $nomor_urut = 1; 
                    while ($data = mysqli_fetch_assoc($get_data)) {
                        echo '
                        <div class="' . $kolom . ' mb-4">
                            <div class="card-pilih text-center">
                                <div class="nama-calon">' . $data['nama'] . '</div>
                                <img src="assets/image/' . $data['foto'] . '" class="rounded mx-auto d-block foto-calon" alt="foto-calon">
                                <a href="visimisi-detail.php?no_urut='. $nomor_urut. '" class="btn btn-pilih">Visi Misi</a>
                            </div>
                        </div>
                        ';
                        $nomor_urut++;
                    }
                    ?>
                    <!-- <div class="col-md-4 mb-4">
                        <div class="card-pilih text-center">
                            <div class="nama-calon">Rozy - Novel</div>
                            <img src="assets/image/pamungkas.png" class="rounded mx-auto d-block foto-calon" alt="pamungkas">
                            <a href="#" class="btn btn-pilih">Visi Misi</a>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="card-pilih text-center">
                            <div class="nama-calon">Andira - Rheza</div>
                            <img src="assets/image/pamungkas.png" class="rounded mx-auto d-block foto-calon" alt="pamungkas">
                            <a href="#" class="btn btn-pilih">Visi Misi</a>
                        </div>
                    </div> -->
                </div>
            </div>
        </div>
        <div class="text-center">
            <a href="after-login.php" class="btn button-besar text-center">Kembali</a>
        </div>
        <footer class="font-small blue footer-cr">
            <div class="text-center py-3 mt-5">Crafted with ☕ and ❤️️️ by Mail dan Ali</div>
        </footer>
    </div>
<?php

include 'inc/footer.php';

?>