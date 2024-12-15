<!-- Hidden field to track selected team -->
<input type="hidden" id="selected-team-id" name="selected-team-id" value="0">

<table class="buy_div" id="buy_div" hidden>
    <thead>
        <tr>
            <th>
                <button id="go-back">
                    <img src="/Assets/images/bl-left.svg">
                </button>
            </th>
        </tr>
        <tr class="player-pick">
            <th></th>
            <th>POSITION</th>
            <th>NAME</th>
            <th>JERSEY NUMBER</th>
            <th>VALUE</th>
            <th>CLUB</th>
        </tr>
    </thead>
    <tbody id="players-tbody">
    <?php foreach ($foreignplayers as $player): ?>
        <tr class="player-pick"  data-club-id="<?= htmlspecialchars($player->club_id); ?>" id="<?= htmlspecialchars($player->club_id); ?>" style="display:none;">
            <td><button class="buy" name="<?= htmlspecialchars($player->id)?>">Buy</button></td>
            <td><?= htmlspecialchars($player->position); ?></td>
            <td><?= htmlspecialchars($player->name); ?></td>
            <td width="50px"><?= htmlspecialchars($player->jersey); ?></td>
            <td><?= htmlspecialchars($player->getFormattedValue()); ?></td>
            <?php if ($player->club_id > 0):?>
            <td><img src="/Assets/images/Teams/<?= htmlspecialchars($player->club_id); ?>.svg" height="50"></td> 
            <?php else: ?>
            <td><img src="/Assets/images/Teams/<?= htmlspecialchars($player->club_id); ?>.png" height="50"></td> 
            <?php endif; ?>
        </tr>
    <?php endforeach; ?>
    </tbody>
</table>
