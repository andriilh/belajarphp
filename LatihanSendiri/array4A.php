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
  <title>Data Mahasiswa</title>
</head>
<body>

  <h1>Daftar Mahasiswa</h1>
  <?php foreach ($mahasiswa as $mhs ) :?>
    <ul>
      <li>
        <img src="img/<?= $mhs["gambar"]; ?>">
      </li>
      <li><?= $mhs["nama"]; ?></li>
      <li><?= $mhs["npm"]; ?></li>
      <li><?= $mhs["Prodi"]; ?></li>
      <li><?= $mhs["email"]; ?></li>
    </ul>
  <?php endforeach; ?>

</body>
</html>
php