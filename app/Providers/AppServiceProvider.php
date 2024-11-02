<?php

namespace App\Providers;

use App\Models\Category;
use App\Models\News;
use App\Models\Ratings;
use App\Models\Reports;
use App\Models\Response;
use App\Models\User;
use App\Policies\CategoryPolicy;
use App\Policies\NewsPolicy;
use App\Policies\RatingsPolicy;
use App\Policies\ReportsPolicy;
use App\Policies\ResponsePolicy;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{

    private $policies = [
        Category::class => CategoryPolicy::class,
        News::class => NewsPolicy::class,
        Ratings::class => RatingsPolicy::class,
        Response::class => ResponsePolicy::class,
        Reports::class => ReportsPolicy::class,
    ];
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
        foreach ($this->policies as $model => $policy) {
            Gate::policy($model, $policy);
        }
    }
}