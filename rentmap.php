<?php
	$link = mysqli_connect("flatshuntdb.cwhxcsv9iwaa.us-east-2.rds.amazonaws.com","admin","admin123","Flatshunt");
	$id = $_POST['rent_id']; 
    $query = ("SELECT Latitude, Longitude, Address from rent_table where id = '$id'");
    $res=mysqli_query($link,$query);
    $array = mysqli_fetch_row($res);
    echo json_encode($array);
?>