<header class="app-header">
    <div class="header-content">
        <div class="header-left">
            <div class="search-wrapper">
                <i class="fas fa-search"></i>
                <input type="text" placeholder="Search" id="header-search-input">
            </div>
        </div>

        <div class="header-right">
            <div class="header-actions">
                <button class="header-icon-btn" title="Messages">
                    <img draggable="false" src=" <?php echo '/assets/' . 'media/icons/chat.svg'; ?> " alt="notification bell">
                </button>
                <button class="header-icon-btn" title="Notifications">
                    <img draggable="false" src=" <?php echo '/assets/' . 'media/icons/bell.svg'; ?> " alt="notification bell">
                    <span class="pulse-dot"></span>
                </button>
            </div>

            <div class="header-profile">
                <div class="profile-info">
                    <span class="profile-name">username</span>
                </div>
                <div class="profile-avatar">
                    <img src="" alt="username">
                </div>
            </div>
        </div>
    </div>
</header>