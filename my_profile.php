<?php

if ($id_user) {
    $module = isset($_GET['module']) ? $_GET['module'] : false;
    $action = isset($_GET['action']) ? $_GET['action'] : false;
    $mode = isset($_GET['mode']) ? $_GET['mode'] : false;
} else {
    header("location: " . BASE_URL . "index.php?page=login");
}

?>
<div class="flex w-full justify-center lg:items-start items-center py-36 flex-col lg:flex-row">
    
    <?php
    if ($level == "admin") {
    ?>
        <div class="flex flex-col justify-between gap-10 mx-4 rounded-lg border shadow lg:w-1/5 px-8 py-4">
            <div class="flex  flex-col gap-5">
                <a <?php if ($module == "article") {
                        echo "class='bg-green-500 text-white py-2 px-5 rounded'";
                    } ?> href="<?php echo BASE_URL . "index.php?page=my_profile&module=article&action=list"; ?>">Article</a>
                <a <?php if ($module == "mitra") {
                        echo "class='bg-green-500 text-white py-2 px-5 rounded'";
                    } ?> href="<?php echo BASE_URL . "index.php?page=my_profile&module=mitra&action=list"; ?>">Mitra</a>
                <a <?php if ($module == "user") {
                        echo "class='bg-green-500 text-white py-2 px-5 rounded'";
                    } ?> href="<?php echo BASE_URL . "index.php?page=my_profile&module=user&action=list"; ?>">User</a>
                <a <?php if ($module == "masukan") {
                        echo "class='bg-green-500 text-white py-2 px-5 rounded'";
                    } ?> href="<?php echo BASE_URL . "index.php?page=my_profile&module=masukan&action=list"; ?>">Masukan</a>
                <a <?php if ($module == "laporan") {
                        echo "class='bg-green-500 text-white py-2 px-5 rounded'";
                    } ?> href="<?php echo BASE_URL . "index.php?page=my_profile&module=laporan&action=list"; ?>">Laporan</a>
            </div>
            <div>
                <a class='text-sm bg-red-700 text-white px-4 py-2 mb-2 rounded' href='<?= BASE_URL . "index.php?page=logout" ?>'>Logout</a>
            </div>

        </div>

    <?php
    } else {
    ?>
        <div class="flex flex-col justify-between gap-10 mx-4 rounded-lg border shadow w-1/5 px-8 py-4">
            <div class="flex  flex-col gap-5">
                <a <?php if ($module == "mitra") {
                        echo "class='bg-green-500 text-white py-2 px-5 rounded'";
                    } ?> href="<?php echo BASE_URL . "index.php?page=my_profile&module=mitra&action=list"; ?>">Mitra</a>
                <a <?php if ($module == "laporan") {
                        echo "class='bg-green-500 text-white py-2 px-5 rounded'";
                    } ?> href="<?php echo BASE_URL . "index.php?page=my_profile&module=laporan&action=list"; ?>">Laporan</a>
            </div>
            <div>
                <a class='text-sm bg-red-700 text-white px-4 py-2 mb-2 rounded' href='<?= BASE_URL . "index.php?page=logout" ?>'>Logout</a>
            </div>
        </div>
    <?php  } ?>


    <div class="flex w-4/5">
        <?php
        $file = "module/$module/$action.php";
        if (file_exists($file)) {
            include_once($file);
        } else {
            echo "<h3>Maaf, halaman tersebut tidak ditemukan</h3>";
        }
        ?>
    </div>
</div>