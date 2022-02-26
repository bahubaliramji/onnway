<?php
$source=$_POST['source'];
$j=getCapsPosn($source);
 function getCapsPosn($str)
 {
  $i = 0;
  $CapsPosn = -1;
  for ($i =0 ; $i < strlen($str) ; $i++)
  {
    if (ord($str[$i]) == 44 )
    {
        //echo ord($str[$i]);
        $CapsPosn = $i;
        return $CapsPosn;
    }
  }
 }
 echo substr($source, 0, $j);
?>