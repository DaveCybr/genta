<aside id="layout-menu" class="layout-menu menu-vertical menu bg-menu-theme">
    <div class="app-brand demo">
        <a href="#" class="app-brand-link">

            <span class="app-brand-text demo menu-text fw-bolder ms-2">Genta Villa</span>
        </a>

        <a href="javascript:void(0);" class="layout-menu-toggle menu-link text-large ms-auto d-block d-xl-none">
            <i class="bx bx-chevron-left bx-sm align-middle"></i>
        </a>
    </div>

    <div class="menu-inner-shadow"></div>

    <ul class="menu-inner py-1">
        <!-- Dashboard -->
        <li class="menu-item {{ Request::is('dashboard') ? 'active' : '' }}">
            <a href="{{ route('dashboard') }}" class="menu-link">
                <i class="menu-icon tf-icons bx bx-bar-chart"></i>
                <div data-i18n="Analytics">Dashboard</div>
            </a>
        </li>
        <li class="menu-item {{ Request::is('user') ? 'active' : '' }}">
            <a href="{{ route('user') }}" class="menu-link">
                <i class="menu-icon tf-icons bx bx-user"></i>
                <div data-i18n="Analytics">User</div>
            </a>
        </li>
        <!-- Layouts -->

        <li class="menu-header small text-uppercase">
            <span class="menu-header-text">Section</span>
        </li>

        <li class="menu-item {{ Request::is('homemenu') ? 'active' : '' }}">
            <a href="{{ route('homemenu') }}" class="menu-link">
                <i class="menu-icon tf-icons bx bx-menu"></i>
                <div data-i18n="Analytics">Home</div>
            </a>
        </li>

        <li class="menu-item {{ Request::is('about') ? 'active' : '' }}">
            <a href="{{ route('about') }}" class="menu-link">
                <i class="menu-icon tf-icons bx bx-menu"></i>
                <div data-i18n="Analytics">About</div>
            </a>
        </li>

        <li class="menu-item {{ Request::is('about2') ? 'active' : '' }}">
            <a href="{{ route('about2') }}" class="menu-link">
                <i class="menu-icon tf-icons bx bx-menu"></i>
                <div data-i18n="Analytics">About2</div>
            </a>
        </li>

        <li class="menu-item {{ Request::is('siteplanadmin') ? 'active' : '' }}">
            <a href="{{ route('siteplanadmin') }}" class="menu-link">
                <i class="menu-icon tf-icons bx bx-menu"></i>
                <div data-i18n="Analytics">Siteplan</div>
            </a>
        </li>

        <li class="menu-item {{ Request::is('contact') ? 'active' : '' }}">
            <a href="{{ route('contact') }}" class="menu-link">
                <i class="menu-icon tf-icons bx bx-menu"></i>
                <div data-i18n="Analytics">Contact</div>
            </a>
        </li>

        <li class="menu-item {{ Request::is('gallery') ? 'active' : '' }}">
            <a href="{{ route('gallery') }}" class="menu-link">
                <i class="menu-icon tf-icons bx bx-menu"></i>
                <div data-i18n="Analytics">Gallery</div>
            </a>
        </li>

        <li class="menu-item {{ Request::is('agent') ? 'active' : '' }}">
            <a href="{{ route('agent') }}" class="menu-link">
                <i class="menu-icon tf-icons bx bx-menu"></i>
                <div data-i18n="Analytics">Agent</div>
            </a>
        </li>

        <li class="menu-item {{ Request::is('testimoni') ? 'active' : '' }}">
            <a href="{{ route('testimoni') }}" class="menu-link">
                <i class="menu-icon tf-icons bx bx-menu"></i>
                <div data-i18n="Analytics">Testimoni</div>
            </a>
        </li>

        <li class="menu-header small text-uppercase">
            <span class="menu-header-text">Data</span>
        </li>

        <li class="menu-item {{ Request::is('datavilla') ? 'active' : '' }}">
            <a href="{{ route('datavilla') }}" class="menu-link">
                <i class="menu-icon tf-icons bx bx-home"></i>
                <div data-i18n="Analytics">Villa</div>
            </a>
        </li>

        <!-- Extended components -->

    </ul>
</aside>
<!-- / Menu -->
