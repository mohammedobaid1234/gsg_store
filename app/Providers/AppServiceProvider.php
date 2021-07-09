<?php

namespace App\Providers;

use Illuminate\Support\Facades\Validator;
use Illuminate\Support\ServiceProvider;
use App\Rules\Filter;
use Illuminate\Pagination\Paginator;

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
    protected $invalid_word;
    public function boot()
    {
        //
        Validator::extend('Filter' , function ($attribute, $value, $param) {   
            foreach($param  as  $word){
                
                if(stripos($value, $word) !== false){
                    $this->invalid_word = $word;
                   return false;
                }
            }
            return true;
        }, 'Can\'t use this "' . $this->invalid_word . '" word ' );
        Paginator::useBootstrap();
        }
}
