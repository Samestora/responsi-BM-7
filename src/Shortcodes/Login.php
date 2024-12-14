<div class="container">
    <div class="left-section">
        <div class="overlay"></div>
        <div class="text-content">
            <a href="/"><img src="/Assets/images/Bayern.svg" alt="" style="width: 100px; height: 100px; margin-bottom: 5px;"></a>
            <h1>Bayern München</h1>
            <p>a German football club that plays in Munich, Bavaria, Founded in 1900.</p>
        </div>
    </div>

    <div class="right-section">
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
                <div>
                <button name="submit">Login</button>
                </div>
                <p>Don't have an account yet? <a href="/account/signin">Sign in</a>.</p>
            </form>
            <?php if (isset($error)):?>
                <p>Invalid Password or Username</p>
            <?php endif; ?>
        </div>
    <?php endif; ?>
    </div>
</div>