<?php 
  // Array
  // Merupakan Variable yang memiliki banyak nilai.
  // Elemen pada Array boleh memiliki tipe data yang berbeda
  // Pasangan antara key dan value
  // Key-nya adalah index, yang dimulai dari 0
  
  $bulan = ["January","February","Maret"];
  $k = array_rand($bulan);
  $rand = $bulan[$k];
  
  echo $rand;

  // Mendambahkan elemen baru pada array
  // $bulan[]="April";
  // var_dump($bulan);
?>