<?php

namespace App\Providers;

use Illuminate\Pagination\Paginator;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        // Dao Registration
        $this->app->bind('App\Contracts\Dao\HomePage\HomePageDaoInterface', 'App\Dao\HomePage\HomePageDao');
        $this->app->bind('App\Contracts\Dao\ProductPage\ProductPageDaoInterface', 'App\Dao\ProductPage\ProductPageDao');
        $this->app->bind('App\Contracts\Dao\FeedbackPage\FeedbackPageDaoInterface', 'App\Dao\FeedbackPage\FeedbackPageDao');
        $this->app->bind('App\Contracts\Dao\Cart\CartDaoInterface', 'App\Dao\Cart\CartDao');
        $this->app->bind('App\Contracts\Dao\Checkout\CheckoutDaoInterface', 'App\Dao\Checkout\CheckoutDao');

        $this->app->bind('App\Contracts\Dao\Category\CategoryDaoInterface', 'App\Dao\Category\CategoryDao');
        $this->app->bind('App\Contracts\Dao\Product\ProductDaoInterface', 'App\Dao\Product\ProductDao');
        $this->app->bind('App\Contracts\Dao\Dashboard\DashboardDaoInterface', 'App\Dao\Dashboard\DashboardDao');
        $this->app->bind('App\Contracts\Dao\User\UserDaoInterface', 'App\Dao\User\UserDao');
        $this->app->bind('App\Contracts\Dao\Feedback\FeedbackDaoInterface', 'App\Dao\Feedback\FeedbackDao');
        $this->app->bind('App\Contracts\Dao\Profile\ProfileDaoInterface', 'App\Dao\Profile\ProfileDao');

        // Business Logic Registration
        $this->app->bind('App\Contracts\Services\HomePage\HomePageServiceInterface', 'App\Services\HomePage\HomePageService');
        $this->app->bind('App\Contracts\Services\ProductPage\ProductPageServiceInterface', 'App\Services\ProductPage\ProductPageService');
        $this->app->bind('App\Contracts\Services\FeedbackPage\FeedbackPageServiceInterface', 'App\Services\FeedbackPage\FeedbackPageService');
        $this->app->bind('App\Contracts\Services\Cart\CartServiceInterface', 'App\Services\Cart\CartService');
        $this->app->bind('App\Contracts\Services\Checkout\CheckoutServiceInterface', 'App\Services\Checkout\CheckoutService');

        $this->app->bind('App\Contracts\Services\Category\CategoryServiceInterface', 'App\Services\Category\CategoryService');
        $this->app->bind('App\Contracts\Services\Product\ProductServiceInterface', 'App\Services\Product\ProductService');
        $this->app->bind('App\Contracts\Services\User\UserServiceInterface', 'App\Services\User\UserService');
        $this->app->bind('App\Contracts\Services\Feedback\FeedbackServiceInterface', 'App\Services\Feedback\FeedbackService');
        $this->app->bind('App\Contracts\Services\Dashboard\DashboardServiceInterface', 'App\Services\Dashboard\DashboardService');        
        $this->app->bind('App\Contracts\Services\Profile\ProfileServiceInterface', 'App\Services\Profile\ProfileService');
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        Paginator::useBootstrap();
    }
}
