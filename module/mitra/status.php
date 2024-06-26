<?php

$id_mitra = $_GET["id_mitra"];

$query = mysqli_query($koneksi, "SELECT * FROM mitra WHERE id_mitra='$id_mitra'");
$row = mysqli_fetch_assoc($query);

$statusMitra = $row['status_mitra'];

?>
<form action="<?php echo BASE_URL . "module/mitra/edit_status.php?id_mitra=$id_mitra"; ?>" method="POST" class="space-y-4 mx-20">

    <div class="flex flex-col">
        <label class="font-bold mb-1">Id Mitra</label>
        <input type="text" value="<?php echo $id_mitra; ?>" name="id_mitra" readonly="true" class="border-2 border-gray-200 p-2 rounded" />
    </div>

    <div class="flex flex-col">
        <label class="font-bold mb-1">Status</label>
        <select name="status" class="border-2 border-gray-200 p-2 rounded">
            <option value="on" <?php if ($statusMitra == "on") { echo "selected"; } ?>>On</option>
            <option value="off" <?php if ($statusMitra == "off") { echo "selected"; } ?>>Off</option>
        </select>
    </div>

    <div class="flex justify-end">
        <input class="bg-blue-500 hover:bg-blue-700 cursor-pointer text-white font-bold py-2 px-4 rounded" type="submit" value="Edit Status" name="button" />
    </div>

</form>
