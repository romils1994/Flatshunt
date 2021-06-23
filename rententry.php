<?php
	if($_SERVER["REQUEST_METHOD"] === "POST")
    {
    	$recaptcha_secret = "6Lc_oBoTAAAAAA_ojvO07qwlWRZ-eXw0aUaYMjlW";
    	$ip = $_SERVER['REMOTE_ADDR'];
        $response = file_get_contents("https://www.google.com/recaptcha/api/siteverify?secret=".$recaptcha_secret."&response=".$_POST['g-recaptcha-response']."&remoteip=".$ip);
        $response = json_decode($response, true);

        if($response["success"] === true)
        {
        	$link = mysqli_connect("flatshuntdb.cwhxcsv9iwaa.us-east-2.rds.amazonaws.com","admin","admin123","Flatshunt");
			$name = mysqli_real_escape_string($link, $_POST['rent_name']);
			$email_id = mysqli_real_escape_string($link, $_POST['rent_mail']);
			$contact_no = mysqli_real_escape_string($link, $_POST['rent_no']);
			$city = mysqli_real_escape_string($link, $_POST['rent_city']);
			$locality = mysqli_real_escape_string($link, $_POST['rent_locality']);
			$address = mysqli_real_escape_string($link, $_POST['rent_address']);
			$latitude = mysqli_real_escape_string($link, $_POST['rent_latitude']);
			$longitude = mysqli_real_escape_string($link, $_POST['rent_longitude']);
			$room = mysqli_real_escape_string($link, $_POST['rent_rooms']);	
			$bath = mysqli_real_escape_string($link, $_POST['rent_bath']);	
			$balcony = mysqli_real_escape_string($link, $_POST['rent_balcony']);
			$total_area = mysqli_real_escape_string($link, $_POST['rent_total_area']);
			$price = mysqli_real_escape_string($link, $_POST['rent_price']);
			$floor = mysqli_real_escape_string($link, $_POST['rent_floor']);
			$total_floor = mysqli_real_escape_string($link, $_POST['rent_total_floor']);
			$furnish = mysqli_real_escape_string($link, $_POST['rent_furnish']);
			$age = mysqli_real_escape_string($link, $_POST['rent_age']);
			$tenant = mysqli_real_escape_string($link, $_POST['rent_tenant']);
			$description = mysqli_real_escape_string($link, $_POST['rent_description']);

			print "<h4>Contact Details</h4><p><table class='responsive-table highlight'><thead><tr><th>Name</th><th>Email ID</th><th>Contact No.</th></tr></thead><tbody><tr><td>".$name."</td><td>".$email_id."</td><td>".$contact_no."</td></tr></tbody></table></p>";
			print "<h4>Location Details</h4><p><table class='responsive-table highlight'><thead><tr><th>City</th><th>Locality</th><th>Address</th></tr></thead><tbody><tr><td>".$city."</td><td>".$locality."</td><td>".$address."</td></tr></tbody></table></p>";
			print "<h4>Property Details</h4><p><table class='responsive-table highlight'><thead><tr><th>No. of Bedrooms</th><th>Number of Bathrooms</th><th>Number of Balconies</th><th>Covered Area(sq.ft.)</th><th>Situated on Floor</th><th>Outoff Floor</th><th>Amenities</th><th>Furnishing</th><th>Age of Construction</th><th>Preferred Tenants</th><th>Monthly Rent(&#8377;)</th></tr></thead><tbody><tr><td>".$room."</td><td>".$bath."</td><td>".$balcony."</td><td>".$total_area."</td><td>".$floor."</td><td>".$total_floor."</td><td>";
			foreach ($_POST['rent_amenities'] as $amenities) {
				print $amenities."&nbsp;";

			}
			print "</td><td>".$furnish."</td><td>".$age."</td><td>".$tenant."</td><td>".$price."</td></tr></tbody></table></p>";
		}
		else{
			print "<p class='red-text'>The Captcha isn't verified..</p>";
		}
	}
?>