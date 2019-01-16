<?
//koneksi database
include "../include/koneksi.php";
if (isset($_GET['nip'])) {
	$nip = $_GET['nip'];
} else {
	die ("Error. Nomor Induk Pegawai belum dipilih! ");	
}


if (!empty($nip) && $nip != "") {
$SQL = "delete from tblguru where nip='$nip'"; 
 if(! mysql_query($SQL)) 
  { 
    echo "Data tidak terhapus!<br>\n"; 
   } 
    header("location:guru.php");
   } 
   
?>
