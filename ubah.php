<?php
require 'Functions.php';

$id = $_GET["id"];


$bio = query("SELECT * FROM biodata WHERE id = $id")[0];

if (isset($_POST["submit"])) {


	if (ubah($_POST) > 0) {
		echo "
	<script>
	alert('data berhasil diedit!');
	document.location.href ='index.php';
	</script>
	";
	} else {
		echo "
	<script>
	alert('data gagal diedit!');
	document.location.href ='index.php';
	</script>
	";
		// echo mysqli_error($conn);
	}
}
?>
<!DOCTYPE html>
<html>

<head>
	<title>Edit Biodata Pegawai</title>
</head>

<body style="background-image: url(1.jpg)">

	<h1>Edit Biodata Pegawai</h1>


	<form action="" method="post">
		<ul>
			<input type="hidden" name="id" value="<?= $bio["id"]; ?>">
			<li>
				<label for="nama">Nama :</label>
				<input type="text" name="nama" id="nama" required value="<?= $bio["nama"]; ?>">
			</li>
			<li>
				<label for="email">Email :</label>
				<input type="text" name="email" id="email" required value="<?= $bio["email"]; ?>">
			</li>
			<li>
				<label for="alamat">Alamat :</label>
				<input type="text" name="alamat" id="alamat" required value="<?= $bio["alamat"]; ?>">
			</li>
			<li>
				<label for="kota">Kota :</label>
				<input type="text" name="kota" id="kota" required value="<?= $bio["kota"]; ?>">
			</li>
			<li>
				<button type="submit" name="submit">Edit Data!</button>
			</li>
		</ul>



	</form>

</body>

</html>