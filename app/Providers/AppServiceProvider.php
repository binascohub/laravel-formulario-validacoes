<?php

namespace App\Providers;

use Code\Validator\Cnpj;
use Code\Validator\Cpf;

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
        // faker criar dados em português
        $this->app->singleton(\Faker\Generator::class, function(){
            return \Faker\Factory::create('pt_BR');
        });

        // facades helper
        if ($this->app->environment() !== 'production') {
            $this->app->register(\Barryvdh\LaravelIdeHelper\IdeHelperServiceProvider::class);
        }
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        \Validator::extend('document_number', function($attribute,$value,$parameters,$validator){
            $documentValidator = $parameters[0] =='cpf' ? new Cpf(): new Cnpj();
            return $documentValidator->isValid($value);
         });
    }
}
