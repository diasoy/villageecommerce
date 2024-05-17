<?php

$user_id = isset($_GET['id_user']) ? $_GET['id_user'] : "";

$button = "Update";
$queryUser = mysqli_query($koneksi, "SELECT * FROM user WHERE id_user='$user_id'");

$row = mysqli_fetch_array($queryUser);

$level = $row["level_user"];
$nama = $row["nama_user"];
$email = $row["email_user"];
$alamat = $row["alamat_user"];
$phone = $row["phone_user"];
$status = $row["status_user"];
?>
<form action="<?php echo BASE_URL . "module/user/action.php?id_user=$user_id" ?>" method="POST">

	<div class="element-form">
		<label>Nama Lengkap</label>
		<span><input type="text" name="nama_user" value="<?php echo $nama; ?>" /></span>
	</div>

	<div class="element-form">
		<label>Email</label>
		<span><input type="text" name="email_user" value="<?php echo $email; ?>" /></span>
	</div>

	<div class="element-form">
		<label>Phone</label>
		<span><input type="text" name="phone_user" value="<?php echo $phone; ?>" /></span>
	</div>

	<div class="element-form">
		<label>Alamat</label>
		<span><input type="text" name="alamat_user" value="<?php echo $alamat; ?>" /></span>
	</div>

	<div class="element-form">
		<label>Level</label>
		<span>
			<input type="radio" value="admin" name="level_user" <?php if ($level == "admin") {
																echo "checked";
															} ?> /> Admin
			<input type="radio" value="customer" name="level_user" <?php if ($level == "customer") {
																	echo "checked";
																} ?> /> Customer
		</span>
	</div>

	<div class="element-form">
		<label>Status</label>
		<span>
			<input type="radio" value="on" name="status_user" <?php if ($status == "on") {
																echo "checked";
															} ?> /> on
			<input type="radio" value="off" name="status_user" <?php if ($status == "off") {
																echo "checked";
															} ?> /> off
		</span>
	</div>

	<div class="element-form">
		<span><input type="submit" name="button" value="<?php echo $button; ?>" class="submit-my-profile" /></span>
	</div>
</form>