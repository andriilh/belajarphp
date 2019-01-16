<?
session_start();
//koneksi database
include "../include/koneksi.php";


if (isset($_SESSION['level']) && isset($_SESSION['username']))
{
   if ($_SESSION['level'] == "admin")
   {
 
//deklarasi fariabel dari form
$nip=$_POST['nip'];
$nama_guru=$_POST['nama_guru'];
$tempat_lahir=$_POST['tempat_lahir'];
$tgl_lahir=$_POST['thn']."-".$_POST['bln']."-".$_POST['tgl'];
$alamat=$_POST['alamat'];
$jabatan=$_POST['jabatan'];
$golongan=$_POST['golongan'];
$semester=$_POST['jabatan'];
$hp=$_POST['hp'];
$jenis_kelamin=$_POST['jenis_kelamin'];
$agama=$_POST['agama'];
$foto= $_FILES['foto']['name'];
//upload foto
if (strlen($foto)>0) {
		//upload
		if (is_uploaded_file($_FILES['foto']['tmp_name'])) {
			move_uploaded_file ($_FILES['foto']['tmp_name'], "../images/foto/".$foto);
			}
	}
//apabila klik simpan
if(isset($_POST['simpan'])){
if(empty($nip)){
echo "<script type='text/javascript'>
onload =function(){
alert('Nomor induk pegawai belum diisi');
}
</script>";
}else{
$sql="insert into tblguru(nip,nama_guru,tempat_lahir,tgl_lahir,alamat,golongan,jabatan,hp,jenis_kelamin,agama,foto) 
values('$nip','$nama_guru','$tempat_lahir','$tgl_lahir','$alamat','$golongan','$jabatan','$hp','$jenis_kelamin','$agama','$foto')";
$simpan=mysql_query($sql);
//bila berhasil simpan kembali ke home
if ($simpan) {
header("location:guru.php");
	} 
    else 
    { 
	
	echo "<script type='text/javascript'>
onload =function(){
alert('Data gagal disimpan!');
}
</script>";
    } 
}
}
//proses editing
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
list($thn,$bln,$tgl) = explode("-",$baris['tgl_lahir']);
$alamat=$baris['alamat'];
$golongan=$baris['golongan'];
$jabatan=$baris['jabatan'];
$hp=$baris['hp'];
$jenis_kelamin=$baris['jenis_kelamin'];
$agama=$baris['agama'];
$foto=$baris['foto'];

//apabila klik tombol edit
if(isset($_POST['Edit'])) {
	$nama_guru= $_POST['nama_guru'];
	$tempat_lahir= $_POST['tempat_lahir'];
	$tgl_lahir= $_POST['thn']."-".$_POST['bln']."-".$_POST['tgl'];
	$alamat= $_POST['alamat'];
	$golongan= $_POST['golongan'];
	$jabatan= $_POST['jabatan'];
	$hp= $_POST['hp'];
	$jenis_kelamin= $_POST['jenis_kelamin'];
	$agama= $_POST['agama'];
	$foto= $_FILES['foto']['name'];
	if (strlen($foto)>0) {
		//upload
		if (is_uploaded_file($_FILES['foto']['tmp_name'])) {
			move_uploaded_file ($_FILES['foto']['tmp_name'], "../images/foto/".$foto);
			}
			mysql_query ("UPDATE tblguru SET foto='$foto' WHERE nip='$nip'");
	}
	
$SQL = "UPDATE tblguru SET 	nama_guru='$nama_guru',tempat_lahir='$tempat_lahir',tgl_lahir='$tgl_lahir',alamat='$alamat',golongan='$golongan',jabatan='$jabatan',hp='$hp',jenis_kelamin='$jenis_kelamin',agama='$agama' where nip='$nip'"; 
  	$hasil= mysql_query($SQL); 
	//jika berhasil kembali ke home
  	if($hasil){
    header("location:guru.php");
	} 
    else 
    { 
	echo "<script type='text/javascript'>
onload =function(){
alert('Update error!');
}
</script>";
    } 
} 

//apabila klik hapus
if(isset($_POST['Hapus'])) {
if (!empty($nip) && $nip != "") {
$SQL = "delete from tblguru where nip='$nip'"; 
 if(mysql_query($SQL)) 
  { 
    header("location:guru.php");
	} else {
	echo "Data berhasil dihapus";
   } 
   }
   }
   
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
        <td valign="top"><h2 align="center"><strong>Data Guru </strong></h2>
          <hr>
          <form action="" method="post" enctype="multipart/form-data" name="form1">
            <table width="477" border="0" align="center">
              <tr>
                <td width="137">Nomor Induk Pegawai </td>
                <td width="354"><label><? if(!$_GET['nip']){
				echo "<input name='nip' type='text' id='nip'>";
				} else {
				echo "<b>$nip</b>";
				}
				?>
                </label></td>
              </tr>
              <tr>
                <td>Nama Guru </td>
                <td><label>
                  <input name="nama_guru" type="text" id="nama_guru" size="40" value="<?=$nama_guru?>">
                </label></td>
              </tr>
              <tr>
                <td>Tempat Lahir </td>
                <td><label>
                  <input name="tempat_lahir" type="text" id="tempat_lahir" size="40" value="<?=$tempat_lahir?>">
                </label></td>
              </tr>
              <tr>
                <td>Tanggal Lahir </td>
                <td>
                <select name="tgl" id="tgl">
				<?
					for ($i=1; $i<=31; $i++) {
						$tg = ($i<10) ? "0$i" : $i;
						$sele = ($tg==$tgl)? "selected" : "";
						echo "<option value='$tg' $sele>$tg</option>";	
					}
				?>
                </select>
                -
                <select name="bln" id="bln">
				<?
					for ($i=1; $i<=12; $i++) {
						$bl = ($i<10) ? "0$i" : $i;
						$sele = ($bl==$bln)?"selected" : "";
						echo "<option value='$bl' $sele>$bl</option>";	
					}
				?>
                </select>
                -
                <select name="thn" id="thn">
				<?
					for ($i=1970; $i<=2000; $i++) {
						$sele = ($i==$thn)?"selected" : "";
						echo "<option value='$i' $sele>$i</option>";	
					}
				?>
                </select>
                </td>
              </tr>
              <tr>
                <td>Alamat</td>
                <td><label>
                  <textarea name="alamat" cols="40" rows="4" id="alamat" value=""><?=$alamat?></textarea>
                </label></td>
              </tr>
              <tr>
                <td>Golongan</td>
                <td><label>
                  <select name="golongan" id="golongan" value="<?=$golongan?>">
                    <option>2A</option>
                    <option>2B</option>
                    <option>2C</option>
                    <option>3A</option>
                    <option>3B</option>
                    <option>3C</option>
                    <option>4A</option>
                    <option>4B</option>
                  </select>
                </label></td>
              </tr>
              <tr>
                <td>Jabatan</td>
                <td><label>
                  <select name="jabatan" id="jabatan" value="<?=$jabatan?>">
                    <option>Kepala Sekolah</option>
                    <option>Wakil Kepala Sekolah</option>
                    <option>Guru</option>
                    <option>Tata Usaha</option>
                  </select>
                </label></td>
              </tr>
			  <tr>
                <td>No Hp</td>
                <td><label>
                  <input name="hp" type="text" id="hp" size="40" value="<?=$hp?>">
                </label></td>
              </tr>
              <tr>
                <td>Jenis Kelamin </td>
                <td><p>
                  <label>
                    <input name="jenis_kelamin" type="radio" value="Laki-Laki" checked>
                    Laki-Laki</label>
                  <br>
                  <label>
                    <input type="radio" name="jenis_kelamin" value="Perempuan">
                    Perempuan</label>
                </p></td>
              </tr>
              <tr>
                <td>Agama</td>
                <td><label>
                  <select name="agama" id="agama" value="<?=$agama?>">
                    <option>Islam</option>
                    <option>Kristen</option>
                    <option>Hindu</option>
                    <option>Budha</option>
                    <option>Katolik</option>
                  </select>
                </label></td>
              </tr>
              <tr>
                <td>Foto</td>
                <td>
				<label>
				<? if($_GET['nip']){
				//tampilkan foto saat mau ngedit
				 echo "<img src='../images/foto/$foto' width=150 height=180> <br />";
				} 
				?>
                  <input name="foto" type="file" id="foto" /> 
                  </label>				</td>
              </tr>
              <tr>
                <td>&nbsp;</td>
                <td><label>
                  <? if(!$_GET['nip']){
		//bila mau tambah data yang tampil tombol simpan
		echo "<input name=\"simpan\" type=\"submit\" id=\"simpan\" value=\"Simpan\" />";
        } else {
		//Apabila mau edit yg tampil tombol edit dan hapus
		echo "<input name=\"Edit\" type=\"submit\" id=\"edit\" value=\"Edit\" />";
		echo "<input name=\"Hapus\" type=\"submit\" id=\"hapus\" value=\"Hapus\" />";
        } ?>
                </label></td>
              </tr>
            </table>
			<hr />
            </form>       
			<p>&nbsp;</p>
			<form id="form2" name="form2" method="post" action="">
			  <table width="210" border="0" align="center" cellpadding="1" cellspacing="0">
                <tr>
                  <td width="50"><div align="center"><img src="../images/icon/search.gif" width="50" height="50" /></div></td>
                  <td width="180"><input name="cnip" type="text" id="cnip" size="10" />
                      <input name="cari" type="submit" id="cari" value="Cari" /></td>
                </tr>
              </table>
            </form>
			<table width="529" border="1" align="center" cellpadding="1" cellspacing="0">
              <tr>
                <td width="45"><div align="center"><strong>NIP</strong></div></td>
                <td width="167"><div align="center"><strong>Nama Guru</strong></div></td>
				<td width="76"><div align="center"><strong>Jenis Kelamin</strong></div></td>
                <td width="105"><div align="center"><strong>Jabatan</strong></div></td>
                <td width="44"><div align="center"><strong>Gol.</strong></div></td>
                <td width="66"><div align="center"><strong>Aksi</strong></div></td>
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
                <td><? echo $data['nip']; ?></td>
                <td><? echo $data['nama_guru']; ?></td>
				<td><? echo $data['jenis_kelamin']; ?></td>
                <td><? echo $data['jabatan']; ?></td>
                <td><? echo $data['golongan']; ?></td>
                <td><div align="center"><a href="guru.php?nip=<? echo $data['nip'];?>"><img src="../images/icon/button-edit.gif" width="20" height="20" border="0" /></a><a href="javascript:if(confirm('Anda yakin akan menghapus data ini??')){document.location='hapus_guru.php?nip=<? echo $data['nip'];?>';}"><img src="../images/icon/button-cross.gif" width="20" height="20" border="0" /></a></a><a href="tampil_guru.php?nip=<? echo $data['nip'];?>"><img src="../images/icon/button-view.gif" width="20" height="20" border="0" /></a></div></td>
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
                <td colspan="4"><strong>Jumlah Guru saat ini adalah</strong> </td>
                <td colspan="2" align="center"><b><? echo $jumlah; ?> orang</b></td>
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
