<?
session_start();
//koneksi database
include "../include/koneksi.php";
if (isset($_SESSION['level']) && isset($_SESSION['username']))
{
   if ($_SESSION['level'] == "admin")
   {
?>
<style type="text/css">
<!--
body {
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
        <td valign="top"><h2 align="center">Selamat Datang di Admin Area  </h2>
          <hr />
          <p align="justify"><img src="../images/foto/foto6.jpg" width="105" height="142" align="left" />Siakad v.1.0  ini merupakan sebuah aplikasi berbasis web yang dikembangkan oleh M. Multazam, S.Kom. Website sekolah ini dibuat dengan tujuan untuk mengelola data akademik sekolah, khususnya pengelolaan data nilai (raport) bagi siswa.</p>
          <p align="justify">Dalam website ini terdapat proses pengolahan data nilai dimulai dari data siswa, data mata pelajaran, data guru, mahasiswa yang mengambil mata pelajaran tertentu, proses penilaian dan proses pencetakan raport. Beberapa proses pengolahan data dalam sistem informasi sederhana ini adalah:</p>
          <ul>
            <li>Data Siswa</li>
            <li>Data Mata Pelajaran</li>
            <li>Data Guru</li>
            <li>Pengambilan Mata Pelajaran </li>
            <li>Proses Penilaian</li>
            <li>Raport Siswa</li>
            </ul>
          <p>Untuk semua pengolahan tersebut, silahkan klik menu disamping. </p>
          <p align="justify">Semoga Bermanfaat bagi para pemula dan  mahasiswa di seluruh Indonesia yang sedang belajar PHP MySQL untuk tugas akhir (Skripsi S1/Laporan D3), khususnya mahasiswaku di Amikom Mataram. Web sistem informasi ini masih sangat sederhana dan masih banyak membutuhkan penyempurnaan sehingga hasil pengembangan dan komentar silahkan dikirim ke email multazam85@gmail.com.</p>
          <p>Developer,</p>
          <p>&nbsp;</p>
          <p><strong>M. Multazam, S.Kom</strong><br />
            website : <a href="http://www.pijaronline.com" target="_blank">http://www.pijaronline.com</a><br /> dan 
            <a href="http://www.belajarilmukomputer.com" target="_blank">http://www.belajarilmukomputer.com</a></p>
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