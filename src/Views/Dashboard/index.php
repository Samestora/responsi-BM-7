<!DOCTYPE html>
<head>
    <?php include(__DIR__ . "/../../Shortcodes/Header.php");?>
    <link rel="stylesheet" href="/Assets/css/transfer.css">
    <title><?=$title;?></title>
</head>
<body>
    <?php include(__DIR__ . "/../../Shortcodes/Navbar.php"); ?>
    <?= $username ?>
    <br>
    <?= $role_id ?>
    <br>
    <?= $email ?>
    <br>
    <a href="/account/logout"><button class="btn-tertiary">Log Out</button></a>
    <br>
    <a href="/account/delete"><button class="btn-tertiary">Delete Account</button></a>
    <?php include(__DIR__ . "/../../Shortcodes/Footer.php");?>
</body>