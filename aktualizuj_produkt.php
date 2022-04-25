<?php
require_once 'config/database.php';

if (isset($_POST['aktualizuj']))

{
	 $image_file     = $_FILES["zdjecie"]["name"];
            $typ            = $_FILES["zdjecie"]["type"];
            $rozmiar        = $_FILES["zdjecie"]["size"];
            $temp           = $_FILES["zdjecie"]["tmp_name"];
            $path           ="img/".$image_file; 


                if($typ=="image/jpg" || $typ=='image/jpeg' || $typ=='image/png') //check file extension
                {
                        if(!file_exists($path)) //check file not exist in your upload folder path
                        {
                                if($rozmiar < 5000000) //check file size 5MB
                                {
                                        move_uploaded_file($temp, "img/" .$image_file); //move upload file temperory directory to your upload folder
                                }
                                else
                                {
                                        echo "Your File To large Please Upload 5MB Size"; //error message file size not large than 5MB
                                }
                        }
                        else
                        {
                                echo "File Already Exists...Check Upload Folder"; //error message file not exists your upload folder path
                        }
                }
                else
                {
                        echo "Upload JPG , JPEG , PNG & GIF File Formate.....CHECK FILE EXTENSION"; //error message file extension
                }

                if(!isset($errorMsg))
                {
    echo 'Zaktualizowano! Operacja aktualizacji użytkownika do bazy danych przebiegła pomyślnie.';

	$query = $bazadanych->prepare('
		UPDATE produkty
		SET
		producent=:producent,
		model=:model,
		cena=:cena,
		opis=:opis,
		id_kategoria=:kategoria,
        zdjecie=:zdjecie
		where id_produktu=:id
		');

	$query->bindValue(':id', $_POST['id'], PDO::PARAM_INT);
	$query->bindValue(':producent', $_POST['producent'], PDO::PARAM_STR);
	$query->bindValue(':model', $_POST['model'], PDO::PARAM_STR);
	$query->bindValue(':cena', $_POST['cena'], PDO::PARAM_STR);
	$query->bindValue(':opis', $_POST['opis'], PDO::PARAM_STR);
	$query->bindValue(':kategoria', $_POST['kategoria'], PDO::PARAM_STR);
    $query->bindValue(':zdjecie', $image_file, PDO::PARAM_STR);
	$query->execute();
	header('Refresh: 0.001; admin.php');
}
}
if (isset($_POST['usun']))
{
	echo 'Zaktualizowano! Operacja aktualizacji użytkownika do bazy danych przebiegła pomyślnie.';

	$query = $bazadanych->prepare('
		DELETE from produkty

		where id_produktu=:id
		');

	$query->bindValue(':id', $_POST['id'], PDO::PARAM_INT);
	$query->execute();
	header('Refresh: 0.001; admin.php');
}
if (isset($_POST['zarejestruj']))
        {

	    	$producent = $_POST['producent'];
        	$model = $_POST['model'];
        	$cena = $_POST['cena'];
        	$opis = $_POST['opis'];
        	$id_kategoria = $_POST['kategoria'];
            $image_file     = $_FILES["zdjecie"]["name"];
            $typ            = $_FILES["zdjecie"]["type"];
            $rozmiar        = $_FILES["zdjecie"]["size"];
            $temp           = $_FILES["zdjecie"]["tmp_name"];
            $path           ="img/".$image_file; //set upload folder path

                // if(empty($name)){
                //         $errorMsg="Please Enter Name";
                // }
                // else if(empty($image_file)){
                //         $errorMsg="Please Select Image";
                // }
                // else
                if($typ=="image/jpg" || $typ=='image/jpeg' || $typ=='image/png') //check file extension
                {
                        if(!file_exists($path)) //check file not exist in your upload folder path
                        {
                                if($rozmiar < 5000000) //check file size 5MB
                                {
                                        move_uploaded_file($temp, "img/" .$image_file); //move upload file temperory directory to your upload folder
                                }
                                else
                                {
                                        $errorMsg="Your File To large Please Upload 5MB Size"; //error message file size not large than 5MB
                                }
                        }
                        else
                        {
                                $errorMsg="File Already Exists...Check Upload Folder"; //error message file not exists your upload folder path
                        }
                }
                else
                {
                        $errorMsg="Upload JPG , JPEG , PNG & GIF File Formate.....CHECK FILE EXTENSION"; //error message file extension
                }

                if(!isset($errorMsg))
                {
                    $query = $bazadanych->prepare('INSERT INTO produkty VALUES (NULL, :producent, :model, :cena, :opis, :kategoria ,:zdjecie)');
					$query->bindValue(':producent', $producent, PDO::PARAM_STR);
					$query->bindValue(':model', $model, PDO::PARAM_STR);
					$query->bindValue(':cena', $cena, PDO::PARAM_STR);
					$query->bindValue(':opis', $opis, PDO::PARAM_STR);
					$query->bindValue(':kategoria', $id_kategoria, PDO::PARAM_STR);
					$query->bindValue(':zdjecie', $image_file, PDO::PARAM_STR);
					$query->execute();
					header('Refresh: 0.001; admin.php');
        		}
        	}
?>
