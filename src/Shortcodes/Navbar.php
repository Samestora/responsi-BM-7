<?php if (session_status()===PHP_SESSION_NONE){session_start();}?>
<div class="navbar">
    <div class="nav-items logo">
        <a href="/">
            <img src="/Assets/images/Bayern.svg" alt="Logo Bayern">
            <span>FC Bayern München</span>
        </a>
    </div>

    <div class="nav-items">
        <div class="nav-btn-primary nav-btn">
            <a href="/" target="_top">
                Home
            </a>
        </div>
        <div class="nav-btn">
            <a href="/transfer" target="_top">
                Transfer
            </a>
        </div>
        <div class="nav-btn">
            <a href="/team" target="_top">
                Team
            </a>
        </div>
    </div>
    
    <?php if (isset($_SESSION['logged_in'])) : ?> 
        <div class="nav-items">
            <a class="nav-btn" href="/dashboard">
                <button class="btn-tertiary">
                    <?= htmlspecialchars($_SESSION['logged_in']['name']) ?>
                </button>
            </a>
        </div>
    <?php else: ?>
    <div class="nav-items registration">
        <a class="nav-btn" href="/account/login">
            <button class="btn-tertiary">
                Log in
            </button>
        </a>
        <a class="nav-btn" href="/account/signin">
            <button class="btn-primary">Sign In</button>
        </a>
    </div>
    <?php endif; ?>
</div>