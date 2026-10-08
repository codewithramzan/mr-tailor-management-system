/* =========================================================
   MR TAILOR SIDEBAR JAVASCRIPT
========================================================= */

document.addEventListener("DOMContentLoaded", function () {

    /* =====================================================
       ELEMENTS
    ===================================================== */

    const sidebar =
        document.getElementById("sidebar");

    const overlay =
        document.getElementById("sidebar-overlay");

    const closeButton =
        document.getElementById("sidebar-close");


    /*
     * Your navbar currently uses:
     *
     * id="menu-toggle"
     *
     * So we support that ID.
     *
     * We also support the other IDs in case you use them later.
     */

    const menuButton =
        document.getElementById("menu-toggle") ||
        document.getElementById("mobile-menu-toggle") ||
        document.getElementById("desktop-menu-toggle");


    /* =====================================================
       CHECK SIDEBAR
    ===================================================== */

    if (!sidebar) {

        console.warn(
            "MR Tailor: #sidebar was not found."
        );

        return;
    }


    /* =====================================================
       OPEN MOBILE SIDEBAR
    ===================================================== */

    function openSidebar() {

        sidebar.classList.add("mobile-open");

        if (overlay) {

            overlay.classList.add("active");

        }

        document.body.classList.add(
            "sidebar-mobile-open"
        );

        document.body.style.overflow = "hidden";
    }


    /* =====================================================
       CLOSE MOBILE SIDEBAR
    ===================================================== */

    function closeSidebar() {

        sidebar.classList.remove("mobile-open");

        if (overlay) {

            overlay.classList.remove("active");

        }

        document.body.classList.remove(
            "sidebar-mobile-open"
        );

        document.body.style.overflow = "";
    }


    /* =====================================================
       TOGGLE MOBILE SIDEBAR
    ===================================================== */

    function toggleMobileSidebar() {

        if (
            sidebar.classList.contains(
                "mobile-open"
            )
        ) {

            closeSidebar();

        } else {

            openSidebar();

        }
    }


    /* =====================================================
       MAIN MENU BUTTON
    ===================================================== */

    if (menuButton) {

        menuButton.addEventListener(
            "click",
            function (event) {

                event.preventDefault();

                event.stopPropagation();


                /* =========================================
                   MOBILE
                ========================================== */

                if (window.innerWidth <= 991) {

                    toggleMobileSidebar();

                    return;
                }


                /* =========================================
                   DESKTOP
                ========================================== */

                document.body.classList.toggle(
                    "sidebar-collapsed"
                );

            }
        );

    } else {

        console.warn(
            "MR Tailor: Menu button not found."
        );

    }


    /* =====================================================
       CLOSE BUTTON
    ===================================================== */

    if (closeButton) {

        closeButton.addEventListener(
            "click",
            function (event) {

                event.preventDefault();

                event.stopPropagation();

                closeSidebar();

            }
        );

    }


    /* =====================================================
       OVERLAY CLICK
    ===================================================== */

    if (overlay) {

        overlay.addEventListener(
            "click",
            function () {

                closeSidebar();

            }
        );

    }


    /* =====================================================
       SUBMENUS
    ===================================================== */

    const menuToggles =
        document.querySelectorAll(
            ".sidebar .menu-toggle"
        );


    menuToggles.forEach(
        function (menuToggle) {

            menuToggle.addEventListener(
                "click",
                function (event) {

                    event.preventDefault();

                    event.stopPropagation();


                    const parent =
                        this.closest(".menu-item");


                    if (!parent) {

                        return;

                    }


                    const submenu =
                        parent.querySelector(
                            ":scope > .submenu"
                        );


                    if (!submenu) {

                        return;

                    }


                    /*
                     * Toggle current submenu
                     */

                    parent.classList.toggle(
                        "open"
                    );

                    submenu.classList.toggle(
                        "show"
                    );

                }
            );

        }
    );


    /* =====================================================
       ACTIVE SUBMENUS
    ===================================================== */

    const openSubmenus =
        document.querySelectorAll(
            ".sidebar .submenu.show"
        );


    openSubmenus.forEach(
        function (submenu) {

            const parent =
                submenu.closest(".menu-item");


            if (parent) {

                parent.classList.add("open");

            }

        }
    );


    /* =====================================================
       CLOSE MOBILE SIDEBAR AFTER LINK
    ===================================================== */

    const sidebarLinks =
        document.querySelectorAll(
            ".sidebar a:not(.menu-toggle)"
        );


    sidebarLinks.forEach(
        function (link) {

            link.addEventListener(
                "click",
                function () {

                    if (
                        window.innerWidth <= 991
                    ) {

                        closeSidebar();

                    }

                }
            );

        }
    );


    /* =====================================================
       ESC KEY
    ===================================================== */

    document.addEventListener(
        "keydown",
        function (event) {

            if (
                event.key === "Escape" &&
                window.innerWidth <= 991
            ) {

                closeSidebar();

            }

        }
    );


    /* =====================================================
       RESIZE
    ===================================================== */

    window.addEventListener(
        "resize",
        function () {

            /*
             * If screen becomes desktop,
             * close mobile sidebar.
             */

            if (window.innerWidth > 991) {

                closeSidebar();

            }

        }
    );


    /* =====================================================
       INITIAL MOBILE STATE
    ===================================================== */

    if (window.innerWidth <= 991) {

        sidebar.classList.remove(
            "mobile-open"
        );

        if (overlay) {

            overlay.classList.remove(
                "active"
            );

        }

        document.body.classList.remove(
            "sidebar-mobile-open"
        );

        document.body.style.overflow = "";

    }


    console.log(
        "MR Tailor Sidebar loaded successfully."
    );

});