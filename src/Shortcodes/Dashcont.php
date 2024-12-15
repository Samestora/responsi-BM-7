<section class="dashboard-container">
    <div class="dashboard-header">
        <h1>Welcome, <span><?= htmlspecialchars($account->getRoleName(), ENT_QUOTES, 'UTF-8'); ?></span>!</h1>
        <h2>Your Profile</h2>
    </div>

    <div class="profile-section">
        <form action="/dashboard/update" method="POST" class="profile-form">
            <div class="form-group">
                <label for="username">Username:</label>
                <input type="text" id="username" name="new-name" 
                    value="<?= htmlspecialchars($account->name, ENT_QUOTES, 'UTF-8'); ?>" 
                    placeholder="Enter a new username">
            </div>

            <div class="form-group">
                <label for="email">Email:</label>
                <input type="email" id="email" name="new-email" 
                    value="<?= htmlspecialchars($account->email, ENT_QUOTES, 'UTF-8'); ?>" 
                    placeholder="Enter a new email">
            </div>

            <div class="form-group">
                <label for="new-password">New Password:</label>
                <input type="password" id="new-password" name="new-password" placeholder="Enter new password">
            </div>

            <div class="form-group">
                <label for="current-password">Current Password:</label>
                <input type="password" id="current-password" name="password" 
                    placeholder="Enter current password" required>
            </div>

            <div class="form-group">
                <label for="retype-password">Confirm New Password:</label>
                <input type="password" id="retype-password" name="password-retyped" 
                    placeholder="Re-enter new password" required>
            </div>

            <button type="submit" class="btn-save-profile">Save Changes</button>
        </form>
    </div>

    <div class="action-buttons">
        <a href="/account/logout" class="btn-logout">Log Out</a>

        <form action="/account/delete" method="POST" class="delete-account-form">
            <input type="hidden" name="id" value="<?= htmlspecialchars($account->id, ENT_QUOTES, 'UTF-8'); ?>">
            <button type="submit" class="btn-delete-account">Delete Account</button>
        </form>
    </div>
</section>
