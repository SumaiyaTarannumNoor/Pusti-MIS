<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;

use Illuminate\Database\Eloquent\Relations\Relation;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        //

        Relation::morphMap([
            'sales_organizations' => 'App\Models\SalesOrganization',
            'distributors' => 'App\Models\Distributor',
            // Add other morphable types if needed
        ]);
    }
}
