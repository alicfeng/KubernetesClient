<?php

/*
 * What samego team is that is 'one thing, a team, work together'
 * Values comes from technology, technology comes from sharing~
 * https://github.com/alicfeng/KubernetesClient
 */

namespace AlicFeng\Kubernetes\ServiceProvider;

use AlicFeng\Kubernetes\Contract\KubernetesInterface;
use AlicFeng\Kubernetes\Kubernetes;
use Illuminate\Support\ServiceProvider as LaravelServiceProvider;

class KubernetesServiceProvider extends LaravelServiceProvider
{
    protected $defer = true;

    public function boot()
    {
        $this->publishConfig();
        $this->register();
    }

    public function register()
    {
        $this->mergeConfigFrom(__DIR__ . '/../../../config/kubernetes.php', 'kubernetes');

        $this->app->bind(KubernetesInterface::class, function () {
            return new Kubernetes(config('kubernetes'));
        });
    }

    public function provides(): array
    {
        return [KubernetesInterface::class];
    }

    public function publishConfig()
    {
        $this->publishes(
            [
                __DIR__ . '/../../../config/kubernetes.php' => config_path('kubernetes.php'),
            ],
            'kubernetes'
        );
    }
}
