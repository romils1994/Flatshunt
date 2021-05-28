<?php
	$link = mysqli_connect("localhost","root","root","Flatshunt");
	$id = $_POST['buy_id']; 
    $query = ("SELECT Latitude, Longitude, Address from sale_table where id = '$id'");
    $res=mysqli_query($link,$query);
    $array = mysqli_fetch_row($res);
    echo json_encode($array);
?>