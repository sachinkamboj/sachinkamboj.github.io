<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $to = "rdeepanshu6008@gmail.com"; // Replace with the recipient's email address.
    $subject = $_POST["subject"];
    $message = $_POST["message"];
    $headers = "From: " . $_POST["email"];

    // Check if attachments were uploaded.
    if (isset($_FILES["attachment"]) && $_FILES["attachment"]["error"] == UPLOAD_ERR_OK) {
        $file_name = $_FILES["attachment"]["name"];
        $file_tmp = $_FILES["attachment"]["tmp_name"];
        $file_type = $_FILES["attachment"]["type"];
        $file_size = $_FILES["attachment"]["size"];
        $file_data = file_get_contents($file_tmp);

        $boundary = md5(uniqid());
        $headers .= "\r\nMIME-Version: 1.0";
        $headers .= "\r\nContent-Type: multipart/mixed; boundary=\"" . $boundary . "\"";

        $message = "--" . $boundary . "\r\n";
        $message .= "Content-Type: text/plain; charset=\"utf-8\"\r\n";
        $message .= "Content-Transfer-Encoding: 7bit\r\n\r\n";
        $message .= $message . "\r\n\r\n";
        $message .= "--" . $boundary . "\r\n";
        $message .= "Content-Type: " . $file_type . "; name=\"" . $file_name . "\"\r\n";
        $message .= "Content-Disposition: attachment; filename=\"" . $file_name . "\"\r\n";
        $message .= "Content-Transfer-Encoding: base64\r\n";
        $message .= "\r\n" . chunk_split(base64_encode($file_data)) . "\r\n";
        $message .= "--" . $boundary . "--";
    }

    if (mail($to, $subject, $message, $headers)) {
        echo "Email sent successfully!";
    } else {
        echo "Email sending failed.";
    }
}
?>
