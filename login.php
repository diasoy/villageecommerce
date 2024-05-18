<?php

if ($id_user) {
    header("location: " . BASE_URL);
}

?>

<div class="login">

    <form action="<?php echo BASE_URL . "proses_login.php"; ?>" method="POST">

        <?php

        $notif = isset($_GET['notif']) ? $_GET['notif'] : false;

        if ($notif == true) {
            echo "<div class='notif'>Maaf, email atau password yang kamu masukan tidak cocok</div>";
        }

        ?>
        <div>
            <div class="">
                <label>Email</label>
                <span><input type="text" name="email_user" /></span>
            </div>

            <div class="">
                <label>Password</label>
                <span><input type="password" name="password_user" /></span>
            </div>

            <div class="">
                <span><input type="submit" value="login" /></span>
            </div>
        </div>

    </form>

</div>