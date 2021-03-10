<?php

/*
 * What samego team is that is 'one thing, a team, work together'
 * Values comes from technology, technology comes from sharing~
 * https://github.com/alicfeng/KubernetesClient
 */

namespace AlicFeng\Kubernetes\Facade;

use AlicFeng\Kubernetes\Contract\AsmInterface;
use Illuminate\Support\Facades\Facade;

class Asm extends Facade
{
    protected static function getFacadeAccessor(): string
    {
        return AsmInterface::class;
    }
}
