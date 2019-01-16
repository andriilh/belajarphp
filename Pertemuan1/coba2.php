<?php
  function Luas($s){
    $luas = $s*$s;
    return $luas;
  }
  function Keliling($s){
    $kl = $s*$s*$s;
    return $kl;
  }
  echo "Luas dari Persegi dengan panjang sisi 2cm adalah ".Luas(2)."cm<br>";
  echo "Keliling dari Persegi dengan panjang sisi 2cm adalah ".Keliling(2)."cm<br><br>"; 

  function lbunder($r){
    $luasb = pi()*pow($r,2);
    $luasb = number_format($luasb,2);
    return $luasb;
  }
  function kbunder($r){
    $kel = pi()*(2*$r);
    $kel = number_format($kel,2);
    return $kel;
  }
  echo "Luas Lingkaran dengan Radius 5cm adalah ".lbunder(5)."cm<br>";
  echo "Keliling Lingkaran dengan Radius 4cm adalah ".kbunder(4)."cm<br><br>";

  function lbola($r){
    $luas = pi()*pow($r,2);
    $luas = number_format($luas,2);
    return $luas;
  }
  echo lbola(4)."<br>";


  function vbola($r){
    $kl = (4/3)*pi()*pow($r,3);
    $kl = number_format($kl,2);
    return $kl;
  }
  echo vbola(4);

  function lptabung($r,$t){
    $lp = (2*pi()*pow($r,2))+(pi()*(2*$r)*$t);
    $lp = number_format($lp,2);
    return $lp;
  }
  echo "<br><br><b>Luas Permukaasn Tabung</b>";
  echo "<br>".lptabung(2,3)."<br>";
  
  function vkerucut($r,$t){
    $vk = (1/3)*(22/7)*$r*$r*$t;
    $vk = number_format($vk,2);
    return $vk;
  }
  echo vkerucut(21,35);

  function gjgp($angka){
    if ($angka%2>0) {
      echo "Ganjil";
    } else {
      echo "Genap";
    }
  }
  echo "<br><br><br>";
  echo gjgp(32);

  
?>