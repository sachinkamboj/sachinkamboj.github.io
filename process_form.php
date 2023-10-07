<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = $_POST["name"];
    $email = $_POST["email"];
    $message = $_POST["message"];
    
    $to = "deepanshu6007@gmail.com";  // Replace with your email address
    $subject = "New Contact Us Form Submission from $name";
    $headers = "From: $email\r\n";
    
    // Send the email
    mail($to, $subject, $message, $headers);
    
    // Redirect back to the form with a success message
    header("Location: thank_you.html");  // Create a thank you page
    exit;
}
?>
