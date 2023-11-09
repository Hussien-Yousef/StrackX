<?php
// PHP code for sending the email

// Check if the form is submitted
if (isset($_POST['submit'])) {

  // Get the form data
  $name = $_POST['name'];
  $email = $_POST['email'];
  $message = $_POST['message'];

  // Validate the form data
  if (empty($name)) {
    // Display an error message if any field is empty
    echo "Please Enter Your Name.";
  }elseif(empty($email)){
    echo "Enter Your Email.";
  } elseif(empty($message)){
    echo "Write A Message.";
  } else {
    // Sanitize the form data
    $name = filter_var($name, FILTER_SANITIZE_STRING);
    $email = filter_var($email, FILTER_SANITIZE_EMAIL);
    $message = filter_var($message, FILTER_SANITIZE_STRING);

    // Set the email headers
    $to = "asser.hussien.rayyan@gmail.com"; 
    $subject = "Contact Form Message"; // The email subject
    $headers = "From: $name <$email>\r\n"; // The email sender

    // Send the email
    if (mail($to, $subject, $message, $headers)) {
      // Display a success message if the email is sent
      echo "Your message has been sent. Thank you!";
    } else {
      // Display an error message if the email is not sent
      echo "Something went wrong. Please try again.";
    }
  }
}
?>