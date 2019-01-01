<?php

include('src/WaifuGenerator.php');

$anu = new WaifuGenerator();
$name = $anu->type("name");
$image = $anu->type("image");
echo "=== RESULT ===\n\nName : {$name}\nImage : {$image}";

?>