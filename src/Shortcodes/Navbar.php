<?php if (session_status()===PHP_SESSION_NONE){session_start();}?>
<div class="navbar">
    <div class="main-logo">
        <a href="/">
            <img src="/Assets/images/Bayern.svg" alt="Logo Bayern" class="main-logo">
        </a>
        <div class="sub-tem">
            <h1>Bayern München</h1>
        </div>
    </div>

    <div class="menu">
        <a href="/" target="_top">Home</a>
        <a href="/transfer" target="_top">Transfer</a>
        <a href="/team" target="_top">Team</a>
    </div>
    
    <?php if (isset($_SESSION['logged_in'])) : ?> 
    <div class="logsig">
        <a href="/dashboard" >
            <button class="login-new-btn">
                <?= htmlspecialchars($_SESSION['logged_in']['name']) ?>
            </button>
        </a>
    </div>
    <?php else: ?>
    <div class="logsig">
        <a href="/account/login">
            <button class="login-btn">Login</button>
        </a>
        <a href="/account/signin">
            <button class="signup-btn">Sign Up</button>
        </a>
    </div>
    <?php endif;?>
</div>