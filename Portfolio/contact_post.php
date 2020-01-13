<?php require_once('admin/include/db.php');?>
<?php
// header('location:index.php');

// Check for empty fields
if(empty($_POST['name'])  		||
   empty($_POST['email']) 		||
   empty($_POST['subject']) 		||
   empty($_POST['message'])	||
   !filter_var($_POST['email'],FILTER_VALIDATE_EMAIL))
   {
	echo "No arguments Provided!";
	return false;
   }
    $name = $_POST['name'];
    $email_address = $_POST['email'];
    $subject = $_POST['subject'];
    $message = $_POST['message'];
    
    echo $insert_query = "INSERT INTO mail(name,email,subject,message) VALUES('$name','$email_address','$subject','$message')";
    if (mysqli_query($db,$insert_query)){
        session_start();
        $_SESSION['mail_msg'] = "message sent successfully";
        echo "<script>window.open('index.php#testimonial','_self');</script>";
        die();
    }
die();
// Create the email and send the message
$to = 'yourname@yourdomain.com';

// $email_subject = "Website Contact Form:  $name";

$email_body = "You have received a new message from your website contact form.\n\n"."Here are the details:\n\nName: $name\n\nEmail: $email_address\n\nMessage:\n$message";

$headers = "From: noreply@yourdomain.com\n"; // This is the email address the generated message will be from. We recommend using something like noreply@yourdomain.com.

$headers .= "Reply-To: $email_address";	

mail($to,$subject,$email_body,$headers);

return true;			
?>