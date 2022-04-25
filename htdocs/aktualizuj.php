<?php
require_once 'config/database.php';

if (isset($_POST['aktualizuj']))
{
	echo 'Zaktualizowano! Operacja aktualizacji użytkownika do bazy danych przebiegła pomyślnie.';

	$query = $bazadanych->prepare('
		UPDATE uzytkownik 
		SET 
		login=:login,
		haslo=:haslo,
		imie=:imie, 
		nazwisko=:nazwisko,
		email=:email,
		telefon=:telefon 
		where id_uzytkownik=:id
		');

	$query->bindValue(':id', $_POST['id'], PDO::PARAM_INT);
	$query->bindValue(':login', $_POST['login'], PDO::PARAM_STR);
	$query->bindValue(':haslo', $_POST['haslo'], PDO::PARAM_STR);
	$query->bindValue(':imie', $_POST['imie'], PDO::PARAM_STR);
	$query->bindValue(':nazwisko', $_POST['nazwisko'], PDO::PARAM_STR);
	$query->bindValue(':email', $_POST['email'], PDO::PARAM_STR);
	$query->bindValue(':telefon', $_POST['telefon'], PDO::PARAM_STR);
	$query->execute();
	header('Refresh: 0.001; user.php');
}
if (isset($_POST['usun']))
{
	echo 'Zaktualizowano! Operacja aktualizacji użytkownika do bazy danych przebiegła pomyślnie.';

	$query = $bazadanych->prepare('
		DELETE from uzytkownik 
		
		where id_uzytkownik=:id
		');

	$query->bindValue(':id', $_POST['id'], PDO::PARAM_INT);
	$query->execute();
	header('Refresh: 0.001; user.php');
}
if (isset($_POST['zarejestruj']))
        {
	   
	    $login = $_POST['login'];
        $password = $_POST['password'];
        $imie = $_POST['imie'];
        $nazwisko = $_POST['nazwisko'];
        $email = $_POST['email'];
        $telefon = $_POST['telefon'];
        $query = $bazadanych->prepare('SELECT count(*) FROM uzytkownik WHERE email = :email');
        $query->bindValue(':email', $_POST['email'], PDO::PARAM_STR);
        $query->execute();
        $rowCount = $query->fetchColumn(0);

   function spr_login($log)
        {
            $spr1 = '/^[a-zA-Z0-9]{4,}$/';
            if(preg_match($spr1, $log))
            return true;
            else return false;
        }
function spr_haslo($has)
        {
            $spr2 = '/^[a-z0-9]{8,}$/';
            if(preg_match($spr2, $has))
            return true;
            else return false;
        }
function spr_imie($im)
        {
            $spr3 = '/^[a-zA-Z]{1,}$/';
            if(preg_match($spr3, $im))
            return true;
            else return false;
        }
function spr_nazwisko($nazw)
        {
            $spr4 = '/^[a-zA-Z]{1,}$/';
            if(preg_match($spr4, $nazw))
            return true;
            else return false;
        }
function spr_email($em)
        {
            $spr5 = '/^[a-zA-Z0-9.-]+@[a-zA-Z0-9-.]+.[a-zA-Z]{2,4}$/';
            if(preg_match($spr5, $em))
            return true;
            else return false;
        }
function spr_tel($tel)
        {
            $spr6 = '/^[0-9]{9}$/';
            if(preg_match($spr6, $tel))
            return true;
            else return false;
        }

       
        if (!spr_imie($imie))
        {
            
            echo "Błędny format: imie";
          
             header('Refresh: 10; index.php');
            echo 'Niepoprawne Dane! Zostaniesz przekierowany na stronę główną w ciągu 10 sekund';
        }
         elseif (!spr_nazwisko($nazwisko))
        {
            
            echo "Błędny format: nazwisko";
          header('Refresh: 10; index.php');
            echo 'Niepoprawne Dane! Zostaniesz przekierowany na stronę główną w ciągu 10 sekund';

        }
         elseif (!spr_login($login))
        {
            echo "Login powinien posiadać przynajmniej 4 znaki";
            header('Refresh: 10; index.php');
            echo 'Niepoprawne Dane! Zostaniesz przekierowany na stronę główną w ciągu 10 sekund';
        }
         elseif (!spr_haslo($password))
        {
            echo "Hasło powinno skladac się z przynajmniej 8 znaków";
            
            header('Refresh: 10; index.php');
            echo 'Niepoprawne Dane! Zostaniesz przekierowany na stronę główną w ciągu 10 sekund';
        }
         elseif (!spr_email($email))
        {
            echo "Niepoprawny email";
           
            header('Refresh: 10; index.php');
            echo 'Niepoprawne Dane! Zostaniesz przekierowany na stronę główną w ciągu 10 sekund';
        }
         elseif (!spr_tel($telefon))
        {
            echo "Błędny format telefonu";
           
            header('Refresh: 10; index.php');
            echo 'Niepoprawne Dane! Zostaniesz przekierowany na stronę główną w ciągu 10 sekund';
        }
        elseif ($rowCount>0) 
        {
            header('Refresh: 10; index.php');
            echo 'Posiadasz już konto! Zostaniesz przekierowany na stronę główną w ciągu 10 sekund';
        }
     else {
        	
$query = $bazadanych->prepare('INSERT INTO uzytkownik VALUES (NULL, :login, :password, :imie, :nazwisko, :email,:telefon)');
$query->bindValue(':login', $_POST['login'], PDO::PARAM_STR);
$query->bindValue(':password', $_POST['password'], PDO::PARAM_STR);
$query->bindValue(':imie', $_POST['imie'], PDO::PARAM_STR);
$query->bindValue(':nazwisko', $_POST['nazwisko'], PDO::PARAM_STR);
$query->bindValue(':email', $_POST['email'], PDO::PARAM_STR);
$query->bindValue(':telefon', $_POST['telefon'], PDO::PARAM_STR);
$query->execute();
header('Refresh: 0.001; user.php');
}
        }
?>