<?php

if ($id_user) {
    $module = isset($_GET['module']) ? $_GET['module'] : false;
    $action = isset($_GET['action']) ? $_GET['action'] : false;
    $mode = isset($_GET['mode']) ? $_GET['mode'] : false;
} else {
    header("location: " . BASE_URL . "index.php?page=login");
}

?>
<div class="flex w-full justify-center items-start py-20">
    <?php
    if ($level == "admin") {
    ?>
        <ul class="bg-green-600 flex ml-10 w-1/5 flex-col gap-4 p-4 text-white">
            <li class="w-full">
                <a <?php if ($module == "article") {
                        echo "class='w-full text-white bg-orange-500 hover:bg-orange-400 '";
                    } ?> href="<?php echo BASE_URL . "index.php?page=my_profile&module=article&action=list"; ?>">Article</a>
            </li>
            <li class="w-full">
                <a <?php if ($module == "directory") {
                        echo "class='w-full text-white bg-orange-500 hover:bg-orange-400 '";
                    } ?> href="<?php echo BASE_URL . "index.php?page=my_profile&module=directory&action=list"; ?>">Directory</a>
            </li>
            <li class="w-full">
                <a <?php if ($module == "mitra") {
                        echo "class='w-full text-white bg-orange-500 hover:bg-orange-400 '";
                    } ?> href="<?php echo BASE_URL . "index.php?page=my_profile&module=mitra&action=list"; ?>">Mitra</a>
            </li>
            <li class="w-full">
                <a <?php if ($module == "user") {
                        echo "class='w-full text-white bg-orange-500 hover:bg-orange-400 '";
                    } ?> href="<?php echo BASE_URL . "index.php?page=my_profile&module=user&action=list"; ?>">User</a>
            </li>
            <li class="w-full">
                <a <?php if ($module == "masukan") {
                        echo "class='w-full text-white bg-orange-500 hover:bg-orange-400 '";
                    } ?> href="<?php echo BASE_URL . "index.php?page=my_profile&module=masukan&action=list"; ?>">Masukan</a>
            </li>
        </ul>

    <?php
    } else {
    ?>
        <div class="flex w-1/5">
            <div>
                <a <?php if ($module == "mitra") {
                        echo "class='active'";
                    } ?> href="<?php echo BASE_URL . "index.php?page=my_profile&module=mitra&action=list"; ?>">Mitra</a>
            </div>
            <div>
                <a <?php if ($module == "laporan") {
                        echo "class='active'";
                    } ?> href="<?php echo BASE_URL . "index.php?page=my_profile&module=laporan&action=list"; ?>">Laporan</a>
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