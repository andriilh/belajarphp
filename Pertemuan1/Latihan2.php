<?php 

function factorial($num){
	$fact = 1;
	for($i = 1; $i <= $num; $i++){
		$fact = $fact * $i; 
	}
	return $fact;
}

$bagi = factorial(10) / factorial(9);
echo $bagi; echo "<br>";

function fibonacci($jumlah){
	$n1 = 0;
	$n2 = 1;
	$hasil = "$n1 $n2";
	for($i=0;$i<$jumlah -2; $i++){
		$output = $n2+$n1;
		$hasil = $hasil." $output";
		$n1 = $n2;
		$n2 = $output;
	}
	return $hasil;
}
echo "<br>";
echo fibonacci(20);

echo "<br>";
echo fibonacci(5);

function listNum($limit){
	for($i = 1; $i <= $limit -1; $i++){
		if($i%2==0){
			echo $i." ";
		}
	}
	return $i;
}

echo "<br>"; echo listNum(10);
echo "<br>";

echo $a = 2**4;

echo "<br>";
echo "//bubble sortn";
$data=array(4,3,6,4,5,7,9,1);
function bubble_sort($data){
  $n=count($data);
  for ($i = 0;$i<$n;$i++){ 
  	for ($j = $n-1;$j>$i;$j--){
          if ($data[$j] < $data[$j-1]){ 
              $dummy=$data[$j];
              $data[$j]=$data[$j-1];
              $data[$j-1]=$dummy;
          }
      }    
  }
  return $data;
}
print_r(bubble_sort($data));
?>