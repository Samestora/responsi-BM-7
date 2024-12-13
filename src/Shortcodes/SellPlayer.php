<div class="scrollable-div">
    <table class="sell_div">
        <thead>
            <tr>
                <th colspan='6'>
                    <h2>Our Team</h2>
                </th>
            </tr>
            <tr>
                <th>POSITION</th>
                <th>NAME</th>
                <th width="50px">JERSEY NUMBER</th>
                <th>VALUE</th>
                <th>Club</th>
                <th></th>
            </tr>
        </thead>
        <tbody>
        <?php foreach ($ourplayers as $player): ?>
            <tr>
                <td><?= htmlspecialchars($player->position); ?></td>
                <td><?= htmlspecialchars($player->name); ?></td>
                <td><?= htmlspecialchars($player->jersey); ?></td>
                <td><?= htmlspecialchars($player->getFormattedValue()); ?></td>
                <td><img src="/Assets/images/Teams/<?= htmlspecialchars($player->club_id); ?>.svg" height="50"></td> 
                <td><button class="sell" name="<?= htmlspecialchars($player->id)?>">Sell</button></td>
            </tr>
        <?php endforeach; ?>
        </tbody>
    </table>
</div>