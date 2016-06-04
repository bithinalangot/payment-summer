<?php
if( isset( $_SERVER['HTTP_X_REQUESTED_WITH'] ) && ( $_SERVER['HTTP_X_REQUESTED_WITH'] == 'XMLHttpRequest' ) ) {

  $to = "no-reply@mage-themes.com";
  $name = $_POST['name'];
  $subject = "Form submission";
  $message = $name . " wrote the following: " . "\n\n" . $_POST['message'] . "\n\n" . $_POST['email'];
  $headers = "From: no-reply@mage-themes.com"."\r\n" . "Reply-To: no-reply@mage-themes.com"."\r\n";
  mail($to, $subject, $message, $headers);

} else {

  header("Location: index.html");
  exit();

}
?>