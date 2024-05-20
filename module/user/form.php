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
<form action="<?php echo BASE_URL . "module/user/action.php?id_user=$id_user" ?>" method="POST" class=" mx-40 space-y-4">

	<div class="flex flex-col">
		<label class="font-bold mb-1">Nama Lengkap</label>
		<input type="text" name="nama_user" value="<?php echo $namaUser; ?>" class="border p-2 rounded" />
	</div>

	<div class="flex flex-col">
		<label class="font-bold mb-1">Level</label>
		<div>
			<label class="inline-flex items-center mr-2">
				<input type="radio" value="superadmin" name="level_user" class="mr-1" <?php if ($levelUser == "superadmin") {
																							echo "checked";
																						} ?> />
				Superadmin
			</label>
			<label class="inline-flex items-center">
				<input type="radio" value="customer" name="level_user" class="mr-1" <?php if ($levelUser == "customer") {
																						echo "checked";
																					} ?> />
				Customer
			</label>
		</div>
	</div>

	<div class="flex flex-col">
		<label class="font-bold mb-1">Email</label>
		<input type="text" name="email_user" value="<?php echo $emailUser; ?>" class="border p-2 rounded" />
	</div>

	<div class="flex flex-col">
		<label class="font-bold mb-1">Phone</label>
		<input type="text" name="phone_user" value="<?php echo $phoneUser; ?>" class="border p-2 rounded" />
	</div>

	<div class="flex flex-col">
		<label class="font-bold mb-1">Alamat</label>
		<input type="text" name="alamat_user" value="<?php echo $alamatUser; ?>" class="border p-2 rounded" />
	</div>

	<div class="flex flex-col">
		<label class="font-bold mb-1">Status</label>
		<div>
			<label class="inline-flex items-center mr-2">
				<input type="radio" value="on" name="status_user" class="mr-1" <?php if ($statusUser == "on") {
																					echo "checked";
																				} ?> />
				on
			</label>
			<label class="inline-flex items-center">
				<input type="radio" value="off" name="status_user" class="mr-1" <?php if ($statusUser == "off") {
																					echo "checked";
																				} ?> />
				off
			</label>
		</div>
	</div>

	<div class="flex justify-end">
		<input type="submit" name="button" value="<?php echo $button; ?>" class="bg-blue-500 hover:bg-blue-700 cursor-pointer text-white font-bold py-2 px-4 rounded" />
	</div>
</form>