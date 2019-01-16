<?php 
  // variable scope / ruang lingkup variable

  $s="Adri";
  function tampil(){
    //variable global
    global $s; // fungsi mencari variabel $s diluar function dan menjadikan $s menjadi global variabel
    echo $s;
  }

  tampil();

  // Variable Superglobals
  // $_GET
  // $_POST
  // $_REQUEST
  // $_SESSION
  // $_COOKIE
  // $_SERVER
  // atau variable yang ditulis dengan awalan underscore _ dan ditulis dengan huruf capital

  echo "<br>";
  $_GET["nama"] = "Andri Ilham";
  $_GET["NPM"] = "1234";
  // var_dump($_GET);
  foreach ($_GET as $a) {
    echo $a."<br>";
  }

?>