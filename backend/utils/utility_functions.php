<?php
/**
 * Send a JSON response with the appropriate HTTP status code.
 *
 * @param mixed $data The data to be included in the response.
 * @param int $status_code The HTTP status code to be sent.
 */
function sendJsonResponse($data, $status_code = 200) {
    http_response_code($status_code);
    header("Content-Type: application/json");
    echo json_encode($data);
}

/**
 * Handle API errors and send a JSON response with an error message.
 *
 * @param string $message The error message to be included in the response.
 * @param int $status_code The HTTP status code for the error response.
 */
function sendErrorResponse($message, $status_code = 400) {
    sendJsonResponse(array("error" => $message), $status_code);
}
