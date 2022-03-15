<?php
session_start();
if ((!isset($_SESSION['zalogowany'])) OR ($_SESSION['zalogowany']!=true)) {
header('location: index.php');
exit();
}
?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta lang="PL">

	<title>Sklep</title>

	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
  <link rel="stylesheet" type="text/css" href="styl.css">
  <script type="text/javascript">


</script>

</head>
<body>


<div class="container-fluid" id="kontener1">
<nav class="navbar  navbar-inverse">
  <div class="container-fluid" id="menu">
    <div class="navbar-header">
      <a  href="#" ><img src="img/logo.png"></a>
    </div>
    <ul class="nav navbar-nav">

      <li class="dropdown">
        <a class="dropdown-toggle" data-toggle="dropdown" href="#">Kategorie
        <span class="caret"></span></a>
        <ul class="dropdown-menu">
          <li><a href="#">Płyty Główne</a></li>
          <li><a href="#">Karty Graficzne</a></li>
          <li><a href="#">Laptopy</a></li>
        </ul>
      </li>

    </ul>
    <form class="navbar-form navbar-left" action="#">
      <div class="form-group">
        <input type="text" class="form-control" placeholder="Co Potrzebujesz?">
      </div>
      <button type="submit" class="btn btn-default">Szukaj</button>
    </form>
    <ul class="nav navbar-nav navbar-right">
      <li><a href="#"><span class="glyphicon glyphicon-shopping-cart"></span> Koszyk</a></li>
      <li><a href="wyloguj.php" ><span class="glyphicon glyphicon-log-out" ></span>Wyloguj Się</a></li>
    </ul>

  </div>
</nav>
<h1>Witaj Admin</h1>
<div class="row">
  <div class="col-sm-2">
  <div class="list-group">
    <a href="#" class="list-group-item active">
    <span class="glyphicon glyphicon-tag"></span>
    Produkty</a>
    <a href="user.php" class="list-group-item">
    <span class="glyphicon glyphicon-user"></span>
    Użytkownicy</a>
    <a href="zamowienia.php" class="list-group-item">
      <span class=" glyphicon glyphicon-gift"></span>
    Zamówienia</a>


</div>
  </div>
   <?php
   require_once 'config/database.php';
 echo "<tr>";
  try
  {
    $bazadanych = new PDO('mysql:host='.$config['host'].';dbname='.$config['database'].';charset=utf8', $config['uzytkownik'], $config['haslo']);
  }
  catch (PDOException $error)
  {
    echo "niepoloczono";
    exit('Database error');
  }

  $query = $bazadanych->prepare('SELECT produkty.id_produktu,produkty.producent,produkty.model,produkty.cena,produkty.opis,produkty.id_kategoria,producenci.nazwaz,producenci.id_producent,kategorie.kategoria, produkty.zdjecie FROM produkty
    inner join producenci
    on producenci.id_producent=produkty.producent
    inner join kategorie
    on produkty.id_kategoria=kategorie.id_kategorii');
 $query->execute();

  ?>
  <div class="container">
  <div class="col-sm-11">
    <table class="table table-hover">
      <tr>
        <th>Producent</th>
        <th>Model</th>
        <th>Cena</th>
        <th>Opis</th>
        <th>Id_Kategoria</th>
        <th>Zdjęcie</th>
        <th>Plik</th>
      </tr>
      <tr>
      <?php
 echo "<tr>";
  while ($row = $query->fetch(PDO::FETCH_ASSOC))
  {
    $id=$row['id_produktu'];
    $producent=$row['producent'];
    $model=$row['model'];
    $cena=$row['cena'];
    $opis=$row['opis'];
    $id_kategoria=$row['id_kategoria'];
    $nazwa_producent=$row['nazwaz'];
    $id_producent=$row['id_producent'];
    $kategoria=$row['kategoria'];
    $zdjecie=$row['zdjecie'];

    echo "<form action='aktualizuj_produkt.php'  method='POST' enctype='multipart/form-data'>";
    echo "<td><select class='form-control' name='producent' class='input1'>";
    echo "<option  value='".$producent."'>".$nazwa_producent."</option>";
    $sql= $bazadanych->prepare('SELECT * from producenci');
    $sql->execute();
    while ($row=$sql->fetch(PDO::FETCH_ASSOC)) {
    echo "<option value='".$row['id_producent']."' >".$row['nazwaz']."</option>";
  }
    echo "</select>";
    echo "<td><input type='text' class='form-control'  name='model' value='".$model."''>";
    echo "<td><input type='text' class='form-control' name='cena' value='".$cena."''>";
    echo "<td><input type='text' class='form-control' name='opis' value='".$opis."''>";
    echo "<td><select class='form-control' name='kategoria'>";
    echo "<option value='".$id_kategoria."'>".$kategoria."</option>";
    $sql= $bazadanych->prepare('SELECT * from kategorie');
    $sql->execute();
    while ($row=$sql->fetch(PDO::FETCH_ASSOC)) {
    echo "<option value='".$row['id_kategorii']."'>".$row['kategoria']."</option>";
  }
    echo "</select>";
    echo "<td><img src='img/".$zdjecie."' style='height:90px;'>";
    echo "<td><input type='file' name='zdjecie'class='form-control' >";
    echo "<td><input name='aktualizuj'  value='Aktualizuj' class='btn btn-warning' type='submit'>";
    echo "<td><input name='usun' value='Usuń' class='btn btn-danger' type='submit'>";
    echo "<input type='hidden' class='form-control' name='id'  value='".$id."''>";
    echo "</tr>";
    echo "</form>";
      // echo "<td><button name='dodaj' data-toggle='modal' data-target='#myModal'  class='btn btn-success'>Dodaj</button>";

  }
?>
    <tr><td><button name='dodaj' data-toggle='modal' data-target='#myModal'  class='btn btn-success'>Dodaj</button></td></tr>
    </table>


  </div>
  </div>
</div>
  </div>
  <div class="container-fluid">

  <div class="row">
  	<footer><div class="col-sm-12" > <nav class="navbar navbar-inverse"><p style="color: white;text-align: center;">MATEUSZ SUMARA 2021 ALL RIGHTS RESERVED</p> </nav></div></footer>
  </div>
  </div>
</div>
<div id="myModal" class="modal fade" role="dialog">
  <div class="modal-dialog modal-sm">

    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
         <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title">Dodawanie Produktu</h4>
      </div>
      <div class="modal-body">
         <form action="aktualizuj_produkt.php" method="POST" enctype="multipart/form-data">
          <select name="producent" class="form-control">
          <option>Producent</option>
          <?php
           $sql= $bazadanych->prepare('SELECT * from producenci');
           $sql->execute();
           while ($row=$sql->fetch(PDO::FETCH_ASSOC)) {
    echo "<option value='".$row['id_producent']."' >".$row['nazwaz']."</option>";
  }?>
         </select>

         <input class="form-control"  type="text" name="model" id="model" placeholder="Model">

         <input class="form-control" type="text" name="cena" id="cena" placeholder="Cena">

         <input class="form-control" type="text" name="opis" id="opis" placeholder="Opis">

          <select name="kategoria" class="form-control">
          <option>Kategoria</option>
          <?php
           $sql= $bazadanych->prepare('SELECT * from kategorie');
    $sql->execute();
    while ($row=$sql->fetch(PDO::FETCH_ASSOC)) {
    echo "<option value='".$row['id_kategorii']."'>".$row['kategoria']."</option>";
  }?>
         </select>
          <input type="file" name="zdjecie" class="form-control">
        <br>
         <button  type="submit" name="zarejestruj"  class="btn btn-success">Dodaj</button>
        </form>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Zamknij</button>
      </div>

    </div>

  </div>






</body>
</html>
