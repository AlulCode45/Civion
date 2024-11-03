<?php

namespace App\Providers;

use App\Contracts\Interface\Category\CategoryInterface;
use App\Contracts\Repository\Category\CategoryRepository;
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

    private array $policies = [
        Category::class => CategoryPolicy::class,
        News::class => NewsPolicy::class,
        Ratings::class => RatingsPolicy::class,
        Response::class => ResponsePolicy::class,
        Reports::class => ReportsPolicy::class,
    ];

    private array $register = [
        CategoryInterface::class => CategoryRepository::class
    ];
    /**
     * Register any application services.
     */
    public function register(): void
    {
        foreach ($this->register as $index => $value) $this->app->bind($index, $value);
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        foreach ($this->policies as $model => $policy) Gate::policy($model, $policy);
    }
}
