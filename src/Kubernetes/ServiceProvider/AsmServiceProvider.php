<?php

/*
 * What samego team is that is 'one thing, a team, work together'
 * Values comes from technology, technology comes from sharing~
 * https://github.com/alicfeng/KubernetesClient
 */

namespace AlicFeng\Kubernetes\ServiceProvider;

use AlicFeng\Kubernetes\Asm;
use AlicFeng\Kubernetes\Contract\AsmInterface;
use Illuminate\Support\ServiceProvider as LaravelServiceProvider;

class AsmServiceProvider extends LaravelServiceProvider
{
    protected $defer = true;

    public function boot()
    {
        $this->publishConfig();
        $this->register();
    }

    public function register()
    {
        $this->mergeConfigFrom(__DIR__ . '/../../../config/asm.php', 'asm');

        $this->app->bind(AsmInterface::class, function () {
            return new Asm(config('asm'));
        });
    }

    public function provides(): array
    {
        return [AsmInterface::class];
    }

    public function publishConfig()
    {
        $this->publishes(
            [
                __DIR__ . '/../../../config/asm.php' => config_path('asm.php'),
            ],
            'asm'
        );
    }
}
