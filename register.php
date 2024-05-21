<?php

if ($id_user) {
    header("location: " . BASE_URL);
}

?>

<div class="flex justify-center items-center h-screen bg-gray-200">

    <form action="<?php echo BASE_URL . "proses_register.php"; ?>" method="POST" class="bg-white shadow-md rounded px-8 pt-6 pb-8 mb-4">

        <?php
        $notif = isset($_GET['notif']) ? $_GET['notif'] : false;
        $nama_lengkap = isset($_GET['nama_user']) ? $_GET['nama_user'] : false;
        $email = isset($_GET['email_user']) ? $_GET['email_user'] : false;
        $phone = isset($_GET['phone_user']) ? $_GET['phone_user'] : false;
        $alamat = isset($_GET['alamat_user']) ? $_GET['alamat_user'] : false;

        if ($notif == "require") {
            echo "<div class='bg-red-500 text-white py-2 px-3 w-full my-3 rounded'>Maaf, kamu harus melengkapi form dibawah ini</div>";
        } else if ($notif == "password") {
            echo "<div class='bg-red-500 text-white py-2 px-3 w-full my-3 rounded'>Maaf, password yang kamu masukan tidak sama</div>";
        } else if ($notif == "email") {
            echo "<div class='bg-red-500 text-white py-2 px-3 w-full my-3 rounded'>Maaf, email yang kamu masukan sudah terdaftar</div>";
        }
        ?>
        <div class="mb-4">
            <label class="block text-gray-700 text-sm font-bold mb-2">Nama Lengkap</label>
            <input type="text" name="nama_user" value="<?php echo $nama_lengkap; ?>" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" />
        </div>

        <div class="mb-4">
            <label class="block text-gray-700 text-sm font-bold mb-2">Email</label>
            <input type="text" name="email_user" value="<?php echo $email; ?>" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" />
        </div>

        <div class="mb-4">
            <label class="block text-gray-700 text-sm font-bold mb-2">Nomor Telepon / Handphone</label>
            <input type="text" name="phone_user" value="<?php echo $phone; ?>" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" />
        </div>

        <div class="mb-4">
            <label class="block text-gray-700 text-sm font-bold mb-2">Alamat</label>
            <textarea name="alamat_user" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline"><?php echo $alamat; ?></textarea>
        </div>

        <div class="mb-4">
            <label class="block text-gray-700 text-sm font-bold mb-2">Password</label>
            <input type="password" name="password_user" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" />
        </div>

        <div class="mb-4">
            <label class="block text-gray-700 text-sm font-bold mb-2">Re-type Password</label>
            <input type="password" name="re_password" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" />
        </div>

        <div class="flex items-center justify-between">
            <button class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline" type="submit">Register</button>
        </div>
    </form>

</div>