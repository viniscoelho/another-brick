<?php
	include("../scripts/db.php");

	$products_id = array();
	$products_name = array();
	$categorie_name = array();
	$prices = array();
	$stock[] = array();
	$description = array();
	$colors = array();
	$colors_quantity = array();
    $id_with_name = array();
	$category_with_name = array();
	$supplies = array();
	$suppliers_phone = array();

	#this is for both buy.php and contact.php

	$sql_def = "SELECT *
			FROM `my_products`
			WHERE category_name = ";

	for ( $i = 0; $i < 3; $i++ )
	{
		if ( $i == 0 ) $sql = $sql_def . "'Decor' ORDER BY product_id;";
		else if ( $i == 1 ) $sql = $sql_def . "'Tools' ORDER BY product_id;";
		else $sql = $sql_def . "'Supplies' ORDER BY product_id;";
			
		$result = mysql_query($sql)
			or die(mysql_error());
		while ($row = mysql_fetch_assoc($result))
		{
			$products_id[] = 'product'.$row['product_id'];
			$products_name[] = $row['product_name'];
			$categorie_name[] = $row['category_name'];
			$prices[] = $row['price'];
			$stock[] = $row['stock_quantity'];
			$description[] = $row['description'];
			$colors[] = $row['color'];
            $id_with_name[$row['product_id']] = $row['product_name'];
			$category_with_name[$row['product_name']] = $row['category_name'];
		}
	}
	
	#this is for buy.php

	$sql = "SELECT *
			FROM `my_products_colors`";

	$result = mysql_query($sql)
			or die(mysql_error());
	while ($row = mysql_fetch_assoc($result))
	{
		$colors[] = $row['color'];
		$colors_quantity = $row['quantity'];
	}

	#this is for featured.php

	$invoice_products = array();

	$sql = "SELECT product_id, COUNT(product_id) AS products_bought
			FROM `my_invoice`
			GROUP BY product_id
            ORDER BY products_bought DESC;";
			
	$result = mysql_query($sql)
		or die(mysql_error());
	while ($row = mysql_fetch_assoc($result))
	{
		$invoice_products[$row['product_id']] = $row['products_bought'];
	}

	#this is for suppliers.php

	$sql = "SELECT *
			FROM `my_suppliers`;";
			
	$result = mysql_query($sql)
		or die(mysql_error());
	while ($row = mysql_fetch_assoc($result))
	{
		$suppliers[] = $row['name'];
		$suppliers_phone[] = $row['phone'];
	}

?>