<?php
	$link = mysqli_connect("mysql.hostinger.in","u930263604_flat","Smarty1994","u930263604_flats");
    $query_rent = ("SELECT min(Total_Area), max(Total_Area) from rent_table");
    $res_rent=mysqli_query($link,$query_rent);
    $array = mysqli_fetch_row($res_rent);
    echo json_encode($array);
?>