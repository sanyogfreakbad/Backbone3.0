<?php

$name = $_POST['name'];

$visitor_email = $_POST['email'];

$subject = $_POST['subject'];

$message = $_POST['message'];

$email_from = 'Manipal@info.com';

$email_subject = 'New Form Submission';

$email_body = "User Name: $name.\n".
               "User email: $visitor_email.\n".
               "Subject: $subject.\n".
               "Message: $message.\n";

$to = 'salavtorestefan141@gmail.com';

$headers = "From: $email_from_\r\n";

$headers = "Reply-To: $visitor_email \r\n";

ail($to, $email_subject, $email_body, $headers);

header("Location: contact.html");

?>
