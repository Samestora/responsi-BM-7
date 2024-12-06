<!DOCTYPE html>
<head>
    <?php include(__DIR__ . "/../../Shortcodes/Header.php");?>
    <link rel="stylesheet" href="/Assets/css/transfer.css">
</head>
<body>
    <?php include(__DIR__ . "/../../Shortcodes/Navbar.php"); ?>
    <?php if ($error === ''): ?>
    <div style="display:flex;">
        <div>
            <table class="table-p">
                <tr>
                    <th colspan='5'>
                        <h2>Our Team</h2>
                    </th>
                </tr>
                <tr>
                    <th>POSITION</th>
                    <th>NAME</th>
                    <th>JERSEY NUMBER</th>
                    <th>VALUE</th>
                    <th>Club</th>
                </tr>
                <?php foreach ($ourplayers as $player): ?>
                    <tr>
                        <td><?= htmlspecialchars($player->position); ?></td>
                        <td><?= htmlspecialchars($player->name); ?></td>
                        <td><?= htmlspecialchars($player->jersey); ?></td>
                        <td><?= htmlspecialchars($player->getFormattedValue()); ?></td>
                        <td><img src="/Assets/images/Teams/<?= htmlspecialchars($player->club_id); ?>.svg" height="50"></td> 
                    </tr>
                <?php endforeach; ?>
            </table>
        </div>
        <div>
            <table class="table-p">
                <tr>
                    <th colspan='5'>
                        <h2>Buy</h2>
                    </th>
                </tr>
                <tr>
                    <th>POSITION</th>
                    <th>NAME</th>
                    <th>JERSEY NUMBER</th>
                    <th>VALUE</th>
                    <th>CLUB</th>
                </tr>
            <?php foreach ($foreignplayers as $player): ?>
                <tr>
                    <td><?= htmlspecialchars($player->position); ?></td>
                    <td><?= htmlspecialchars($player->name); ?></td>
                    <td><?= htmlspecialchars($player->jersey); ?></td>
                    <td><?= htmlspecialchars($player->getFormattedValue()); ?></td>
                    <td><img src="/Assets/images/Teams/<?= htmlspecialchars($player->club_id); ?>.svg" height="50"></td> 
                </tr>
            <?php endforeach; ?>
            </table>
        </div>
        <div>
            <h1>Revenue</h1>
            <h2>$3000</h2>
        </div>
    </div>
    <?php else: ?>
    <h1>
        <?= htmlspecialchars($error); ?>
    </h1>
    <?php endif; ?>
    <?php include(__DIR__ . "/../../Shortcodes/Footer.php");?>
</body>