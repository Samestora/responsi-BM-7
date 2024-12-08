<!DOCTYPE html>
<html>
<head>
    <?php include(__DIR__ . "/../../Shortcodes/Header.php"); ?>
    <link rel="stylesheet" href="/Assets/css/transfer.css">
    <title><?= htmlspecialchars($title, ENT_QUOTES, 'UTF-8'); ?></title>
</head>
<body>
    <?php include(__DIR__ . "/../../Shortcodes/Navbar.php"); ?>

    <h1>Hello, our <?= htmlspecialchars($account->getRoleName(), ENT_QUOTES, 'UTF-8'); ?>!</h1>
    <br>
    <h2>Update your account</h2>

    <form action="/dashboard/update" method="POST">
        <label for="new-name">Username:</label>
        <input type="text" name="new-name" value="<?= htmlspecialchars($account->name, ENT_QUOTES, 'UTF-8'); ?>" placeholder="Enter a new username">
        <br><br>

        <label for="new-email">Email:</label>
        <input type="email" name="new-email" value="<?= htmlspecialchars($account->email, ENT_QUOTES, 'UTF-8'); ?>" placeholder="Enter a new email">
        <br><br>

        <label for="new-password">New Password:</label>
        <input type="password" name="new-password" placeholder="New Password Here">
        <br><br>

        <label for="password">Current Password:</label>
        <input type="password" name="password" placeholder="Current Password" required>
        <br><br>

        <label for="password-retyped">Retype Password:</label>
        <input type="password" name="password-retyped" placeholder="Re-enter Password" required>
        <br><br>

        <button name="submit" class="btn-primary">Update Account</button>
    </form>

    <a href="/account/logout"><button class="btn-tertiary">Log Out</button></a>

    <form action="/account/delete" method="POST">
        <input type="hidden" name="id" value="<?= htmlspecialchars($account->id, ENT_QUOTES, 'UTF-8'); ?>">
        <br>
        <button name="submit" class="btn-tertiary">Delete Account</button>
    </form>

    <?php include(__DIR__ . "/../../Shortcodes/Footer.php"); ?>
</body>
</html>
