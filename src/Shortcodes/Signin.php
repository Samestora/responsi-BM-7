<div class="container">
    <div class="left-section">
        <?php if (isset($_SESSION['logged_in'])) : ?>
            <?php header("Location: /dashboard"); ?>
        <?php else: ?>
            <form action="" method="POST">
                <p>Sign In</p>
                <div>
                    <input type="text" placeholder="Username" name="name" required>
                </div>
                <div>
                    <input type="text" placeholder="Email" name="email" required>
                </div>
                <div>
                    <input type="password" placeholder="Password" name="password" required>
                </div>
                <div>
                    <input type="password" placeholder="Retype Password" name="password-retyped" required>
                </div>
                <div>
                    <label><input type="radio" name="role_id" value="0" required> Manager</label>
                    <label><input type="radio" name="role_id" value="1" required> User</label>
                </div>
                <div>
                    <button name="submit">Sign In</button>
                </div>
                <p>Don't have an account? <a href="/account/login" style="color: #0066B2;">Login</a></p>
            </form>
            <?php if (isset($error)):?>
                <div class="error-message">
                    <?= $error ?>
                </div>
            <?php endif; ?>
        <?php endif; ?>
    </div>
    <div class="right-section">
        <div class="overlay"></div>
        <div class="text-content">
            <a href="/"><img src="/Assets/images/Bayern.svg" alt="" style="width: 100px; height: 100px; margin-bottom: 5px;"></a>
            <h1>Bayern München</h1>
            <p>a German football club that plays in Munich, Bavaria, Founded in 1900.</p>
        </div>
    </div>
</div>