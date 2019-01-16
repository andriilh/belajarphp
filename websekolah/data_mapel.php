<?
session_start();
//koneksi database
include "include/koneksi.php";

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
        <td valign="top"><h2 align="center"><strong>Data Mata Pelajaran </strong>          </h2>
          <hr />
          <table width="439" border="1" align="center" cellpadding="1" cellspacing="0">
              <tr>
                <td width="87" height="43"><div align="center"><strong>KD MAPEL</strong></div></td>
                <td width="264"><div align="center"><strong>NAMA MAPEL</strong></div></td>
				<td width="74"><div align="center"><strong>KKM</strong></div></td>
			  </tr>
              <?
  //pilih data dari tabel siswa
$x="select * from tblmapel";
//ambil query tampilkan
$tampil=mysql_query($x);
//tampilkan data dalam bentuk array di tabel
while ($data=mysql_fetch_array($tampil))
{
?>
              <tr>
                <td><div align="center"><? echo $data['kdmapel']; ?></div></td>
                <td><? echo $data['nama_mapel']; ?></td>
				<td><div align="center"><? echo $data['kkm']; ?></div></td>
                <? } ?>
			  </tr>
				<?
  //pilih data dari tabel siswa
$x1="select * from tblmapel";
//ambil query tampilkan
$hitung=mysql_query($x1);
//tampilkan data dalam bentuk array di tabel
$jumlah=mysql_num_rows($hitung);
?>
              <tr>
                <td colspan="3"><strong>Jumlah Mapel saat ini adalah</strong> <b><? echo $jumlah; ?> Mata Pelajaran </b></td>
              </tr>
            </table>            
            <p>&nbsp;</p>
            <p>&nbsp;</p>
            <p>&nbsp;</p>
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
