<?
session_start();
//koneksi database
include "../include/koneksi.php";

if (isset($_SESSION['level']) && isset($_SESSION['username']))
{
   if ($_SESSION['level'] == "admin")
   {

$mapel=$_POST['mata_pel'];
if(isset($_POST['submit'])){
	if(empty($mapel)){
	echo "<script type='text/javascript'>
	onload =function(){
	alert('Tidak ada mata pelajaran yang dipilih !!');
	}
	</script>";
	}else{
		foreach($mapel as $id_pel){
		$sql = "insert into tblnilai (nis,idmapel,nilai) values ('{$_POST['nis']}','{$id_pel}','0')";
		mysql_query($sql) or die("Gagal Menyimpan Data".mysql_error());
		header("Location: nilai.php?nis=$_POST[nis]");
	}
	}
}

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
        <td valign="top"><h2 align="center"><strong>Ambil Mata Kuliah </strong></h2>
          <hr>
          <p>
		  <?
		  //mencari data mahasiswa
$sql = "select * from tblsiswa where nis='".mysql_real_escape_string($_GET['nis'])."'";
$data = mysql_fetch_array(mysql_query($sql));
?>
<h2>Tambah Mata Pelajaran Siswa: <?php echo $data['nama_siswa'];?></h2>
<form name="form" method="post" action="">
<?php
//mencari semua data mata kuliah
$subquery = "select idmapel from tblnilai where nis='".$data['nis']."'";
$sql = "select * from tblmapel where id not in ({$subquery})";
$result = mysql_query($sql);
while($mapel = mysql_fetch_array($result)){
	//membut checkbox
	echo '<input type="checkbox" name="mata_pel[]" value="'.$mapel['id'].'"/>';
	echo $mapel['kdmapel'].': '.$mapel['nama_mapel'].' ';
	echo "<br>";
}

echo '<input type="submit" name="submit" value="Simpan"/>';

?>
<input type="hidden" name="nis" value="<?php echo $data['nis'];?>"/>
<br/>

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