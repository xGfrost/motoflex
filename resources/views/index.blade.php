<!--
Product: Metronic is a toolkit of UI components built with Tailwind CSS for developing scalable web applications quickly and efficiently
Version: v9.1.1
Author: Keenthemes
Contact: support@keenthemes.com
Website: https://www.keenthemes.com
Support: https://devs.keenthemes.com
Follow: https://www.twitter.com/keenthemes
License: https://keenthemes.com/metronic/tailwind/docs/getting-started/license
-->
<!DOCTYPE html>
<html class="h-full" data-theme="true" data-theme-mode="light" dir="ltr" lang="en">

<head>
    <base href="../../../../">
    <title>
        DASHBOARD ADMIN
    </title>
    <meta charset="utf-8" />
    <meta content="follow, index" name="robots" />
    <link href="https://127.0.0.1:8001/metronic-tailwind-html/demo10/account/members/team-members" rel="canonical" />
    <meta content="width=device-width, initial-scale=1, shrink-to-fit=no" name="viewport" />
    <meta content="Team members page, using Tailwind CSS" name="description" />
    <meta content="@keenthemes" name="twitter:site" />
    <meta content="@keenthemes" name="twitter:creator" />
    <meta content="summary_large_image" name="twitter:card" />
    <meta content="Metronic - Tailwind CSS Team Members" name="twitter:title" />
    <meta content="Team members page, using Tailwind CSS" name="twitter:description" />
    <meta content="assets/media/app/og-image.png" name="twitter:image" />
    <meta content="https://127.0.0.1:8001/metronic-tailwind-html/demo10/account/members/team-members"
        property="og:url" />
    <meta content="en_US" property="og:locale" />
    <meta content="website" property="og:type" />
    <meta content="@keenthemes" property="og:site_name" />
    <meta content="Metronic - Tailwind CSS Team Members" property="og:title" />
    <meta content="Team members page, using Tailwind CSS" property="og:description" />
    <meta content="assets/media/app/og-image.png" property="og:image" />
    <link href="assets/media/app/apple-touch-icon.png" rel="apple-touch-icon" sizes="180x180" />
    <link href="assets/media/app/favicon-32x32.png" rel="icon" sizes="32x32" type="image/png" />
    <link href="assets/media/app/favicon-16x16.png" rel="icon" sizes="16x16" type="image/png" />
    <link href="assets/media/app/favicon.ico" rel="shortcut icon" />
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700&display=swap" rel="stylesheet" />
    <link href="assets/vendors/apexcharts/apexcharts.css" rel="stylesheet" />
    <link href="assets/vendors/keenicons/styles.bundle.css" rel="stylesheet" />
    <link href="assets/css/styles.css" rel="stylesheet" />
</head>

<body
    class="antialiased flex h-full text-base text-gray-700 [--tw-page-bg:var(--tw-coal-300)] [--tw-content-bg:var(--tw-light)] [--tw-content-bg-dark:var(--tw-coal-500)] [--tw-content-scrollbar-color:#e8e8e8] [--tw-header-height:60px] [--tw-sidebar-width:270px] bg-[--tw-page-bg] lg:overflow-hidden">
    <!-- Theme Mode -->
    <script>
        const defaultThemeMode = 'light'; // light|dark|system
        let themeMode;

        if (document.documentElement) {
            if (localStorage.getItem('theme')) {
                themeMode = localStorage.getItem('theme');
            } else if (document.documentElement.hasAttribute('data-theme-mode')) {
                themeMode = document.documentElement.getAttribute('data-theme-mode');
            } else {
                themeMode = defaultThemeMode;
            }

            if (themeMode === 'system') {
                themeMode = window.matchMedia('(prefers-color-scheme: dark)').matches ? 'dark' : 'light';
            }

            document.documentElement.classList.add(themeMode);
        }
    </script>
    <!-- End of Theme Mode -->
    <!-- Page -->
    <!-- Base -->
    <div class="flex grow">
        <!-- Header -->
        <header
            class="flex lg:hidden items-center fixed z-10 top-0 start-0 end-0 shrink-0 bg-[--tw-page-bg] h-[--tw-header-height]"
            id="header">
            <!-- Container -->
            <div class="container-fixed flex items-center justify-between flex-wrap gap-3">
                <a href="html/demo10.html">
                    <img class="size-[34px]" src="assets/media/app/mini-logo-circle-success.svg" />
                </a>
                <button class="btn btn-icon btn-light btn-clear btn-sm -me-2" data-drawer-toggle="#sidebar">
                    <i class="ki-filled ki-menu">
                    </i>
                </button>
            </div>
            <!-- End of Container -->
        </header>
        <!-- End of Header -->
        <!-- Wrapper -->
        <div class="flex flex-col lg:flex-row grow pt-[--tw-header-height] lg:pt-0">
            <!-- Sidebar -->
            <div class="flex-col fixed top-0 bottom-0 z-20 hidden lg:flex items-stretch shrink-0 w-[--tw-sidebar-width] dark"
                data-drawer="true" data-drawer-class="drawer drawer-start flex top-0 bottom-0"
                data-drawer-enable="true|lg:false" id="sidebar">
                <!-- Sidebar Header -->
                <div class="flex flex-col gap-2.5" id="sidebar_header">
                    <div class="flex items-center gap-2.5 px-3.5 h-[70px]">
                        <a href="/dashboard/admin">
                            <img class="size-[34px]" src="assets/media/app/mini-logo-circle-success.svg" />
                        </a>
                        <div class="menu menu-default grow" data-menu="true">
                            <div class="menu-item grow" data-menu-item-offset="0, 15px"
                                data-menu-item-placement="bottom-start" data-menu-item-toggle="dropdown"
                                data-menu-item-trigger="hover">
                                <div class="menu-label cursor-pointer text-gray-900 font-medium grow justify-between">
                                    <span class="text-lg font-medium text-inverse grow">
                                        Motoflex
                                    </span>
                                    <div class="flex flex-col text-gray-900 font-medium">
                                        <span class="menu-arrow">
                                            <i class="ki-filled ki-up">
                                            </i>
                                        </span>
                                        <span class="menu-arrow">
                                            <i class="ki-filled ki-down">
                                            </i>
                                        </span>
                                    </div>
                                </div>

                            </div>
                        </div>
                    </div>
                </div>
                <!-- End of Sidebar Header -->
                <!-- Sidebar menu -->
                <div class="flex items-stretch grow shrink-0 justify-center my-5" id="sidebar_menu">
                    <div class="scrollable-y-auto grow [--tw-scrollbar-thumb-color:var(--tw-gray-300)]"
                        data-scrollable="true" data-scrollable-dependencies="#sidebar_header, #sidebar_footer"
                        data-scrollable-height="auto" data-scrollable-offset="0px"
                        data-scrollable-wrappers="#sidebar_menu">
                        <!-- Primary Menu -->
                        <div class="mb-5">
                            <h3 class="text-sm text-gray-500 uppercase ps-5 inline-block mb-3">
                                Pages
                            </h3>
                            <div class="menu flex flex-col w-full gap-1.5 px-3.5" data-menu="true"
                                data-menu-accordion-expand-all="false" id="sidebar_primary_menu">
                                <div class="menu-item">
                                    <a class="menu-link gap-2.5 py-2 px-2.5 rounded-md {{ Request::is('spareparts') ? 'bg-gray-100' : '' }} menu-item-active:bg-gray-100 menu-link-hover:bg-gray-100 !menu-item-here:bg-transparent"
                                        href="/dashboard/admin/spareparts">
                                        <span
                                            class="menu-icon items-start text-lg text-gray-600 menu-item-active:text-gray-900 menu-item-here:text-gray-900">
                                            <i class="ki-filled ki-home-3">
                                            </i>
                                        </span>
                                        <span
                                            class="menu-title text-sm text-gray-800
                                             font-medium menu-item-here:text-gray-900
                                              menu-item-active:text-gray-900 menu-link-hover:text-gray-900">
                                            Spare Parts
                                        </span>
                                    </a>
                                </div>
                            </div>
                            <div class="menu flex flex-col w-full gap-1.5 px-3.5" data-menu="true"
                                data-menu-accordion-expand-all="false" id="sidebar_primary_menu">
                                <div class="menu-item">
                                    <a class="menu-link gap-2.5 py-2 px-2.5 rounded-md {{ Request::is('orders') ? 'bg-gray-100' : '' }} menu-item-active:bg-gray-100 menu-link-hover:bg-gray-100 !menu-item-here:bg-transparent"
                                        href="/dashboard/admin/orders">
                                        <span
                                            class="menu-icon items-start text-lg text-gray-600 menu-item-active:text-gray-900 menu-item-here:text-gray-900">
                                            <i class="ki-filled ki-home-3">
                                            </i>
                                        </span>
                                        <span
                                            class="menu-title text-sm text-gray-800  font-medium menu-item-here:text-gray-900 menu-item-active:text-gray-900 menu-link-hover:text-gray-900">
                                            Orders
                                        </span>
                                    </a>
                                </div>
                            </div>
                            <div class="menu flex flex-col w-full gap-1.5 px-3.5" data-menu="true"
                                data-menu-accordion-expand-all="false" id="sidebar_primary_menu">
                                <div class="menu-item">
                                    <a class="menu-link gap-2.5 py-2 px-2.5 rounded-md {{ Request::is('services') ? 'bg-gray-100' : '' }} menu-item-active:bg-gray-100 menu-link-hover:bg-gray-100 !menu-item-here:bg-transparent"
                                        href="/dashboard/admin/services">
                                        <span
                                            class="menu-icon items-start text-lg text-gray-600 menu-item-active:text-gray-900 menu-item-here:text-gray-900">
                                            <i class="ki-filled ki-home-3">
                                            </i>
                                        </span>
                                        <span
                                            class="menu-title text-sm text-gray-800 font-medium menu-item-here:text-gray-900 menu-item-active:text-gray-900 menu-link-hover:text-gray-900">
                                            Services
                                        </span>
                                    </a>
                                </div>
                            </div>
                        </div>

                        <!-- End of Primary Menu -->
                        <!-- Secondary Menu -->
                        <!-- End of Secondary Menu -->
                    </div>
                </div>
                <!-- End of Sidebar menu-->
                <!-- Footer -->
                <!-- End of Footer -->
            </div>
            <!-- End of Sidebar -->
            <!-- Main -->

        </div>
    </div>
    <div class="w-full pt-10 px-4 sm:px-6 md:px-8 lg:ps-72">
        {{ $slot }}
    </div>
</body>

</html>
