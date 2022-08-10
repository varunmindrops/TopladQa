<?php
require 'vendor/autoload.php'; 

$apiKey = "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";
// echo $_POST['name']; $_POST['email];
$email = new \SendGrid\Mail\Mail();
$email->setFrom("info@toplad.in", "Toplad");
$email->setSubject("Welcome to Toplad");
$email->addTo(
    trim($_POST['email']),
    trim(ucwords($_POST['name'])),
    [
        "name" => trim(ucwords($_POST['name'])),
    ],
    0
);

$email->setTemplateId('d-c9eff106358b427bbf189bfb102ecd5a');
$sendgrid = new \SendGrid($apiKey);
try {
    $response = $sendgrid->send($email);
    print $response->statusCode() . "\n";
    print_r($response->headers());
    print $response->body() . "\n";
} catch (Exception $e) {
    echo 'Caught exception: '.  $e->getMessage(). "\n";
}