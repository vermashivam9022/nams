<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Set the recipient email address
    $to = "nams@iitbhilai.ac.in"; // Replace with your actual email

    // Get form inputs and sanitize them
    $name = htmlspecialchars(strip_tags($_POST["name"]));
    $email = filter_var($_POST["email"], FILTER_SANITIZE_EMAIL);
    $phone = htmlspecialchars(strip_tags($_POST["phone"]));
    $subject = htmlspecialchars(strip_tags($_POST["subject"]));
    $message = htmlspecialchars(strip_tags($_POST["message"]));

    // Email subject
    $email_subject = "New Contact Form Submission: " . $subject;

    // Email body
    $email_body = "You have received a new message from your website contact form.\n\n";
    $email_body .= "Name: $name\n";
    $email_body .= "Email: $email\n";
    $email_body .= "Phone: $phone\n";
    $email_body .= "Subject: $subject\n\n";
    $email_body .= "Message:\n$message\n";

    // Email headers
    $headers = "From: $name <$email>\r\n";
    $headers .= "Reply-To: $email\r\n";
    $headers .= "Content-Type: text/plain; charset=UTF-8\r\n";

    // Send the email
    if (mail($to, $email_subject, $email_body, $headers)) {
        echo "OK"; // This message will be checked in JavaScript
    } else {
        echo "Error: Mail not sent!";
    }
} else {
    echo "Error: Invalid Request!";
}
?>
