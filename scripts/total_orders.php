<?php 
	require_once $_SERVER['DOCUMENT_ROOT'].'/scripts/connect.php';
	$orders = $ApiClient->get("orders", array());
	$total = $orders->total;
 ?>