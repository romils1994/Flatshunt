<?php
	$link = mysqli_connect("ec2-18-222-153-228.us-east-2.compute.amazonaws.com","root","root","Flatshunt");
	$name = mysqli_real_escape_string($link,$_POST['contact_name']);
	$phone = mysqli_real_escape_string($link,$_POST['contact_phone']);
	$email = mysqli_real_escape_string($link,$_POST['contact_mail']);
	$message = mysqli_real_escape_string($link,$_POST['contact_msg']);
	$query = ("INSERT into feedback_table(Name,Contact_No,Email_ID,Message) VALUES ('$name','$phone','$email','$message')");
	$res = mysqli_query($link,$query);
	if($res){
		echo "<script type='text/javascript'>
				$('#contact_submit').prop('disabled', true);
			  </script>
				<div class='card-panel  teal lighten-2'><p class='white-text center'>Thank you for your FEEDBACK, It will help us to be better!!!</p></div>";
	}
	else{
		echo '<div class="card-panel yellow lighten-5"><p class="red-text">OMG!!! Something went wrong...</p></div><br/><br/>';
	}
?>