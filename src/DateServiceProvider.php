<?php

namespace Ignite;

use Illuminate\Support\Facades\Blade;
use Illuminate\Support\ServiceProvider;

class DateServiceProvider extends ServiceProvider
{
    /**
     * Define component
     *
     * @var array
     */
    protected $components = [
        View\Components\Date::class,
        View\Components\DateRange::class,
        View\Components\DateTime::class
    ];

    /**
     * Register blade components.
     *
     * @return void
     */
    public function boot()
    {
        $this->registerBlade();

        $this->publishes([
            __DIR__.'/../resources/views' => resource_path('views/vendor/ignite'),
        ], 'ignite-views');

        $this->loadViewsFrom(__DIR__.'/../resources/views', 'ignite');

        $this->loadViewComponentsAs('ignite', $this->components);
    }

    protected function registerBlade()
    {
        Blade::directive('igniteDateScripts', function($expression) {
            return '<script src="https://cdn.jsdelivr.net/npm/flatpickr"></script>';
        });

        Blade::directive('igniteDateStyles', function($expression) {
            return '<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/flatpickr/dist/flatpickr.min.css">';
        });
    }
}
