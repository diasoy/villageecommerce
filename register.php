<?php

if ($id_user) {
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
        <div class="form-login-register">
            <div class="login-register-input">
                <label>Nama Lengkap</label>
                <input type="text" name="nama_user" value="<?php echo $nama_lengkap; ?>" />
            </div>

            <div class="login-register-input">
                <label>Email</label>
                <input type="text" name="email_user" value="<?php echo $email; ?>" />
            </div>

            <div class="login-register-input">
                <label>Nomor Telepon / Handphone</label>
                <input type="text" name="phone_user" value="<?php echo $phone; ?>" />
            </div>

            <div class="login-register-input">
                <label>Alamat</label>
                <textarea name="alamat_user"><?php echo $alamat; ?></textarea>
            </div>

            <div class="login-register-input">
                <label>Password</label>
                <input type="password" name="password_user" />
            </div>

            <div class="login-register-input    ">
                <label>Re-type Password</label>
                <input type="password" name="re_password" />
            </div>

            <div class="">
                <button class="register-btn" type="submit">Register</button>
            </div>
        </div>
    </form>

</div>