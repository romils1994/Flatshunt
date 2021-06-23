<?php
	$link = mysqli_connect("ec2-18-222-153-228.us-east-2.compute.amazonaws.com","root","root","Flatshunt");
    $query_rent = ("SELECT min(Total_Area), max(Total_Area) from rent_table");
    $res_rent=mysqli_query($link,$query_rent);
    $array = mysqli_fetch_row($res_rent);
    echo json_encode($array);
?>