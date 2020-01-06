<?php
// Check for empty fields
require_once('admin/include/db.php');
session_start();

if(empty($_POST['name'])  		||
   empty($_POST['email']) 		||
   empty($_POST['message'])	||
   !filter_var($_POST['email'],FILTER_VALIDATE_EMAIL))
   {
	$_SESSION['mail_msg']="No arguments Provided!";
	header('location:index.php#contact');
	// return false;
   }
   else
   {	
	$name = $_POST['name'];
	$email_address = $_POST['email'];
	$message = htmlspecialchars($_POST['message'], ENT_QUOTES);

	$insert = "INSERT INTO mail(name,email,message,status)VALUES('$name','$email_address','$message','unread')";
	mysqli_query($db,$insert);

	$_SESSION['mail_msg']="Your mail is Sent";	
	header('location:index.php#contact');

	// Create the email and send the message
	/*
	$to = 'yourname@yourdomain.com'; // Add your email address inbetween the '' replacing yourname@yourdomain.com - This is where the form will send a message to.
	$email_subject = "Website Contact Form:  $name";
	$email_body = "You have received a new message from your website contact form.\n\n"."Here are the details:\n\nName: $name\n\nEmail: $email_address\n\nMessage:\n$message";
	$headers = "From: noreply@yourdomain.com\n"; // This is the email address the generated message will be from. We recommend using something like noreply@yourdomain.com.
	$headers .= "Reply-To: $email_address";	
	mail($to,$email_subject,$email_body,$headers);
	return true;
	*/
	}

?>