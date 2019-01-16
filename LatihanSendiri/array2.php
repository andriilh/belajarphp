<?php 
  // Pengulangan pada array
  // For atau Foreach

  $angka = [1,2,33,5,11,34,76];

?>
<!DOCTYPE html>
<html>
<head>
  <title>Array</title>
  <style>
    .sd{
      height:80px;
      width:80px;
      background-color : salmon;
      -align: center;
      line-height:80px;
      margin:3px;
      float:left;
    }
    .clear {
      clear: both;
    }
  </style>
</head>
<body>
  <!-- for -->
  <?php for($i = 0; $i < count($angka); $i++ ){ ?>
    <div class = sd><?php echo $angka[$i]; ?></div>
  <?php } ?>
  
  <div class="clear"></div>
  <!-- foreach -->
  <?php foreach($angka as $a) { ?>
    <div class="sd"><?php echo $a; ?></div>
  <?php } ?>

  <div class="clear"></div>
  <!-- foreach beda -->
  <?php foreach($angka as $a) :?>
    <div class="sd"><?php echo $a; ?></div>
  <?php endforeach ?>

</body>
</html>