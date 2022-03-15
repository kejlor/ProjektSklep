<?php

//fetch_item.php

require_once 'config/database.php';

$query = "SELECT * FROM produkty ORDER BY id_produktu DESC";

$statement = $bazadanych->prepare($query);

if($statement->execute())
{
	$result = $statement->fetchAll();
	$output = '';
	foreach($result as $row)
	{
		$output .= '
		<div class="col-md-4" style="margin-top:12px;">  
            <div >
            	<center><img src="img/'.$row["zdjecie"].'" class="img-responsive" style="height:200px; width:276px" /><br /></center>
            	<center><h4 class="text-info">'.$row["model"].'</h4></center>
                  <center><h4 class="media-heading">'.$row["opis"].'</h4></center>
            	<center><h4 class="text-danger">PLN '.$row["cena"] .'</h4></center>
            	<input type="text" name="quantity" id="quantity' . $row["id_produktu"] .'" class="form-control" value="1" />
            	<input type="hidden" name="hidden_name" id="name'.$row["id_produktu"].'" value="'.$row["model"].'" />
            	<input type="hidden" name="hidden_price" id="price'.$row["id_produktu"].'" value="'.$row["cena"].'" />
            	<center><input type="button" name="add_to_cart" id="'.$row["id_produktu"].'"  class="btn btn-info form-control add_to_cart" value="Dodaj Do Koszyka" /></center>
            </div>
        </div>
		';
	}
	echo $output;
}


?>