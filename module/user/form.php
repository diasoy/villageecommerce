<?php

$id_user = isset($_GET['id_user']) ? $_GET['id_user'] : "";

$button = "Update";
$queryUser = mysqli_query($koneksi, "SELECT * FROM user WHERE id_user='$id_user'");

$row = mysqli_fetch_array($queryUser);

$levelUser = $row["level_user"];
$namaUser = $row["nama_user"];
$emailUser = $row["email_user"];
$alamatUser = $row["alamat_user"];
$phoneUser = $row["phone_user"];
$statusUser = $row["status_user"];
?>
<form action="<?php echo BASE_URL . "module/user/action.php?id_user=$id_user" ?>" method="POST">

	<div class="element-form">
		<label>Nama Lengkap</label>
		<span><input type="text" name="nama_user" value="<?php echo $namaUser; ?>" /></span>
	</div>

	<div class="element-form">
		<label>Level</label>
		<span>
			<input type="radio" value="superadmin" name="level_user" <?php if ($levelUser == "superadmin") {
																			echo "checked";
																		} ?> /> Superadmin
			<input type="radio" value="customer" name="level_user" <?php if ($levelUser == "customer") {
																		echo "checked";
																	} ?> /> Customer
		</span>
	</div>

	<div class="element-form">
		<label>Email</label>
		<span><input type="text" name="email_user" value="<?php echo $emailUser; ?>" /></span>
	</div>

	<div class="element-form">
		<label>Phone</label>
		<span><input type="text" name="phone_user" value="<?php echo $phoneUser; ?>" /></span>
	</div>

	<div class="element-form">
		<label>Alamat</label>
		<span><input type="text" name="alamat_user" value="<?php echo $alamatUser; ?>" /></span>
	</div>


	<div class="element-form">
		<label>Status</label>
		<span>
			<input type="radio" value="on" name="status_user" <?php if ($statusUser == "on") {
																	echo "checked";
																} ?> /> on
			<input type="radio" value="off" name="status_user" <?php if ($statusUser == "off") {
																	echo "checked";
																} ?> /> off
		</span>
	</div>

	<div class="element-form">
		<span><input type="submit" name="button" value="<?php echo $button; ?>" class="submit-my-profile" /></span>
	</div>
</form>