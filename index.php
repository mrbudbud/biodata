<?php

session_start();

if (!isset($_SESSION["login"]))
{
	header("Location: login.php");
}

require 'Functions.php';

$biodata = query("SELECT * FROM biodata");


if (isset($_POST["cari"])) {
	$biodata = cari($_POST["keyword"]);
}


?>
<!DOCTYPE html>
<html>

<head>
	<style>
		input[type=text] {
			width: 30%;
			padding: 8px 20px;
			margin: 8px 0;
			box-sizing: border-box;
		}

		/* input[type=number] {
			width: 100%;
			padding: 12px 20px;
			margin: 8px 0;
			box-sizing: border-box;
		} */
	</style>
	<meta charset="utf-8">
	<title>Halaman Admin</title>
	<link rel="stylesheet" href="app.css">
</head>

<body style="background-image: url(1.jpg)">

	<div class="container my-4">
		<a href="logout.php" class="btn btn-danger btn-sm my-3">Logout</a>

		<h1>Daftar Biodata Pegawai</h1>
		<a href="tambah.php"><h4 class="btn btn-success"> Tambah Biodata Pegawai</h4></a>
		
		<a href=""></a>

		<br>
		<br>

		<form action="" method="post">
			<input type="text" name="keyword" placeholder="Type this text">
			<button type="submit" name="cari">Serch</button>
		</form>

		<br>

		<table border="1" cellpadding="10" cellspacing="0">

			<tr>
				<th>No.</th>
				<th>Aksi</th>
				<!-- <th>Id</th> -->
				<th>Image</th>
				<th>Nama</th>
				<th>Email</th>
				<th>Alamat</th>
				<th>Kota</th>
			</tr>
			<?php $i = 1; ?>
			<?php foreach ($biodata as $row) : ?>
				<tr>
					<td><?= $i; ?></td>
					<td>
						<a href="ubah.php?id=<?= $row["id"]; ?>">Edit</a> |
						<a href="hapus.php?id=<?= $row["id"]; ?>">Delete</a>
					</td>
					<td><img src="img/<?= $row["image"] ?>" width="50" height="50"> </td>
					<td><?= $row["nama"]; ?></td>
					<td><?= $row["email"]; ?></td>
					<td><?= $row["alamat"]; ?></td>
					<td><?= $row["kota"]; ?></td>
				</tr>
				<?php $i++ ?>
			<?php endforeach; ?>

		</table>

	</div>

</body>