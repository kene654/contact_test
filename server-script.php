<?php
//
// Check if the request is a POST request
if ($_SERVER["REQUEST_METHOD"] === "POST") {
    // Get the raw POST data
    $postData = file_get_contents("php://input");

    // Decode the JSON data
    $formData = json_decode($postData);

    // Extract data from the form
    $name = $formData->name;
    $email = $formData->email;
    $message = $formData->message;

    // You can customize the email content and recipient as needed
    $to = "kensoncs.official@gmail.com";
    $subject = "New Contact Form Submission";
    $messageBody = "Name: $name\nEmail: $email\nMessage: $message";

    // Additional headers
    $headers = "From: $email" . "\r\n" .
        "Reply-To: $email" . "\r\n" .
        "X-Mailer: PHP/" . phpversion();

    // Send the email
    if (mail($to, $subject, $messageBody, $headers)) {
        // Return a success message
        echo "Form submission successful!";
    } else {
        // Return an error message
        echo "Failed to send email. Please try again.";
    }
} else {
    // Return an error if the request method is not POST
    echo "Invalid request method";
}

?>