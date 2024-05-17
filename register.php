<?php

if ($user_id) {
    header("location: " . BASE_URL);
}

?>

<div class="register">

    <form action="<?php echo BASE_URL . "proses_register.php"; ?>" method="POST">

        <?php
        $notif = isset($_GET['notif']) ? $_GET['notif'] : false;
        $nama_lengkap = isset($_GET['nama_user']) ? $_GET['nama_user'] : false;
        $email = isset($_GET['email_user']) ? $_GET['email_user'] : false;
        $phone = isset($_GET['phone_user']) ? $_GET['phone_user'] : false;
        $alamat = isset($_GET['alamat_user']) ? $_GET['alamat_user'] : false;

        if ($notif == "require") {
            echo "<div class='notif'>Maaf, kamu harus melengkapi form dibawah ini</div>";
        } else if ($notif == "password") {
            echo "<div class='notif'>Maaf, password yang kamu masukan tidak sama</div>";
        } else if ($notif == "email") {
            echo "<div class='notif'>Maaf, email yang kamu masukan sudah terdaftar</div>";
        }
        ?>
        <div class="">
            <div class="nama-register">
                <label>Nama Lengkap</label>
                <span><input type="text" name="nama_user" value="<?php echo $nama_lengkap; ?>" /></span>
            </div>

            <div class="email-register">
                <label>Email</label>
                <span><input type="text" name="email_user" value="<?php echo $email; ?>" /></span>
            </div>

            <div class="phone-register">
                <label>Nomor Telepon / Handphone</label>
                <span><input type="text" name="phone_user" value="<?php echo $phone; ?>" /></span>
            </div>

            <div class="alamat-register">
                <label>Alamat</label>
                <span><textarea name="alamat_user"><?php echo $alamat; ?></textarea></span>
            </div>

            <div class="password-register">
                <label>Password</label>
                <span><input type="password" name="password_user" /></span>
            </div>

            <div class="retype-register">
                <label>Re-type Password</label>
                <span><input type="password" name="re_password" /></span>
            </div>

            <div class="btn-register">
                <span><input type="submit" value="register" /></span>
            </div>
        </div>
    </form>

</div>