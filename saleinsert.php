<?php
	$link = mysqli_connect("flatshuntdb.cwhxcsv9iwaa.us-east-2.rds.amazonaws.com","admin","admin123","Flatshunt");
	$name = mysqli_real_escape_string($link, $_POST['sale_name']);
	$email_id = mysqli_real_escape_string($link, $_POST['sale_mail']);
	$contact_no = mysqli_real_escape_string($link, $_POST['sale_no']);
	$city = mysqli_real_escape_string($link, $_POST['sale_city']);
	$locality = mysqli_real_escape_string($link, $_POST['sale_locality']);
	$address = mysqli_real_escape_string($link, $_POST['sale_address']);
	$latitude = mysqli_real_escape_string($link, $_POST['sale_latitude']);
	$longitude = mysqli_real_escape_string($link, $_POST['sale_longitude']);
	$room = mysqli_real_escape_string($link, $_POST['sale_rooms']);	
	$bath = mysqli_real_escape_string($link, $_POST['sale_bath']);	
	$balcony = mysqli_real_escape_string($link, $_POST['sale_balcony']);
	$total_area = mysqli_real_escape_string($link, $_POST['sale_total_area']);
	$price = mysqli_real_escape_string($link, $_POST['sale_price']);
	$floor = mysqli_real_escape_string($link, $_POST['sale_floor']);
	$total_floor = mysqli_real_escape_string($link, $_POST['sale_total_floor']);
	$furnish = mysqli_real_escape_string($link, $_POST['sale_furnish']);
	$transaction = mysqli_real_escape_string($link, $_POST['sale_transaction']);
	$possession = mysqli_real_escape_string($link, $_POST['sale_possession']);
	$description = mysqli_real_escape_string($link, $_POST['sale_description']);
	$area = serialize($_POST['sale_area']);
	$house = serialize($_POST['house']);
	$amenities = serialize($_POST['sale_amenities']);
	$target_paths = array();
	$target_pathe = array();
	$errors =array();
	
	$j = 0;     // Variable for indexing uploaded image.
	$target_path = "uploads/";     // Declaring Path for uploaded images.
	for ($i = 0; $i < count($_FILES['sale_image']["name"]); $i++) {
		// Loop to get individual element from the array
		$validextensions = array("jpeg", "jpg", "png", "bmp", "gif","JPEG","JPG","PNG","BMP","GIF");      // Extensions which are allowed.
		$ext = pathinfo(basename($_FILES['sale_image']['name'][$i]), PATHINFO_EXTENSION);  // Explode file name from dot(.)
		$target_pathe[$i] = $target_path . md5(uniqid())."_".time().".".$ext;     // Set the target path with a new name of image.
		$j = $j + 1;      // Increment the number of uploaded images according to the files in array.
		if (in_array($ext, $validextensions)) {
			if (move_uploaded_file($_FILES['sale_image']['tmp_name'][$i], $target_pathe[$i])) {
				chmod($target_pathe[$i], 0755);
				$target_paths[] = $target_pathe[$i];
					// If file moved to uploads folder.
			} else {
				$errors[]= "OMG!!! Something went wrong";     //  If File Was Not Moved.
				echo '<div class="card-panel yellow lighten-5"><p class="red-text">OMG!!! Something went wrong...</p></div><br/><br/>';
			}
		} else {
			$errors[]="Invalid Image Type";     //   If File Size And File Type Was Incorrect.
			echo '<div class="card-panel yellow lighten-5"><p class="red-text">Invalid Image Type(Only JPEG, JPG, PNG, BMP and GIF supported)!!!</p></div><br/><br/>';
		}
	}
	if(empty($errors)){
		$target_pathes = serialize($target_paths);
		$query = "INSERT into sale_table (Name, Email_Id, Contact_No, City, Locality, Address, Latitude, Longitude, Bedrooms, Bathrooms, Balconies, Area, Room, Total_Area, Price, Floor, Total_Floor, Amenities, Furnishing, Transaction, Possession, Description, Image_Path) VALUES ('$name','$email_id','$contact_no','$city','$locality','$address','$latitude','$longitude','$room','$bath','$balcony','$area','$house','$total_area','$price','$floor','$total_floor','$amenities','$furnish','$transaction','$possession','$description','$target_pathes')";
		$res = mysqli_query($link, $query);
		if($res){
			echo "<script type='text/javascript'>
					$('#sale_confirm').prop('disabled', true);
                    $('#sale_submit').prop('disabled', true);
			  	  </script>
					<div class='card-panel  teal lighten-2'><p class='white-text center'>Thank you your respnse is recorded... Hope you soon find a buyer!!!</p></div>";
		}
		else{
			echo "<div class='card-panel yellow lighten-5'><p class='red-text'>OOPS!! Something Went wrong... Please Try Again later or send us email at admin@flatshunt.com .";
		}
	}
?>	