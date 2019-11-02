<?php

$path = dirname(__FILE__);
$cron = $path . "/run.php";
echo exec("1**** php -q ".$cron." &> /dev/null");

?>