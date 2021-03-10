<?php

/*
 * What samego team is that is 'one thing, a team, work together'
 * Values comes from technology, technology comes from sharing~
 * https://github.com/alicfeng/KubernetesClient
 */

namespace AlicFeng\Kubernetes;

use AlicFeng\Kubernetes\Kubernetes\Gataway;
use AlicFeng\Kubernetes\Kubernetes\VirtualService;

/**
 * Class Kubernetes.
 *
 * @method static VirtualService             virtualService(array $config)
 * @method static Gataway                    gateway(array $config)
 */
class Asm
{
    private $config;

    public function __construct(array $config)
    {
        $this->config = $config;
    }

    /**
     * @description make application container(obj)
     * @param string $name   server name
     * @param array  $config kubernetes configuration
     * @return mixed
     * @author      AlicFeng
     */
    private static function make(string $name, array $config)
    {
        $namespace   = ucfirst($name);
        $application = "\\AlicFeng\\Kubernetes\\Kubernetes\\{$namespace}";

        return new $application($config, 'asm');
    }

    /**
     * @function    __call
     * @description dynamically pass methods to the application
     * @param $name
     * @param $arguments
     * @return mixed
     * @author      AlicFeng
     * @datatime    20-7-30 下午5:31
     */
    public function __call($name, $arguments)
    {
        return self::make($name, $this->config);
    }

    /**
     * @function    __callStatic
     * @description dynamically pass methods to the application
     * @param $name
     * @param $arguments
     * @return mixed
     * @author      AlicFeng
     * @datatime    20-7-30 下午5:31
     */
    public static function __callStatic($name, $arguments)
    {
        return self::make($name, ...$arguments);
    }
}
