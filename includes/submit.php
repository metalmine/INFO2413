<?php
require_once 'load.php';


// Handle registration
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $submit_status = $login->submit($_POST);
}

if (isset($submit_status)) {

    echo $submit_status['message'];
    echo '<br><p><a href="../index.php">home</a></p>';
}
