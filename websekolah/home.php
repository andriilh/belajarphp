<?
session_start();
//koneksi database
include "include/koneksi.php";
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
			move_uploaded_file ($_FILES['foto']['tmp_name'], "images/foto/".$foto);
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
header("location:home.php");
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
			move_uploaded_file ($_FILES['foto']['tmp_name'], "images/foto/".$foto);
			}
			mysql_query ("UPDATE tblsiswa SET foto='$foto' WHERE nis='$nis'");
	}
	
$SQL = "UPDATE tblsiswa SET 	nama_siswa='$nama_siswa',tempat_lahir='$tempat_lahir',tgl_lahir='$tgl_lahir',alamat='$alamat',kelas='$kelas',semester='$semester',jenis_kelamin='$jenis_kelamin',agama='$agama' where nis='$nis'"; 
  	$hasil= mysql_query($SQL); 
	//jika berhasil kembali ke home
  	if($hasil){
    header("location:home.php");
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
    header("location:home.php");
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
	background-image: url(images/foto/images14.jpg);
}
.style1 {color: #0000FF}
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
        <td valign="top"><h2 align="center">Pengantar Developer </h2>
          <p align="center"><strong>Sistem Informasi Akademik (<span class="style1">Siakad v.1.0</span>)</strong></p>
          <hr />
          <p align="justify"><img src="images/foto/foto6.jpg" width="100" height="142" align="left" />Siakad v.1.0  ini merupakan sebuah aplikasi berbasis web yang dikembangkan oleh M. Multazam, S.Kom. Website sekolah ini dibuat dengan tujuan untuk mengelola data akademik sekolah, khususnya pengelolaan data nilai (raport) bagi siswa.</p>
          <p align="justify">Dalam website ini terdapat proses pengolahan data nilai dimulai dari data siswa, data mata pelajaran, data guru, mahasiswa yang mengambil mata pelajaran tertentu, proses penilaian dan proses pencetakan raport. Beberapa proses pengolahan data dalam sistem informasi sederhana ini adalah:</p>
          <ul>
            <li>Data Siswa</li>
            <li>Data Mata Pelajaran</li>
            <li>Data Guru</li>
            <li>Pengambilan Mata Pelajaran </li>
            <li>Proses Penilaian</li>
            <li>Raport Siswa</li>
          </ul>
          <p align="justify">Semoga Bermanfaat bagi para pemula dan  mahasiswa di seluruh Indonesia yang sedang belajar PHP MySQL untuk tugas akhir (Skripsi S1/Laporan D3), khususnya mahasiswaku di Amikom Mataram. Web sistem informasi ini masih sangat sederhana dan masih banyak membutuhkan penyempurnaan sehingga hasil pengembangan dan komentar silahkan dikirim ke email multazam85@gmail.com.</p>
          <p>Developer,</p>
          <p>&nbsp;</p>
          <p><strong>M. Multazam, S.Kom</strong><br />
            website : <a href="http://www.pijaronline.com" target="_blank">http://www.pijaronline.com</a><br />
            dan <a href="http://www.belajarilmukomputer.com" target="_blank">http://www.belajarilmukomputer.com</a></p>
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
