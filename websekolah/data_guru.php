<?
session_start();
//koneksi database
include "include/koneksi.php";
//Apabila klik cari   
if(isset($_POST['cari'])) {
$cnip=$_POST['cnip'];
$carix = "select * from tblguru where nip='$cnip'"; 
$cari=mysql_query($carix);
if($cari){
header("location:tampil_guru.php?nip=$cnip");
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
        <td valign="top"><h2 align="center"><strong>Data Guru </strong></h2>
          <hr>
          <form id="form2" name="form2" method="post" action="">
			  <table width="210" border="0" align="center" cellpadding="1" cellspacing="0">
                <tr>
                  <td width="50"><div align="center"><img src="images/icon/search.gif" width="50" height="50" /></div></td>
                  <td width="180"><input name="cnip" type="text" id="cnip" size="10" />
                      <input name="cari" type="submit" id="cari" value="Cari" /></td>
                </tr>
              </table>
            </form>
			<table width="508" border="1" align="center" cellpadding="1" cellspacing="0">
              <tr>
                <td width="76"><div align="center"><strong>NIP</strong></div></td>
                <td width="168"><div align="center"><strong>Nama Guru</strong></div></td>
				<td width="97"><div align="center"><strong>Jabatan</strong></div></td>
                <td width="74"><div align="center"><strong>Gol.</strong></div></td>
                <td width="71"><div align="center"><strong>Detail</strong></div></td>
              </tr>
              <?
  //pilih data dari tabel siswa
$x="select * from tblguru";
//ambil query tampilkan
$tampil=mysql_query($x);
//tampilkan data dalam bentuk array di tabel
while ($data=mysql_fetch_array($tampil))
{
?>
              <tr>
                <td><div align="center"><? echo $data['nip']; ?></div></td>
                <td><? echo $data['nama_guru']; ?></td>
				<td><? echo $data['jabatan']; ?></td>
                <td><div align="center"><? echo $data['golongan']; ?></div></td>
                <td><div align="center"><a href="home2.php?nip=<? echo $data['nip'];?>"></a><a href="javascript:if(confirm('Anda yakin akan menghapus data ini??')){document.location='hapus_guru.php?nip=<? echo $data['nip'];?>';}"></a></a><a href="tampil_guru.php?nip=<? echo $data['nip'];?>"><img src="images/icon/button-view.gif" width="20" height="20" /></a></div></td>
				<? } ?>
			  </tr>
				<?
  //pilih data dari tabel siswa
$x1="select * from tblguru";
//ambil query tampilkan
$hitung=mysql_query($x1);
//tampilkan data dalam bentuk array di tabel
$jumlah=mysql_num_rows($hitung);
?>
              <tr>
                <td colspan="4"><div align="center"><strong>Jumlah Guru saat ini adalah</strong> </div></td>
                <td colspan="2" align="center"><div align="center"><b><? echo $jumlah; ?> orang</b></div></td>
              </tr>
            </table>            
            <p>&nbsp;</p>
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
