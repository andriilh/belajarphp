<?
session_start();
//koneksi database
include "../include/koneksi.php";


if (isset($_SESSION['level']) && isset($_SESSION['username']))
{
   if ($_SESSION['level'] == "admin")
   {
   
	  $nis=$_GET['nis'];
		  $sql = "select * from tblsiswa where nis='$nis'";
$result = mysql_query($sql);
?>
<html>
<head>
<script language="JavaScript">
var gAutoPrint = true; // Tells whether to automatically call the print function

function printSpecial()
{
if (document.getElementById != null)
{
var html = '<HTML>\n<HEAD>\n';

if (document.getElementsByTagName != null)
{
var headTags = document.getElementsByTagName("head");
if (headTags.length > 0)
html += headTags[0].innerHTML;
}

html += '\n</HE>\n<BODY>\n';

var printReadyElem = document.getElementById("printReady");

if (printReadyElem != null)
{
html += printReadyElem.innerHTML;
}
else
{
alert("Could not find the printReady function");
return;
}

html += '\n</BO>\n</HT>';

var printWin = window.open("","printSpecial");
printWin.document.open();
printWin.document.write(html);
printWin.document.close();
if (gAutoPrint)
printWin.print();
}
else
{
alert("The print ready feature is only available if you are using an browser. Please update your browswer.");
}
}

</script>
</head>
<body>
<p align="center"><a href="javascript:void(printSpecial())"><img src="../images/icon/Printer1.png" width="48" height="48" border="0"></a>
<div id="printReady"></p>
		  <table width="677" border="0" align="center" cellpadding="1" cellspacing="0">
            <tr>
              <td width="130"><div align="center"><img src="../images/foto/logo.jpg" width="100" height="100" /></div></td>
              <td width="543"><h1 align="center">Departemen Pendidikan Nasional</h1>
                <h2 align="center"><strong>SMA Negeri 1 Masbagik</strong></h2>
                  <div align="center"><strong>Jl. Raya Masbagik Pancor No 1 Telp (0376) 321324 </strong></div></td>
            </tr>
            <tr>
              <td colspan="2"><hr /></td>
            </tr>
          </table>
		  <p>&nbsp;</p>
		  <table width="685" border="1" align="center" cellpadding="5" cellspacing="0">
	<?php while($siswa = mysql_fetch_array($result)){?>
	<tr>
	<td width="197"><strong>Nomor Induk Siswa </strong></td>
	<td width="206"><strong>: <?php echo $siswa['nis'];?></strong></td>
	<td width="177" rowspan="5"><div align="center"><strong><img src=../images/foto/<? echo $siswa['foto'];?> width="100" height="120" /></strong></div></td>
	</tr>
	
		
	<tr>
	  <td><strong>Nama Siswa </strong></td>
		<td><strong>: <?php echo $siswa['nama_siswa'];?></strong></td>
		</tr>
		<tr>
		  <td><strong>Kelas</strong></td>
		  <td><strong>: <?php echo $siswa['kelas'];?></strong></td>
		</tr>
		<tr><tr>
		  <td><strong>Semester</strong></td>
		  <td><strong>: <?php echo $siswa['semester'];?></strong></td>
		</tr>
	<tr>
	  <td colspan="5">
			    <p>&nbsp;</p>
			    <p><strong>NILAI SISWA</strong></p>
			    <table width="585" border="0" align="center" cellpadding="5" cellspacing="0">
				<tr>
				  <td width="122" style="border-bottom:1px solid #000;"><div align="center"><strong>Kode</strong></div></td>
				  <td width="312" style="border-bottom:1px solid #000;"><div align="center"><strong>Mata Pelajaran </strong></div></td>
				  <td width="55" style="border-bottom:1px solid #000;"><div align="center"><strong>KKM</strong></div></td>
					<td width="56" style="border-bottom:1px solid #000;"><div align="center"><strong>Nilai</strong></div></td>
				  </tr>
				
				<?
				$rowset = mysql_query("select * from tblnilai m inner join 
				tblmapel m1 on m.idmapel=m1.id where nis='".$siswa['nis']."'");
				$i=1;
				while($mp = mysql_fetch_array($rowset)){
				?>
				<tr>
					<td style="border-bottom:1px solid #000;border-right:1px solid #000"><div align="center"><?php echo $mp['kdmapel'];?></div></td>
					<td style="border-bottom:1px solid #000;"><?php echo $mp['nama_mapel'];?></td>
					<td style="border-bottom:1px solid #000;"><div align="center"><?php echo $mp['kkm'];?></div></td>
					<td style="border-bottom:1px solid #000;"><div align="center"><?php echo $mp['nilai'];?></div></td>
										  <?php 
					   }?>
			      </tr>
 	  </table>				  
      <p>&nbsp;</p></td>
	</tr>
	<?php }?>
</table>
		  
          <p>&nbsp;</p>
          <table width="671" border="0" align="center" cellpadding="2" cellspacing="0">
            <tr>
              <td width="312"><div align="center">
                <p><strong>Masbagik, 1 Januari 2012 <br />Wali Kelas</strong></p>
              </div></td>
              <td width="289"><div align="center">
                <p>&nbsp;</p>
                <p><strong>Wali Murid </strong></p>
              </div></td>
            </tr>
            <tr>
              <td><p>&nbsp;</p>
              <p align="center"><strong>M. Multazam, S.Kom<br />NIP. 12323456 </strong></p></td>
              <td><p>&nbsp;</p>
              <p>&nbsp;</p>
              <p align="center"><strong>___________________________</strong></p></td>
            </tr>
          </table>
          <p align="center">&nbsp;</p>
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