<?php

/*
 * What samego team is that is 'one thing, a team, work together'
 * Values comes from technology, technology comes from sharing~
 * https://github.com/alicfeng/KubernetesClient
 */

namespace AlicFeng\Kubernetes\Enum;

class PatchCode
{
    const TYPE_STRATEGIC = 'strategic';
    const TYPE_MERGE     = 'merge';
    const TYPE_JSON      = 'json';

    const HEADER = [
        self::TYPE_STRATEGIC => [
            'Content-Type' => 'application/strategic-merge-patch+json',
        ],
        self::TYPE_MERGE     => [
            'Content-Type' => 'application/merge-patch+json',
        ],
        self::TYPE_JSON      => [
            'Content-Type' => 'application/json-patch+json',
        ],
    ];
}
