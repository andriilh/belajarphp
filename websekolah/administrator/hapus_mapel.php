<?
//koneksi database
include "../include/koneksi.php";

if (isset($_GET['kdmapel'])) {
	$kdmapel = $_GET['kdmapel'];
} else {
	die ("Error. Kode mata pelajaran belum dipilih! ");	
}


if (!empty($kdmapel) && $kdmapel != "") {
$SQL = "delete from tblmapel where kdmapel='$kdmapel'"; 
 if(! mysql_query($SQL)) 
  { 
    echo "Data tidak terhapus!<br>\n"; 
   } 
    header("location:mapel.php");
   } 
   
?>
