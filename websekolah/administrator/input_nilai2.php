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
          <p>
		  
		 <h1 align="center">Update Nilai</h1>
 
<form method="post" action="update_nilai.php">
<table width="423" border="1" align="center" cellpadding="2" cellspacing="0">
<tr><td><div align="center"><strong>No</strong></div></td><td><div align="center"><strong>NIS</strong></div></td><td><div align="center"><strong>Nama Siswa</strong></div></td><td><div align="center"><strong>Nilai</strong></div></td></tr>
 
<?php
 
// membaca kode matakuliah yang disubmit dari formnilai.php
$idmapel = $_POST['mapel'];
 
// menampilkan data nim dan nilai mahasiswa yang mengambil matakuliah berdasarkan kode MK
$query = "SELECT tblnilai.nis, tblnilai.nilai, tblsiswa.nis,tblsiswa.nama_siswa FROM tblnilai,tblsiswa WHERE tblnilai.nis=tblsiswa.nis AND idmapel = '$idmapel'";
 
$hasil = mysql_query($query);
 
// inisialisasi counter
$i = 1;
while ($data = mysql_fetch_array($hasil))
{
echo "<tr><td>".$i."</td><td>".$data['nis']."</td><td>".$data['nama_siswa']."</td><td><input type='hidden' name='siswa".$i."' value='".$data['nis']."' />
<input type='text' size='5' name='nilai".$i."' value='".$data['nilai']."' /></td></tr>";
$i++;
}
$jumSiswa = $i-1;
?>
</table>
<div align="center"><br />
    <input type="hidden" name="n" value="<?php echo $jumSiswa ?>" />
    <input type="hidden" name="idmapel" value="<?php echo $idmapel;?>">
    <input type="submit" value="Update" name="submit" />
</div>
</form>
		  
		  &nbsp;</p></td>
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