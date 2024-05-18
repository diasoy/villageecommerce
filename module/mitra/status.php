<?php

$id_mitra = $_GET["id_mitra"];

$query = mysqli_query($koneksi, "SELECT status_mitra FROM mitra WHERE id_mitra='$id_mitra'");
$row = mysqli_fetch_assoc($query);
$status = $row['status_mitra'];

?>
<form action="<?php echo BASE_URL . "module/mitra/action.php?id_mitra=$id_mitra"; ?>" method="POST">

    <div class="element-form">
        <label>Id Mitra</label>
        <span><input type="text" value="<?php echo $id_mitra; ?>" name="id_mitra" readonly="true" /></span>
    </div>
    <div class="element-form">
        <label>Nama User</label>
        <span><input type="text" value="<?php echo $id_user; ?>" name="id_user" readonly="true" /></span>
    </div>

    <div class="element-form">
        <label>Status</label>
        <span>
            <select name="status">
                <?php

                foreach ($arrayStatusMitra as $key => $value) {
                    if ($status == $key) {
                        echo "<option value='$key' selected='true'>$value</option>";
                    } else {
                        echo "<option value='$key'>$value</option>";
                    }
                }

                ?>
            </select>
        </span>
    </div>

    <div class="element-form">
        <span><input class="tombol-action" type="submit" value="Edit Status" name="button" /></span>
    </div>

</form>