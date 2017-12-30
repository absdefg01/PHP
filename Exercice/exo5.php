<?php
$array=[
"Jean"=>20,
"Jacques"=>30,
"Pierre"=>25
];
echo "<pre>";
  print_r($array);
  echo "</pre>";
echo "<br/>";
$identite=array(
"personne 1" => array("nom" => "dutronc","prenom"=>"michel", "age"=>"30"),
"personne 2" => array("nom" => "duroc", "prenom"=>"émilie", "age"=>"23"),
"personne 3" => array("nom" => "dupersil", "prenom"=>"évelyne", "age"=>"36"));

echo "<pre>";
  	print_r($identite["personne 1"]["nom"]);echo "<br/>";
	print_r($identite["personne 2"]["nom"]);echo "<br/>";
	print_r($identite["personne 3"]["nom"]);
  echo "</pre>"; 
?>
