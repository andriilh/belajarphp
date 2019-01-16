<?php
 
// memulai session
session_start();
 
include "../include/koneksi.php";
if(isset($_POST['Submit'])){
$username = $_POST['username'];
$password = $_POST['pass'];
 
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
else echo "<h2>Login gagal</h2>";
}
?>
<form method="post" action="">
  <table border="0">
    <tr>
      <td>Masukkan Username </td>
      <td><input name="username" type="text"></td>
    </tr>
    <tr>
      <td>Masukkan Password </td>
      <td><input name="pass" type="password"></td>
    </tr>
    <tr>
      <td>&nbsp;</td>
      <td><input type="submit" name="Submit" value="Submit"></td>
    </tr>
  </table>
</form>