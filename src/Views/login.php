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
            <div class="container">
                <form action="" method="POST">
                    <p>Login</p>
                    <div>
                        <input type="text" placeholder="Email or Username" name="creds" required>
                    </div>
                    <div>
                        <input type="password" placeholder="Password" name="password" required>
                    </div>
                    <button name="submit">Login</button>
                    <p>Belum punya akun? <a href="/account/signin">Daftar</a>.</p>
                </form>
            </div>
            <?php if (isset($error)):?>
                <p>Invalid Password or Username</p>
            <?php endif; ?>
    <?php endif; ?>
    <?php include(__DIR__ . "/../Shortcodes/Footer.php");?>
    <?php exit();?>
</body>