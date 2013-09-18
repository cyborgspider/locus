<?php
$errors = '';
$myemail = 'jchung@jclawcpa.com';//<-----Put Your email address here.
if(empty($_POST['first_name'])  ||
   empty($_POST['last_name']) ||
   empty($_POST['email']) ||
   empty($_POST['phone'])  ||
   empty($_POST['company']) ||
   empty($_POST['address']) ||
   empty($_POST['city']) ||
   empty($_POST['state']) ||
   empty($_POST['zip'])  ||
   empty($_POST['country']) ||
   empty($_POST['comments'])

   )
{
    $errors .= "\n Error: all fields are required";
}

$first_name = $_POST['first_name'];
$last_name  = $_POST['last_name'];
$email      = $_POST['email'];
$phone      = $_POST['phone'];
$company    = $_POST['company'];
$address    = $_POST['address'];
$city       = $_POST['city'];
$state      = $_POST['state'];
$zip        = $_POST['zip'];
$country    = $_POST['country'];
$comments   = $_POST['comments'];
$reason     = $_POST['reason'];

if (!preg_match(
"/^[_a-z0-9-]+(\.[_a-z0-9-]+)*@[a-z0-9-]+(\.[a-z0-9-]+)*(\.[a-z]{2,3})$/i",
$email))
{
    $errors .= "\n Error: Invalid email address";
}

if( empty($errors))
{
	$to = $myemail;
	$email_subject = "You've received an inquiry from $first_name $last_name";
	$email_body = "You have received a new message from the Locus website. ".
	" Here are the details:\n Name: $first_name $last_name \n Email: $email \n Phone: $phone \n Company: $company \n Address: $address \n City: $city \n State: $state \n Zip: $zip \n Country: $country \n Reason: $reason \n Message \n $comments";

	$headers = "From: $myemail\n";
	$headers .= "Reply-To: $email";

	mail($to,$email_subject,$email_body,$headers);
	//redirect to the 'thank you' page
	header('Location: thanks.html');
}
?>
<!DOCTYPE HTML>
<html>
<body>
<!-- This page is displayed only if there is some error -->
<?php
echo nl2br($errors);
?>
</body>
</html>