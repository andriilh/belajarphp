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
		  
		  <? 
		  $nis=$_GET['nis'];
		  $sql = "select * from tblsiswa where nis='$nis'";
$result = mysql_query($sql);
?>
		  <table width="471" border="1" align="center" cellpadding="5" cellspacing="0">
	<tr>
		<td width="39"><div align="center"><strong>NIM</strong></div></td>
		<td width="147"><div align="center"><strong>Nama</strong></div></td>
		<td width="72"><div align="center"><strong>Semester</strong></div></td>
		<td width="53"><div align="center"><strong>Kelas</strong></div></td>
		<td width="98"><div align="center"><strong>Aksi</strong></div></td>
	</tr>
	<?php while($siswa = mysql_fetch_array($result)){?>
	<tr>
		<td><?php echo $siswa['nis'];?></td>
		<td><?php echo $siswa['nama_siswa'];?></td>
		<td><?php echo $siswa['semester'];?></td>
		<td><?php echo $siswa['kelas'];?></td>
		<td><a href="ambil_mapel.php?nis=<?php echo $siswa['nis'];?>">Tambah Mapel </a></td>
	</tr>
	<tr>
		<td colspan="5">
			<strong>Mata Pelajaran:</strong>
				<table width="445" border="0" cellpadding="5" cellspacing="0">
				<tr>
					<td width="150" style="border-bottom:1px solid #000;"><strong>Kode Mapel</strong></td>
					<td width="250" style="border-bottom:1px solid #000;"><strong>Nama Mapel</strong></td>
					<td width="50" style="border-bottom:1px solid #000;"><strong>KKM</strong></td>
					<td width="50" style="border-bottom:1px solid #000;"><strong>Nilai</strong></td>
					<td width="50" style="border-bottom:1px solid #000;"><strong>Aksi</strong></td>
				</tr>
				
				<?
				$rowset = mysql_query("select * from tblnilai,tblmapel where tblnilai.idmapel=tblmapel.id and nis='".$siswa['nis']."'");
				$i=1;
				while($mp = mysql_fetch_array($rowset)){
				?>
				<tr>
					<td style="border-bottom:1px solid #000;border-right:1px solid #000"><?php echo $mp['kdmapel'];?></td>
					<td style="border-bottom:1px solid #000;"><?php echo $mp['nama_mapel'];?></td>
					<td style="border-bottom:1px solid #000;"><?php echo $mp['kkm'];?></td>
					<td style="border-bottom:1px solid #000;"><?php echo $mp['nilai'];?></td>
					<td style="border-bottom:1px solid #000;"><a href="hapus_nilai.php?
					idmapel=<? echo $mp['id']; ?>&nis=<? echo $siswa['nis'];?>"><img src="../images/icon/button-cross.gif" /></a></td>
					  <?php 
					   }?>
					     </tr>
						 	</table>				  </td>
	</tr>
	<?php }?>
</table>
		  
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