<?php 
	require_once $_SERVER['DOCUMENT_ROOT'].'/scripts/connect.php';
	
	$page = (int)$_POST['page'];
	$pageView = $page * 10;
	$orders = $ApiClient->get("orders", array(start => $pageView, limit => 10));
	$pageContent = json_encode($orders->orders);
	echo $pageContent;
?>