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
    <a href="admin.php" class="list-group-item ">
    <span class="glyphicon glyphicon-tag"></span>
    Produkty</a>
    <a href="user.php" class="list-group-item">
    <span class="glyphicon glyphicon-user"></span>
    Użytkownicy</a>
    <a href="#" class="list-group-item active">
      <span class=" glyphicon glyphicon-gift active"></span>
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

  $query = $bazadanych->prepare('SELECT zamowienia.id_zamowienia,zamowienia.id_uzytkownik,zamowienia.data_zamowienia,zamowienia.stan,zamowienia.wysylka,produkty.model,produkty.cena,produkty.producent,produkty.id_produktu,concat(uzytkownik.imie,uzytkownik.nazwisko) as uzytkownik,wysylka.id_wysylki,wysylka.rodzaj,stan.id_stanu,stan.nazwa,producenci.nazwaz,kategorie.kategoria from zamowienia
    inner join zamowione_produkty
    on zamowione_produkty.id_zamowienia=zamowienia.id_zamowienia
    inner join produkty
    on produkty.id_produktu=zamowione_produkty.id_produktu
    inner join uzytkownik
    on uzytkownik.id_uzytkownik=zamowienia.id_uzytkownik
    inner join wysylka
    on wysylka.id_wysylki=zamowienia.wysylka
    inner join stan
    on stan.id_stanu=zamowienia.stan
    inner join producenci
    on produkty.producent=producenci.id_producent
    inner join kategorie
    on kategorie.id_kategorii=produkty.id_kategoria');
 $query->execute();

  ?>
  <div class="container">
  <div class="col-sm-11">
    <table class="table table-hover">
      <tr>
        <th>Uzytkownik</th>
        <th>Data Zamówienia</th>
        <th>Stan</th>
        <th>Wysyłka</th>
      </tr>
      <tr>
      <?php
 echo "<tr>";
  while ($row = $query->fetch(PDO::FETCH_ASSOC))
  {
    $id=$row['id_zamowienia'];
    $id_uzytkownik=$row['id_uzytkownik'];
    $data=$row['data_zamowienia'];
    $stan=$row['stan'];
    $wysylka=$row['wysylka'];
    $model=$row['model'];
    $id_produktu=$row['id_produktu'];
    $uzytkownik=$row['uzytkownik'];
    $id_wysylki=$row['id_wysylki'];
    $rodzaj=$row['rodzaj'];
    $id_stanu=$row['id_stanu'];
    $nazwa=$row['nazwa'];
    $cena=$row['cena'];
    $producent=$row['nazwaz'];
    $kategoria=$row['kategoria'];

    echo "<form action='aktualizuj_zamowienie.php'  method='POST'>";
    echo "<td><select class='form-control' name='uzytkownik' class='input1'>";
    echo "<option  value='".$id_uzytkownik."'>".$uzytkownik."</option>";
    $sql= $bazadanych->prepare('SELECT id_uzytkownik,concat(imie,nazwisko)as uzytkownik from uzytkownik');
    $sql->execute();
    while ($row=$sql->fetch(PDO::FETCH_ASSOC)) {
    echo "<option value='".$row['id_uzytkownik']."' >".$row['uzytkownik']."</option>";
  }
    echo "</select>";
    echo "<td><input type='date' class='form-control'  name='data' value='".$data."''>";
    echo "<td><select class='form-control' name='stan'>";
    echo "<option value='".$stan."'>".$nazwa."</option>";
    $sql= $bazadanych->prepare('SELECT * from stan');
    $sql->execute();
    while ($row=$sql->fetch(PDO::FETCH_ASSOC)) {
    echo "<option value='".$row['id_stanu']."'>".$row['nazwa']."</option>";
  }
    echo "</select>";
    echo "<td><select class='form-control' name='wysylka'>";
    echo "<option value='".$id_wysylki."'>".$rodzaj."</option>";
    $sql= $bazadanych->prepare('SELECT * from wysylka');
    $sql->execute();
    while ($row=$sql->fetch(PDO::FETCH_ASSOC)) {
    echo "<option value='".$row['id_wysylki']."'>".$row['rodzaj']."</option>";
  }
    echo "</select>";
    // echo "<td><input name='aktualizuj'  value='Aktualizuj' class='btn btn-warning' type='submit'>";
    // echo "<td><input name='usun' value='Usuń' class='btn btn-danger' type='submit'>";
    echo "<input type='hidden' class='form-control' name='id'  value='".$id."''>";
    echo "</tr>";
    echo "<tr>";
    echo "<td>".$producent;
    echo "<td>".$model;
    echo "<td>".$cena;
    echo "<td>".$kategoria;
    echo "</tr>";
    echo "</form>";
      // echo "<td><button name='dodaj' data-toggle='modal' data-target='#myModal'  class='btn btn-success'>Dodaj</button>";

  }
?>
    <!-- <tr><td><button name='dodaj' data-toggle='modal' data-target='#myModal'  class='btn btn-success'>Dodaj</button></td></tr> -->
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
         <form action="aktualizuj_produkt.php" method="POST">
          <select name="producent" class="form-control">
          <option>Producent</option>
          <?php
           $sql= $bazadanych->prepare('SELECT * from producenci');
           $sql->execute();
           while ($row=$sql->fetch(PDO::FETCH_ASSOC)) {
    echo "<option value='".$row['id_producent']."' >".$row['nazwa']."</option>";
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
