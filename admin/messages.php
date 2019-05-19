<?php
if(isset($_SESSION['message'])){
  $messages = $_SESSION['message'];

  if(isset($messages['success'])){
    foreach ($messages['success'] as $message) {
      echo $message . '<br />';
    }
  }

  if(isset($messages['failure'])){
    foreach ($messages['failure'] as $message) {
      echo $message . '<br />';
    }
  }

  unset($_SESSION['message']);
}