<?php
/**
 * Created by AlicFeng at 2021/3/9 下午9:46
 */

namespace AlicFeng\Kubernetes\Kubernetes;


use AlicFeng\Kubernetes\Base\KubernetesClient;
use AlicFeng\Kubernetes\Base\KubernetesManagerIf;

class Gataway extends KubernetesClient implements KubernetesManagerIf
{
    /**
     * @inheritDoc
     */
    public function create(array $package = [])
    {
        // TODO: Implement create() method.
    }

    /**
     * @inheritDoc
     */
    public function apply(string $name, array $package = [])
    {
        // TODO: Implement apply() method.
    }

    /**
     * @inheritDoc
     */
    public function remove(string $name)
    {
        // TODO: Implement remove() method.
    }

    /**
     * @inheritDoc
     */
    public function list(bool $is_all_namespace = false, array $query_parameters = [])
    {

    }

    /**
     * @inheritDoc
     */
    public function queryStatus(string $name)
    {
        // TODO: Implement queryStatus() method.
    }

    /**
     * @inheritDoc
     */
    public function repair(string $name, array $package)
    {
        // TODO: Implement repair() method.
    }
}
