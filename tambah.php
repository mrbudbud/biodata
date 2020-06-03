<?php
require 'Functions.php';

if (isset($_POST["submit"])) {


	if (tambah($_POST) > 0) {
		echo "
	<script>
	alert('data berhasil ditambahkan!');
	document.location.href ='index.php';
	</script>
	";
	} else {
		echo "<script>
	alert('data gagal ditambahkan!');
	document.location.href ='index.php';
	</script>
	";
	}
}
?>
<!DOCTYPE html>
<html>

<head>
	<title>Tambah Biodata Pegawai</title>
</head>

<body style="background-image: url(1.jpg)">

	<h1>Tambah Biodata Pegawai</h1>


	<form action="" method="post" enctype="multipart/form-data">

		<ul>
			<!-- NOTE: ID TIDAK BOLEH DI INPUT OLEH USER -->
			<!-- <li>
				<label for="id">ID :</label>
				<input type="text" name="id" id="id"> 
			</li> -->
			<li>
				<label for="image">Image :</label>
				<input type="file" name="image" id="image">
			</li>
				<br>
			<li>
				<label for="nama">Nama :</label>
				<input type="text" name="nama" id="nama" required>
			</li>
				<br>
			<li>
				<label for="email">Email :</label>
				<input type="text" name="email" id="email">
			</li>
				<br>
			<li>
				<label for="alamat">Alamat :</label>
				<input type="text" name="alamat" id="alamat">
			</li>
				<br>
			<li>
				<label for="kota">Kota :</label>
				<input type="text" name="kota" id="kota">
			</li>
				 <br>
			<li>
				<button type="submit" name="submit">Submit Data!</button>
			</li>
		</ul>

	</form>

</body>

</html>