<!DOCTYPE html>
<html>
<head>
    <?php include(__DIR__ . "/../../Shortcodes/Header.php"); ?>
    <link rel="stylesheet" href="/Assets/css/transfer.css">
    <link rel="stylesheet" href="/Assets/css/dashcont.css">
    <link rel="stylesheet" href="/Assets/css/partner.css">
    <link rel="stylesheet" href="/Assets/css/footer.css">
    <title><?= htmlspecialchars($title, ENT_QUOTES, 'UTF-8'); ?></title>
</head>
<body>
    <?php include(__DIR__ . "/../../Shortcodes/Navbar.php"); ?>


    <?php include(__DIR__ . "/../../Shortcodes/Dashcont.php"); ?>
    <?php include(__DIR__ . "/../../Shortcodes/Partner.php"); ?>
    <?php include(__DIR__ . "/../../Shortcodes/Footer.php"); ?>
</body>
</html>