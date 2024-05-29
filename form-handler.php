<?php
// Retrieve form data
$name = $_POST['name'];
$visitor_email = $_POST['email'];
$subject = $_POST['subject'];
$message = $_POST['message'];

// Validate email
if (!filter_var($visitor_email, FILTER_VALIDATE_EMAIL)) {
    echo "Invalid email format";
    exit;
}

// Define email sender and receiver
$email_from = 'academicsphereinfo@gmail.com';
$to = "mahmad16feb@gmail.com";

// Create email subject and body
$email_subject = 'New Form Submission';
$email_body = "User Name: $name\n".
              "User Email: $visitor_email\n".
              "Subject: $subject\n".
              "Message: $message\n";

// Set headers
$headers = "From: $email_from \r\n";
$headers .= "Reply-To: $visitor_email \r\n";

// Send email
if (mail($to, $email_subject, $email_body, $headers)) {
    // Redirect to contact page
    header("Location: contact.html");
    exit;
} else {
    echo "Email sending failed.";
}
?>
