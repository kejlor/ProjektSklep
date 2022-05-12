<?php
session_start();
if ((!isset($_SESSION['zalogowany'])) OR ($_SESSION['zalogowany']!=true)) {
header('location: index.php');
exit();
require_once("config/database.php");
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
    <a href="#" class="list-group-item active">
    <span class="glyphicon glyphicon-user"></span>
    Użytkownicy</a>
    <a href="zamowienia.php" class="list-group-item ">
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

  $query = $bazadanych->prepare('SELECT * FROM uzytkownik');
 $query->execute();
  ?>
  <div class="container">
  <div class="col-sm-11">
    <table class="table table-hover">
      <tr>
        <th>Login</th>
        <th>Haslo</th>
        <th>Imie</th>
        <th>Nazwisko</th>
        <th>Email</th>
        <th>Telefon</th>
      </tr>
      <tr>
      <?php
 echo "<tr>";
  while ($row = $query->fetch(PDO::FETCH_ASSOC))
  {
    $id=$row['id_uzytkownik'];
    $login=$row['login'];
    $haslo=$row['haslo'];
    $imie=$row['imie'];
    $nazwisko=$row['nazwisko'];
    $email=$row['email'];
    $telefon=$row['telefon'];


    echo "<form action='aktualizuj.php'  method='POST'>";
    echo "<td><input type='text' class='form-control' name='login'  value='".$login."''>";
    echo "<td><input type='text' class='form-control' name='haslo' value='".$haslo."''>";
    echo "<td><input type='text' class='form-control' name='imie' value='".$imie."''>";
    echo "<td><input type='text' class='form-control' name='nazwisko' value='".$nazwisko."''>";
    echo "<td><input type='text' class='form-control' name='email' value='".$email."''>";
    echo "<td><input type='text' class='form-control' name='telefon' value='".$telefon."''>";
    echo "<td><input name='aktualizuj' value='Aktualizuj' class='btn btn-warning' type='submit'>";
    echo "<td><input name='usun' value='Usuń' class='btn btn-danger' type='submit'>";
    echo "<td><input type='hidden'class='form-control' name='id'  value='".$id."''>";
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
<div id="myModal" class="modal fade" role="dialog">
  <div class="modal-dialog modal-sm">

    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
         <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title">Rejestracja</h4>
      </div>
      <div class="modal-body">
         <form action="aktualizuj.php" method="POST">
         <input class="form-control" type="text" name="login" id="login" placeholder="Login">

         <input class="form-control"  type="password" name="password" id="password" placeholder="Hasło">

         <input class="form-control" type="text" name="imie" id="imie" placeholder="Imię">

         <input class="form-control" type="text" name="nazwisko" id="nazwisko" placeholder="Nazwisko">

         <input class="form-control" type="text" name="email" id="email"  placeholder="Email">

          <input class="form-control" type="text" name="telefon" id="telefon" placeholder="Telefon">

         <button  type="submit" name="zarejestruj"  class="btn btn-success">Zarejestruj Się</button>
        </form>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Zamknij</button>
      </div>

    </div>

  </div>






</body>
</html>
