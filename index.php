<?php
use app\classes\curl\Curl;
use app\classes\database\Database;

require_once './vendor/autoload.php';

$options = array(
    'url' => 'https://abv.bg',
    'header' => 0,
    'followlocation' => 1,
    'maxredirs' => 2,
    'returntransfer' => 1
);

$db = Database::getInstance('PDO');
print_r($db);

?>
