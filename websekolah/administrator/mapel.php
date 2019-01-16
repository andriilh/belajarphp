<?
session_start();
//koneksi database
include "../include/koneksi.php";
if (isset($_SESSION['level']) && isset($_SESSION['username']))
{
   if ($_SESSION['level'] == "admin")
   {
//Apabila klik tombol simpan
if(isset($_POST['simpan'])){
//Deklarasi variabel
$kdmapel=$_POST['kdmapel'];
$nama_mapel=$_POST['nama_mapel'];
$kkm=$_POST['kkm'];
//Apabila kode mata pelajaran belum diisi
	if(empty($kdmapel)){
	echo "<script type='text/javascript'>
	onload =function(){
	alert('Kode mapelnya diisi dong');
	}
	</script>";
	}
//Apabila nama mapel kosong
	elseif(empty($nama_mapel)){
	echo "<script type='text/javascript'>
	onload =function(){
	alert('Nama mapelnya juga dong!!');
	}
	</script>";
	} else 
	{
//Buat query
$sql="insert into tblmapel(id,kdmapel,nama_mapel,kkm)values
('','$kdmapel','$nama_mapel','$kkm')";
//Jalankan querynya
$query=mysql_query($sql);
//Apabila berhasil simpan
	if($query){
	header("location:mapel.php");
	} else {
	echo "<script type='text/javascript'>
	onload =function(){
	alert('Sorry bro, gagal nyimpan!!');
	}
	</script>";
	}
}
}

//Proses edit
//Ambil nilai yang akan di edit
if (isset($_GET['kdmapel'])) {
	$kdmapel = $_GET['kdmapel'];
} 

//tampilkan data sebelum di edit
$sql2="select * from tblmapel where kdmapel='$kdmapel';";
$tampilkan=mysql_query($sql2);
$baris=mysql_fetch_array($tampilkan);
$kdmapel=$baris['kdmapel'];
$nama_mapel=$baris['nama_mapel'];
$kkm=$baris['kkm'];

//apabila klik edit
if(isset($_POST['edit'])) {
//Deklarasi variabel
$nama_mapel=$_POST['nama_mapel'];
$kkm=$_POST['kkm'];
$sql="UPDATE tblmapel SET nama_mapel='$nama_mapel',kkm='$kkm' where kdmapel='$kdmapel'";
$query=mysql_query($sql);
if($query){
    header("location:mapel.php");
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
if(isset($_POST['hapus'])) {
if (!empty($kdmapel) && $kdmapel != "") {
$SQL = "delete from tblmapel where kdmapel='$kdmapel'"; 
 if(mysql_query($SQL)) 
  { 
    header("location:mapel.php");
	} else {
	echo "Data berhasil dihapus";
   } 
   }
   }
   
if(isset($_POST['cari'])) {
$ckdmapel=$_POST['ckdmapel'];
$carix = "select * from tblmapel where kdmapel='$ckdmapel'"; 
$cari=mysql_query($carix);
if($cari){
header("location:tampil_mapel.php?kdmapel=$ckdmapel");
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
    </td>
    <td width="515"><table width="510" border="0" align="center">
      <tr>
        <td valign="top"><h2 align="center">Data Mata Pelajaran</h2><hr />
          <form name="form1" method="post" action="" enctype="multipart/form-data">
            <table width="446" border="0" align="center" cellpadding="1" cellspacing="0">
              <tr>
                <td width="194"><strong>Kode Mata Pelajaran </strong></td>
                <td width="209"><label>
                 <? if(!$_GET['kdmapel']){
				echo "<input name='kdmapel' type='text' id='kdmapel' size='10'>";
				} else {
				echo "<b>$kdmapel</b>";
				}
				?>
                </label></td>
              </tr>
              <tr>
                <td><strong>Nama Mata Pelajaran </strong></td>
                <td><label>
                  <input name="nama_mapel" type="text" id="nama_mapel" size="40"value="<?=$nama_mapel?>" />
                </label></td>
              </tr>
              <tr>
                <td><strong>KKM</strong></td>
                <td><label>
                  <input name="kkm" type="text" id="kkm" size="10" value="<?=$kkm?>"/>
                </label></td>
              </tr>
              <tr>
                <td>&nbsp;</td>
                <td><label>
                 <? if(!$_GET['kdmapel']){
		//bila mau tambah data yang tampil tombol simpan
		echo "<input name=\"simpan\" type=\"submit\" id=\"simpan\" value=\"Simpan\" />";
        } else {
		//Apabila mau edit yg tampil tombol edit dan hapus
		echo "<input name=\"edit\" type=\"submit\" id=\"edit\" value=\"Edit\" />";
		echo "<input name=\"hapus\" type=\"submit\" id=\"hapus\" value=\"Hapus\" />";
        } ?>
                </label></td>
              </tr>
            </table>
            </form>
          <p align="center">
		  <form id="form2" name="form2" method="post" action="">
			  <table width="210" border="0" align="center" cellpadding="1" cellspacing="0">
                <tr>
                  <td width="50"><div align="center"><img src="../images/icon/search.gif" width="50" height="50" /></div></td>
                  <td width="180"><input name="ckdmapel" type="text" id="ckdmapel" size="10" />
                      <input name="cari" type="submit" id="cari" value="Cari" /></td>
                </tr>
              </table>
            </form>
		  
		  &nbsp;</p>
          <table width="463" border="1" align="center" cellpadding="1" cellspacing="0">
            <tr>
              <td width="59"><div align="center"><strong>Kode</strong></div></td>
              <td width="237"><div align="center"><strong>Nama Mata Pelajaran </strong></div></td>
              <td width="54"><div align="center"><strong>KKM</strong></div></td>
              <td width="95"><div align="center"><strong>Aksi</strong></div></td>
            </tr>
			<?
			//Mengambil Nilai dengan query
			$sql="select * from tblmapel";
			//Jalankan querynya
			$query=mysql_query($sql);
			//Tampilkan data dalam array
			while($data=mysql_fetch_array($query))
			{
			?>
            <tr>
              <td><div align="center"><? echo $data['kdmapel']; ?></div></td>
              <td><? echo $data['nama_mapel']; ?></td>
              <td><div align="center"><? echo $data['kkm']; ?></div></td>
              <td><div align="center"><a href="mapel.php?kdmapel=<? echo $data['kdmapel'];?>"><img src="../images/icon/button-edit.gif" width="20" height="20" border="0" /></a><a href="javascript:if(confirm('Anda yakin akan menghapus data ini??')){document.location='hapus_mapel.php?kdmapel=<? echo $data['kdmapel'];?>';}"><img src="../images/icon/button-cross.gif" width="20" height="20" border="0" /></a></a><a href="tampil_mapel.php?kdmapel=<? echo $data['kdmapel'];?>"><img src="../images/icon/button-view.gif" width="20" height="20" border="0" /></a></div></td>
            </tr>
			<? } ?>
            <tr>
			<?
			//Mengambil Nilai dengan query
			$sql="select * from tblmapel";
			//Jalankan querynya
			$query=mysql_query($sql);
			//Menghitung jumlah baris di tabel
			$jumlah=mysql_num_rows($query);
			?>
              <td colspan="3"><div align="justify"><strong>Jumlah Mata Pelajaran </strong></div></td>
              <td><b><? echo $jumlah; ?> Mapel</b></td>
            </tr>
          </table>          
          <p align="center">&nbsp; </p></td>
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