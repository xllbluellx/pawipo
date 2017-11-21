<?php
$info = json_decode($_POST["datos"], true);
$datos = '';
for($i = 0; $i < count($info);$i++) $info[$i]['pregunta'] = "El nombre es:";
$info = json_encode($_POST["datos"]);
print_r($info);
$info = json_decode($info, true);
print_r($info);
?>