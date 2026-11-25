<?php

namespace App\Providers;

use Illuminate\Pagination\Paginator;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    public function register(): void
    {
        //
    }

    public function boot(): void
    {
        // Project ini memakai Bootstrap, jadi link pagination harus bergaya Bootstrap
        // (bawaan Laravel bergaya Tailwind dan akan tampil rusak tanpa Tailwind).
        Paginator::useBootstrapFive();
    }
}
