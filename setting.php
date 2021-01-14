<?php

session_start();
if($_SESSION['status']!="login"){
    header("location:index.php?pesan=belum_login");
}

include 'inc/header.php';

$nim = $_SESSION['nim'];

$get_data_user = mysqli_query($db, "SELECT * FROM users WHERE nim='$nim'");
$data_user = mysqli_fetch_assoc($get_data_user);

$msg_type = null;

if (isset($_POST['submit'])) {
    $pass_lama = $_POST['pass_lama'];
    $pass_baru = $_POST['pass_baru'];
    $konf_pass_baru = $_POST['konf_pass_baru'];

   if ($pass_lama == $data_user['password']) {
       if ($pass_lama != $pass_baru) {
           if ($pass_baru == $konf_pass_baru) {
               $insert = mysqli_query($db, "UPDATE users SET password = '$pass_baru' WHERE nim = '$nim'");
               if ($insert == TRUE) {
                   $msg_type = "ada";
                   $msg = "Password berhasil di Ubah, Selamat memilih >.<";
               } else {
                   $msg_type = "ada";
                   $msg = "System Error (someone call Mail pls ;-;)";
               }
           } else {
               $msg_type = "ada";
               $msg = "Upsss... Password baru tidak sama dengan Konfirmasi password baru mu";
           }
       } else {
           $msg_type = "ada";
           $msg = "Upsss... Password baru tidak boleh sama dengan Password lama";
       }
   } else {
       $msg_type = "ada";
       $msg = "Upsss... Password lama anda salah";
   }
}

?>
 <div class="container">
        <h1 class="ti-2020">SETTING USER</h1>

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
                <div class="form-login text-center mt-5">
                    <form method="POST" action="">
                        <div class="form-group" style="margin-bottom: 24px;">
                            <input type="password" name="pass_lama" class="form-control inputan" placeholder="Password Lama : ">
                        </div>
                        <div style="margin-bottom: 24px;">
                            <input type="password" name="pass_baru" class="form-control inputan" placeholder="Password Baru :">
                        </div>
                        <div style="margin-bottom: 24px;">
                            <input type="password" name="konf_pass_baru" class="form-control inputan" placeholder="Konfirmasi Password Baru :">
                        </div>
                        <button type="submit" name="submit" class="btn button-login">Ubah</button>
                    </form>
                </div>
            </div>
        </div>
        
        <div class="footer-grup">
                <div class="text-center mb-5">
                    <a href="after-login.php" class="btn button-footer">Kembali</a>
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