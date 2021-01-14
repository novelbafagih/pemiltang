<?php

include 'inc/header.php';
$no_urut = $_GET['no_urut'];
$get_data = mysqli_query($db, "SELECT * FROM kandidat WHERE no_urut = '$no_urut' LIMIT 1");
$data = mysqli_fetch_array($get_data);

?>

    <div class="container">
        <div class="visimisi-nama"><?= $data['nama'] ?></div>
        <img src="assets/image/<?= $data['foto'] ?>" alt="" class="visimisi-foto mx-auto d-block">
        <div class="col-md-12">
            <div class="row">
                <div class="col-md-6 btn-atas mb-5">
                    <div class="visi">
                        <div class="visi-head text-center">Visi</div>
                        <div class="visi-body">
                            <?php echo nl2br($data['visi']) ?>
                        </div>
                    </div>
                </div>
                <div class="col-md-6 btn-bawah mb-5">
                    <div class="visi">
                        <div class="visi-head text-center">Misi</div>
                        <div class="visi-body">
                            <?php echo nl2br($data['misi']) ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="text-center">
            <a href="visimisi.php" class="btn button-besar text-center">Kembali</a>
        </div>
        <footer class="font-small blue footer-cr">
            <div class="text-center py-3 mt-5">Crafted with ☕ and ❤️️️ by Mail dan Ali</div>
        </footer>
    </div>

<?php

include 'inc/footer.php';

?>