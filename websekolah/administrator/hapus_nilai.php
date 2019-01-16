<?
//koneksi database
include "../include/koneksi.php";

if (isset($_GET['nis'])) {
	$nis = $_GET['nis'];
} else {
	die ("Error. Nomor Induk Siswa belum dipilih! ");	
}

$idmapel=$_GET['idmapel'];
$SQL = "delete from tblnilai where nis='$nis' and idmapel='$idmapel'"; 
 if(! mysql_query($SQL)) 
  { 
    echo "Data tidak terhapus!<br>\n"; 
   } 
    header("location:nilai.php?nis=$nis");
   
?>
