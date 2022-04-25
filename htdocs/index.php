<<<<<<< HEAD:htdocs/index.php

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
      <li><a id="cart-popover" class="btn" data-placement="bottom" title="Koszyk">
                  <span class="glyphicon glyphicon-shopping-cart"></span>
                  <span class="badge"></span>
                  <span class="total_price">PLN 0.00</span>
                </a></li>
      <li><a href="#" data-toggle="modal" data-target="#myModal"><span class="glyphicon glyphicon-log-in" ></span> Logowanie</a></li>
    </ul>

  </div>
</nav>
<div id="popover_content_wrapper" style="display: none">
        <span id="cart_details"></span>
        <div align="right">
          <p>Zaloguj Się Aby Przejść Do Podsumowania!</p>
          <a href="#" class="btn btn-default" id="clear_cart">
          <span class="glyphicon glyphicon-trash"></span> Wyczyść
          </a>
        </div>
      </div>
<!-- Modal -->
<div id="myModal" class="modal fade" role="dialog">
  <div class="modal-dialog modal-sm">

    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title">Logowanie</h4>
      </div>
      <div class="modal-body">
        <form action="zaloguj.php" method="POST">
         <input class="form-control" type="text" name="login" placeholder="Login">

         <input class="form-control" type="password" name="password" placeholder="Hasło">

         <button type="submit" class="btn btn-success">Zaloguj Się</button>
        </form>
        </br>
        <p>Jeśli nie posiadasz konta </p><button class="btn btn-success" data-toggle="modal" data-target="#rejestracja" data-dismiss="modal"  >Zarejestruj Się</button>
        </div>

      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Zamknij</button>
      </div>

    </div>

  </div>
</div>
<div id="rejestracja" class="modal fade" role="dialog">
  <div class="modal-dialog modal-sm">

    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title">Rejestracja</h4>
      </div>
      <div class="modal-body">
         <form action="rejestracja.php" method="POST">
         <input class="form-control" type="text" name="login" id="login" placeholder="Login">

         <input class="form-control"  type="password" name="password" id="password" placeholder="Hasło">

         <input class="form-control" type="text" name="imie" id="imie" placeholder="Imię">

         <input class="form-control" type="text" name="nazwisko" id="nazwisko" placeholder="Nazwisko">

         <input class="form-control" type="text" name="email" id="email"  placeholder="Email">

          <input class="form-control" type="text" name="telefon" id="telefon" placeholder="Telefon">

         <button  type="submit" name="zarejestruj"  class="btn btn-success">Zarejestruj Się</button>
        </form>

      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Zamknij</button>
      </div>
    </div>

  </div>
</div>
<h1>Nowości</h1>
<div class="row">
    <div class="col-sm-6">
    	<div id="myCarousel" class="carousel slide" data-ride="carousel">
    <!-- Indicators -->
    <ol class="carousel-indicators">
      <li data-target="#myCarousel" data-slide-to="0" class="active"></li>
      <li data-target="#myCarousel" data-slide-to="1"></li>
      <li data-target="#myCarousel" data-slide-to="2"></li>
    </ol>

    <!-- Wrapper for slides -->
    <div class="carousel-inner">
      <div class="item active">
        <img src="img/MSI.jpg"  style="width:100%;">
      </div>

      <div class="item">
        <img src="img/z370.jpg"  style="width:100%;">
      </div>

      <div class="item">
        <img src="img/laptop.jpg"  style="width:100%;">
      </div>
    </div>

    <!-- Left and right controls -->
    <a class="left carousel-control" href="#myCarousel" data-slide="prev">
      <span class="glyphicon glyphicon-chevron-left"></span>
      <span class="sr-only">Previous</span>
    </a>
    <a class="right carousel-control" href="#myCarousel" data-slide="next">
      <span class="glyphicon glyphicon-chevron-right"></span>
      <span class="sr-only">Next</span>
    </a>
  </div>
</div>
  <div class="col-sm-6">
<div id="myCarousel1" class="carousel slide" data-ride="carousel">
    <!-- Indicators -->
    <ol class="carousel-indicators">
      <li data-target="#myCarousel1" data-slide-to="0" class="active"></li>
      <li data-target="#myCarousel1" data-slide-to="1"></li>
      <li data-target="#myCarousel1" data-slide-to="2"></li>
    </ol>

    <!-- Wrapper for slides -->
    <div class="carousel-inner">
      <div class="item active">
        <img src="img/ASUS.jpg"  style="width:100%;">
      </div>

      <div class="item">
        <img src="img/z370-A.jpg"  style="width:100%;">
      </div>

      <div class="item">
        <img src="img/laptop-A.jpg"  style="width:100%;">
      </div>
    </div>

    <!-- Left and right controls -->
    <a class="left carousel-control" href="#myCarousel1" data-slide="prev">
      <span class="glyphicon glyphicon-chevron-left"></span>
      <span class="sr-only">Previous</span>
    </a>
    <a class="right carousel-control" href="#myCarousel1" data-slide="next">
      <span class="glyphicon glyphicon-chevron-right"></span>
      <span class="sr-only">Next</span>
    </a>
  </div>
</div>

    </div>
    <!-- Koniec diva z karuzela -->
    <h1>Polecane Produkty</h1>
    <!-- <div class="row">
    <div class="col-sm-4" >
     <center><div>
    <h3>Nvidia Geforce GTX 1080</h3></br>
    <img src="img/NVIDIA.jpg" height="200px" width="276px"></br>
    <h5 class="media-heading">Pamieć Wideo: 8gb</h5>
    <h5 class="media-heading">Szyna Danych: 256bit</h5>
    <h5 class="media-heading">Wersja Directx: 12</h5>
    <h2 class="media-heading">Cena: 1499zł</h2>
    <center><button type="button" class="btn btn-info">Dodaj Do Koszyka</button></center>
    </div></center>
    </div>
    <div class="col-sm-4" >
    <center><div>
    <h3>MSI B360-A Pro</h3> </br>
    	<img src="img/MSI_B360.jpg" height="200px" width="276px"></br>
    	<h5 class="media-heading">Obsługa pamięci DDR4 do 2666 MHz</h5>
    	<h5 class="media-heading">System dźwiękowy Audio Boost</h5>
    	<h5 class="media-heading">Obsługa procesorów 8. generacji z serii Intel® Core™</h5>
    	<h2 class="media-heading">Cena: 399zł</h2>
    	<center><button type="button" class="btn btn-info">Dodaj Do Koszyka</button></center>
    	</div></center>
    </div>
    <div class="col-sm-4" >
     <center><div>
    <h3>Asus G751 </h3> </br>
    <img src="img/LAPTOP_ASUS.jpg" height="200px" width="276px"></br>
    <h5 class="media-heading">Przekątna Ekranu: 17,3 cala</h5>
    <h5 class="media-heading">Procesor:Intel Core I7</h5>
    <h5 class="media-heading">Pamieć Ram: 8GB</h5>
    <h2 class="media-heading">Cena: 7199zł</h2>

    <p style="text-align: center;"><button type="button" class="btn btn-info">Dodaj Do Koszyka</button></p>
    </div></center>
  </div> -->
  <div class="row">

    <div class="row" id="display_item">


      </div>
      <div class="col-sm-12" ><p style="text-align: center;"><button type="button" class="btn btn-success">Więcej Produktów</button></p> </div>

  <!-- <h1>Promocje</h1> -->
<!-- nowa karuzela -->
<!-- <div class="row">
<div class="col-sm-12">
<div class="accordian">
    <ul>
		<li>
			<div class="image_title">
				<a href="#" >Acer Chromebook</a>
			</div>
			<a href="#">
				<img src="img/acer.jpg" style="width: 640px;height: 320px">
			</a>
		</li>
		<li>
			<div class="image_title">
				<a href="#">Microsoft Surface</a>
			</div>
			<a href="#">
				<img src="img/surface.jpg">
			</a>
		</li>
		<li>
			<div class="image_title">
				<a href="#">Asrock BeeBox</a>
			</div>
			<a href="#">
				<img src="img/asrock.jpg">
			</a>
		</li>
		<li>
			<div class="image_title">
				<a href="#">Aorus Z370</a>
			</div>
			<a href="#">
				<img  src="img/aorus.jpg" style="width: 640px;height: 320px">
			</a>
		</li>
		<li>
			<div class="image_title">
				<a href="#">Gigabyte RTX2080</a>
			</div>
			<a href="#">
				<img src="img/gigabyte.jpg" style="width: 640px;height: 320px">
			</a>
		</li>
		<li>
			<div class="image_title">
				<a href="#">Gigabyte H310</a>
			</div>
			<a href="#">
				<img src="img/gigabyteh310.jpg" style="width: 640px;height: 320px">
			</a>
		</li>

	</ul>
</div>
</div>
</div> -->
<!-- koniec nowej karuzeli -->
  </div>
  <div class="row">
  	<div class="col-sm-12" > <nav class="navbar navbar-inverse"><p style="color: white;text-align: center;">MATEUSZ, AGATA, BARTEK 2022 ALL RIGHTS RESERVED</p> </nav></div>
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
=======

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
      <li><a id="cart-popover" class="btn" data-placement="bottom" title="Koszyk">
                  <span class="glyphicon glyphicon-shopping-cart"></span>
                  <span class="badge"></span>
                  <span class="total_price">PLN 0.00</span>
                </a></li>
      <li><a href="#" data-toggle="modal" data-target="#myModal"><span class="glyphicon glyphicon-log-in" ></span> Logowanie</a></li>
    </ul>

  </div>
</nav>
<div id="popover_content_wrapper" style="display: none">
        <span id="cart_details"></span>
        <div align="right">
          <p>Zaloguj Się Aby Przejść Do Podsumowania!</p>
          <a href="#" class="btn btn-default" id="clear_cart">
          <span class="glyphicon glyphicon-trash"></span> Wyczyść
          </a>
        </div>
      </div>
<!-- Modal -->
<div id="myModal" class="modal fade" role="dialog">
  <div class="modal-dialog modal-sm">

    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title">Logowanie</h4>
      </div>
      <div class="modal-body">
        <form action="zaloguj.php" method="POST">
         <input class="form-control" type="text" name="login" placeholder="Login">

         <input class="form-control" type="password" name="password" placeholder="Hasło">

         <button type="submit" class="btn btn-success">Zaloguj Się</button>
        </form>
        </br>
        <p>Jeśli nie posiadasz konta </p><button class="btn btn-success" data-toggle="modal" data-target="#rejestracja" data-dismiss="modal"  >Zarejestruj Się</button>
        </div>

      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Zamknij</button>
      </div>

    </div>

  </div>
</div>
<div id="rejestracja" class="modal fade" role="dialog">
  <div class="modal-dialog modal-sm">

    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title">Rejestracja</h4>
      </div>
      <div class="modal-body">
         <form action="rejestracja.php" method="POST">
         <input class="form-control" type="text" name="login" id="login" placeholder="Login">

         <input class="form-control"  type="password" name="password" id="password" placeholder="Hasło">

         <input class="form-control" type="text" name="imie" id="imie" placeholder="Imię">

         <input class="form-control" type="text" name="nazwisko" id="nazwisko" placeholder="Nazwisko">

         <input class="form-control" type="text" name="email" id="email"  placeholder="Email">

          <input class="form-control" type="text" name="telefon" id="telefon" placeholder="Telefon">

         <button  type="submit" name="zarejestruj"  class="btn btn-success">Zarejestruj Się</button>
        </form>

      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Zamknij</button>
      </div>
    </div>

  </div>
</div>
<h1>Nowości</h1>
<div class="row">
    <div class="col-sm-6">
    	<div id="myCarousel" class="carousel slide" data-ride="carousel">
    <!-- Indicators -->
    <ol class="carousel-indicators">
      <li data-target="#myCarousel" data-slide-to="0" class="active"></li>
      <li data-target="#myCarousel" data-slide-to="1"></li>
      <li data-target="#myCarousel" data-slide-to="2"></li>
    </ol>

    <!-- Wrapper for slides -->
    <div class="carousel-inner">
      <div class="item active">
        <img src="img/MSI.jpg"  style="width:100%;">
      </div>

      <div class="item">
        <img src="img/z370.jpg"  style="width:100%;">
      </div>

      <div class="item">
        <img src="img/laptop.jpg"  style="width:100%;">
      </div>
    </div>

    <!-- Left and right controls -->
    <a class="left carousel-control" href="#myCarousel" data-slide="prev">
      <span class="glyphicon glyphicon-chevron-left"></span>
      <span class="sr-only">Previous</span>
    </a>
    <a class="right carousel-control" href="#myCarousel" data-slide="next">
      <span class="glyphicon glyphicon-chevron-right"></span>
      <span class="sr-only">Next</span>
    </a>
  </div>
</div>
  <div class="col-sm-6">
<div id="myCarousel1" class="carousel slide" data-ride="carousel">
    <!-- Indicators -->
    <ol class="carousel-indicators">
      <li data-target="#myCarousel1" data-slide-to="0" class="active"></li>
      <li data-target="#myCarousel1" data-slide-to="1"></li>
      <li data-target="#myCarousel1" data-slide-to="2"></li>
    </ol>

    <!-- Wrapper for slides -->
    <div class="carousel-inner">
      <div class="item active">
        <img src="img/ASUS.jpg"  style="width:100%;">
      </div>

      <div class="item">
        <img src="img/z370-A.jpg"  style="width:100%;">
      </div>

      <div class="item">
        <img src="img/laptop-A.jpg"  style="width:100%;">
      </div>
    </div>

    <!-- Left and right controls -->
    <a class="left carousel-control" href="#myCarousel1" data-slide="prev">
      <span class="glyphicon glyphicon-chevron-left"></span>
      <span class="sr-only">Previous</span>
    </a>
    <a class="right carousel-control" href="#myCarousel1" data-slide="next">
      <span class="glyphicon glyphicon-chevron-right"></span>
      <span class="sr-only">Next</span>
    </a>
  </div>
</div>

    </div>
    <!-- Koniec diva z karuzela -->
    <h1>Polecane Produkty</h1>
    <!-- <div class="row">
    <div class="col-sm-4" >
     <center><div>
    <h3>Nvidia Geforce GTX 1080</h3></br>
    <img src="img/NVIDIA.jpg" height="200px" width="276px"></br>
    <h5 class="media-heading">Pamieć Wideo: 8gb</h5>
    <h5 class="media-heading">Szyna Danych: 256bit</h5>
    <h5 class="media-heading">Wersja Directx: 12</h5>
    <h2 class="media-heading">Cena: 1499zł</h2>
    <center><button type="button" class="btn btn-info">Dodaj Do Koszyka</button></center>
    </div></center>
    </div>
    <div class="col-sm-4" >
    <center><div>
    <h3>MSI B360-A Pro</h3> </br>
    	<img src="img/MSI_B360.jpg" height="200px" width="276px"></br>
    	<h5 class="media-heading">Obsługa pamięci DDR4 do 2666 MHz</h5>
    	<h5 class="media-heading">System dźwiękowy Audio Boost</h5>
    	<h5 class="media-heading">Obsługa procesorów 8. generacji z serii Intel® Core™</h5>
    	<h2 class="media-heading">Cena: 399zł</h2>
    	<center><button type="button" class="btn btn-info">Dodaj Do Koszyka</button></center>
    	</div></center>
    </div>
    <div class="col-sm-4" >
     <center><div>
    <h3>Asus G751 </h3> </br>
    <img src="img/LAPTOP_ASUS.jpg" height="200px" width="276px"></br>
    <h5 class="media-heading">Przekątna Ekranu: 17,3 cala</h5>
    <h5 class="media-heading">Procesor:Intel Core I7</h5>
    <h5 class="media-heading">Pamieć Ram: 8GB</h5>
    <h2 class="media-heading">Cena: 7199zł</h2>

    <p style="text-align: center;"><button type="button" class="btn btn-info">Dodaj Do Koszyka</button></p>
    </div></center>
  </div> -->
  <div class="row">

    <div class="row" id="display_item">


      </div>
      <div class="col-sm-12" ><p style="text-align: center;"><button type="button" class="btn btn-success">Więcej Produktów</button></p> </div>

  <!-- <h1>Promocje</h1> -->
<!-- nowa karuzela -->
<!-- <div class="row">
<div class="col-sm-12">
<div class="accordian">
    <ul>
		<li>
			<div class="image_title">
				<a href="#" >Acer Chromebook</a>
			</div>
			<a href="#">
				<img src="img/acer.jpg" style="width: 640px;height: 320px">
			</a>
		</li>
		<li>
			<div class="image_title">
				<a href="#">Microsoft Surface</a>
			</div>
			<a href="#">
				<img src="img/surface.jpg">
			</a>
		</li>
		<li>
			<div class="image_title">
				<a href="#">Asrock BeeBox</a>
			</div>
			<a href="#">
				<img src="img/asrock.jpg">
			</a>
		</li>
		<li>
			<div class="image_title">
				<a href="#">Aorus Z370</a>
			</div>
			<a href="#">
				<img  src="img/aorus.jpg" style="width: 640px;height: 320px">
			</a>
		</li>
		<li>
			<div class="image_title">
				<a href="#">Gigabyte RTX2080</a>
			</div>
			<a href="#">
				<img src="img/gigabyte.jpg" style="width: 640px;height: 320px">
			</a>
		</li>
		<li>
			<div class="image_title">
				<a href="#">Gigabyte H310</a>
			</div>
			<a href="#">
				<img src="img/gigabyteh310.jpg" style="width: 640px;height: 320px">
			</a>
		</li>

	</ul>
</div>
</div>
</div> -->
<!-- koniec nowej karuzeli -->
  </div>
  <div class="row">
  	<div class="col-sm-12" > <nav class="navbar navbar-inverse"><p style="color: white;text-align: center;">MATEUSZ, AGATA, BARTEK 2022 ALL RIGHTS RESERVED</p> </nav></div>
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
>>>>>>> 6cea6c68fa129a1978d94b1e2838fc2e7e514114:index.php
