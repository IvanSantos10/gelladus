<?php

namespace Gelladus\Providers;

use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {

        \Schema::defaultStringLength(191);

        \Form::macro('error', function ($field, $errors) {
            if (!str_contains($field, '.*') && $errors->has($field) || count($errors->get($field)) > 0) {
                return view('errors.error_field', compact('field'));
            }
            return null;
        });

        \Html::macro('openFormGroup', function ($field = null, $errors = null, $style = null) {
            $result = false;
            $hasId = "";
            $hasStyle = "";
            if ($field != null and $errors != null) {
                if (is_array($field)) {
                    foreach ($field as $value) {
                        if (!str_contains($value, '.*') && $errors->has($value) || count($errors->get($value)) > 0) {
                            $result = true;
                            break;
                        }
                    }
                } else {
                    if (!str_contains($field, '.*') && $errors->has($field) || count($errors->get($field)) > 0) {
                        $result = true;
                    }
                }
                $hasId = "id='div-$field'";
            }
            $hasError = $result ? ' has-danger' : '';

            if ($style != null) {
                $hasStyle = "style = '$style'";
            }


            return "<div {$hasId} class=\"form-group{$hasError}\" {$hasStyle}>";
        });

        \Html::macro('closeFormGroup', function () {
            return '</div>';
        });
    }

    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }
}
