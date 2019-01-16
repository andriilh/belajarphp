<?php 
	require 'functions.php';

	//ambil data dari url
	$id = $_GET["id"];
	//query data mahasiswa berdasarkan id
	$mhs = query("SELECT*FROM mahasiswa where id = $id")[0];

	if(isset($_POST["submit"])){
		//cek apakah data berhasil ditambahkan atau tidak
		if(ubah($_POST) >  0){
			echo "
			<script>
				alert('data berhasil diubah');
				document.location.href='index.php';
			</script>";
		} else{
			echo "
			<script>
				alert('data gagal diubah');
				document.location.href='index.php';
			</script>";

			// var_dump(mysqli_affected_rows($conn));
		}
	}

?>
<!DOCTYPE html>
<html>
<head>
	<title>Ubah Data Mahasiswa</title>
</head>
<body>

	<h1>Ubah Data Mahasiswa</h1>

	<form action="" method="post">
		<input type="hidden" name="id" value="<?= $mhs["id"]; ?>">
		<ul>
			<li>
				<label for="npm">NPM :</label>
				<input type="text" name="npm" id="npm" required value="<?= $mhs["npm"]; ?>">
			</li>
			<li>
				<label for="nama">Nama :</label>
				<input type="text" name="nama" id="nama" required value="<?= $mhs["nama"]; ?>">
			</li>
			<li>
				<label for="email">Email :</label>
				<input type="email" name="email" id="email" required value="<?= $mhs["email"]; ?>">
			</li>
			<li>
				<label for="jurusan">Jurusan :</label>
				<input type="text" name="jurusan" id="jurusan" required value="<?= $mhs["jurusan"]; ?>">
			</li>
			<li>
				<button type="submit" name="submit">Ubah Data</button>
			</li>
		</ul>
	</form>

	<a href="index.php">Tabel Mahasiswa</a>

</body>
</html>