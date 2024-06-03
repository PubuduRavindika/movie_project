<?php

// Validate form data
function validateData($data)
{
    $errors = [];
    if (empty($data['first_name'])) {
        $errors[] = 'First name is required.';
    }
    if (empty($data['last_name'])) {
        $errors[] = 'Last name is required.';
    }
    if (empty($data['email']) || !filter_var($data['email'], FILTER_VALIDATE_EMAIL)) {
        $errors[] = 'A valid email is required.';
    }
    if (empty($data['message'])) {
        $errors[] = 'A message is required.';
    }
    if ($data['checkbox'] !== 'Yes') {
        $errors[] = 'You must agree to the terms and conditions.';
    }

    return $errors;
}


// Check if form is submitted
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Collect and sanitize form data
    $data = [
        'first_name' => htmlspecialchars($_POST['first_name']),
        'last_name' => htmlspecialchars($_POST['last_name']),
        'email' => htmlspecialchars($_POST['email']),
        'telephone' => htmlspecialchars($_POST['telephone']),
        'message' => htmlspecialchars($_POST['message']),
        'checkbox' => isset($_POST['checkbox']) ? 'Yes' : 'No'
    ];

    $errors = validateData($data);

    if (count($errors) > 0) {
        // Store errors in session and redirect back to the form
        session_start();
        $_SESSION['errors'] = $errors;
        header('Location: ../index.php#contact');
        exit();
    } else {
        // Save data to a JSON file
        $jsonFile = 'submissions.json';
        $submissions = [];
        if (file_exists($jsonFile)) {
            $submissions = json_decode(file_get_contents($jsonFile), true);
        }
        $submissions[] = $data;
        file_put_contents($jsonFile, json_encode($submissions, JSON_PRETTY_PRINT));

        // // Send auto-response email to user
        // $userEmail = $data['email'];
        // $userSubject = "Thank you for your submission";
        // $userMessage = "Dear {$data['first_name']} {$data['last_name']},\r\n";
        // $userMessage .= "Thank you for your submission. We have received your message and will get back to you shortly.\r\n";
        // $userMessage .= "Regards,\nYour Organization";
        // $userHeaders = "From: {$data['email']}\r\n";
        // mail($userEmail, $userSubject, $userMessage, $userHeaders);

        // // Send email to admin
        // $adminEmails = 'dumidu.kodithuwakku@ebeyonds.com';
        // $adminSubject = "New Form Submission";
        // $adminMessage = "A new form submission has been received.\r\n";
        // $adminMessage .= "First Name: {$data['first_name']}\r\n";
        // $adminMessage .= "Last Name: {$data['last_name']}\r\n";
        // $adminMessage .= "Email: {$data['email']}\r\n";
        // $adminMessage .= "Telephone: {$data['telephone']}\r\n";
        // $adminMessage .= "Message: {$data['message']}\r\n";
        // $adminMessage .= "Agreed to Terms: {$data['checkbox']}\r\n";
        // $adminMessage .= "Regards,\r\nYour Organization";
        // $adminHeaders = "From: movie_project@ebeyonds.com";
        // $adminHeaders .= 'Cc: prabhath.senadheera@ebeyonds.com' . "\r\n";
        // mail($adminEmails, $adminSubject, $adminMessage, $adminHeaders);

        header('Location: ../index.php#contact');
        exit();
    }
}
