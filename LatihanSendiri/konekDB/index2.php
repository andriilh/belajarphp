<?php
	//koneksi ke database
	$conn = mysqli_connect("localhost","root","","belajarphp");
	//ambil data dan tabel mahasiswa
	//queri
	$result = mysqli_query($conn,"SELECT * FROM mahasiswa");
	if(!$result){
		echo mysqli_error($conn);
	}

	//Ambil data (fetch) dari objek result
	// mysqli_fetch_row($result) mengembalikan array numerik
	// var_dump($mhs[1]);

	// mysqli_fetch_assoc($result) mengembalikan array assosiatif
	// var_dump($mhs["nama"]);

	// mysqli_fetch_array($result) gabungan row dan assoc. Kekurangannya : menampilkan dobel data, yakni row dan assoc
	// var_dump($mhs["nama"]) atau var_dump($mhs[2]);

	// mysqli_fetch_object($result)
	// ar_dump($mhs->nama);

	// while ($mhs = mysqli_fetch_assoc($result)){
	// 	var_dump($mhs);
	
?>

<!DOCTYPE html>
<html>
<head>
	<title>Halaman Admin</title>
</head>
<body>
	<h1>Daftar Mahasiswa</h1>
	<table border="1" cellpadding="10" cellspacing="0">
		
		<tr>
			<th>No.</th>
			<th>Aksi</th>
			<th>NPM</th>
			<th>Nama</th>
			<th>Email</th>
			<th>Jurusan</th>
		</tr>
		<?php $i = 1; ?>
		<?php while ($row = mysqli_fetch_assoc($result)) : ?>
		<tr>
			<td><?= $row["id"]; ?></td>
			<td>
				<a href="">Ubah</a>
				<a href="">Hapus</a>
			</td>
			<td><?= $row["npm"]; ?></td>
			<td><?= $row["nama"]; ?></td>
			<td><?= $row["email"];?></td>
			<td><?= $row["jurusan"];?></td>
		</tr>
		<?php $i++; ?>
		<?php endwhile; ?>
	</table>
</body>
</html>