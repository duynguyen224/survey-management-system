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

    @hasanyrole('Agency Admin')
        <ul class="menu-inner py-1">
            <li class="{{ request()->is('admin/engineers*') ? 'active' : '' }} menu-item">
                <a href="{{ route('engineers.index') }}" class="menu-link d-flex gap-2">
                    <i class="fa-fw fa-solid fa-person"></i>
                    <div data-i18n="Analytics">Engineers</div>
                </a>
            </li>

            <li class="{{ request()->is('admin/companies*') ? 'active' : '' }} menu-item">
                <a href="{{ route('companies.index') }}" class="menu-link d-flex gap-2">
                    <i class="fa-fw fa-solid fa-house-chimney-medical"></i>
                    <div data-i18n="Analytics">Companies</div>
                </a>
            </li>

            <li class="{{ request()->is('admin/surveys*') ? 'active' : '' }} menu-item">
                <a href="{{ route('surveys.index') }}" class="menu-link d-flex gap-2">
                    <i class="fa-fw fa-regular fa-clipboard"></i>
                    <div data-i18n="Analytics">Surveys</div>
                </a>
            </li>

            <li class="{{ request()->is('admin/users*') ? 'active' : '' }} menu-item">
                <a href="{{ route('users.index') }}" class="menu-link d-flex gap-2">
                    <i class="fa-fw fa-solid fa-gear"></i>
                    <div data-i18n="Analytics">Users</div>
                </a>
            </li>

            <li class="{{ request()->is('admin/me/change-password*') ? 'active' : '' }} menu-item">
                <a href="{{ route('users.showChangePassword') }}" class="menu-link d-flex gap-2">
                    <i class="fa-fw fa-solid fa-key"></i>
                    <div data-i18n="Analytics">Change password</div>
                </a>
            </li>

            <li class="{{ request()->is('admin/sample*') ? 'active' : '' }} menu-item">
                <a href="{{ route('sample.index') }}" class="menu-link d-flex gap-2">
                    <i class="fa-fw fa-solid fa-seedling"></i>
                    <div data-i18n="Analytics">Sample screen</div>
                </a>
            </li>
        </ul>
    @endhasanyrole

    <div class="d-flex justify-content-center mb-3">
        <form action="{{ route('auth.logout') }}" method="POST">
            @csrf
            <div class="d-grid col-12 mx-auto">
                <button type="submit" class="btn btn-primary">
                    <i class="fa-fw fa-solid fa-arrow-right-from-bracket me-3"></i>
                    <span>Logout</span>
                </button>
            </div>
        </form>
    </div>
</aside>
