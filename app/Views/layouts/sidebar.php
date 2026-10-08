<?php

$currentPage = $_GET['page'] ?? 'dashboard';

/*
|--------------------------------------------------------------------------
| Active Menu
|--------------------------------------------------------------------------
*/

function active($pages)
{
    global $currentPage;

    return in_array($currentPage, (array)$pages, true)
        ? 'active'
        : '';
}


/*
|--------------------------------------------------------------------------
| Open Submenu
|--------------------------------------------------------------------------
*/

function menuOpen($pages)
{
    global $currentPage;

    return in_array($currentPage, (array)$pages, true)
        ? 'show'
        : '';
}


/*
|--------------------------------------------------------------------------
| Shop Logo
|--------------------------------------------------------------------------
*/

$logo = !empty($shop['logo'])
    ? $shop['logo']
    : 'default.png';


/*
|--------------------------------------------------------------------------
| Shop Name
|--------------------------------------------------------------------------
*/

$shopName = !empty($shop['shop_name'])
    ? $shop['shop_name']
    : 'MR Tailor';

?>

<!-- =========================================================
     SIDEBAR
========================================================= -->

<aside class="sidebar" id="sidebar">

    <!-- =====================================================
         SIDEBAR HEADER
    ====================================================== -->

    <div class="sidebar-logo">

        <img
            src="<?= BASE_URL ?>uploads/logo/<?= htmlspecialchars($logo) ?>"
            alt="<?= htmlspecialchars($shopName) ?> Logo"
            class="sidebar-logo-image"
        >

        <span class="sidebar-logo-text">
            Tailor
        </span>

        <!-- Mobile Close Button -->

        <button
            type="button"
            id="sidebar-close"
            class="sidebar-close"
            aria-label="Close Sidebar"
        >
            <i class="fas fa-times"></i>
        </button>

    </div>


    <!-- =====================================================
         NAVIGATION
    ====================================================== -->

    <ul class="sidebar-menu">


        <!-- =================================================
             DASHBOARD
        ================================================== -->

        <li>

            <a
                href="index.php?page=dashboard"
                class="<?= active('dashboard') ?>"
            >

                <div>

                    <i class="fas fa-home"></i>

                    <span>Dashboard</span>

                </div>

            </a>

        </li>


        <!-- =================================================
             CUSTOMERS
        ================================================== -->

        <li class="menu-item">

            <a
                href="#"
                class="menu-toggle"
            >

                <div>

                    <i class="fas fa-users"></i>

                    <span>Customers</span>

                </div>

                <i class="fas fa-chevron-down arrow"></i>

            </a>


            <ul class="submenu <?= menuOpen([
                'customers',
                'add-customer',
                'search-customer',
                'edit-customer'
            ]) ?>">

                <li>

                    <a
                        href="index.php?page=add-customer"
                        class="<?= active('add-customer') ?>"
                    >
                        Add Customer
                    </a>

                </li>


                <li>

                    <a
                        href="index.php?page=customers"
                        class="<?= active([
                            'customers',
                            'edit-customer'
                        ]) ?>"
                    >
                        Manage Customers
                    </a>

                </li>


                <li>

                    <a
                        href="index.php?page=search-customer"
                        class="<?= active('search-customer') ?>"
                    >
                        Search Customer
                    </a>

                </li>

            </ul>

        </li>


        <!-- =================================================
             ORDERS
        ================================================== -->

        <li class="menu-item">

            <a
                href="#"
                class="menu-toggle"
            >

                <div>

                    <i class="fas fa-receipt"></i>

                    <span>Orders</span>

                </div>

                <i class="fas fa-chevron-down arrow"></i>

            </a>


            <ul class="submenu <?= menuOpen([
                'create-order',
                'save-order',
                'orders',
                'edit-order',
                'pending-report',
                'ready-report',
                'delivered-report'
            ]) ?>">

                <li>

                    <a
                        href="index.php?page=create-order"
                        class="<?= active([
                            'create-order',
                            'save-order'
                        ]) ?>"
                    >
                        Create Order
                    </a>

                </li>


                <li>

                    <a
                        href="index.php?page=orders"
                        class="<?= active([
                            'orders',
                            'edit-order'
                        ]) ?>"
                    >
                        Manage Orders
                    </a>

                </li>


                <li>

                    <a
                        href="index.php?page=pending-report"
                        class="<?= active('pending-report') ?>"
                    >
                        Pending Orders
                    </a>

                </li>


                <li>

                    <a
                        href="index.php?page=ready-report"
                        class="<?= active('ready-report') ?>"
                    >
                        Ready Orders
                    </a>

                </li>


                <li>

                    <a
                        href="index.php?page=delivered-report"
                        class="<?= active('delivered-report') ?>"
                    >
                        Delivered Orders
                    </a>

                </li>

            </ul>

        </li>


        <!-- =================================================
             INVOICES
        ================================================== -->

        <li class="menu-item">

            <a
                href="#"
                class="menu-toggle"
            >

                <div>

                    <i class="fas fa-file-invoice-dollar"></i>

                    <span>Invoices</span>

                </div>

                <i class="fas fa-chevron-down arrow"></i>

            </a>


            <ul class="submenu <?= menuOpen([
                'create-invoice',
                'invoice',
                'invoices',
                'print-invoice'
            ]) ?>">

                <li>

                    <a
                        href="index.php?page=create-invoice"
                        class="<?= active([
                            'create-invoice',
                            'invoice'
                        ]) ?>"
                    >
                        Create Invoice
                    </a>

                </li>


                <li>

                    <a
                        href="index.php?page=invoices"
                        class="<?= active([
                            'invoices',
                            'print-invoice'
                        ]) ?>"
                    >
                        Manage Invoices
                    </a>

                </li>

            </ul>

        </li>


        <!-- =================================================
             REPORTS
        ================================================== -->

        <li class="menu-item">

            <a
                href="#"
                class="menu-toggle"
            >

                <div>

                    <i class="fas fa-chart-line"></i>

                    <span>Reports</span>

                </div>

                <i class="fas fa-chevron-down arrow"></i>

            </a>


            <ul class="submenu <?= menuOpen([
                'reports',
                'daily-report',
                'monthly-report',
                'customer-report',
                'income-report',
                'pending-report',
                'ready-report',
                'delivered-report',
                'invoice-report'
            ]) ?>">

                <li>

                    <a
                        href="index.php?page=reports"
                        class="<?= active('reports') ?>"
                    >
                        Dashboard
                    </a>

                </li>


                <li>

                    <a
                        href="index.php?page=daily-report"
                        class="<?= active('daily-report') ?>"
                    >
                        Daily Report
                    </a>

                </li>


                <li>

                    <a
                        href="index.php?page=monthly-report"
                        class="<?= active('monthly-report') ?>"
                    >
                        Monthly Report
                    </a>

                </li>


                <li>

                    <a
                        href="index.php?page=customer-report"
                        class="<?= active('customer-report') ?>"
                    >
                        Customer Report
                    </a>

                </li>


                <li>

                    <a
                        href="index.php?page=income-report"
                        class="<?= active('income-report') ?>"
                    >
                        Income Report
                    </a>

                </li>


                <li>

                    <a
                        href="index.php?page=pending-report"
                        class="<?= active('pending-report') ?>"
                    >
                        Pending Orders
                    </a>

                </li>


                <li>

                    <a
                        href="index.php?page=ready-report"
                        class="<?= active('ready-report') ?>"
                    >
                        Ready Orders
                    </a>

                </li>


                <li>

                    <a
                        href="index.php?page=delivered-report"
                        class="<?= active('delivered-report') ?>"
                    >
                        Delivered Orders
                    </a>

                </li>


                <li>

                    <a
                        href="index.php?page=invoice-report"
                        class="<?= active('invoice-report') ?>"
                    >
                        Invoice Report
                    </a>

                </li>

            </ul>

        </li>


        <!-- =================================================
             BACKUP & RESTORE
        ================================================== -->

        <li class="menu-item">

            <a
                href="#"
                class="menu-toggle"
            >

                <div>

                    <i class="fas fa-database"></i>

                    <span>Backup & Restore</span>

                </div>

                <i class="fas fa-chevron-down arrow"></i>

            </a>


            <ul class="submenu <?= menuOpen([
                'backup',
                'restore'
            ]) ?>">

                <li>

                    <a
                        href="index.php?page=backup"
                        class="<?= active('backup') ?>"
                    >
                        Backup Database
                    </a>

                </li>


                <li>

                    <a
                        href="index.php?page=restore"
                        class="<?= active('restore') ?>"
                    >
                        Restore Database
                    </a>

                </li>

            </ul>

        </li>


        <!-- =================================================
             SETTINGS
        ================================================== -->

        <li class="menu-item">

            <a
                href="#"
                class="menu-toggle"
            >

                <div>

                    <i class="fas fa-cog"></i>

                    <span>Settings</span>

                </div>

                <i class="fas fa-chevron-down arrow"></i>

            </a>


            <ul class="submenu <?= menuOpen([
                'settings',
                'add-garment',
                'garments',
                'add-measurement-type',
                'measurement-types',
                'add-stitching-option',
                'stitching-options'
            ]) ?>">

                <!-- Shop Information -->

                <li>

                    <a
                        href="index.php?page=settings"
                        class="<?= active('settings') ?>"
                    >

                        <i class="fas fa-store"></i>

                        Shop Information

                    </a>

                </li>


                <!-- Garment Types -->

                <li>

                    <a
                        href="index.php?page=add-garment"
                        class="<?= active('add-garment') ?>"
                    >

                        <i class="fas fa-plus-circle"></i>

                        Add Garment

                    </a>

                </li>


                <li>

                    <a
                        href="index.php?page=garments"
                        class="<?= active('garments') ?>"
                    >

                        <i class="fas fa-list"></i>

                        Manage Garments

                    </a>

                </li>


                <!-- Measurement Types -->

                <li>

                    <a
                        href="index.php?page=add-measurement-type"
                        class="<?= active('add-measurement-type') ?>"
                    >

                        <i class="fas fa-plus-circle"></i>

                        Add Measurement

                    </a>

                </li>


                <li>

                    <a
                        href="index.php?page=measurement-types"
                        class="<?= active('measurement-types') ?>"
                    >

                        <i class="fas fa-list"></i>

                        Manage Measurements

                    </a>

                </li>


                <!-- Stitching Options -->

                <li>

                    <a
                        href="index.php?page=add-stitching-option"
                        class="<?= active('add-stitching-option') ?>"
                    >

                        <i class="fas fa-plus-circle"></i>

                        Add Stitching Option

                    </a>

                </li>


                <li>

                    <a
                        href="index.php?page=stitching-options"
                        class="<?= active('stitching-options') ?>"
                    >

                        <i class="fas fa-list"></i>

                        Manage Stitching Options

                    </a>

                </li>

            </ul>

        </li>


        <!-- =================================================
             LOGOUT
        ================================================== -->

        <li class="sidebar-logout">

            <a href="index.php?page=logout">

                <div>

                    <i class="fas fa-sign-out-alt"></i>

                    <span>Logout</span>

                </div>

            </a>

        </li>

    </ul>

</aside>


<!-- =========================================================
     MOBILE SIDEBAR OVERLAY
========================================================= -->

<div
    class="sidebar-overlay"
    id="sidebar-overlay"
>
</div>