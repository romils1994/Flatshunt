<?php
	$link = mysqli_connect("localhost","root","root","Flatshunt");
	$id = $_POST['rent_id']; 
    $query = ("SELECT Latitude, Longitude, Address from rent_table where id = '$id'");
    $res=mysqli_query($link,$query);
    $array = mysqli_fetch_row($res);
    echo json_encode($array);
?>