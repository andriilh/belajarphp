<?php 
	if(!isset($_GET["nama"])
		|| (!isset($_GET["npm"]))
		|| (!isset($_GET["Prodi"]))
		|| (!isset($_GET["email"]))){
		header("Location: latihan1.php");
		exit;
	}
?>
<!DOCTYPE html>
<html>
<head>
	<title>Detail Mahasiswa</title>
</head>
<body>
	<h1>Detail Mahasiswa</h1>
	<ul>
		<li><?= $_GET ["nama"]; ?></li>
		<li><?= $_GET ["npm"]; ?></li>
		<li><?= $_GET["Prodi"]; ?></li>
		<li><?= $_GET["email"]; ?></li>
	</ul>

	<a href="latihan1.php">Kembali</a>

</body>
</html>