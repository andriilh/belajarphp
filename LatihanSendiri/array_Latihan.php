<!DOCTYPE html>
<html>
<head>
  <title>Angka</title>
  <style>
    .kg {
      width: 400px;
      height : 400px;
      position: absolute;
      top: 50%;
      left: 50%;
      transform: translate(-50%, -50%);
      padding: 20px;
      background: #333;
      box-sizing: border-box;
      box-shadow: 0 20px 50px rgba(0, 0, 0, .5);
    }
    .kotak{
      top: 50%;
      left: 50%;
      width:50px;
      height:30px;
      background-color:salmon;
      -align:center;
      line-height:30px;
      margin:3px;
      float: ;
      transition:0.8s;
    }
    .hari{
      width:50px;
      height:30px;
      background-color:#0fffb7; 
      -align:center;
      line-height:30px;
      margin:3px;
      float:left;
      transition:0.5s;
    }
    .kotak:hover{
      /* border-radius:30%'' */
      background-color:#caf994f2;
      width:60px;
      height:40px;
      line-height:40px;
    }
    .clear{
      clear: both;
    }
    /* .tengah{
      position: absolute;
      top: 50%;
      left: 50%;
      height : 100px;
      width :100px;
      background: white;
    } */
  </style>
</head>
<body>

  <div class = "kg">
    <!-- rand(min,max) -->
    <?php 
      $angka = ["Andri","Kevin","Dendi","Denar","Naufal","Rey"];
      $hari = ["Senin","Selasa","Rabu","Kamis","Jum'at","Sabtu"];
      // $k = array_rand($angka);
      // $rand = $angka[$k];
      // $rand1 = $angka[$k];
      $random = $angka[mt_rand(0,count($angka)-1)];
      $random1 = $angka[mt_rand(0,count($angka)-1)];
      // $rh = $hari[mt_rand(0,count($hari)-1)];
    ?>
    <div class = "tengah">
    <?php if ($random !== $random1) { ?>
      <div class="kotak"><?php echo $random; ?></div>
      <div class="kotak"><?php echo $random1; ?></div>
    <?php } ?>
      <div class="clear"></div>
      <!-- <div class="hari"><?php echo $rh; ?></div> -->
    </div>
  </div>

</body>
</html>