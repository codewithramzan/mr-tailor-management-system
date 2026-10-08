<?php

$shop = $shop ?? [];

$shopName = $shop['shop_name'] ?? 'MR Tailor';
$ownerName = $shop['owner_name'] ?? 'Administrator';

$logo = !empty($shop['logo'])
    ? $shop['logo']
    : 'default.png';

$logoUrl = rtrim(BASE_URL, '/') . '/uploads/logo/' . rawurlencode($logo);

?>

<nav class="top-navbar">

    <!-- =========================
         LEFT / BRAND
    ========================== -->
 <!-- =========================
     LEFT / BRAND
========================== -->

<div class="navbar-left">

    <!-- Desktop Sidebar Toggle -->
    <button
        type="button"
        class="desktop-menu-toggle"
        id="desktop-menu-toggle"
        aria-label="Toggle sidebar"
    >
        <i class="fas fa-bars"></i>
    </button>


    <!-- Mobile Logo -->
    <a
        href="index.php?page=dashboard"
        class="mobile-brand"
    >

        <span class="mobile-brand-image">

            <img
                src="<?= htmlspecialchars($logoUrl) ?>"
                alt="Logo"
                onerror="this.style.display='none';"
            >

        </span>

        <span class="mobile-brand-name">
            Tailor
        </span>

    </a>


    <!-- Desktop Shop Name -->
    <h4 class="navbar-shop-name">
        <?= htmlspecialchars($shopName) ?>
    </h4>

</div>


    <!-- =========================
         CENTER SEARCH
    ========================== -->

    <div class="navbar-search">

        <form method="GET" action="index.php">

            <input
                type="hidden"
                name="page"
                value="search-customer"
            >

            <input
                type="text"
                name="keyword"
                placeholder="Search Customer, Name"
                autocomplete="off"
            >

            <button type="submit" aria-label="Search">

                <i class="fas fa-search"></i>

            </button>

        </form>

    </div>


    <!-- =========================
         RIGHT SIDE
    ========================== -->

    <div class="navbar-right">

        <!-- Notification -->
        <?php
        $pendingOrderCount = 0;

        try {
            $dashboard = new Dashboard();
            $pendingOrderCount = (int) $dashboard->pendingBookings();
        } catch (Exception $e) {
            $pendingOrderCount = 0;
        }
        ?>

        <a
            href="index.php?page=orders"
            class="notification"
            title="Pending Orders"
        >

            <i class="fas fa-bell"></i>

            <?php if ($pendingOrderCount > 0): ?>
                <span class="notification-count">
                    <?= $pendingOrderCount ?>
                </span>
            <?php endif; ?>

        </a>


        <!-- Administrator Profile -->
        <div class="admin-profile">

            <div class="admin-avatar">

                <i class="fas fa-user-shield"></i>

            </div>

            <div class="admin-info">

                <span class="admin-name">
                    <?= htmlspecialchars($ownerName) ?>
                </span>

                <span class="admin-role">
                    Administrator
                </span>

            </div>

        </div>


        <!-- Mobile Menu -->
        <button
            type="button"
            class="mobile-menu-toggle"
            id="mobile-menu-toggle"
            aria-label="Open menu"
        >

            <i class="fas fa-bars"></i>

        </button>

    </div>

</nav>