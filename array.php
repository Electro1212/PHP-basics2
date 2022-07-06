<?php
  $array = [];
  for($i=1;$i<100;$i++){
    $array[] = $i;
  }
  print_r(array_slice($array,20,28));
  print_r(array_slice($array,61,37));
    
?>
<?php
  $array = [];
  $array2 = [];
  for($i=21;$i<49;$i++){
    $array[] = $i;
  }
  for($x=62;$x<100;$x++){
    $array2[] = $x;
  }
  print_r($array);
  print_r($array2);
    
?>