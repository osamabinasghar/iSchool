<?php
require_once '../utils/email_utils.php';
require_once '../utils/utility_functions.php';
require_once '../includes/Headers.php';
if ($_SERVER['REQUEST_METHOD'] === 'POST') {

    $data = json_decode(file_get_contents("php://input"));

    // Check if required fields are empty
    if (empty($data->firstName) || empty($data->email) || empty($data->phonenumber)) {
        sendErrorResponse("name, email, and phonenumber are required.", 400);
    } else {

        $recipient = $data->email;
        $subject = "KZone" ;

        // Construct HTML email message with a simple table
        $message = "Dear " . $data->firstName . " Thank you for reaching out to us. We have received your message and will contact you.";



        // Set headers for HTML email
        $headers = "MIME-Version: 1.0" . "\r\n";
        $headers .= "Content-type:text/html;charset=UTF-8" . "\r\n";

        // Send email
        if (sendNoReplyEmail($recipient, $subject, $message, $headers)) {
            sendJsonResponse(["message" => "Inquiry sent successfully"]);
            $recipient = 'info@kzone.ca';
            $subject = "New Inquiry from " . $data->firstName;

            // Construct HTML email message with a simple table
            $message = "<html><body>";
            $message .= "<h2>New Inquiry:</h2>";
            $message .= "<table border='1' cellspacing='0' cellpadding='10'>";
            $message .= "<tr><td><b>First Name:</b></td><td>" . $data->firstName . "</td></tr>";
            $message .= "<tr><td><b>Middle Name:</b></td><td>" . $data->middleName . "</td></tr>";
            $message .= "<tr><td><b>Last Name:</b></td><td>" . $data->lastName . "</td></tr>";
            $message .= "<tr><td><b>Email:</b></td><td>" . $data->email . "</td></tr>";
            $message .= "<tr><td><b>Phone Number:</b></td><td>" . $data->phonenumber . "</td></tr>";
            $message .= "<tr><td><b>Country of interest:</b></td><td>" . $data->countryOfInterest . "</td></tr>";
            $message .= "<tr><td><b>Applying For:</b></td><td>" . $data->applyingFor . "</td></tr>";
            $message .= "<tr><td><b>Program of Interest:</b></td><td>" . $data->programOfInterest . "</td></tr>";
            $message .= "<tr><td><b>Intake:</b></td><td>" . $data->intake . "</td></tr>";
            $message .= "<tr><td><b>How did you hear about us?:</b></td><td>" . $data->notificationMethod . "</td></tr>";
            $message .= "<tr><td><b>Other Info:</b></td><td>" . $data->other . "</td></tr>";
            $message .= "</table>";
            $message .= "</body></html>";


            if (sendEmail($recipient, $subject, $message, $headers)) {
                sendJsonResponse(["message" => "Inquiry sent successfully"]);
            } else {
                sendErrorResponse("Failed to send inquiry", 500);
            }
        } else {
            sendErrorResponse("Failed to send inquiry", 500);
        }
    }
} else {
    sendErrorResponse("Invalid request method", 405);
}
