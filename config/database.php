<?php
require_once 'config.php';
try {
$bazadanych = new PDO('mysql:host='.$config['host'].';dbname='.$config['database'].';charset=utf8', $config['uzytkownik'], $config['haslo']);
} catch (PDOException $error) {
	echo "niepoloczono";
 exit('Database error');
}