<?php if (session_status()===PHP_SESSION_NONE){session_start();}?>
<!DOCTYPE html>
<head>
    <?php include(__DIR__ . "/../Shortcodes/Header.php");?>
</head>
<?php include(__DIR__ . "/../Shortcodes/Navbar.php"); ?>
<body>
    <?php if (isset($_SESSION['logged_in'])) : ?>        
        <?php header("Location: /dashboard"); ?>
    <?php else: ?>
        <form action="" method="POST">
            <p>Sign In</p>
            <div>
                <input type="text" placeholder="Username" name="name" required>
            </div>
            <br>
            <div>
                <input type="text" placeholder="Email" name="email" required>
            </div>
            <br>
            <div>
                <input type="password" placeholder="Password" name="password" required>
            </div>
            <br>
            <div>
                <input type="password" placeholder="Password" name="password-retyped" required>
            </div>
            <br>
            <div>
                <input type="radio" name="role_id" value="0" required>Manager</input>
                <input type="radio" name="role_id" value="1" required>User</input>
            </div>
            <br>
            <div>
                <button name="submit">Daftar</button>
            </div>
            <p>Sudah punya akun? <a href="/account/login">Login</a>.</p>
        </form>
    <?php if (isset($error)):?>
        <?= $error ?>
        <p>Invalid Password or Username</p>
    <?php endif; ?>
    <?php endif; ?>
    <?php include(__DIR__ . "/../Shortcodes/Footer.php");?>
    <?php exit();?>
</body>