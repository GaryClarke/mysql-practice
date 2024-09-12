<?php

// Validating an integer
$id = filter_input(INPUT_GET, 'id', FILTER_VALIDATE_INT);
if (false === $id) {
    echo "Invalid ID provided.";
} else {
    echo "Validated ID: $id";
}

// Validating an email
$email = filter_input(INPUT_POST, 'email', FILTER_VALIDATE_EMAIL);
if (false === $email) {
    echo "Invalid email provided.";
} else {
    echo "Validated Email: $email";
}

//**Comments**:
//- **Validation of Integer**: Checks if the `id` parameter from a GET request is a valid integer.
//- **Validation of Email**: Checks if the `email` parameter from a POST request is a valid email format.

### Code for Sanitizing User Inputs

// Sanitizing a string for HTML output
$comment = filter_input(INPUT_POST, 'comment', FILTER_SANITIZE_SPECIAL_CHARS);
echo "Output: " . htmlspecialchars($comment);

// Sanitizing a URL
$url = filter_input(INPUT_GET, 'url', FILTER_SANITIZE_URL);
if (!filter_var($url, FILTER_VALIDATE_URL)) {
    echo "Invalid URL.";
} else {
    echo "Sanitized and Valid URL: " . $url;
}

//**Comments**:
//- **Sanitization for HTML**: Uses `FILTER_SANITIZE_SPECIAL_CHARS` to sanitize a comment for safe HTML output. Additionally, `htmlspecialchars` is used when echoing to ensure any HTML entities are properly encoded.
//- **Sanitization of URL**: Cleans up the URL input to ensure it is a valid URL, removing any illegal characters.
//
//These code examples illustrate how to use PHP’s filter functions to validate and sanitize different types of user inputs, providing a practical approach to secure input handling in web applications. This ensures that the application can prevent common security issues such as SQL injection and XSS by effectively managing user inputs.