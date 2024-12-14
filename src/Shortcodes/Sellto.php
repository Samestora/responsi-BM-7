<div style="text-align: center; margin-bottom: 1em;">
    <label for="clubSelect">Select a Club: </label>
    <select id="clubSelect">
        <option value="">-- Select a Club --</option>
        <?php foreach ($clubLists as $club): ?>
            <option value="<?= htmlspecialchars($club->id); ?>">
                <?= htmlspecialchars($club->name); ?>
            </option>
        <?php endforeach; ?>
    </select>
</div>