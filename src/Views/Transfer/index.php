<!DOCTYPE html>
<head>
    <?php include(__DIR__ . "/../../Shortcodes/Header.php");?>
    <link rel="stylesheet" href="/Assets/css/transfer.css">
    <link rel="stylesheet" href="/Assets/css/slideshow.css">
</head>
<body>
    <?php include(__DIR__ . "/../../Shortcodes/Navbar.php"); ?>
    
    <?php if ($error === ''): ?>
    <div style="display:flex; flex-direction: column;">
        <div style="display:flex; justify-content: space-around;">
            <?php include(__DIR__ . "/../../Shortcodes/SellPlayer.php"); ?>
            <?php include(__DIR__ . "/../../Shortcodes/CurrentTransfer.php"); ?>
            <div class="scrollable-div">
                <?php include(__DIR__ . "/../../Shortcodes/Slideshow.php"); ?>
                <?php include(__DIR__ . "/../../Shortcodes/BuyPlayer.php"); ?>
            </div>
        </div>
        <div style="display:flex; align-self: center; flex-direction: column; text-align: center;">
            <h1>Budget</h1>
            <h2><?= htmlspecialchars("€" . number_format($currentRevenue, 0, '.', ',')); ?></h2>
            <button class="tr-commit">Commit Transaction</button>
        </div>
    </div>
    <?php else: ?>
    <h1>
        <?= htmlspecialchars($error); ?>
    </h1>
    <?php endif; ?>
    <?php include(__DIR__ . "/../../Shortcodes/Footer.php");?>
    <script src="/Assets/js/transferAjax.max.js"></script>
</body>