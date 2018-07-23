<?php
require_once 'load.php';

// Handle registration
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $register_status = $login->register($_POST);
}

if (isset($register_status)) {

    echo $register_status['message'];
    echo '<br><p><a href="../index.php">home</a></p>';
}
