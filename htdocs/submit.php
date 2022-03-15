<?php
session_start();
if ((!isset($_SESSION['zalogowany1'])) OR ($_SESSION['zalogowany1']!=true)) {
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
  <script src="js/jquery.min.js"></script>
    <link rel="stylesheet" href="css/bootstrap.min.css" />
    <script src="js/bootstrap.min.js"></script>
    <style>
    .popover
    {
        width: 100%;
        max-width: 800px;
    }
    </style>
  <link rel="stylesheet" type="text/css" href="styl.css">

</head>
<body>


<div class="container-fluid" id="kontener">
<nav class="navbar  navbar-inverse">
  <div class="container-fluid" id="menu">
    <div class="navbar-header">
      <a  href="uzytkownik.php" ><img src="img/logo.png"></a>
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
      <li><a href="#"><?php echo $_SESSION['user1']; ?></a></li>

       <li><a href="wyloguj.php" ><span class="glyphicon glyphicon-log-out" ></span>Wyloguj Się</a></li>
    </ul>

  </div>
</nav>
<!-- <div id="popover_content_wrapper" style="display: none;width: 800px;">
        <span id="cart_details"></span>
        <div align="right">
          <a href="submit.php" class="btn btn-primary" id="check_out_cart">
          <span class="glyphicon glyphicon-shopping-cart"></span>Podsumowanie
          </a>
          <a href="#" class="btn btn-default" id="clear_cart">
          <span class="glyphicon glyphicon-trash"></span> Wyczyść
          </a>
        </div>
      </div> -->


<h1>Podsumowanie</h1>
<div id="popover_content_wrapper" style="display: block;width: 800px;">
        <span id="cart_details"></span>
        <div align="right">
          <center><a href="#" class="btn btn-default btn-block" id="clear_cart">
          <span class="glyphicon glyphicon-trash"></span> Wyczyść
          </a><center>
          <form method="POST">
          	<?php require_once 'config/database.php';
         echo "<td><select class='form-control' name='wysylka'>";
    echo "<option >Wybierz Przesylke</option>";
    $sql= $bazadanych->prepare('SELECT * from wysylka');
    $sql->execute();
    while ($row=$sql->fetch(PDO::FETCH_ASSOC)) {
    echo "<option value='".$row['id_wysylki']."'>".$row['rodzaj']."</option>";
  }
    echo "</select>";?>
          <center><button class="btn btn-primary btn-block" name="zamow" >Zamów</button></center>
      </form>
        </div>
      </div>

  <?php
  require_once 'config/database.php';
  foreach($_SESSION["shopping_cart"] as $keys => $values)
  {
  	if (isset($_POST['zamow'])) {
$query = $bazadanych->prepare('INSERT INTO zamowienia VALUES (NULL, :id_uzytkownik, :data, 1,:wysylka)');
$query->bindValue(':id_uzytkownik', $_SESSION['userid'], PDO::PARAM_INT);
$query->bindValue(':data', date("Y-m-d") ,PDO::PARAM_STR);
$query->bindValue(':wysylka', $_POST['wysylka'], PDO::PARAM_INT);
$query->execute();
$wynik=$bazadanych->prepare('SELECT concat(max(id_zamowienia)) as zamowienia from zamowienia');
$wynik->execute();
 while ($row=$wynik->fetch(PDO::FETCH_ASSOC)){
$query1 = $bazadanych->prepare('INSERT INTO zamowione_produkty VALUES (NULL, :id_zamowienia, :id_produktu)');
$query1->bindValue(':id_zamowienia', $row['zamowienia'], PDO::PARAM_INT);
$query1->bindValue(':id_produktu',$values["product_id"],PDO::PARAM_INT);
$query1->execute();
}
  	}
     }
  ?>
  <div class="row">
  <div class="col-sm-12"  > <nav class="navbar navbar-inverse"><p style="color: white;text-align: center;">MATEUSZ SUMARA 2021 ALL RIGHTS RESERVED</p> </nav></div>
  </div>
  </div>
</div>
</body>
<script>
$(document).ready(function(){

  load_product();

  load_cart_data();

  function load_product()
  {
    $.ajax({
      url:"fetch_item.php",
      method:"POST",
      success:function(data)
      {
        $('#display_item').html(data);
      }
    });
  }

  function load_cart_data()
  {
    $.ajax({
      url:"fetch_cart.php",
      method:"POST",
      dataType:"json",
      success:function(data)
      {
        $('#cart_details').html(data.cart_details);
        $('.total_price').text(data.total_price);
        $('.badge').text(data.total_item);
      }
    });
  }

  $('#cart-popover').popover({
    html : true,
        container: 'body',
        content:function(){
          return $('#popover_content_wrapper').html();
        }
  });

  $(document).on('click', '.add_to_cart', function(){
    var product_id = $(this).attr("id");
    var product_name = $('#name'+product_id+'').val();
    var product_price = $('#price'+product_id+'').val();
    var product_quantity = $('#quantity'+product_id).val();
    var action = "add";
    if(product_quantity > 0)
    {
      $.ajax({
        url:"action.php",
        method:"POST",
        data:{product_id:product_id, product_name:product_name, product_price:product_price, product_quantity:product_quantity, action:action},
        success:function(data)
        {
          load_cart_data();

        }
      });
    }
    else
    {

    }
  });

  $(document).on('click', '.delete', function(){
    var product_id = $(this).attr("id");
    var action = 'remove';
    if(confirm("Czy Napewno Chcesz Usunąć Ten Produkt?"))
    {
      $.ajax({
        url:"action.php",
        method:"POST",
        data:{product_id:product_id, action:action},
        success:function()
        {
          load_cart_data();
          $('#cart-popover').popover('hide');

        }
      })
    }
    else
    {
      return false;
    }
  });

  $(document).on('click', '#clear_cart', function(){
    var action = 'empty';
    $.ajax({
      url:"action.php",
      method:"POST",
      data:{action:action},
      success:function()
      {
        load_cart_data();
        $('#cart-popover').popover('hide');

      }
    });
  });

});

</script>
</html>
