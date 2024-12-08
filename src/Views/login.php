<!DOCTYPE html>
<head>
    <?php include(__DIR__ . "/../Shortcodes/Header.php");?>
</head>
<body>
    <?php include(__DIR__ . "/../Shortcodes/Navbar.php"); ?>
    <?php if (isset($_SESSION['logged_in'])) : ?>        
        <?php header("Location: /dashboard"); ?>
    <?php else: ?>
        <div>
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
            <?php if (isset($error)):?>
                <p>Invalid Password or Username</p>
            <?php endif; ?>
        </div>
    <?php endif; ?>
    <?php include(__DIR__ . "/../Shortcodes/Footer.php");?>
</body>