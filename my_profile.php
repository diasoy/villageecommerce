<?php

if ($id_user) {
    $module = isset($_GET['module']) ? $_GET['module'] : false;
    $action = isset($_GET['action']) ? $_GET['action'] : false;
    $mode = isset($_GET['mode']) ? $_GET['mode'] : false;
} else {
    header("location: " . BASE_URL . "index.php?page=login");
}

?>
<div id="bg-page-profile">

    <div id="menu-profile">

        <ul>
            <?php
            if ($level == "admin") {
            ?>
                <li>
                    <a <?php if ($module == "article") {
                            echo "class='active'";
                        } ?> href="<?php echo BASE_URL . "index.php?page=my_profile&module=article&action=list"; ?>">Article</a>
                </li>
                <li>
                    <a <?php if ($module == "directory") {
                            echo "class='active'";
                        } ?> href="<?php echo BASE_URL . "index.php?page=my_profile&module=directory&action=list"; ?>">Directory</a>
                </li>
                <li>
                    <a <?php if ($module == "mitra") {
                            echo "class='active'";
                        } ?> href="<?php echo BASE_URL . "index.php?page=my_profile&module=mitra&action=list"; ?>">Mitra</a>
                </li>
                <li>
                    <a <?php if ($module == "user") {
                            echo "class='active'";
                        } ?> href="<?php echo BASE_URL . "index.php?page=my_profile&module=user&action=list"; ?>">User</a>
                </li>
                <li>
                    <a <?php if ($module == "masukan") {
                            echo "class='active'";
                        } ?> href="<?php echo BASE_URL . "index.php?page=my_profile&module=masukan&action=list"; ?>">Masukan</a>
                </li>

            <?php
            } else {
            ?>
                <li>
                    <a <?php if ($module == "mitra") {
                            echo "class='active'";
                        } ?> href="<?php echo BASE_URL . "index.php?page=my_profile&module=mitra&action=list"; ?>">Mitra</a>
                </li>
                <li>
                    <a <?php if ($module == "laporan") {
                            echo "class='active'";
                        } ?> href="<?php echo BASE_URL . "index.php?page=my_profile&module=laporan&action=list"; ?>">Laporan</a>
                </li>
            <?php  } ?>


        </ul>

    </div>

    <div id="profile-content">
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