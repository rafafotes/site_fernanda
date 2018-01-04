<?php 
$errors = '';
$myemail = 'rafafotes@gmail.com';//<-----Put Your email address here.
if(empty($_POST['nome'])  || 
   empty($_POST['email']) || 
   empty($_POST['mensagem']) ||
   empty($_POST['telefone'])
)
{
    $errors .= "\n Error: all fields are required";
}

$name = $_POST['nome']; 
$email_address = $_POST['email']; 
$message = $_POST['mensagem']; 
$telefone = $_POST['telefone']; 

if (!preg_match(
"/^[_a-z0-9-]+(\.[_a-z0-9-]+)*@[a-z0-9-]+(\.[a-z0-9-]+)*(\.[a-z]{2,3})$/i", 
$email_address))
{
    $errors .= "\n Error: Invalid email address";
}

if( empty($errors))
{
	$to = $myemail; 
	$email_subject = "Contato via site: $name";
	$email_body = "Você recebeu uma nova mensagem. ".
	" Aqui estão os detalhes:\n Nome: $name \n Email: $email_address \n Telefone $telefone \n Mensagem \n $message"; 
	
	$headers = "From: $myemail\n"; 
	$headers .= "Reply-To: $email_address";
	
	mail($to,$email_subject,$email_body,$headers);
	//redirect to the 'thank you' page
	header('Location: contato-sucesso.html');
} 
?>
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd"> 
<html>
<head>
	<title>Contact form handler</title>
</head>

<body>
<!-- This page is displayed only if there is some error -->
<?php
echo nl2br($errors);
?>


</body>
</html>