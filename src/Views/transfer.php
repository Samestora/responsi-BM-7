<!DOCTYPE html>
<head>
    <?php include(__DIR__ . "/../Shortcodes/Header.php");?>
    <link rel="stylesheet" href="/Assets/css/navbar.css">
    <title>Transfer Simulator</title>
</head>
<body>
    <?php include(__DIR__ . "/../Shortcodes/Navbar.php"); ?>
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
        <?php foreach ($players as $player): ?>
        <tr>
            <td><?php echo $player->position; ?></td>
            <td><?php echo $player->name; ?></td>
            <td><?php echo $player->jersey; ?></td>
            <td><?php echo $player->getFormattedValue(); ?></td>
        </tr>
        <?php endforeach; ?>

    </table>
    <?php include(__DIR__ . "/../Shortcodes/Footer.php");?>
</body>