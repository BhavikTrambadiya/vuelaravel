<?php

namespace App\Providers;

use Illuminate\Contracts\Container\BindingResolutionException;
use Illuminate\Pagination\Paginator;
use Illuminate\Support\Facades\Blade;
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
        //
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        Blade::directive('enum', function (string $expression) {
            $arrayvalues = explode(", ", $expression);
            $class = preg_replace('/[^a-zA-Z0-9_ -]/s', '', $arrayvalues[0]);
            $variable = preg_replace('/[^a-zA-Z0-9_ -]/s', '', $arrayvalues[1]);
            $classpath = 'App\Enums\\' . $class;
            if (enum_exists($classpath, true)) {
                return "<?php \${$variable} = {$classpath}::class ?>";
            } else {
                throw new BindingResolutionException("Unable to load Enum: $class");
            }
        });
        Paginator::useBootstrapFive();
    }
}
