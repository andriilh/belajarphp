<?
//koneksi database
include "../include/koneksi.php";

if (isset($_GET['nis'])) {
	$nis = $_GET['nis'];
} else {
	die ("Error. Nomor Induk Siswa belum dipilih! ");	
}


if (!empty($nis) && $nis != "") {
$SQL = "delete from tblsiswa where nis='$nis'"; 
 if(! mysql_query($SQL)) 
  { 
    echo "Data tidak terhapus!<br>\n"; 
   } 
    header("location:siswa.php");
   } 
   
?>
