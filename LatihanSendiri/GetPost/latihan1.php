<?php 
  $mahasiswa = [
    [
    "nama" => "Andri Ilham",
    "npm" => "17111322",
    "Prodi" => "Informatika",
    "email" => "andri@gmail.com",
    "gambar" => "a.png"
    ],
    [
    "nama" => "Ilham Fahmi",
    "npm" => "17112232",
    "Prodi" => "Industri",
    "email" => "ilham@gmail.com",
    "gambar" => "av.png"
    ]
  ];
?>

<!DOCTYPE html>
<html>
<head>
	<title>Daftar Mahasiswa</title>
	<style>
		a{
			-decoration: none;
		}
	</style>
</head>
<body>
	<h1> Daftar Mahasiswa</h1>
	<ul>
		<?php foreach($mahasiswa as $mhs): ?>
			<li>
				<a href="latihan2.php?nama=<?= $mhs["nama"];?>&npm=<?=$mhs["npm"];?>&Prodi=<?= $mhs["Prodi"];?>&email=<?= $mhs["email"]; ?>"><?= $mhs["nama"]; ?></a>
			</li>
		<?php endforeach ?>
	</ul>

</body>
</html>