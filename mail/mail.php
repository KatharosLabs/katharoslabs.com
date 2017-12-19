<?php
require_once 'vendor/autoload.php';
header("Access-Control-Allow-Origin: *");

// Create the Transport
$transport = (new Swift_SmtpTransport('smtp.zoho.com', 587, 'tls'))
  ->setUsername('arsh@agsoftwaresolutions.com')
  ->setPassword('AGsoft1234')
;

// Create the Mailer using your created Transport
$mailer = new Swift_Mailer($transport);

$message =  '<table width="100%" border="1px" cellpadding="5px" >';

foreach(['name','phone','email','message'] as $key){
	if(!isset($_POST[$key]))
		continue;
	$message .= '<tr>';
	$message .= '<td width="20%">';
	$message .= strtoupper($key);
	$message .= '</td>';
	$message .= '<td>';
	$message .= $_POST[$key];
	$message .= '</td>';
	$message .= '</tr>';
}

$message .= '</table>';

// Create a message
$message = (new Swift_Message('Enquiry from Katharos'))
			  ->setFrom(['arsh@agsoftwaresolutions.com' => 'Marketing Site'])
			  ->setTo(['arshdeep79@gmail.com','tiffany@katharoslabs.com'])
			  ->setBody($message,'text/html');

// Send the message
$result = $mailer->send($message);
echo "OK";