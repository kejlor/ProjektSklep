<?php
session_start();
if ((isset($_SESSION['zalogowany'])) && ($_SESSION['zalogowany']==true)) {
header('location: admin.php');
exit();
}
elseif ((isset($_SESSION['zalogowany1'])) && ($_SESSION['zalogowany1']==true)) {
	header('location: uzytkownik.php');
exit();
}
require_once "config/database.php";
$login=$_POST['login'];
$haslo=$_POST['password'];
$query = $bazadanych->prepare('SELECT count(*) FROM admin WHERE login = :login AND haslo = :haslo');
$query->bindValue(':login', $_POST['login'], PDO::PARAM_STR);
$query->bindValue(':haslo', $_POST['password'], PDO::PARAM_STR);
$query->execute();
$rowCount = $query->fetchColumn(0);
$query = $bazadanych->prepare('SELECT count(*) FROM uzytkownik WHERE login = :login AND haslo = :haslo');
$query->bindValue(':login', $_POST['login'], PDO::PARAM_STR);
$query->bindValue(':haslo', $_POST['password'], PDO::PARAM_STR);
$query->execute();
$rowCount1 = $query->fetchColumn(0);
if ($rowCount>0){
$user = $bazadanych->prepare('SELECT login FROM admin WHERE login = :login AND haslo = :haslo');
$user->bindValue(':login', $_POST['login'], PDO::PARAM_STR);
$user->bindValue(':haslo', $_POST['password'], PDO::PARAM_STR);
$user->execute();
$row_u = $user->fetch(PDO::FETCH_ASSOC);
$_SESSION['zalogowany']=true;
$_SESSION['user']=$row_u['login'];
unset($_SESSION['error']);
$query=null;
$user=null;
header('location: admin.php');
} 
elseif($rowCount1>0){
$user1 = $bazadanych->prepare('SELECT id_uzytkownik,login FROM uzytkownik WHERE login = :login AND haslo = :haslo');
$user1->bindValue(':login', $_POST['login'], PDO::PARAM_STR);
$user1->bindValue(':haslo', $_POST['password'], PDO::PARAM_STR);
$user1->execute();
$row_u1 = $user1->fetch(PDO::FETCH_ASSOC);
$_SESSION['zalogowany1']=true;
$_SESSION['user1']=$row_u1['login'];
$_SESSION['userid']=$row_u1['id_uzytkownik'];
unset($_SESSION['error']);
$query=null;
$user1=null;
header('location: uzytkownik.php');
}

else {
	$_SESSION['error']="Niepoprawne dane";
	header('Refresh: 10; index.php');
    echo 'Niepoprawne Dane! Zostaniesz przekierowany na stronę główną w ciągu 10 sekund';
	
}

?>