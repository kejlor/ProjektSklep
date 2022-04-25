<?php

//fetch_cart.php

session_start();

$total_price = 0;
$total_item = 0;

$output = '
<div class="table-responsive" id="order_table">
	<table class="table table-bordered table-striped">
		<tr>  
            <th width="40%">Nazwa Produktu</th>  
            <th width="10%">Liczba</th>  
            <th width="20%">Cena</th>  
            <th width="15%">Razem</th>  
            <th width="5%">Akcja</th>  
        </tr>
';
if(!empty($_SESSION["shopping_cart"]))
{
	foreach($_SESSION["shopping_cart"] as $keys => $values)
	{
		$output .= '
		<form method="POST">
		<tr>
		
			<td><input type="hidden"value="'.$values["product_name"].'"  name="nazwa">'.$values["product_name"].'</td>
			<td><input type="hidden"value="'.$values["product_quantity"].'"  name="liczba">'.$values["product_quantity"].'</td>
			<td align="right"><input type="hidden"value="'.$values["product_price"].'"  name="cena">PLN '.$values["product_price"].'</td>
			<td align="right"><input type="hidden"value="'.number_format($values["product_quantity"] * $values["product_price"], 2).'"  name="razem">PLN '.number_format($values["product_quantity"] * $values["product_price"], 2).'</td>
			
			<td><button name="delete" class="btn btn-danger btn-xs delete" id="'. $values["product_id"].'">Usuń</button></td>

		</tr>
		</form>
		';
		$total_price = $total_price + ($values["product_quantity"] * $values["product_price"]);
		$total_item = $total_item + 1;

	}
	$output .= '
	<tr>  
        <td colspan="3" align="right">Razem</td>  
        <td align="right">PLN '.number_format($total_price, 2).'</td>  
        <td></td> 
        
    </tr>
    
	';
}
else
{
	$output .= '
    <tr>
    	<td colspan="5" align="center">
    		Twój Koszyk Jest Pusty!
    	</td>
    </tr>
    ';
}
$output .= '</table></div>';
$data = array(
	'cart_details'		=>	$output,
	'total_price'		=>	'PLN' . number_format($total_price, 2),
	'total_item'		=>	$total_item
);	

echo json_encode($data);


?>