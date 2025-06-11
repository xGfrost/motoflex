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
<div wire:key="spare-parts-{{ rand() }}">
    <!DOCTYPE html>
    <html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

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
        <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700&display=swap"
            rel="stylesheet" />
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
                {{-- <div class="flex-col fixed top-0 bottom-0 z-20 hidden lg:flex items-stretch shrink-0 w-[--tw-sidebar-width] dark"
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
            </div> --}}
                <!-- End of Sidebar -->
                <!-- Main -->
                <div
                    class="flex flex-col grow lg:rounded-l-xl bg-[--tw-content-bg] dark:bg-[--tw-content-bg-dark] border border-gray-300 dark:border-gray-200 lg:ms-[--tw-sidebar-width]">
                    <div class="flex flex-col grow lg:scrollable-y-auto lg:[scrollbar-width:auto] lg:light:[--tw-scrollbar-thumb-color:var(--tw-content-scrollbar-color)] pt-5"
                        id="scrollable_content">
                        <main class="grow" role="content">
                            <!-- Toolbar -->
                            <div class="pb-5">
                                <!-- Container -->
                                <div class="container-fixed flex items-center justify-between flex-wrap gap-3">
                                    <div class="flex flex-col flex-wrap gap-1">
                                        <h1 class="font-medium text-lg text-gray-900">
                                            Overview
                                        </h1>
                                    </div>
                                    <div class="flex items-center flex-wrap gap-1.5 lg:gap-3.5">
                                        <span class="menu-title">
                                            Dark Mode
                                        </span>
                                        <label class="switch switch-sm">
                                            <input data-theme-state="dark" data-theme-toggle="true" name="check"
                                                type="checkbox" value="1" />
                                        </label>
                                    </div>
                                </div>
                                <!-- End of Container -->
                            </div>
                            <!-- End of Toolbar -->
                            <!-- Container -->
                            <div class="container-fixed">
                                <div class="grid gap-5 lg:gap-7.5">
                                    <div class="card card-grid min-w-full">
                                        <div class="card-header py-5 flex-wrap gap-2">
                                            <h3 class="card-title">
                                                Services
                                            </h3>
                                            <div class="flex gap-6">
                                                <div class="relative">
                                                    <i
                                                        class="ki-filled ki-magnifier leading-none text-md text-gray-500 absolute top-1/2 start-0 -translate-y-1/2 ms-3">
                                                    </i>
                                                    <input class="input input-sm pl-8" type="search"
                                                        wire:model.live.debounce.300ms="search" placeholder="Search" />
                                                </div>
                                                <a wire:navigate href="/add/services">
                                                    <button class="dropdown-toggle btn btn-sm btn-light">
                                                        <i class="ki-filled ki-plus-squared">
                                                        </i>
                                                        Add
                                                    </button>
                                                </a>
                                            </div>
                                        </div>
                                        <div class="card-body">
                                            <div data-datatable="true" data-datatable-page-size="10">
                                                <div class="scrollable-x-auto">
                                                    <table class="table table-border" data-datatable-table="true"
                                                        id="members_table">
                                                        <thead>
                                                            <tr>
                                                                <th class="w-[60px] text-center">
                                                                    <input class="checkbox checkbox-sm"
                                                                        data-datatable-check="true" type="checkbox" />
                                                                </th>
                                                                <th class="min-w-[300px]">
                                                                    <span class="sort asc">
                                                                        <span
                                                                            class="sort-label text-gray-700 font-normal">
                                                                            Name
                                                                        </span>
                                                                        <span class="sort-icon">
                                                                        </span>
                                                                    </span>
                                                                </th>
                                                                <th class="text-gray-700 font-normal min-w-[220px]">
                                                                    Description
                                                                </th>
                                                                <th class="min-w-[165px]">
                                                                    <span class="sort">
                                                                        <span
                                                                            class="sort-label text-gray-700 font-normal">
                                                                            Price
                                                                        </span>
                                                                        <span class="sort-icon">
                                                                        </span>
                                                                    </span>
                                                                </th>
                                                                <th class="min-w-[165px]">
                                                                    <span class="sort">
                                                                        <span
                                                                            class="sort-label text-gray-700 font-normal">
                                                                            Duration
                                                                        </span>
                                                                        <span class="sort-icon">
                                                                        </span>
                                                                    </span>
                                                                </th>
                                                                <th class="min-w-[165px]">
                                                                    <span class="sort">
                                                                        <span
                                                                            class="sort-label text-gray-700 font-normal">
                                                                            Workshop
                                                                        </span>
                                                                        <span class="sort-icon">
                                                                        </span>
                                                                    </span>
                                                                </th>
                                                                <th class="w-[60px]">
                                                                </th>
                                                            </tr>
                                                        </thead>

                                                        <tbody>
                                                            @if (isset($services) && $services->isNotEmpty())
                                                                @foreach ($services as $service)
                                                                    <tr wire:key="{{ $service->id }}">
                                                                    <tr>
                                                                        <td class="text-center">
                                                                            <input class="checkbox checkbox-sm"
                                                                                data-datatable-row-check="true"
                                                                                type="checkbox" value="1" />
                                                                        </td>
                                                                        <td>
                                                                            <div class="flex items-center gap-2.5">
                                                                                <div class="">
                                                                                    {{-- <img class="h-9 rounded-full"
                                                                                    src="assets/media/avatars/300-3.png" /> --}}
                                                                                </div>
                                                                                <div class="flex flex-col gap-0.5">
                                                                                    <a class="leading-none font-medium text-sm text-gray-900 hover:text-primary"
                                                                                        href="#">
                                                                                        {{ $service->name }}
                                                                                    </a>
                                                                                </div>
                                                                            </div>
                                                                        </td>
                                                                        <td>
                                                                            <div class="flex flex-wrap gap-2.5 mb-2">
                                                                                <span
                                                                                    class="badge badge-sm badge-light badge-outline">
                                                                                    {{ Str::limit($service->description, 50, '...') }}
                                                                                </span>
                                                                            </div>
                                                                        </td>
                                                                        <td>
                                                                            <div class="flex items-center gap-1.5">
                                                                                {{-- <img alt="flag"
                                                                                class="h-4 rounded-full"
                                                                                src="assets/media/flags/estonia.svg" /> --}}
                                                                                <span
                                                                                    class="leading-none text-gray-800 font-normal">
                                                                                    {{ $service->price }}
                                                                                </span>
                                                                            </div>
                                                                        </td>
                                                                        <td>
                                                                            <span
                                                                                class="badge badge-sm badge-outline badge-success">
                                                                                {{ $service->duration }} mins
                                                                            </span>
                                                                        </td>
                                                                        <td class="text-gray-800 font-normal">
                                                                            {{ Str::limit($service->workshop->name, 30, '...') }}
                                                                        </td>
                                                                        <td class="w-[60px]">
                                                                            <div class="menu" data-menu="true">
                                                                                <div class="menu-item"
                                                                                    data-menu-item-offset="0, 10px"
                                                                                    data-menu-item-placement="bottom-end"
                                                                                    data-menu-item-placement-rtl="bottom-start"
                                                                                    data-menu-item-toggle="dropdown"
                                                                                    data-menu-item-trigger="click|lg:click">
                                                                                    <button
                                                                                        class="menu-toggle btn btn-sm btn-icon btn-light btn-clear">
                                                                                        <i
                                                                                            class="ki-filled ki-dots-vertical">
                                                                                        </i>
                                                                                    </button>
                                                                                    <div class="menu-dropdown menu-default w-full max-w-[175px]"
                                                                                        data-menu-dismiss="true">
                                                                                        <div class="menu-separator">
                                                                                        </div>
                                                                                        <div class="menu-item">
                                                                                            <a class="menu-link"
                                                                                            href="/edit/{{ $service->id }}/services">
                                                                                                <span
                                                                                                    class="menu-icon">
                                                                                                    <i
                                                                                                        class="ki-filled ki-pencil">
                                                                                                    </i>
                                                                                                </span>
                                                                                                <span
                                                                                                    class="menu-title"
                                                                                                    >
                                                                                                    Edit
                                                                                                </span>
                                                                                            </a>
                                                                                        </div>
                                                                                        <div class="menu-separator">
                                                                                        </div>
                                                                                        <div class="menu-item">
                                                                                            <a class="menu-link"
                                                                                            href="{{ route('admin.services.show', ['services_id' => $service->id]) }}">
                                                                                                <span
                                                                                                    class="menu-icon">
                                                                                                    <i
                                                                                                        class="ki-filled ki-pencil">
                                                                                                    </i>
                                                                                                </span>
                                                                                                <span
                                                                                                    class="menu-title"
                                                                                                    >
                                                                                                    Show
                                                                                                </span>
                                                                                            </a>
                                                                                        </div>
                                                                                        <div class="menu-separator">
                                                                                        </div>
                                                                                        <div class="menu-item">
                                                                                            <a class="menu-link"
                                                                                                >
                                                                                                <span
                                                                                                    class="menu-icon">
                                                                                                    <i
                                                                                                        class="ki-filled ki-trash">
                                                                                                    </i>
                                                                                                </span>
                                                                                                <span
                                                                                                    wire:click="delete({{ $service->id }})"
                                                                                                    wire:confirm.prompt="Are you sure?\n\nType DELETE to confirm|DELETE"
                                                                                                    class="menu-title">
                                                                                                    Remove
                                                                                                </span>
                                                                                            </a>
                                                                                        </div>
                                                                                    </div>
                                                                                </div>
                                                                            </div>
                                                                        </td>

                                                                    </tr>
                                                                    </tr>
                                                                @endforeach
                                                            @else
                                                                <tr>
                                                                    <td colspan="6"
                                                                        class="text-center text-gray-500 py-4">
                                                                        No spare parts found.
                                                                    </td>
                                                                </tr>
                                                            @endif
                                                        </tbody>
                                                    </table>
                                                </div>
                                                <div class="card-footer ..." wire:ignore.self>
                                                    <div class="flex items-center gap-2 order-2 md:order-1">
                                                        Show
                                                        <select class="select select-sm w-16"
                                                            wire:model.live="perPage">
                                                            <option value="5">5</option>
                                                            <option value="10">10</option>
                                                            <option value="20">20</option>
                                                        </select>
                                                        per page
                                                    </div>
                                                    <div class="flex items-center gap-4 order-1 md:order-2">
                                                        <span>
                                                            Showing {{ $services->firstItem() }} to
                                                            {{ $services->lastItem() }} of {{ $services->total() }}
                                                            entries
                                                        </span>
                                                        <div class="pagination">
                                                            {{ $services->links() }}
                                                        </div>
                                                    </div>
                                                </div>


                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- End of Container -->
                        </main>

                        <!-- End of Page -->
                        <!-- Scripts -->
                        <script src="assets/js/core.bundle.js"></script>
                        <script src="assets/vendors/apexcharts/apexcharts.min.js"></script>
                        <!-- End of Scripts -->
                    </div>
                </div>
            </div>
        </div>
        <script>
            document.addEventListener('DOMContentLoaded', function() {
                if (window.Livewire) {
                    Livewire.start();
                    console.log('Livewire initialized successfully');
                } else {
                    console.error('Livewire not loaded!');
                }
            });
        </script>

        <script>
            document.addEventListener("DOMContentLoaded", function() {
                const toggle = document.querySelector('[data-theme-toggle]');
                toggle.addEventListener("change", function() {
                    const isDark = this.checked;

                    if (isDark) {
                        document.documentElement.classList.add("dark");
                        localStorage.setItem("theme", "dark");
                    } else {
                        document.documentElement.classList.remove("dark");
                        localStorage.setItem("theme", "light");
                    }
                });

                // Saat halaman dimuat, ambil preferensi dari localStorage
                const storedTheme = localStorage.getItem("theme");
                if (storedTheme === "dark") {
                    document.documentElement.classList.add("dark");
                    toggle.checked = true;
                }
            });
        </script>

    </body>

    </html>
</div>
