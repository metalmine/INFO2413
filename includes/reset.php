<?php
require_once 'load.php';

// Handle registration
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $register_status = $login->changePassword($_POST);
}

if (isset($register_status)) {

    echo $register_status['message'];
    if($register_status['message'] == 'Password Changed!'){
      session_start();
      session_destroy();
      echo '<br><p> You have been logged out!</p>';
    }
    echo '<br><p><a href="../index.php">home</a></p>';
}
