<!-- array numerik -->

<?php 
  $mahasiswa = [["Andri Ilham","17111322","Informatika","andr3yfcb@gmail.com"],
                ["Dendi","17111223","Informatika","dendi@gmail.com"],
                ["Kevin","17111003","Informatika","kevin@gmail.com"]];
?>


<!-- <?php foreach($mahasiswa as $mhs):?>
      <li><?php echo $mhs;?></li>
    <?php endforeach; ?> -->

<!DOCTYPE html>
<html>
<head>
  <title>Data Mahasiswa</title>
</head>
<body>
  <h1>Daftar Nama Mahasiswa</h1>
  <?php foreach($mahasiswa as $mhs) : ?>
  <ul>
    <li>Nama  : <?= $mhs[0]; ?></li>
    <li>NPM   : <?= $mhs[1]; ?></li>
    <li>Prodi : <?= $mhs[2]; ?></li>
    <li>Email : <?= $mhs[3]; ?></li>
  </ul>
  <?php endforeach;?>
</body>
</html>