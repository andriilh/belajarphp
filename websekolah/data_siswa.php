<?
session_start();
//koneksi database
include "include/koneksi.php";
//Apabila klik cari
if(isset($_POST['cari'])) {
$cnis=$_POST['cnis'];
$carix = "select * from tblsiswa where nis='$cnis'"; 
$cari=mysql_query($carix);
if($cari){
header("location:tampil_siswa.php?nis=$cnis");
}
}
?>
<style type="text/css">
<!--
body {
	background-image: url(images/foto/images14.jpg);
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
        <td valign="top"><h2 align="center"><strong>Data Siswa </strong></h2>
          <hr>
          <form id="form2" name="form2" method="post" action="">
			  <table width="210" border="0" align="center" cellpadding="1" cellspacing="0">
                <tr>
                  <td width="50"><div align="center"><img src="images/icon/search.gif" width="50" height="50" /></div></td>
                  <td width="180"><input name="cnis" type="text" id="cnis" size="10" />
                      <input name="cari" type="submit" id="cari" value="Cari" /></td>
                </tr>
              </table>
            </form>
			<table width="509" border="1" align="center" cellpadding="1" cellspacing="0">
              <tr valign="top">
                <td width="83"><div align="center"><strong>NIS</strong></div></td>
                <td width="120"><div align="center"><strong>Nama Siswa</strong></div></td>
				<td width="84"><div align="center"><strong>Jenis Kelamin</strong></div></td>
                <td width="76"><div align="center"><strong>Semester</strong></div></td>
                <td width="68"><div align="center"><strong>Kelas</strong></div></td>
                <td width="52"><div align="center"><strong>Detail</strong></div></td>
              </tr>
              <?
  //pilih data dari tabel siswa
$x="select * from tblsiswa";
//ambil query tampilkan
$tampil=mysql_query($x);
//tampilkan data dalam bentuk array di tabel
while ($data=mysql_fetch_array($tampil))
{
?>
              <tr>
                <td><div align="center"><? echo $data['nis']; ?></div></td>
                <td><? echo $data['nama_siswa']; ?></td>
				<td><? echo $data['jenis_kelamin']; ?></td>
                <td><div align="center"><? echo $data['semester']; ?></div></td>
                <td><div align="center"><? echo $data['kelas']; ?></div></td>
                <td><div align="center"></a><a href="home.php?nis=<? echo $data['nis'];?>"></a><a href="tampil_siswa.php?nis=<? echo $data['nis'];?>"></a><a href="tampil_siswa.php?nis=<? echo $data['nis'];?>"><img src="images/icon/button-view.gif" width="20" height="20" /></a></div></td>
				<? } ?>
			  </tr>
				<?
  //pilih data dari tabel siswa
$x1="select * from tblsiswa";
//ambil query tampilkan
$hitung=mysql_query($x1);
//tampilkan data dalam bentuk array di tabel
$jumlah=mysql_num_rows($hitung);
?>
              <tr>
                <td colspan="4"><div align="center"><strong>Jumlah siswa saat ini adalah</strong> </div></td>
                <td colspan="2" align="center"><div align="center"><b><? echo $jumlah; ?> orang</b></div></td>
              </tr>
            </table>            
            <p>&nbsp;</p>
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
