<?php
	require 'functions.php';
	$mahasiswa = query("SELECT * FROM mahasiswa");
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
		<?php foreach($mahasiswa as $row) : ?>
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
		<?php endforeach; ?>
	</table>
</body>
</html>