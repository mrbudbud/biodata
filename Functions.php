<?php
//koneksi ke database
$conn = mysqli_connect("localhost", "root", "", "dbpersonal");


function query($query)
{
	global $conn;
	$result = mysqli_query($conn, $query);
	$rows = [];
	while ($row = mysqli_fetch_assoc($result)) {
		$rows[] = $row;
	}
	return $rows;
}
function tambah($data)
{
	global $conn;

	// $id = $data["id"];
	$nama = $data["nama"];
	$nama = $data["nama"];
	$email = $data["email"];
	$alamat = $data["alamat"];
	$kota = $data["kota"];

	$image = upload();
	if (!$image)
	{
		return false;
	}

	$query = "INSERT INTO biodata
		VALUES
	('', '$image', '$nama', '$email', '$alamat', '$kota')
	";
	mysqli_query($conn, $query);
	return mysqli_affected_rows($conn);
}

function upload()
{
	$fileName = $_FILES['image']['name'];
	$sizeFile = $_FILES['image']['size'];
	$error 		= $_FILES['image']['error'];
	$tmpName 	= $_FILES['image']['tmp_name'];

	if ($error === 4) 
	{
		echo " <script>
							alert('input file !!');
					</script> ";
		return false;
	}

	$extensionImageValid = ['jpg', 'png', 'jpeg'];
	$extensionImage = explode('.', $fileName);
	$extensionImage = strtolower(end($extensionImage));

		if (!in_array($extensionImage, $extensionImageValid))
		{
			echo " <script>
							alert('Your File is NOT Image !!');
					</script> ";
			return false;
		}

		if ($sizeFile >  1000000)
		{
			echo " <script>
							alert('Your File is too BIG !!');
					</script> ";
			return false;
		}

		move_uploaded_file($tmpName, 'img/'. $fileName);

		return $fileName;

}


function hapus($id)
{
	global $conn;
	mysqli_query($conn, "DELETE FROM biodata WHERE id = $id");
	return mysqli_affected_rows($conn);
}


function ubah($data)
{
	global $conn;

	$id = $data["id"];
	$nama = htmlspecialchars($data["nama"]);
	$email = htmlspecialchars($data["email"]);
	$alamat = htmlspecialchars($data["alamat"]);
	$kota = htmlspecialchars($data["kota"]);

	$query = "UPDATE biodata SET
			
			nama = '$nama',
			email = '$email',
			alamat = '$alamat',
			kota = '$kota'
			WHERE id = $id
			";

	mysqli_query($conn, $query);

	return mysqli_affected_rows($conn);
}



function cari($keyword)
{
	$query = "SELECT * FROM biodata WHERE 
						nama LIKE '%$keyword%' OR
						email LIKE '%$keyword%' OR
						alamat LIKE '%$keyword%' OR
						kota LIKE '%$keyword%'
						";

	return query($query);
}


function register($data)
{

	global $conn;

	$email = strtolower(stripslashes($data["email"]));
	$password1 = mysqli_real_escape_string($conn, $data["password1"]);
	$password2 = mysqli_real_escape_string($conn, $data["password2"]);

	// cek email
	$result = mysqli_query($conn, "SELECT email FROM users WHERE email = '$email' ");

	if (mysqli_fetch_assoc($result))
	{
		echo " <script>
							alert('Email Already Available !!');
					</script> ";
			return false;
	}

	//Confirm Password
	if ($password1 !== $password2)
	{
		echo " <script>
							alert('Confirm Password is Not Valid !!');
					</script> ";
			return false;
	}

	// encrip password
	// $password1 = password_hash($password1, PASSWORD_DEFAULT);

	// query
	mysqli_query($conn,  "INSERT INTO users VALUES
	('', '$email', '$password1')");

	return mysqli_affected_rows($conn);

}
