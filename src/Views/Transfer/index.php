<!DOCTYPE html>
<head>
    <?php include(__DIR__ . "/../../Shortcodes/Header.php");?>
    <link rel="stylesheet" href="/Assets/css/transfer.css">
</head>
<body>
    <?php include(__DIR__ . "/../../Shortcodes/Navbar.php"); ?>
    <table class="table-p">
        <tr>
            <th colspan='4'>
                <h2>Current First Team</h2>
            </th>
        </tr>
        <tr>
            <th>POSITION</th>
            <th>NAME</th>
            <th>JERSEY NUMBER</th>
            <th>VALUE</th>
        </tr>
        <?php if (isset($players) && is_array($players) && count($players) > 0): ?>
        <?php foreach ($players as $player): ?>
            <tr>
                <td><?= htmlspecialchars($player->position); ?></td>
                <td><?= htmlspecialchars($player->name); ?></td>
                <td><?= htmlspecialchars($player->jersey); ?></td>
                <td><?= htmlspecialchars($player->getFormattedValue()); ?></td>
            </tr>
        <?php endforeach; ?>
        <?php else: ?>
            <tr>
                <td colspan="4"><?= htmlspecialchars($error); ?></td>
            </tr>
        <?php endif; ?>
    </table>
    <?php include(__DIR__ . "/../../Shortcodes/Footer.php");?>
</body>