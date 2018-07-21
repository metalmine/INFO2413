<?php
session_start();
session_destroy();

header('Location: index.html');
echo '<script>alert("You have been logged out");</script>';
exit;
