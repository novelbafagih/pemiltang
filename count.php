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
            LIVE COUNT PEMILIHAN
        </div>

        <div class="row">
            <div class="col-md-12 count-grup">
                <div class="row">
                    <?php
                    $no_urut = 1;
                    while ($data = mysqli_fetch_assoc($get_data)) {
                        $get_suara = mysqli_query($db, "SELECT * FROM kotak_suara WHERE pilihan = '$no_urut'");
                        $suara = mysqli_num_rows($get_suara);
                        echo '
                        <div class="'. $kolom .' mb-4">
                            <div class="card-count">
                                <div class="nama-calon text-center">' . $data['nama'] . '</div>
                                <img src="assets/image/'. $data['foto'] .'" class="rounded mx-auto d-block foto-calon" alt="pamungkas">
                                <div class="suara-text">Suara</div>
                                <div class="suara-grup mx-auto">
                                    <div class="suara">'. $suara .'</div>
                                </div>
                            </div>
                        </div>
                        ';
                        $no_urut++;
                    }
                    ?>
                </div>
            </div>
        </div>
        <footer class="font-small blue footer-cr">
            <div class="text-center py-3 mt-5">Crafted with ☕ and ❤️️️ by Mail dan Ali</div>
        </footer>
    </div>
<?php

include 'inc/footer.php';

?>