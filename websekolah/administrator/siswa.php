<?
session_start();
//koneksi database
include "../include/koneksi.php";


if (isset($_SESSION['level']) && isset($_SESSION['username']))
{
   if ($_SESSION['level'] == "admin")
   {
 
//deklarasi fariabel dari form
$nis=$_POST['nis'];
$nama_siswa=$_POST['nama_siswa'];
$tempat_lahir=$_POST['tempat_lahir'];
$tgl_lahir=$_POST['thn']."-".$_POST['bln']."-".$_POST['tgl'];
$alamat=$_POST['alamat'];
$kelas=$_POST['kelas'];
$semester=$_POST['semester'];
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
if(empty($nis)){
echo "<script type='text/javascript'>
onload =function(){
alert('Nomor induk siswa belum diisi');
}
</script>";
}else{
$sql="insert into tblsiswa(nis,nama_siswa,tempat_lahir,tgl_lahir,alamat,kelas,semester,jenis_kelamin,agama,foto) 
values('$nis','$nama_siswa','$tempat_lahir','$tgl_lahir','$alamat','$kelas','$semester','$jenis_kelamin','$agama','$foto')";
$simpan=mysql_query($sql);
//bila berhasil simpan kembali ke home
if ($simpan) {
header("location:siswa.php");
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
if (isset($_GET['nis'])) {
	$nis = $_GET['nis'];
} 

//tampilkan data sebelum di edit
$sql2="select * from tblsiswa where nis='$nis';";
$tampil=mysql_query($sql2);
$baris=mysql_fetch_array($tampil);
$nis=$baris['nis'];
$nama_siswa=$baris['nama_siswa'];
$tempat_lahir=$baris['tempat_lahir'];
list($thn,$bln,$tgl) = explode("-",$baris['tgl_lahir']);
$alamat=$baris['alamat'];
$kelas=$baris['kelas'];
$semester=$baris['semester'];
$jenis_kelamin=$baris['jenis_kelamin'];
$agama=$baris['agama'];
$foto=$baris['foto'];

//apabila klik tombol edit
if(isset($_POST['Edit'])) {
	$nama_siswa= $_POST['nama_siswa'];
	$tempat_lahir= $_POST['tempat_lahir'];
	$tgl_lahir= $_POST['thn']."-".$_POST['bln']."-".$_POST['tgl'];
	$alamat= $_POST['alamat'];
	$kelas= $_POST['kelas'];
	$semester= $_POST['semester'];
	$jenis_kelamin= $_POST['jenis_kelamin'];
	$agama= $_POST['agama'];
	$foto= $_FILES['foto']['name'];
	if (strlen($foto)>0) {
		//upload
		if (is_uploaded_file($_FILES['foto']['tmp_name'])) {
			move_uploaded_file ($_FILES['foto']['tmp_name'], "../images/foto/".$foto);
			}
			mysql_query ("UPDATE tblsiswa SET foto='$foto' WHERE nis='$nis'");
	}
	
$SQL = "UPDATE tblsiswa SET 	nama_siswa='$nama_siswa',tempat_lahir='$tempat_lahir',tgl_lahir='$tgl_lahir',alamat='$alamat',kelas='$kelas',semester='$semester',jenis_kelamin='$jenis_kelamin',agama='$agama' where nis='$nis'"; 
  	$hasil= mysql_query($SQL); 
	//jika berhasil kembali ke home
  	if($hasil){
    header("location:siswa.php");
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
if (!empty($nis) && $nis != "") {
$SQL = "delete from tblsiswa where nis='$nis'"; 
 if(mysql_query($SQL)) 
  { 
    header("location:siswa.php");
	} else {
	echo "Data berhasil dihapus";
   } 
   }
   }
   
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
          <form action="" method="post" enctype="multipart/form-data" name="form1">
            <table width="477" border="0" align="center">
              <tr>
                <td width="137">Nomor Induk Siswa </td>
                <td width="354"><label><? if(!$_GET['nis']){
				echo "<input name='nis' type='text' id='nis'>";
				} else {
				echo "<b>$nis</b>";
				}
				?>
                </label></td>
              </tr>
              <tr>
                <td>Nama Siswa </td>
                <td><label>
                  <input name="nama_siswa" type="text" id="nama_siswa" size="40" value="<?=$nama_siswa?>">
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
					for ($i=1970; $i<=2010; $i++) {
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
                <td>Kelas</td>
                <td><label>
                  <select name="kelas" id="kelas" value="<?=$kelas?>">
                    <option>X</option>
                    <option>XI</option>
                    <option>XII</option>
                  </select>
                </label></td>
              </tr>
              <tr>
                <td>Semester</td>
                <td><label>
                  <select name="semester" id="semester" value="<?=$semester?>">
                    <option>1</option>
                    <option>2</option>
                  </select>
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
				<? if($_GET['nis']){
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
                  <? if(!$_GET['nis']){
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
			<form id="form2" name="form2" method="post" action="">
			  <table width="210" border="0" align="center" cellpadding="1" cellspacing="0">
                <tr>
                  <td width="50"><div align="center"><img src="../images/icon/search.gif" width="50" height="50" /></div></td>
                  <td width="180"><input name="cnis" type="text" id="cnis" size="10" />
                      <input name="cari" type="submit" id="cari" value="Cari" /></td>
                </tr>
              </table>
            </form>
			<table width="508" border="1" align="center" cellpadding="1" cellspacing="0">
              <tr>
                <td width="71"><div align="center"><strong>NIS</strong></div></td>
                <td width="181"><div align="center"><strong>Nama Siswa</strong></div></td>
				<td width="65"><div align="center"><strong>Jenis Kelamin</strong></div></td>
                <td width="63"><div align="center"><strong>Semester</strong></div></td>
                <td width="41"><div align="center"><strong>Kelas</strong></div></td>
                <td width="61"><div align="center"><strong>Aksi</strong></div></td>
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
                <td><div align="center"><a href="siswa.php?nis=<? echo $data['nis'];?>"><img src="../images/icon/button-edit.gif" width="20" height="20" border="0" /></a><a href="javascript:if(confirm('Anda yakin akan menghapus data ini??')){document.location='hapus_siswa.php?nis=<? echo $data['nis'];?>';}"><img src="../images/icon/button-cross.gif" width="20" height="20" border="0" /></a></a><a href="tampil_siswa.php?nis=<? echo $data['nis'];?>"><img src="../images/icon/button-view.gif" width="20" height="20" border="0" /></a></div></td>
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
                <td colspan="4"><div align="left"><strong>Jumlah siswa saat ini adalah</strong> </div></td>
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
