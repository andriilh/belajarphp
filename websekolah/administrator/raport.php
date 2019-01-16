<?
session_start();
//koneksi database
include "../include/koneksi.php";


if (isset($_SESSION['level']) && isset($_SESSION['username']))
{
   if ($_SESSION['level'] == "admin")
   {
   
if(isset($_POST['cari'])) {
$cnis=$_POST['cnis'];
$carix = "select * from tblsiswa where nis='$cnis'"; 
$cari=mysql_query($carix);
if($cari){
header("location:cetak_raport.php?nis=$cnis");
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
        <td valign="top"><h2 align="center"><strong>Data Siswa SMA 1 Masbagik </strong></h2>
          <hr>
          <form id="form2" name="form2" method="post" action="">
			  <table width="210" border="0" align="center" cellpadding="1" cellspacing="0">
                <tr>
                  <td width="50"><div align="center"><img src="../images/icon/search.gif" width="50" height="50" /></div></td>
                  <td width="180"><input name="cnis" type="text" id="cnis" size="10" />
                      <input name="cari" type="submit" id="cari" value="Cari" /></td>
                </tr>
              </table>
            </form>
			<table width="505" border="1" align="center" cellpadding="1" cellspacing="0">
              <tr>
                <td width="73"><div align="center"><strong>NIS</strong></div></td>
                <td width="161"><div align="center"><strong>Nama Siswa</strong></div></td>
				<td width="76"><div align="center"><strong>Jenis Kelamin</strong></div></td>
                <td width="70"><div align="center"><strong>Semester</strong></div></td>
                <td width="54"><div align="center"><strong>Kelas</strong></div></td>
                <td width="54"><div align="center"><strong>Cetak</strong></div></td>
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
                <td><? echo $data['semester']; ?></td>
                <td><div align="center"><? echo $data['kelas']; ?></div></td>
                <td><div align="center"><a href="cetak_raport.php?nis=<? echo $data['nis'];?>" target="_blank"><img src="../images/icon/printer.png" width="24" height="24" border="0" /></a></div></td>
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
                <td colspan="4"><div align="justify"><strong>Jumlah siswa saat ini adalah</strong> </div></td>
                <td colspan="2" align="center"><div align="center"><b><? echo $jumlah; ?> orang</b></div></td>
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