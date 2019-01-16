<?php
 
// memulai session
session_start();
 
include "../include/koneksi.php";
if(isset($_POST['Submit'])){
$username = $_POST['username'];
$password = $_POST['pass'];
if(empty($username)){
echo "<script type='text/javascript'>
onload =function(){
alert('Username belum diisi');
}
</script>";
}
elseif(empty($password)){
echo "<script type='text/javascript'>
onload =function(){
alert('Password belum diisi');
}
</script>";
} else {
// query untuk mendapatkan record dari username
$query = "SELECT * FROM user WHERE username = '$username'";
$hasil = mysql_query($query);
$data = mysql_fetch_array($hasil);
 
// cek kesesuaian password
if ($password == $data['password'])
{
    header("location:home.php");
 
    // menyimpan username dan level ke dalam session
    $_SESSION['level'] = $data['level'];
    $_SESSION['username'] = $data['username'];
  
}
echo "<script type='text/javascript'>
onload =function(){
alert('Username atau password salah!! Ulangi kembali');
}
</script>";
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
        <td valign="top"><h2 align="center">&nbsp;</h2>
          <h2 align="center"><strong>Login Administrator </strong> </h2>
          <p align="center"><img src="../images/icon/Action-lock-icon.png" width="128" height="128" />
		  <form method="post" action="">
  <table width="289" border="0" align="center">
    <tr>
      <td>Username </td>
      <td><input name="username" type="text"></td>
    </tr>
    <tr>
      <td>Password </td>
      <td><input name="pass" type="password"></td>
    </tr>
    <tr>
      <td>&nbsp;</td>
      <td><input type="submit" name="Submit" value="MASUK"></td>
    </tr>
  </table>
</form>
		  
		  </p>
          <p>&nbsp;</p>
          <div align="center"><a href="../index.php">Back to Home</a> </div></td>
      </tr>
       <tr>
         <td valign="top" bgcolor="#FFCC33"><p>&nbsp;</p>
           <p>
             <? include "footer.php"; ?>
           </p>
         <p>&nbsp; </p></td>
       </tr>
    </table>