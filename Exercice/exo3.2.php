<?php
$fibo=0;
$fibo1=1;
$fibo2=0;


do{
$fibo2=$fibo1+$fibo;
echo"<br/>$fibo2";
$fibo=$fibo1;
$fibo1=$fibo2;
}
while($fibo2<6765)

?>
