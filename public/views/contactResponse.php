<?php
require '../../../../../PHPMailer-master/PHPMailer-master/PHPMailerAutoload.php';

if ($_POST["username"] === "") {
    echo "<p>Username is required!</p>";
    echo "<p><a href='contactForm.html'>Back to contact form</a></p>";
    return;
}

if ($_POST["message"] === "") {
    echo "<p>Message is required!</p>";
    echo "<p><a href='contactForm.html'>Back to contact form</a></p>";
    return;
}

$username = $_POST["username"];
$message = $_POST["message"];

$mail = new PHPMailer;
$mail->isSMTP();
$mail->SMTPSecure = 'ssl';
$mail->SMTPAuth = true;
$mail->SMTPDebug=0;
$mail->Host = 'smtp.gmail.com';
$mail->Port = 465;
$mail->Username = 'projectsterm@gmail.com';
$mail->Password = 'yloz cepg ltdl hxuc';
$mail->setFrom('projectsterm@gmail.com');
$mail->addAddress('projectsterm@gmail.com');
$mail->Subject = "Message from $username";
$mail->Body = "$message";
if (!$mail->send()) {
echo "<p>Error submitting message. Please try again.</p>";
echo "<p><a href='contactForm.html'>Back to contact form</a></p>";
} else {
echo "<p>Message received! Thank you for contacting Perfect Plate!</p>";
echo "<p><a href='index.php'>Back to home page</a></p>";
}
?>