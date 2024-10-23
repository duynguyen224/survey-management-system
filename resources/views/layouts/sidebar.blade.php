<aside id="layout-menu" class="layout-menu menu-vertical menu bg-menu-theme">
    <div class="app-brand demo mb-5">
        <a href="{{ route('home.index') }}" class="app-brand-link">
            <img src="{{ asset('sms/img/pe-bank-logo.png') }}" alt="pe-bank logo" width="200">
        </a>
        <a href="javascript:void(0);" class="layout-menu-toggle menu-link text-large ms-auto d-block d-xl-none">
            <i class="bx bx-chevron-left bx-sm align-middle"></i>
        </a>
    </div>

    <div class="menu-inner-shadow"></div>

    <ul class="menu-inner py-1">
        <li class="{{ request()->is('admin/engineers*') ? 'active' : '' }} menu-item">
            <a href="{{ route('engineers.index') }}" class="menu-link">
                <i class="menu-icon tf-icons bx bx-home-circle"></i>
                <div data-i18n="Analytics">Engineers</div>
            </a>
        </li>

        <li class="{{ request()->is('admin/companies*') ? 'active' : '' }} menu-item">
            <a href="{{ route('companies.index') }}" class="menu-link">
                <i class="menu-icon tf-icons bx bx-home-circle"></i>
                <div data-i18n="Analytics">Companies</div>
            </a>
        </li>

        <li class="{{ request()->is('admin/surveys*') ? 'active' : '' }} menu-item">
            <a href="{{ route('surveys.index') }}" class="menu-link">
                <i class="menu-icon tf-icons bx bx-home-circle"></i>
                <div data-i18n="Analytics">Surveys</div>
            </a>
        </li>

        <li class="{{ request()->is('admin/users*') ? 'active' : '' }} menu-item">
            <a href="{{ route('users.index') }}" class="menu-link">
                <i class="menu-icon tf-icons bx bx-home-circle"></i>
                <div data-i18n="Analytics">Users</div>
            </a>
        </li>

        <li class="{{ request()->is('admin/users/change-password*') ? 'active' : '' }} menu-item">
            <a href="{{ route('users.index') }}" class="menu-link">
                <i class="menu-icon tf-icons bx bx-home-circle"></i>
                <div data-i18n="Analytics">Change password</div>
            </a>
        </li>

        <li class="{{ request()->is('admin/sample*') ? 'active' : '' }} menu-item">
            <a href="{{ route('sample.index') }}" class="menu-link">
                <i class="menu-icon tf-icons bx bx-home-circle"></i>
                <div data-i18n="Analytics">Sample screen</div>
            </a>
        </li>
    </ul>

    <div class="d-flex justify-content-center mb-3">
        <form action="{{ route('auth.logout') }}" method="POST">
            @csrf
            <button type="submit" class="btn btn-primary">
                <i class="fa-solid fa-arrow-right-from-bracket me-3"></i>
                <span>Logout</span>
            </button>
        </form>
    </div>
</aside>
