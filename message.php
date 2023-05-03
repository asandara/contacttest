<?php

$firstname = $_POST['firstname'];
$lastname = $_POST['lastname'];
$email = $_POST['email'];
$phonenumber = $_POST['phonenumber'];
$message = $_POST['message'];

if(!empty($email) && !empty($message)){
    if(filter_var($email, FILTER_VALIDATE_EMAIL)){
      $receiver = "receiver_email_address"; //enter that email address where you want to receive all messages
      $subject = "From: $firstname <$email>";
      $body = "Name: $firstname\nEmail: $lastname\nPhone: $email\nWebsite: $phonenumber\n\nMessage:\n$message\n\nRegards,\n$firstname";
      $sender = "From: $email";
      if(mail($receiver, $subject, $body, $sender)){
         echo "Your message has been sent";
      }else{
         echo "Sorry, failed to send your message!";
      }
    }else{
      echo "Enter a valid email address!";
    }
  }else{  
    echo "Email and message field is required!";
  }
?>