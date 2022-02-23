<?php

namespace App\Providers;

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
        
        $this->extendValidator();
        
    }

    public function extendValidator()
    {
        app('validator')->extend('phone', function ($attribute, $value, $parameters) {
            $value = trim($value);
            if ($value == '') return true;
            $match = '/^([0-9\s\-\+\(\)]*)$/';
            return (boolean) preg_match($match, $value);

        }, 'The :attribute is invalid phone number');
    }
}
