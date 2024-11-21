<!DOCTYPE html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Home</title>
</head>

<h1>Bayern Munich Ja??</h1>

<ol>
    <?php foreach ($Players as $Player) : ?>
        <li><?= $Player->name ?> (<?= $Player->transferYear ?>)</li>
    <?php endforeach; ?>
</ol>