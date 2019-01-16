<?php 
	require 'functions.php';

	if(isset($_POST["submit"])){
		//cek apakah data berhasil ditambahkan atau tidak
		if(tambah($_POST) >  0){
			echo "
			<script>
				alert('data berhasil ditambahkan');
				document.location.href='index.php';
			</script>";
		} else{
			echo "
			<script>
				alert('data berhasil ditambahkan');
				document.location.href='index.php';
			</script>";

			// var_dump(mysqli_affected_rows($conn));
		}
	}

?>
<!DOCTYPE html>
<html>
<head>
	<title>Tamabah Data Mahasiswa</title>
</head>
<body>

	<h1>Tambah Data Mahasiswa</h1>

	<form action="" method="post" enctype="multipart/form-data">
		<ul>
			<li>
				<label for="npm">NPM :</label>
				<input type="text" name="npm" id="npm" required>
			</li>
			<li>
				<label for="nama">Nama :</label>
				<input type="text" name="nama" id="nama" required>
			</li>
			<li>
				<label for="email">Email :</label>
				<input type="email" name="email" id="email" required>
			</li>
			<li>
				<label for="jurusan">Jurusan :</label>
				<input type="text" name="jurusan" id="jurusan" required>
			</li>
			<li>
				<label for="gambar">Gambar :</label>
				<input type="file" name="gambar" id="gambar" required>
			</li>
			<li>
				<button type="submit" name="submit">Tambah Data</button>
			</li>
		</ul>
	</form>

	<a href="index.php">Tabel Mahasiswa</a>

</body>
</html>