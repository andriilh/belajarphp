<?
session_start();
//koneksi database
include "../include/koneksi.php";


if (isset($_SESSION['level']) && isset($_SESSION['username']))
{
   if ($_SESSION['level'] == "admin")
   {
?>
<style type="text/css">
<!--
body {
	background-color: #003366;
	background-image: url(../images/foto/images14.jpg);
}
-->
</style>
<table width="622" border="0" align="center" cellpadding="1" cellspacing="0" bgcolor="#FFFF66">
  <tr>
    <td colspan="2"><? include "header.php"; ?></td>
  </tr>
  <tr>
    <td width="103" align="center" valign="top" bgcolor="#FFCC33"><p>
      <? include "menu.php";?>
    </p>
      <p align="center">&nbsp;</p>
    </td>
    <td width="515"><table width="510" border="0" align="center">
      <tr>
        <td valign="top"><h2 align="center"><strong>Nilai Siswa SMA   </strong></h2>
          <hr>
          <p>Update Nilai
           
</p>
<?php
mysql_connect("localhost", "root", "");
mysql_select_db("dbsekolah");
 
// membaca jumlah mahasiswa (n) dari submit.php
$jumSiswa = $_POST['n'];
 
// membaca kode MK yang akan diupdate
$idmapel = $_POST['idmapel'];
 
// proses looping untuk membaca nilai dan nim mahasiswa dari form, serta menjalankan query update
for ($i=1; $i<=$jumSiswa; $i++)
{
// membaca nim mahasiswa ke-i, i = 1, 2, 3, ..., n
$nis = $_POST['siswa'.$i];
 
// membaca nilai mahasiswa ke-i, i = 1, 2, 3, ..., n
$nilai  = $_POST['nilai'.$i];
 
// update nilai mahasiswa ke-i, i = 1, 2, 3, ..., n
$query = "UPDATE tblnilai SET nilai = $nilai WHERE nis = '$nis' AND idmapel = '$idmapel'";
mysql_query($query);
}
 
echo "<h2>Update nilai sukses</h2>";
 
?>
</td>
      </tr>
    </table></td>
  </tr>
  <tr>
    <td colspan="2" bgcolor="#FFCC33"><p>&nbsp;</p>
      <p>
        <? include "footer.php"; ?>
      </p>
    <p>&nbsp; </p></td>
  </tr>
</table>
<?
}
   else
   {
       // jika levelnya bukan admin, tampilkan pesan
       echo "<script type='text/javascript'>
{
if(alert('Sorry gank!! Anda tidak berhak mengakses halaman ini karena bukan admin.')){document.location='login.php';}
}

</script>";
   }
}
else
{
   echo "<script type='text/javascript'>
{
if(alert('Login Dulu dong Frend!!')){document.location='login.php';}
}

</script>";
}
?>