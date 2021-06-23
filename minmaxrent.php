<?php
	$link = mysqli_connect("flatshuntdb.cwhxcsv9iwaa.us-east-2.rds.amazonaws.com","admin","admin123","Flatshunt");
    $query_rent = ("SELECT min(Total_Area), max(Total_Area) from rent_table");
    $res_rent=mysqli_query($link,$query_rent);
    $array = mysqli_fetch_row($res_rent);
    echo json_encode($array);
?>