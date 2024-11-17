<!DOCTYPE html>
<head>
    <title>Home</title>
</head>

<h1>Bayern Munich Ja??</h1>

<ol>
    <?php foreach ($Players as $Player) : ?>
        <li><?= $Player->name ?> (<?= $Player->transferYear ?>)</li>
    <?php endforeach; ?>
</ol>