<?php
	$link = mysqli_connect("localhost","root","root","Flatshunt");
    $query_rent = ("SELECT min(Total_Area), max(Total_Area) from rent_table");
    $res_rent=mysqli_query($link,$query_rent);
    $array = mysqli_fetch_row($res_rent);
    echo json_encode($array);
?>