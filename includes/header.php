<!DOCTYPE html>
<html lang="en">
    <head>
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
        <script>
            var jsonData = []
        </script>
        <script async src="https://www.googletagmanager.com/gtag/js?id=UA-29096235-2"></script>
        <script>
            window.dataLayer = window.dataLayer || [];
            function gtag(){dataLayer.push(arguments);}
            gtag('js', new Date());

            gtag('config', 'UA-29096235-2');
        </script>
        <script src="https://use.fontawesome.com/releases/v5.0.7/js/all.js" defer></script>
        <script src="js/filter.js" defer></script>
        <script src="js/modal.js" defer></script>
        <script src="https://www.google.com/recaptcha/api.js" async defer></script>
        <script src="js/navburger.js" defer></script>
        <!-- <script src="js/gen_validatorv4.js" type="text/javascript"></script> -->
        <?php
        if (!empty($page) && !empty($page['scripts']))
            foreach ($page['scripts'] as $script)
                echo "<script src=\"$script\" defer></script>";
        ?>
    </head>
    <body>