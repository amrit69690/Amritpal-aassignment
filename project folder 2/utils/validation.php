<?php

// Function to sanitize and validate text input
function validateText($input) {
    // Remove leading and trailing whitespaces
    $input = trim($input);
    // Remove HTML and PHP tags
    $input = strip_tags($input);
    // Convert special characters to HTML entities
    $input = htmlspecialchars($input, ENT_QUOTES, 'UTF-8');
    return $input;
}

// Function to validate a numeric input
function validateNumber($input) {
    // Remove leading and trailing whitespaces
    $input = trim($input);
    // Ensure the input is a numeric value
    if (is_numeric($input)) {
        return $input;
    } else {
        return false;
    }
}

// Function to validate an email address
function validateEmail($input) {
    // Remove leading and trailing whitespaces
    $input = trim($input);
    // Validate email format
    if (filter_var($input, FILTER_VALIDATE_EMAIL)) {
        return $input;
    } else {
        return false;
    }
}

// Function to validate a password
function validatePassword($input) {
    // Remove leading and trailing whitespaces
    $input = trim($input);
    // Ensure the password is at least 8 characters long
    if (strlen($input) >= 8) {
        return $input;
    } else {
        return false;
    }
}

?>
