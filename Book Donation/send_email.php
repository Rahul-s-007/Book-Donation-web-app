<?php
require_once 'config.php';
require 'sendgrid-php/vendor/autoload.php';
$inp_email = $_POST['email'];
$name = $_POST['name'];

$email = new \SendGrid\Mail\Mail(); 
$email->setFrom("f20210052@dubai.bits-pilani.ac.in", "Books for Everyone");
$email->setSubject("Pickup/Drop Locations");
$email->addTo("".$inp_email."", "".$name."");
$email->addContent("text/plain", "1.)BPDC  2.)Manipal");

$sendgrid = new \SendGrid(SENDGRID_API_KEY);
try {
    $response = $sendgrid->send($email);
    print $response->statusCode() . "\n";
    print_r($response->headers());
    print $response->body() . "\n";
} catch (Exception $e) {
    echo 'Caught exception: '. $e->getMessage() ."\n";
}

?>