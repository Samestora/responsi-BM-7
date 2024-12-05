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
                <form action="" method="POST" class="login-email">
                    <p class="login-text" style="font-size: 2rem; font-weight: 800;">Login</p>
                    <div class="input-group">
                        <input type="text" placeholder="Email" name="creds" required>
                    </div>
                    <div class="input-group">
                        <input type="password" placeholder="Password" name="password" required>
                    </div>
                    <div class="input-group">
                        <button name="submit" class="btn">Login</button>
                    </div>
                    <p class="login-register-text">Belum punya akun? <a href="/account/signin">Daftar</a>.</p>
                </form>
            </div>
            <?php if (isset($error)):?>
                <p>Invalid Password or Username</p>
            <?php endif; ?>
    <?php endif; ?>
    <?php include(__DIR__ . "/../Shortcodes/Footer.php");?>
    <?php exit();?>
</body>