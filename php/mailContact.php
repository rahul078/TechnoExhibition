<?php
	if(isset($_POST['submit'])){
		$name=$_POST['name'];
		$email=$_POST['email'];
		$phone=$_POST['phone'];
	  $date=$_POST['wedding_date_time'];
		$venue=$_POST['wedding_venue'];
		$numberofguests=$_POST['number_of_guests'];

		$to='mohansuryanarayana@mail.com'; // Receiver Email ID, Replace with your email ID
		$subject='Food Wastage Management System';
		$message="Name :".$name."\n"."Phone :".$phone."\n"."Email :".$email."\n"."Wedding Venue :".$wedding_venue."\n"."Number of Guests :".$number_of_guests."\n";
		$headers="From: ".$email;

		if(mail($to, $subject, $message, $headers)){
			alert("sent");
		}
		else{
			alert("not sent");
		}
	}
?>
