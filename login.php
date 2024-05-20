<?php

if ($id_user) {
    header("location: " . BASE_URL);
}

?>

<div class="pt-56">
    <form action="<?php echo BASE_URL . "proses_login.php"; ?>" method="POST" class="flex max-w-[720px] mx-auto justify-center items-center flex-col bg-green-50 rounded-xl shadow-xl">
        <h1 class="text-center text-xl py-10 font-bold">Login</h1>

        <?php

        $notif = isset($_GET['notif']) ? $_GET['notif'] : false;

        if ($notif == true) {
            echo "<div class='bg-red-500 px-5 py-2 rounded text-white'>Maaf, email atau password yang kamu masukan tidak cocok</div>";
        }

        ?>
        <div class="flex justify-center flex-col gap-4 m">
            <div class="flex flex-col gap-2 items-center">
                <label>Email</label>
                <input type="text" name="email_user" class="rounded ring-green-200 ring-1 px-4 py-1" />
            </div>

            <div class="flex flex-col gap-2 items-center">
                <label>Password</label>
                <input type="password" name="password_user" class="rounded ring-green-200 ring-1 px-4 py-1" />
            </div>
            <button class="text-center bg-green-600 py-1 rounded text-white font-semibold mb-10" type="submit">Login</button>
        </div>

    </form>

</div>