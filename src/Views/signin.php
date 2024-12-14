<?php if (session_status()===PHP_SESSION_NONE){session_start();}?>
<!DOCTYPE html>
<head>
    <?php include(__DIR__ . "/../Shortcodes/Header.php");?>
    <link rel="stylesheet" href="/Assets/css/signin.css">

</head>
<body>
    <?php include(__DIR__ . "/../Shortcodes/Signin.php"); ?>
</body>