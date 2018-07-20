<!DOCTYPE html>
<html lang="en">
    <head>
        <!-- Google Tracking -->
        <script src="js/gtag.js"></script>
        <!-- Bulma Set-up -->
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>
            <?php
            if (!empty($page) && !empty($page['title']))
                echo $page['title'];
            else
                echo "MHData";
            ?>
        </title>
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bulma/0.7.1/css/bulma.min.css">
        <script defer src="https://use.fontawesome.com/releases/v5.0.7/js/all.js"></script>

        <!-- Javascript Imports -->
        <script src="js/filter.js"></script>
        <script src="js/modal.js"></script>
        <script src="https://www.google.com/recaptcha/api.js" async defer></script>
        <script src="js/navburger.js"></script>

        <?php
        if (!empty($page) && !empty($page['scripts']))
            foreach ($page['scripts'] as $script)
                echo "<script src=\"$script\"></script>";
        ?>
    </head>
    <body>
