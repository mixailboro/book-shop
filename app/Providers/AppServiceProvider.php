<?php

namespace App\Providers;


use App\Models\Cart;
use App\Models\Genre;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\View;
use Illuminate\Support\ServiceProvider;

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
        View::share(
            'cart',
            Cart::query()
                ->where('user_id', Auth::id())
                ->first()
        );

        View::share(
            'genres',
            Genre::all()
            ->pluck('name', 'id')
        );
    }
}
