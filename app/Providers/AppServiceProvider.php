<?php

namespace App\Providers;

use App\Services\AuthService;
use App\Services\CompanyService;
use App\Services\Interfaces\IAuthService;
use App\Services\Interfaces\ICompanyService;
use App\Services\Interfaces\IPaginationService;
use App\Services\Interfaces\IUserService;
use App\Services\PaginationService;
use App\Services\UserService;
use Illuminate\Pagination\Paginator;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        $this->app->scoped(IAuthService::class, AuthService::class);
        $this->app->scoped(IPaginationService::class, PaginationService::class);
        $this->app->scoped(IUserService::class, UserService::class);
        $this->app->scoped(ICompanyService::class, CompanyService::class);
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        Paginator::defaultView('components.tables.pagination');
    }
}
