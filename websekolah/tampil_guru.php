<?
//koneksi database
include "include/koneksi.php";
//Ambil nilai yang akan di edit
if (isset($_GET['nip'])) {
	$nip = $_GET['nip'];
} 

//tampilkan data sebelum di edit
$sql2="select * from tblguru where nip='$nip';";
$tampil=mysql_query($sql2);
$baris=mysql_fetch_array($tampil);
$nip=$baris['nip'];
$nama_guru=$baris['nama_guru'];
$tempat_lahir=$baris['tempat_lahir'];
$tgl_lahir=$baris['tgl_lahir'];
$alamat=$baris['alamat'];
$golongan=$baris['golongan'];
$jabatan=$baris['jabatan'];
$hp=$baris['hp'];
$jenis_kelamin=$baris['jenis_kelamin'];
$agama=$baris['agama'];
$foto=$baris['foto'];

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
    <td width="103" align="center" valign="top" bgcolor="#FFCC33"><p>&nbsp; </p>
        <p>
          <? include "menu.php"; ?>
        </p></td>
    <td width="515" valign="top"><h2 align="center"><strong>Data Guru </strong></h2>
        <hr />
        <table width="510" border="0" align="center">
          <tr>
            <td valign="top"><table width="496" border="0" cellspacing="0" cellpadding="1">
                <tr>
                  <td width="152">Nomor Induk Pegawai </td>
                  <td width="178">:
                    <?=$nip?></td>
                  <td width="160" rowspan="10"><div align="center">
                    <? 
				echo "<img src='images/foto/$foto' width=150 height=180> <br />";
				?>
                  </div></td>
                </tr>
                <tr>
                  <td>Nama Guru </td>
                  <td>:
                    <?=$nama_guru?></td>
                </tr>
                <tr>
                  <td>Tempat Lahir </td>
                  <td>:
                    <?=$tempat_lahir?></td>
                </tr>
                <tr>
                  <td>Tanggal Lahir </td>
                  <td>:
                    <?=$tgl_lahir?></td>
                </tr>
                <tr>
                  <td>Alamat</td>
                  <td>:
                    <?=$alamat?></td>
                </tr>
                <tr>
                  <td>Golongan</td>
                  <td>:
                    <?=$golongan?></td>
                </tr>
                <tr>
                  <td>Jabatan</td>
                  <td>:
                    <?=$jabatan?></td>
                </tr>
                <tr>
                  <td>Hp</td>
                  <td>:
                    <?=$hp?></td>
                </tr>
                <tr>
                  <td>Jenis Kelamin </td>
                  <td>:
				  	<?=$jenis_kelamin?></td>
                </tr>
                <tr>
                  <td>Agama</td>
                  <td>:
				  	<?=$agama?></td>
                </tr>
                
              </table>
                <hr />
                <p align="center"><a href="data_guru.php">Kembali</a></p>
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
</body>


</html>
