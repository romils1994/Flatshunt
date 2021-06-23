<?php
	$link = mysqli_connect("ec2-18-222-153-228.us-east-2.compute.amazonaws.com","root","root","Flatshunt");
    $query_sale = ("SELECT min(Total_Area), max(Total_Area) from sale_table");
    $res_sale=mysqli_query($link,$query_sale);
    $array = mysqli_fetch_row($res_sale);
    echo json_encode($array);
?>