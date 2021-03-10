<?php

/*
 * What samego team is that is 'one thing, a team, work together'
 * Values comes from technology, technology comes from sharing~
 * https://github.com/alicfeng/KubernetesClient
 */

namespace AlicFeng\Kubernetes\Kubernetes;

use AlicFeng\Kubernetes\Base\KubernetesClient;
use AlicFeng\Kubernetes\Base\KubernetesManagerInterface;

class Gataway extends KubernetesClient implements KubernetesManagerInterface
{
    /**
     * {@inheritdoc}
     */
    public function create(array $package = [])
    {
        // TODO: Implement create() method.
    }

    /**
     * {@inheritdoc}
     */
    public function apply(string $name, array $package = [])
    {
        // TODO: Implement apply() method.
    }

    /**
     * {@inheritdoc}
     */
    public function remove(string $name)
    {
        // TODO: Implement remove() method.
    }

    /**
     * {@inheritdoc}
     */
    public function list(bool $is_all_namespace = false, array $query_parameters = [])
    {
    }

    /**
     * {@inheritdoc}
     */
    public function queryStatus(string $name)
    {
        // TODO: Implement queryStatus() method.
    }

    /**
     * {@inheritdoc}
     */
    public function repair(string $name, array $package)
    {
        // TODO: Implement repair() method.
    }
}
