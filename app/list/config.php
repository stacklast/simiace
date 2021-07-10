<?php 

define('HOSTNAME', 'localhost');
define('DBNAME', 'list');
define('USERNAME', 'root');
define('PASSWORD', '');

try {
    $db = new PDO('mysql:host='.HOSTNAME.';dbname='.DBNAME.';charset=utf8', USERNAME, PASSWORD);
} catch (PDOException $e) {
    print "Error!: " . $e->getMessage() . "<br/>";
    die();
}

?>
