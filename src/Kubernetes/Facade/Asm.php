<?php
/**
 * Created by AlicFeng at 2021/3/10 上午1:16
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
