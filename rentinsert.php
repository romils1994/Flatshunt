<?php
	$link = mysqli_connect("mysql.hostinger.in","u930263604_flat","Smarty1994","u930263604_flats");
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
	$area = serialize($_POST['rent_area']);
	$house = serialize($_POST['house']);
	$amenities = serialize($_POST['rent_amenities']);
	$target_paths = array();
	$target_pathe = array();
	$errors =array();
	
	$j = 0;     // Variable for indexing uploaded image.
	$target_path = "uploads/";     // Declaring Path for uploaded images.
	for ($i = 0; $i < count($_FILES['rent_image']["name"]); $i++) {
		// Loop to get individual element from the array
		$validextensions = array("jpeg", "jpg", "png", "bmp", "gif","JPEG","JPG","PNG","BMP","GIF");      // Extensions which are allowed.
		$ext = pathinfo(basename($_FILES['rent_image']['name'][$i]),PATHINFO_EXTENSION);   // Explode file name from dot(.)
		$target_pathe[$i] = $target_path . md5(uniqid())."_".time().".".$ext;     // Set the target path with a new name of image.
		$j = $j + 1;      // Increment the number of uploaded images according to the files in array.
		if (in_array($ext, $validextensions)) {
			if (move_uploaded_file($_FILES['rent_image']['tmp_name'][$i], $target_pathe[$i])) {
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
		$query = "INSERT into rent_table(Name, Email_Id, Contact_No, City, Locality, Address, Latitude, Longitude, Bedrooms, Bathrooms, Balconies, Area, Room, Total_Area, Rent, Floor, Total_Floor, Amenities, Furnishing, Construction_Age, Preferred_tenant, Description, Image_Path) VALUES ('$name','$email_id','$contact_no','$city','$locality','$address','$latitude','$longitude','$room','$bath','$balcony','$area','$house','$total_area','$price','$floor','$total_floor','$amenities','$furnish','$age','$tenant','$description','$target_pathes')";
		$res = mysqli_query($link, $query);
		echo $res;
		if($res){
			echo "<script type='text/javascript'>
					$('#rent_confirm').prop('disabled', true);
                    $('#rent_submit').prop('disabled', true);
			  	  </script>
			  	  <div class='card-panel  teal lighten-2'><p class='white-text center'>Thank you your respnse is recorded... Hope you soon find a tenant!!!</p></div>";
		}
		else{
			echo "<div class='card-panel yellow lighten-5'><p class='red-text'>OOPS!! Something Went wrong... Please Try Again later or send us email at admin@flatshunt.com .";
		}
	}
?>	