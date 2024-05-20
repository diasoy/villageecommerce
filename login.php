<?php

if ($id_user) {
    header("location: " . BASE_URL);
}

?>

<div class="login">
    <h1>Login</h1>

    <form action="<?php echo BASE_URL . "proses_login.php"; ?>" method="POST">

        <?php

        $notif = isset($_GET['notif']) ? $_GET['notif'] : false;

        if ($notif == true) {
            echo "<div class='notif'>Maaf, email atau password yang kamu masukan tidak cocok</div>";
        }

        ?>
        <div class="form-login-register">
            <div class="login-register-input">
                <label>Email</label>
                <input type="text" name="email_user" />
            </div>

            <div class="login-register-input">
                <label>Password</label>
                <input type="password" name="password_user" />
            </div>


            <div class="">
                <button class="login-btn" type="submit">Login</button>
            </div>
        </div>

    </form>

</div>