<?
session_start();
//koneksi database
include "../include/koneksi.php";
if (isset($_SESSION['level']) && isset($_SESSION['username']))
{
   if ($_SESSION['level'] == "admin")
   {

//Ambil nilai yang akan di edit
if (isset($_GET['kdmapel'])) {
	$kdmapel = $_GET['kdmapel'];
} 

//tampilkan data sebelum di edit
$sql2="select * from tblmapel where kdmapel='$kdmapel';";
$tampil=mysql_query($sql2);
$baris=mysql_fetch_array($tampil);
$kdmapel=$baris['kdmapel'];
$nama_mapel=$baris['nama_mapel'];
$kkm=$baris['kkm'];


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
    <td width="103" align="center" valign="top" bgcolor="#FFCC33"><p>&nbsp;
      </p>
      <p>
        <? include "menu.php"; ?></p>
    </td>
    <td width="515" valign="top"><h2 align="center"><strong>Data Siswa SMA 1 Masbagik </strong></h2>
      <hr />
      <table width="510" border="0" align="center">
      <tr>
        <td valign="top"><table width="496" border="0" cellspacing="0" cellpadding="1">
          <tr>
            <td width="152">Kode Mata Pelajaran </td>
            <td width="178">: <?=$kdmapel?></td>
          </tr>
          <tr>
            <td>Nama Mata Pelajaran </td>
            <td>: <?=$nama_mapel?></td>
            </tr>
          <tr>
            <td>KKM</td>
            <td>: <?=$kkm?></td>
            </tr>
           </table>        
          <hr />
          <p align="center"><a href="mapel.php?kdmapel=<? echo $kdmapel;?>"><img src="../images/icon/Action-edit-icon.png" width="70" height="70" border="0" /></a><a href="javascript:if(confirm('Anda yakin akan menghapus data ini??')){document.location='hapus_mapel.php?kdmapel=<? echo $kdmapel;?>';}"><img src="../images/icon/Action-cancel-icon.png" width="70" height="70" border="0" /></a></p>
          <p align="center"> </p></td>
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