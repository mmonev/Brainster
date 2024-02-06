<?php

function is_required($input) {
  return !empty(trim($input));
}

function validate_username($username) {
  if (!is_required($username)) {
    return "Username is required.";
  } elseif (preg_match('/[\s\W]/', $username)) {
    return "Username cannot contain empty spaces or special characters.";
  }
  return true;
}

function validate_email($email) {
  if (!is_required($email)) {
    return "Email is required.";
  } elseif (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
    return "Invalid email format.";
  } elseif (strpos($email, '@') < 5) {
    return "Email must have at least 5 characters before the @ symbol.";
  }
  return true;
}

function validate_password($password) {
  if (!is_required($password)) {
    return "Password is required.";
  } elseif (!preg_match('/\d/', $password)) {
    return "Password must contain at least one number.";
  } elseif (!preg_match('/\W/', $password)) {
    return "Password must contain at least one special character.";
  } elseif (!preg_match('/[A-Z]/', $password)) {
    return "Password must contain at least one uppercase letter.";
  }
  return true;
}

?>
