<?php
	$link = mysqli_connect("ec2-18-222-153-228.us-east-2.compute.amazonaws.com","root","root","Flatshunt");
	$id = $_POST['buy_id']; 
    $query = ("SELECT Latitude, Longitude, Address from sale_table where id = '$id'");
    $res=mysqli_query($link,$query);
    $array = mysqli_fetch_row($res);
    echo json_encode($array);
?>