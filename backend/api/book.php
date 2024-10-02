<?php
require_once '../utils/email_utils.php';
require_once '../utils/utility_functions.php';
require_once '../includes/Headers.php';


if ($_SERVER['REQUEST_METHOD'] === 'POST') {

    $data = json_decode(file_get_contents("php://input"));

    // Check if required fields are empty
    if (empty($data->name) || empty($data->email) || empty($data->phonenumber)) {
        sendErrorResponse("name, email, and phonenumber are required.", 400);
    } else {
        $recipient = $data->email;
        $subject = "KZone" ;

        // Construct HTML email message with a simple table
        $message = "Dear " . $data->name . " Thank you for reaching out to us. We have received your message and will contact you.";


        // Set headers for HTML email
        $headers = "MIME-Version: 1.0" . "\r\n";
        $headers .= "Content-type:text/html;charset=UTF-8" . "\r\n";

        // Send email
        if (sendNoReplyEmail($recipient, $subject, $message, $headers)) {
            sendJsonResponse(["message" => "Inquiry sent successfully"]);

            $recipient = 'info@kzone.ca';
            // $recipient = 'faisalxd739@gmail.com';
            $subject = "New Inquiry from " . $data->name;

            // Construct HTML email message with a simple table
            $message = "<html><body>";
            $message .= "<h2>New Inquiry:</h2>";
            $message .= "<table border='1' cellspacing='0' cellpadding='10'>";
            $message .= "<tr><td><b>Name:</b></td><td>" . $data->name . "</td></tr>";
            $message .= "<tr><td><b>Email:</b></td><td>" . $data->email . "</td></tr>";
            $message .= "<tr><td><b>Phone Number:</b></td><td>" . $data->phonenumber . "</td></tr>";
            $message .= "<tr><td><b>Country:</b></td><td>" . $data->country. "</td></tr>";
            $message .= "<tr><td><b>City:</b></td><td>" . $data->city. "</td></tr>";
            $message .= "<tr><td><b>Inquiry:</b></td><td>" . $data->inquiry . "</td></tr>";
            $message .= "<tr><td><b>Education:</b></td><td>" . $data->education . "</td></tr>";
            $message .= "<tr><td><b>Program of Interest:</b></td><td>" . $data->ProgramofInterest . "</td></tr>";
            $message .= "<tr><td><b>Session:</b></td><td>" . $data->session . "</td></tr>";
            $message .= "<tr><td><b>One to One Session with:</b></td><td>" . $data->inquirythrough . "</td></tr>";
          
            $message .= "</table>";
            $message .= "</body></html>";

            // Set headers for HTML email
            $headers = "MIME-Version: 1.0" . "\r\n";
            $headers .= "Content-type:text/html;charset=UTF-8" . "\r\n";

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
