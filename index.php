 <?php

$msg_type = null;
if(isset($_GET['pesan'])){
	if($_GET['pesan'] == "gagal"){
        $msg = "Upsss... NIM atau Passwordmu salah!";
        $msg_type = "ada";
	}else if($_GET['pesan'] == "logout"){
        $msg = "Berhasil Logout >.<";
        $msg_type = "ada";
	}else if($_GET['pesan'] == "belum_login"){
        $msg =  "Upsss... Login dulu yuk!";
        $msg_type = "ada";
	}
}

include 'inc/header.php';

?>
 <div class="container">
        <h1 class="ti-2020">TEKNOLOGI INFORMASI 2020</h1>

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

        <div class="col card-login mx-auto">
            <div class="card-body">
                <h3 class="selamat-datang">SELAMAT DATANG</h3>
                <div class="form-login text-center">
                    <form method="POST" action="action/login.php">
                        <div class="form-group" style="margin-bottom: 24px;">
                            <input type="text" name="nim" class="form-control inputan" placeholder="NIM : ">
                        </div>
                        <div>
                            <input type="password" name="password" class="form-control inputan" placeholder="PASSWORD :">
                        </div>
                        <button type="submit" class="btn button-login" value="login">Login</button>
                    </form>
                </div>
            </div>
        </div>
        
        <div class="col-md-12 footer-grup">
                <div class="row text-center">
                    <div class="col-md-6 btn-atas mb-5">
                        <a href="visimisi.php" class="btn button-footer">Lihat Daftar Calon</a>
                    </div>
                    <div class="col-md-6 btn-bawah mb-5">
                        <a href="count.php" class="btn button-footer">Lihat Live Count</a>
                    </div>
                </div>
            </div>
        <!-- Footer -->
        <footer class="font-small blue footer-cr">
                
                <!-- Copyright -->
                <div class="text-center py-3">Crafted with ☕ and ❤️️️ by Mail dan Ali
                </div>
                <!-- Copyright -->
            
              </footer>
              <!-- Footer -->
    </div>


<?php

include 'inc/footer.php';

?>